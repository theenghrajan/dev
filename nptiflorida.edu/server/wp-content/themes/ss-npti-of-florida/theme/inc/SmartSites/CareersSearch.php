<?php
/**
 * Careers Search — AJAX handler + script registration.
 *
 * Action:   careers_search
 * Keyword:  searches post title, employer, location, job_type,
 *           job_description, job_qualifications via posts_clauses
 * Filters:  employer (LIKE), location (LIKE), job_type (=)  — reserved for dropdowns
 * Returns:  HTML matching the ss_careers_list card markup
 */
class CareersSearch {

	private $search_fields = [
		'employer',
		'location',
		'job_type',
		'job_description',
		'job_qualifications',
	];

	public function __construct() {
		add_action( 'wp_enqueue_scripts',        [ $this, 'enqueue' ] );
		add_action( 'wp_ajax_careers_search',        [ $this, 'handle' ] );
		add_action( 'wp_ajax_nopriv_careers_search', [ $this, 'handle' ] );
	}

	public function enqueue() {
		wp_enqueue_script(
			'ss-careers-search',
			get_template_directory_uri() . '/js/careers-search.js',
			[ 'jquery' ],
			SS_THEME_VERSION,
			true
		);
		wp_localize_script( 'ss-careers-search', 'ssCareerSearch', [
			'ajaxUrl' => admin_url( 'admin-ajax.php' ),
			'nonce'   => wp_create_nonce( 'careers_search_nonce' ),
		] );
	}

