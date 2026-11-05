<?php
/**
 * Custom Post Types
 *
 * Register all custom post types here.
 * Do NOT add categories, taxonomies, or modify functions.php.
 */

add_action( 'init', function () {

	// ss_programs
	register_post_type( 'ss_programs', [
		'labels'             => [
			'name'               => __( 'Programs', 'ss_theme' ),
			'singular_name'      => __( 'Program', 'ss_theme' ),
			'add_new'            => __( 'Add New', 'ss_theme' ),
			'add_new_item'       => __( 'Add New Program', 'ss_theme' ),
			'edit_item'          => __( 'Edit Program', 'ss_theme' ),
			'new_item'           => __( 'New Program', 'ss_theme' ),
			'view_item'          => __( 'View Program', 'ss_theme' ),
			'search_items'       => __( 'Search Programs', 'ss_theme' ),
			'not_found'          => __( 'No programs found', 'ss_theme' ),
			'not_found_in_trash' => __( 'No programs found in Trash', 'ss_theme' ),
		],
		'public'             => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'show_in_rest'       => true,
		'menu_position'      => 5,
		'hierarchical' => true,
		'menu_icon'          => 'dashicons-book-alt',
		'supports'           => [ 'title', 'editor', 'thumbnail', 'excerpt', 'revisions',  'page-attributes' ],
		'has_archive'        => false,
		'rewrite'            => [ 'slug' => 'programs', 'with_front' => false ],
		'query_var'          => true,
	] );

	// ss_faqs
	register_post_type( 'ss_faqs', [
		'labels'             => [
			'name'               => __( 'FAQs', 'ss_theme' ),
			'singular_name'      => __( 'FAQ', 'ss_theme' ),
			'add_new'            => __( 'Add New', 'ss_theme' ),
			'add_new_item'       => __( 'Add New FAQ', 'ss_theme' ),
			'edit_item'          => __( 'Edit FAQ', 'ss_theme' ),
			'new_item'           => __( 'New FAQ', 'ss_theme' ),
			'view_item'          => __( 'View FAQ', 'ss_theme' ),
			'search_items'       => __( 'Search FAQs', 'ss_theme' ),
			'not_found'          => __( 'No FAQs found', 'ss_theme' ),
			'not_found_in_trash' => __( 'No FAQs found in Trash', 'ss_theme' ),
		],
		'public'             => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'show_in_rest'       => true,
		'menu_position'      => 6,
		'hierarchical' => true,
		'menu_icon'          => 'dashicons-editor-help',
		'supports'           => [ 'title', 'editor', 'revisions' ],
		'has_archive'        => false,
		'rewrite'            => [ 'slug' => 'faqs', 'with_front' => false ],
		'query_var'          => true,
	] );

	// ss_careers
	register_post_type( 'ss_careers', [
		'labels'             => [
			'name'               => __( 'Careers', 'ss_theme' ),
			'singular_name'      => __( 'Career', 'ss_theme' ),
			'add_new'            => __( 'Add New', 'ss_theme' ),
			'add_new_item'       => __( 'Add New Career', 'ss_theme' ),
			'edit_item'          => __( 'Edit Career', 'ss_theme' ),
			'new_item'           => __( 'New Career', 'ss_theme' ),
			'view_item'          => __( 'View Career', 'ss_theme' ),
			'search_items'       => __( 'Search Careers', 'ss_theme' ),
			'not_found'          => __( 'No careers found', 'ss_theme' ),
			'not_found_in_trash' => __( 'No careers found in Trash', 'ss_theme' ),
		],
		'public'             => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'show_in_rest'       => true,
		'menu_position'      => 7,
		'hierarchical' => true,
		'menu_icon'          => 'dashicons-businessman',
		'supports'           => [ 'title', 'editor', 'thumbnail', 'excerpt', 'revisions',  'page-attributes' ],
		'has_archive'        => true,
		'rewrite'            => [ 'slug' => 'careers', 'with_front' => false ],
		'query_var'          => true,
	] );

	// ss_testimonials NPTI Student Testimonials
	register_post_type( 'ss_testimonials', [
		'labels'             => [
			'name'               => __( 'Testimonials', 'ss_theme' ),
			'singular_name'      => __( 'Testimonial', 'ss_theme' ),
			'add_new'            => __( 'Add Testimonial', 'ss_theme' ),
			'add_new_item'       => __( 'Add New Testimonial', 'ss_theme' ),
			'edit_item'          => __( 'Edit Testimonial', 'ss_theme' ),
			'new_item'           => __( 'New Testimonial', 'ss_theme' ),
			'view_item'          => __( 'View Testimonial', 'ss_theme' ),
			'search_items'       => __( 'Search Testimonials', 'ss_theme' ),
			'not_found'          => __( 'No Testimonials found', 'ss_theme' ),
			'not_found_in_trash' => __( 'No Testimonials found in Trash', 'ss_theme' ),
		],
		'public'             => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'show_in_rest'       => true,
		'menu_position'      => 6,
		'hierarchical' => true,
		'menu_icon'          => 'dashicons-star-filled',
		'supports'           => [ 'title', 'editor', 'revisions' ],
		'has_archive'        => false,
		'rewrite'            => [ 'slug' => 'testimonials', 'with_front' => false ],
		'query_var'          => true,
	] );

	register_post_type( 'ss_teams', [
		'labels'             => [
			'name'               => __( 'Teams', 'ss_theme' ),
			'singular_name'      => __( 'Team', 'ss_theme' ),
			'add_new'            => __( 'Add New', 'ss_theme' ),
			'add_new_item'       => __( 'Add New Team', 'ss_theme' ),
			'edit_item'          => __( 'Edit Team', 'ss_theme' ),
			'new_item'           => __( 'New Team', 'ss_theme' ),
			'view_item'          => __( 'View Team', 'ss_theme' ),
			'search_items'       => __( 'Search Teams', 'ss_theme' ),
			'not_found'          => __( 'No Teams found', 'ss_theme' ),
			'not_found_in_trash' => __( 'No Teams found in Trash', 'ss_theme' ),
		],
		'public'             => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'show_in_rest'       => true,
		'menu_position'      => 6,
		'hierarchical' => true,
		'menu_icon'          => 'dashicons-admin-users',
		'supports'           => [ 'title', 'editor', 'revisions' ],
		'has_archive'        => false,
		'rewrite'            => [ 'slug' => 'teams', 'with_front' => false ],
		'query_var'          => true,
	] );

} );
