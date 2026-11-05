<?php
/**
 * ACF field groups registered in PHP.
 *
 * Field groups defined here travel with the theme, so they do not have to be
 * recreated by hand in the admin on every environment.
 *
 * @package ss_theme
 */

add_action(
	'acf/init',
	function () {
		if ( ! function_exists( 'acf_add_local_field_group' ) ) {
			return;
		}

		/*
		 * Blog single intro overrides.
		 *
		 * The intro block on a single post falls back to the post title and the
		 * post excerpt. Filling either field below overrides that fallback for
		 * that post only; leaving a field empty keeps the existing behaviour.
		 *
		 * @see template-parts/content/content-single.php
		 */
		acf_add_local_field_group(
			array(
				'key'                   => 'group_ss_blog_intro',
				'title'                 => 'Blog Intro Overrides',
				'location'              => array(
					array(
						array(
							'param'    => 'post_type',
							'operator' => '==',
							'value'    => 'post',
						),
					),
				),
				'position'              => 'normal',
				'style'                 => 'default',
				'label_placement'       => 'top',
				'instruction_placement' => 'label',
				'description'           => 'Optional. Overrides the heading and paragraph in the intro block at the top of the post.',
				'fields'                => array(
					array(
						'key'          => 'field_ss_blog_intro_heading',
						'label'        => 'Intro heading (H2)',
						'name'         => 'ss_blog_intro_heading',
						'type'         => 'text',
						'instructions' => 'Leave empty to use the post title. Fill this in to give the post an H2 that differs from its H1.',
						'required'     => 0,
						'wrapper'      => array(
							'width' => '',
							'class' => '',
							'id'    => '',
						),
					),
					array(
						'key'          => 'field_ss_blog_intro_text',
						'label'        => 'Intro paragraph',
						'name'         => 'ss_blog_intro_text',
						'type'         => 'wysiwyg',
						'instructions' => 'Leave empty to use the post excerpt.',
						'required'     => 0,
						'tabs'         => 'visual',
						'toolbar'      => 'basic',
						'media_upload' => 0,
						'delay'        => 1,
						'wrapper'      => array(
							'width' => '',
							'class' => '',
							'id'    => '',
						),
					),
				),
			)
		);
	}
);