	public function handle() {
		check_ajax_referer( 'careers_search_nonce', 'nonce' );

		$keyword  = sanitize_text_field( wp_unslash( $_POST['keyword']  ?? '' ) );
		$employer = sanitize_text_field( wp_unslash( $_POST['employer'] ?? '' ) );
		$location = sanitize_text_field( wp_unslash( $_POST['location'] ?? '' ) );
		$job_type = sanitize_text_field( wp_unslash( $_POST['job_type'] ?? '' ) );

		$args = [
			'post_type'           => 'ss_careers',
			'post_status'         => 'publish',
			'posts_per_page'      => -1,
			'no_found_rows'       => true,
			'_careers_keyword'    => $keyword, // consumed by extend_search_clauses
		];

		$meta_query = [];

		if ( $employer ) {
			$meta_query[] = [
				'key'     => 'employer',
				'value'   => $employer,
				'compare' => 'LIKE',
			];
		}

		if ( $location ) {
			$meta_query[] = [
				'key'     => 'location',
				'value'   => $location,
				'compare' => 'LIKE',
			];
		}

		if ( $job_type ) {
			$meta_query[] = [
				'key'     => 'job_type',
				'value'   => $job_type,
				'compare' => '=',
			];
		}

		if ( ! empty( $meta_query ) ) {
			$args['meta_query'] = array_merge( [ 'relation' => 'AND' ], $meta_query );
		}

		add_filter( 'posts_clauses', [ $this, 'extend_search_clauses' ], 10, 2 );
		$query = new WP_Query( $args );
		remove_filter( 'posts_clauses', [ $this, 'extend_search_clauses' ], 10 );

		ob_start();

		if ( $query->have_posts() ) :
			while ( $query->have_posts() ) : $query->the_post();
				$post_id            = get_the_ID();
				$employer_val       = get_field( 'employer',           $post_id );
				$location_val       = get_field( 'location',           $post_id );
				$job_type_val       = get_field( 'job_type',           $post_id );
				$job_description    = get_field( 'job_description',    $post_id );
				$job_qualifications = get_field( 'job_qualifications', $post_id );
				$job_apply_link     = get_field( 'job_apply_link',     $post_id );
				?>
				<div class="bg-white border border-navy/10 rounded-2xl p-6 flex flex-col gap-4">

					<h3 class="font-heading font-bold text-xl text-navy leading-snug">
						<?php echo esc_html( get_the_title() ); ?>
					</h3>

					<div class="flex flex-wrap items-center gap-x-3 gap-y-1">
						<?php if ( $employer_val ) : ?>
							<span class="font-body text-sm text-navy/50">
								<strong class="font-semibold">Employer:</strong> <?php echo esc_html( $employer_val ); ?>
							</span>
						<?php endif; ?>
						<?php if ( $location_val ) : ?>
							<span class="text-navy/30 hidden sm:inline">|</span>
							<span class="font-body text-sm text-navy/50">
								<strong class="font-semibold">Location:</strong> <?php echo esc_html( $location_val ); ?>
							</span>
						<?php endif; ?>
						<?php if ( $job_type_val ) : ?>
							<span class="text-navy/30 hidden sm:inline">|</span>
							<span class="font-body text-sm text-navy/50">
								<strong class="font-semibold">Type:</strong> <?php echo esc_html( $job_type_val ); ?>
							</span>
						<?php endif; ?>
					</div>

					<?php if ( $job_description ) : ?>
						<p class="font-body font-normal text-md text-navy leading-relaxed">
							<strong class="font-semibold">Description:</strong>
							<?php echo esc_html( $job_description ); ?>
						</p>
					<?php endif; ?>

					<?php if ( $job_qualifications ) : ?>
						<p class="font-body font-normal text-md text-navy leading-relaxed">
							<strong class="font-semibold">Qualifications:</strong>
							<?php echo esc_html( $job_qualifications ); ?>
						</p>
					<?php endif; ?>

					<?php if ( $job_apply_link ) : ?>
						<div>
							<a
								href="<?php echo esc_url( $job_apply_link['url'] ); ?>"
								<?php if ( $job_apply_link['target'] ) : ?>target="<?php echo esc_attr( $job_apply_link['target'] ); ?>"<?php endif; ?>
								class="inline-flex items-center justify-center bg-orange hover:bg-orange/90 text-white font-body font-bold text-sm uppercase rounded-4xl px-8 py-3 transition-fast no-underline"
							>
								<?php echo esc_html( $job_apply_link['title'] ); ?>
							</a>
						</div>
					<?php endif; ?>

				</div>
				<?php
			endwhile;
			wp_reset_postdata();
		else :
			echo '<p class="font-body font-normal text-md text-navy text-center py-8">No jobs found matching your search.</p>';
		endif;

		echo ob_get_clean();
		wp_die();
	}
	/**
	 * Extend WP_Query clauses to search post title + ACF meta fields in one query.
	 * Scoped via the _careers_keyword query var — add/remove_filter wraps every call.
	 */
	public function extend_search_clauses( $clauses, $wp_query ) {
		global $wpdb;

		$keyword = $wp_query->get( '_careers_keyword' );
		if ( ! $keyword ) return $clauses;

		$like = '%' . $wpdb->esc_like( $keyword ) . '%';

		// JOIN postmeta once using a dedicated alias to avoid conflicts
		$clauses['join'] .= " LEFT JOIN {$wpdb->postmeta} AS pm_careers
			ON ( {$wpdb->posts}.ID = pm_careers.post_id )";

		// Build OR conditions: title + each meta field
		$conditions = [
			$wpdb->prepare( "{$wpdb->posts}.post_title LIKE %s", $like ),
		];

		foreach ( $this->search_fields as $field ) {
			$conditions[] = $wpdb->prepare(
				"( pm_careers.meta_key = %s AND pm_careers.meta_value LIKE %s )",
				$field,
				$like
			);
		}

		$clauses['where'] .= ' AND ( ' . implode( ' OR ', $conditions ) . ' )';

		// GROUP BY prevents duplicate rows from the LEFT JOIN
		$clauses['groupby'] = empty( $clauses['groupby'] )
			? "{$wpdb->posts}.ID"
			: "{$wpdb->posts}.ID, {$clauses['groupby']}";

		return $clauses;
	}
}

new CareersSearch();
