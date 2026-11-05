<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ss_theme
 */

get_header();
?>

<section>
  <?php
  /* Start the Loop */
  while (have_posts()) :
    the_post();
    get_template_part('template-parts/content/content', 'single');
  // End the loop.
  endwhile;
  ?>
</section>

<?php
$cta             = get_field('ss_ready_to_start_cta');
$background_image = $cta['ss_grid_fitness_background_image'] ?? null;
$section_heading  = $cta['ss_grid_fitness_section_heading'] ?? '';
$section_subtext  = $cta['ss_grid_fitness_section_subtext'] ?? '';
$cta_links        = $cta['ss_cta_links'] ?? [];
?>
<?php if ($cta && ($section_heading || ! empty($cta_links))) : ?>
  <section id="ss-grid-fitness" class="ss-module-grid-fitness relative overflow-hidden pad-section">

    <?php if ($background_image) : ?>
      <img
        src="<?php echo esc_url($background_image['url']); ?>"
        alt="<?php echo esc_attr($background_image['alt']); ?>"
        aria-hidden="true"
        class="absolute inset-0 w-full h-full object-cover pointer-events-none">
    <?php endif; ?>

    <!-- Gradient overlay: blue → navy -->
    <div
      class="absolute inset-0 pointer-events-none"
      style="background: linear-gradient(to right, rgba(4,76,171,0.9), rgba(23,42,54,0.9));"></div>

    <!-- Content -->
    <div class="relative z-10 container mx-auto px-4">
      <div class="col-center-center-16 text-white text-center">

        <h2 class="text-white text-center">
          <?php echo esc_html($section_heading); ?>
        </h2>

        <?php if ($section_subtext) : ?>
          <p class="text-white text-center max-w-2xl mx-auto">
            <?php echo wp_kses_post($section_subtext); ?>
          </p>
        <?php endif; ?>

        <div class="flex flex-wrap justify-center gap-y-2 gap-x-4 mt-6">
          <?php $btn_index = 0;
          foreach ($cta_links as $row) :
            $quick_link = $row['ss_grid_fitness_cta'] ?? null;
            if (! $quick_link) continue;
            $btn_classes = ($btn_index % 2 === 0) ? 'btn btn-primary btn-primary:hover' : 'btn btn-secondary';
            $btn_index++;
          ?>
            <a href="<?php echo esc_url($quick_link['url']); ?>" <?php if ($quick_link['target']) echo ' target="' . esc_attr($quick_link['target']) . '"'; ?> class="<?php echo esc_attr($btn_classes); ?>">
              <?php echo esc_html($quick_link['title']); ?>
            </a>
          <?php endforeach; ?>
        </div>

      </div>
    </div>
  </section>
<?php endif; ?>

<?php get_template_part('template-parts/content/ready-to-speak'); ?>

<?php
get_footer();
