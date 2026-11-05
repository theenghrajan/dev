<?php
/**
 * ACF Flexible Content Block Assignment Seeder
 *
 * Assigns ACF Flexible Content layouts to the correct pages/posts in the
 * correct order based on blocks_inventory.csv.
 *
 * Idempotent — skips any post whose flexible_content field is already populated.
 * Layout names are normalised: hyphens (CSV) → underscores (ACF layout keys).
 *
 * Trigger: visit /wp-admin/?run_assign_blocks=1 while logged in as an admin.
 * Remove the include from SmartSites.php after running.
 */

if ( ! defined( 'ABSPATH' ) ) exit;
if ( ! current_user_can( 'manage_options' ) ) wp_die( 'Unauthorised' );

add_action( 'admin_init', function () {

	if ( empty( $_GET['run_assign_blocks'] ) ) {
		return;
	}

	// ── Page-to-layouts map ───────────────────────────────────────────────────
	// slug: trimmed of slashes ('/' → 'home')
	// post_type: 'page' for pages and CPT-archive pages; cpt name for CPT posts
	// layouts: ACF layout names in order (underscores, no hyphens)

	$assignments = [

		[
			'title'     => 'Home',
			'slug'      => 'home',
			'post_type' => 'page',
			'layouts'   => [
				'ss_hero_banner',
				'ss_logo_slides',
				'ss_certification_accre',
				'ss_training_year',
				'ss_unmatched_growth',
				'ss_training_edu',
				'ss_personal_trainer',
				'ss_course_offered',
				'ss_student_testimonials',
				'ss_grid_training',
			],
		],

		[
			'title'     => 'About Us',
			'slug'      => 'about-npti',
			'post_type' => 'page',
			'layouts'   => [
				'ss_hero_banner',
				'ss_why_npti',
				'ss_meet_team',
				'ss_grid_fitness',
				'ss_grid_training',
			],
		],

		[
			'title'     => 'Locations',
			'slug'      => 'locations',
			'post_type' => 'page',
			'layouts'   => [
				'ss_hero_banner',
				'ss_live_location',
				'ss_florida_compuses',
				'ss_train_trainers',
				'ss_fitness_career',
				'ss_grid_training',
			],
		],

		[
			'title'     => 'Patrick Sherman',
			'slug'      => 'patrick-sherman',
			'post_type' => 'page',
			'layouts'   => [
				'ss_hero_banner',
				'ss_grid_journey',
				'ss_grid_fitness',
				'ss_grid_training',
			],
		],

		[
			'title'     => 'Military Benefits',
			'slug'      => 'military-benefits',
			'post_type' => 'page',
			'layouts'   => [
				'ss_hero_banner',
				'ss_grid_training',
				'ss_npti_military',
			],
		],

		[
			'title'     => 'Personal Trainer Certification for High School Students',
			'slug'      => 'personal-trainer-certification-for-high-school',
			'post_type' => 'ss_programs',
			'layouts'   => [
				'ss_hero_banner',
				'ss_npti_institute',
				'ss_grid_fitness',
				'ss_grid_training',
			],
		],

		[
			'title'     => 'Personal Trainer Certification in Orlando, FL',
			'slug'      => 'npti-orlando',
			'post_type' => 'page',
			'layouts'   => [
				'ss_hero_banner',
				'ss_national_training',
				'ss_npti_orlando',
				'ss_npti_class',
				'ss_grid_training',
			],
		],

		[
			'title'     => 'Programs',
			'slug'      => 'programs',
			'post_type' => 'page',
			'layouts'   => [
				'ss_hero_banner',
				'ss_our_program',
				'ss_specialization',
				'ss_why_choose',
				'ss_grid_fitness',
				'ss_grid_training',
			],
		],

		[
			'title'     => 'Personal Fitness Training in Florida',
			'slug'      => 'personal-fitness-training-600-hours',
			'post_type' => 'ss_programs',
			'layouts'   => [
				'ss_hero_banner',
				'ss_personal_fitness',
				'ss_coaching_market',
				'ss_veteran_owned',
				'ss_npti_class',
				'ss_grid_training',
			],
		],

		[
			'title'     => 'Veteran Personal Trainer Certification',
			'slug'      => 'veteran-personal-trainer-certification',
			'post_type' => 'page',
			'layouts'   => [
				'ss_hero_banner',
				'ss_personal_train',
				'ss_video',
				'ss_grid_training',
			],
		],

	];

	// ── Process each assignment ───────────────────────────────────────────────

	$log = [];

	foreach ( $assignments as $item ) {

		// Resolve post ID
		if ( $item['post_type'] === 'page' ) {
			$post = get_page_by_path( $item['slug'] );
		} else {
			$found = get_posts( [
				'name'        => $item['slug'],
				'post_type'   => $item['post_type'],
				'post_status' => 'publish',
				'numberposts' => 1,
			] );
			$post = $found ? $found[0] : null;
		}

		if ( ! $post ) {
			$log[] = [ 'status' => 'ERROR', 'msg' => "{$item['title']} — post not found for slug /{$item['slug']}" ];
			continue;
		}

		$post_id = (int) $post->ID;

		// Idempotency — skip if already populated
		$existing = get_field( 'flexible_content', $post_id );
		if ( ! empty( $existing ) ) {
			$log[] = [ 'status' => 'SKIPPED', 'msg' => "{$item['title']} (ID: {$post_id}) — flexible_content already populated" ];
			continue;
		}

		// Build layout array — acf_fc_layout only; no sub-field values seeded
		$layouts = array_map( fn( string $name ) => [ 'acf_fc_layout' => $name ], $item['layouts'] );

		update_field( 'flexible_content', $layouts, $post_id );

		$count  = count( $layouts );
		$log[]  = [ 'status' => 'ASSIGNED', 'msg' => "{$item['title']} (ID: {$post_id}) — {$count} layouts" ];
	}

	// ── Output log ────────────────────────────────────────────────────────────

	$colors = [
		'ASSIGNED' => '#3fb950',
		'SKIPPED'  => '#8b949e',
		'ERROR'    => '#f85149',
	];

	$counts = [ 'ASSIGNED' => 0, 'SKIPPED' => 0, 'ERROR' => 0 ];

	echo '<pre style="font-family:monospace;font-size:13px;padding:24px;background:#0d1117;color:#c9d1d9;line-height:1.6;">';
	echo '<strong style="color:#58a6ff;font-size:15px;">NPTI — Assign ACF Blocks — Results</strong>' . "\n\n";

	foreach ( $log as $entry ) {
		$status = $entry['status'];
		$color  = $colors[ $status ] ?? '#c9d1d9';
		$counts[ $status ] = ( $counts[ $status ] ?? 0 ) + 1;
		printf(
			'<span style="color:%s">[%-8s] %s</span>' . "\n",
			$color,
			esc_html( $status ),
			esc_html( $entry['msg'] )
		);
	}

	echo "\n<strong>Assigned: {$counts['ASSIGNED']} &nbsp; Skipped: {$counts['SKIPPED']} &nbsp; Errors: {$counts['ERROR']}</strong>";
	echo '</pre>';

	exit;
} );
