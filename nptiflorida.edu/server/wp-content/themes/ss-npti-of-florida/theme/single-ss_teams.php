<?php

/**
 * The template for displaying all single posts
 *
 * This is the template that displays all pages by default. Please note that
 * this is the WordPress construct of pages: specifically, posts with a post
 * type of `page`.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ss_theme
 */

get_header();
echo get_template_part('template-parts/modules/ss_veteran_owned_business.php');
?>

<?php if (have_rows('ss_reusable_modules_flexible_content', get_the_ID())): ?>

	<?php while (have_rows('ss_reusable_modules_flexible_content', get_the_ID())):
		the_row(); ?>

		<?php
		// get the layout name
		$layout = get_row_layout();

		// pass the entire row data if needed
		$row_data = get_row(true);
		?>

		<?php get_template_part('template-parts/modules/' . $layout, null, array('value' => $row_data)); ?>

	<?php endwhile; ?>
<?php else: ?>
	<section>
		<?php the_content(); ?>
	</section>
<?php endif; ?>


<?php get_template_part( 'template-parts/content/ready-to-speak' ); ?>

<?php
get_footer();
