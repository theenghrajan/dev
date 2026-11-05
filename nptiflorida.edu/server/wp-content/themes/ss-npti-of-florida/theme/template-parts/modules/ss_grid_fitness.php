<?php
/**
 * Module: Grid Fitness CTA
 * Template Part: template-parts/modules/ss_grid_fitness.php
 * ACF Flexible Content Layout: ss_grid_fitness
 *
 * Fields:
 *  - ss_grid_fitness_background_image (image)
 *  - ss_grid_fitness_section_heading  (text)
 *  - ss_grid_fitness_section_subtext  (textarea)
 *  - ss_grid_fitness_cta              (link)
 */

$background_image = get_sub_field( 'ss_grid_fitness_background_image' );
$section_heading  = get_sub_field( 'ss_grid_fitness_section_heading' );
$section_subtext  = get_sub_field( 'ss_grid_fitness_section_subtext' );
?>

<section
  id="ss-grid-fitness"
  class="ss-module-grid-fitness relative overflow-hidden pad-section"
>

  <?php if ( $background_image ) : ?>
    <img
      src="<?php echo esc_url( $background_image['url'] ); ?>"
      alt="<?php echo esc_attr( $background_image['alt'] ); ?>"
      aria-hidden="true"
      class="absolute inset-0 w-full h-full object-cover pointer-events-none"
    >
  <?php endif; ?>

  <!-- Gradient overlay: blue → navy -->
  <div
    class="absolute inset-0 pointer-events-none"
    style="background: linear-gradient(to right, rgba(4,76,171,0.9), rgba(23,42,54,0.9));"
  ></div>

  <!-- Content -->
  <div class="relative z-10 container mx-auto px-4">
    <div class="col-center-center-16 text-white text-center">

      <h2 class="text-white text-center">
        <?php echo esc_html( $section_heading ); ?>
      </h2>

      <?php if ( $section_subtext ) : ?>
        <p class="text-white text-center max-w-2xl mx-auto">
          <?php echo wp_kses_post( $section_subtext ); ?>
        </p>
      <?php endif; ?>
      <div class="flex flex-wrap justify-center gap-y-2 gap-x-4 mt-6">
        <?php if (have_rows('ss_cta_links')):
          $btn_index = 0; ?>
          <?php while (have_rows('ss_cta_links')):
            the_row();
            $quick_link = get_sub_field('ss_grid_fitness_cta');
            if (!$quick_link)
              continue;
            $btn_classes = ($btn_index % 2 === 0) ? 'btn btn-primary' : 'btn btn-secondary';
            $btn_index++;
            ?>
            <?php if ($quick_link): ?>
              <a href="<?php echo esc_url($quick_link['url']); ?>" <?php if ($quick_link['target'])
                     echo ' target="' . esc_attr($quick_link['target']) . '"'; ?> class="<?php echo esc_attr($btn_classes); ?>">
                <?php echo esc_html($quick_link['title']); ?>
              </a>
            <?php endif; ?>
          <?php endwhile; ?>
        <?php endif; ?>
      </div>

    </div>
  </div>

</section>