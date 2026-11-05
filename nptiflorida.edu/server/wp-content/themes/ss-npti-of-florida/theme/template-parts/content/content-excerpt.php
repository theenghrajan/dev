<?php

/**
 * Template part for displaying post archives and search results
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ss_theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('search-result-article'); ?>>
	<header class="entry-header">
		<?php
		if (is_sticky() && is_home() && ! is_paged()) {
			printf('%s', esc_html_x('Featured', 'post', 'ss_theme'));
		}
		the_title(sprintf('<h2><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>');
		?>
	</header><!-- .entry-header -->

	<?php if (!empty(get_the_post_thumbnail()) || !empty(get_the_excerpt())) { ?>
		<div class="flex flex-wrap gap-y-2 items-center mb-4">
			<?php ss_theme_post_thumbnail(); ?>
			<div class="flex-none lg:flex-1 w-full space-y-4 [&>*]:mb-0">
				<?php the_excerpt(); ?>
			</div>
		</div>
	<?php } ?>

	<footer class="entry-footer text-[0.9375rem]">
		<?php ss_theme_entry_footer(); ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-${ID} -->