<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ss_theme
 */

get_header();
?>

<?php if (have_posts()) : ?>
	<section
		id="ss-articles"
		class="ss-module-articles bg-white pad-section">
		<div class="container mx-auto px-4">
			<div class="col-center-center-16">
				<!-- acf: articles (repeater) -->
				<div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3 w-full">
					<?php while (have_posts()) : the_post(); ?>
                		<?php get_template_part('template-parts/content/content'); ?>
					<?php endwhile; ?>
				</div>

			</div>
		</div>
	</section>

<?php
	// Previous/next page navigation.
	ss_theme_the_posts_navigation();
else :
	// If no content, include the "No posts found" template.
	get_template_part('template-parts/content/content', 'none');

endif;
?>
<?php
get_footer();
