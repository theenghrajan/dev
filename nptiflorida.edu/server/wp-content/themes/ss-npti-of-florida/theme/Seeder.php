<?php
/**
 * Content Seeder
 *
 * Creates all pages, CPT posts, and default posts from sitemap.csv.
 * Idempotent — skips items that already exist (matched by slug + post_type).
 *
 * Trigger: visit /wp-admin/?run_seeder=1 while logged in as an admin.
 * Remove the include from SmartSites.php after seeding is complete.
 */

if ( ! defined( 'ABSPATH' ) ) exit;
if ( ! current_user_can( 'manage_options' ) ) wp_die( 'Unauthorised' );

add_action( 'admin_init', function () {

	if ( empty( $_GET['run_seeder'] ) ) {
		return;
	}

	// ── Helpers ───────────────────────────────────────────────────────────────

	$log    = [];
	$id_map = []; // csv_id => wp_post_id

	/**
	 * Strip leading/trailing slashes; '/' becomes 'home'.
	 */
	$slug = function ( string $raw ): string {
		$s = trim( $raw, '/' );
		return $s === '' ? 'home' : $s;
	};

	/**
	 * Return existing WP ID if a post with this slug+type already exists, else 0.
	 */
	$existing_id = function ( string $post_name, string $post_type ): int {
		if ( $post_type === 'page' ) {
			$p = get_page_by_path( $post_name, OBJECT, 'page' );
			return $p ? (int) $p->ID : 0;
		}
		$posts = get_posts( [
			'name'        => $post_name,
			'post_type'   => $post_type,
			'post_status' => 'any',
			'numberposts' => 1,
		] );
		return $posts ? (int) $posts[0]->ID : 0;
	};

	/**
	 * Insert or skip a post, always populate $id_map.
	 */
	$insert = function (
		string $title,
		string $raw_slug,
		string $post_type,
		string $csv_id,
		string $parent_csv_id,
		array  $extra = []
	) use ( $slug, $existing_id, &$id_map, &$log ): void {

		$post_name = $slug( $raw_slug );
		$parent_id = ( $parent_csv_id !== '' && isset( $id_map[ $parent_csv_id ] ) )
			? $id_map[ $parent_csv_id ]
			: 0;

		// Idempotency check
		$found = $existing_id( $post_name, $post_type );
		if ( $found ) {
			if ( $csv_id !== '' ) {
				$id_map[ $csv_id ] = $found;
			}
			$log[] = "SKIP  [$found] ($post_type) $title";
			return;
		}

		$args = array_merge( [
			'post_title'  => $title,
			'post_name'   => $post_name,
			'post_type'   => $post_type,
			'post_status' => 'publish',
			'post_parent' => $parent_id,
		], $extra );

		$post_id = wp_insert_post( $args, true );

		if ( is_wp_error( $post_id ) ) {
			$log[] = 'ERROR (' . $post_type . ') ' . $title . ' — ' . $post_id->get_error_message();
			return;
		}

		if ( $csv_id !== '' ) {
			$id_map[ $csv_id ] = $post_id;
		}

		$log[] = "CREATE[$post_id] ($post_type) $title" . ( $parent_id ? " → parent $parent_id" : '' );
	};

	// shorthand aliases
	$page = function ( string $title, string $raw_slug, string $csv_id, string $parent_csv_id = '' )
		use ( $insert ): void {
		$insert( $title, $raw_slug, 'page', $csv_id, $parent_csv_id );
	};

	$cpt = function ( string $title, string $raw_slug, string $post_type, string $csv_id, string $parent_csv_id = '' )
		use ( $insert ): void {
		$insert( $title, $raw_slug, $post_type, $csv_id, $parent_csv_id );
	};

	$post = function ( string $title, string $raw_slug, string $csv_id )
		use ( $insert ): void {
		$insert( $title, $raw_slug, 'post', $csv_id, '', [
			'post_category' => [],
			'tags_input'    => [],
		] );
	};

	// ── STEP 1 — Top-level Pages (no parent) ─────────────────────────────────

	$page( 'Home',                                         '/',                                              '5524-2947' );
	$page( 'About Us',                                     '/about-npti/',                                   '5524-2092' );
	$page( 'Locations',                                    '/locations',                                     '5524-2324' );
	$page( 'Programs',                                     '/programs',                                      '5524-9298' );  // CPT archive → page
	$page( 'Military Benefits',                            '/military-benefits/',                            '5524-6859' );
	$page( 'Admission & Financial Aid',                    '/admissions/',                                   '5524-4667' );
	$page( 'Veterans Guide',                               '/veterans-guide/',                               '5524-7631' );
	$page( 'Fitness Career Guide',                         '/fitness-career-guide/',                         '5524-8931' );
	$page( 'Campus Life Gallery',                          '/gallery/',                                      '5524-3924' );
	$page( 'Frequently Asked Questions',                   '/faqs/',                                         '5524-7048' );  // CPT archive → page
	$page( 'Blog and Articles',                            '/blog/',                                         '5524-4107' );
	$page( 'Contact Us',                                   '/contact/',                                      '5524-2628' );
	$page( 'Form Test',                                    '/form-test/',                                    '5524-673'  );
	$page( 'Personal Fitness Training Application Form',   '/personal-fitness-training-application-form/',   '5524-972'  );
	$page( 'Net Price Calculator',                         '/net-price-calculator/',                         '5524-6147' );
	$page( 'Apply Now of Florida',                         '/apply-now/',                                    '5524-7969' );
	$page( 'Job Placement',                                '/job-placement/',                                '5524-4948' );
	$page( 'Fitness Job Listings',                         '/fitness-job-listings/',                         '5524-5783' );  // CPT archive → page
	$page( 'Privacy Policy',                               '/privacy-policy/',                               '5524-5227' );
	$page( 'Cookie Policy (EU)',                           '/cookie-policy-eu/',                             '5524-5497' );
	$page( 'Author',                                       '/author',                                        '5524-3341' );
	$page( 'Continuing Education & Workshops',             '/continuing-education-workshops',                '5524-8173' );
	$page( 'Student housing for NPTI Florida',             '/student-housing-for-npti-florida',              '5524-10709' );

	// ── STEP 2 — Sub-level Pages (have parents) ───────────────────────────────

	$page( 'Patrick Sherman',                                                '/patrick-sherman',                       '5524-1865',  '5524-2092' );
	// Orlando shares CSV ID with Locations — pass '' so it doesn't overwrite id_map['5524-2324']
	$insert( 'Personal Trainer Certification in Orlando, FL',                '/npti-orlando/',       'page', '', '5524-2324' );
	$page( 'Tampa FL Personal Trainer Certification Courses',                '/npti-tampa/',                           '5524-10920', '5524-2324' );
	$page( 'Veteran Personal Trainer Certification',                         '/veteran-personal-trainer-certification/', '5524-7302', '5524-6859' );
	$page( 'Tampa Online Application Form',                                  '/tampa-online-application-form/',        '5524-1271',  '5524-972'  );
	$page( 'Strap Training Certification',                                   '/strap-training-certification/',         '5524-8465',  '5524-972'  );
	$page( 'Patrick Sherman',                                                '/patrick-sherman-',                      '5524-3643',  '5524-3341' );

	// ── STEP 3 — ss_programs (no parent or parent = Programs page) ───────────

	$cpt( 'Personal Fitness Training in Florida',                '/personal-fitness-training-600-hours/',           'ss_programs', '5524-4397'  );
	$cpt( 'Advanced Personal Fitness Training',                  '/advanced-personal-fitness-training/',            'ss_programs', '5524-11150' );
	$cpt( 'Personal Training Continuing Education',              '/personal-training-continuing-education',         'ss_programs', '5805-331'   );
	$cpt( 'Personal Training Specialist',                        '/personal-training-specialist/',                  'ss_programs', '5524-11419' );
	$cpt( 'Online Training Specialist',                          '/online-training-specialist',                     'ss_programs', '5805-617'   );
	$cpt( 'Health and Wellness Coaching',                        '/health-and-wellness-coaching',                   'ss_programs', '5805-916'   );
	$cpt( 'Health Coach Certification',                          '/health-coach-certification',                     'ss_programs', '5805-1217'  );
	$cpt( 'Special Population Fitness Course',                   '/special-population-fitness-course',              'ss_programs', '5805-1617'  );
	$cpt( 'Youth Fitness Training',                              '/youth-fitness-training',                         'ss_programs', '5805-1914'  );
	$cpt( 'Hyflex Program',                                      '/hyflex-program',                                 'ss_programs', '5524-10109' );

	// ── STEP 4 — ss_programs children (parent = another ss_programs post) ────

	$cpt( 'Personal Trainer Certification for High School Students',   '/personal-trainer-certification-for-high-school/', 'ss_programs', '5524-6648', '5524-4397'  );
	$cpt( 'Personal Trainer Certification for Trade School Graduates', '/personal-trainer-certification-for-trade-school/', 'ss_programs', '5524-9619', '5524-4397'  );
	$cpt( 'Best Personal Trainer Certification',                       '/best-personal-trainer-certification/',             'ss_programs', '5524-9836', '5524-11419' );

	// ── STEP 5 — Default Posts ────────────────────────────────────────────────

	$post( '10 Personal Training Marketing Strategies To Boost Your Fitness Business', '/10-personal-training-marketing-strategies-to-boost-your-fitness-business/', '5524-6387' );

	// ── Output log ────────────────────────────────────────────────────────────

	echo '<pre style="font-family:monospace;font-size:13px;padding:24px;background:#0d1117;color:#c9d1d9;line-height:1.6;">';
	echo '<strong style="color:#58a6ff;font-size:15px;">NPTI Seeder — Results</strong>' . "\n\n";

	$created = 0;
	$skipped = 0;
	$errors  = 0;

	foreach ( $log as $line ) {
		if ( str_starts_with( $line, 'CREATE' ) ) {
			echo '<span style="color:#3fb950;">' . esc_html( $line ) . '</span>' . "\n";
			$created++;
		} elseif ( str_starts_with( $line, 'SKIP' ) ) {
			echo '<span style="color:#8b949e;">' . esc_html( $line ) . '</span>' . "\n";
			$skipped++;
		} else {
			echo '<span style="color:#f85149;">' . esc_html( $line ) . '</span>' . "\n";
			$errors++;
		}
	}

	echo "\n<strong>Created: $created &nbsp; Skipped: $skipped &nbsp; Errors: $errors</strong>";
	echo '</pre>';

	exit;
} );