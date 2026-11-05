<?php
/**
 * Template part for displaying single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ss_theme
 */

/*
 * Optional per-post overrides for the intro block. Empty fields fall back to
 * the post title and the post excerpt.
 *
 * @see inc/acf-field-groups.php — group_ss_blog_intro
 */
$ss_intro_heading = function_exists('get_field') ? trim((string) get_field('ss_blog_intro_heading')) : '';
$ss_intro_text    = function_exists('get_field') ? trim((string) get_field('ss_blog_intro_text')) : '';
?>
  <article id="post-<?php the_ID(); ?>" <?php post_class('ss-module-fitness-business bg-white py-10 md:py-16 lg:py-20'); ?>>
    <div class="container mx-auto px-4">
      <div class="flex flex-col gap-6 lg:flex-row lg:items-start lg:gap-12 mb-10 md:mb-14">

        <div class="flex flex-col gap-3 lg:w-6/12">
		   <?php if ($ss_intro_heading) : ?>
			<h2 class="font-heading font-bold text-2xl text-orange leading-tight"><?php echo esc_html($ss_intro_heading); ?></h2>
		   <?php else : ?>
			<?php the_title('<h2 class="font-heading font-bold text-2xl text-orange leading-tight">', '</h2>'); ?>
		   <?php endif; ?>

		   	<?php if (! is_page()) : ?>
			<div class="entry-meta">
				<p class="font-body font-semibold text-md text-steel"><?php echo get_the_date('d M Y'); ?></p>
			</div><!-- .entry-meta -->
			<?php endif; ?>
        </div>

        <div class="flex flex-col gap-4 lg:w-6/12">
          <div class="font-body font-normal text-md text-navy leading-relaxed">
		  	<?php if ($ss_intro_text) : ?>
				<?php echo wp_kses_post($ss_intro_text); ?>
			<?php else : ?>
				<?php the_excerpt(); ?>
			<?php endif; ?>
          </div>
        </div>

      </div>
		<?php if (has_post_thumbnail()) : ?>
			<div class="w-full overflow-hidden rounded mb-10 md:mb-14">
				<?php the_post_thumbnail('full', ['class' => 'w-full h-auto object-cover']); ?>
			</div>
		<?php endif;?>

		<div class="flex flex-col gap-8 max-w-prose mx-auto lg:max-w-none lg:mx-0 text-navy">
			<div class="font-body font-normal text-md text-navy leading-relaxed [&_h2]:font-heading [&_h2]:font-bold [&_h2]:text-xl">
			<?php
				the_content(
					sprintf(
						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers. */
							__('Continue reading<span class="sr-only"> "%s"</span>', 'ss_theme'),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						get_the_title()
					)
				);

				wp_link_pages(
					array(
						'before' => '<div>' . __('Pages:', 'ss_theme'),
						'after'  => '</div>',
					)
				);
				?>
			</div>

		</div>

    </div>
  </article>
