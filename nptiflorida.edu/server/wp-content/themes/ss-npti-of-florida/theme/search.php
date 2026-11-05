<?php

/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package ss_theme
 */

get_header();
?>

<section class="container mx-auto px-4 my-12 lg:my-16 xl:my-20 2xl:my-[6.25rem]">
	<?php if (have_posts()) : ?>

		<header class="page-header mb-6 lg:mb-8">
			<?php
			printf(
				/* translators: 1: search result title. 2: search term. */
				'<h2>%1$s <span>%2$s</span></h2>',
				esc_html__('Search results for:', 'ss_theme'),
				get_search_query()
			);
			?>
		</header><!-- .page-header -->

	<?php
		// Start the Loop.
		while (have_posts()) :
			the_post();
			get_template_part('template-parts/content/content', 'excerpt');

		// End the loop.
		endwhile;

		// Previous/next page navigation.
		ss_theme_the_posts_navigation();

	else :

		// If no content is found, get the `content-none` template part.
		get_template_part('template-parts/content/content', 'none');

	endif;
	?>
</section>

<?php
get_footer();
