<?php
/**
 * Module: Fitness Career CTA
 * Template Part: template-parts/modules/ss_fitness_career.php
 * ACF Flexible Content Layout: ss_fitness_career
 *
 * Fields:
 *  - ss_fitness_career_background_watermark    (image)
 *  - ss_fitness_career_section_heading         (text)
 *  - ss_fitness_career_section_heading_highlight (text)
 *  - ss_fitness_career_section_subtext         (textarea)
 *  - ss_fitness_career_primary_cta             (link)
 *  - ss_fitness_career_secondary_cta           (link)
 */

$background_watermark      = get_sub_field( 'ss_fitness_career_background_watermark' );
$section_heading           = get_sub_field( 'ss_fitness_career_section_heading' );
$section_heading_highlight = get_sub_field( 'ss_fitness_career_section_heading_highlight' );
$section_subtext           = get_sub_field( 'ss_fitness_career_section_subtext' );
$primary_cta               = get_sub_field( 'ss_fitness_career_primary_cta' );
$secondary_cta             = get_sub_field( 'ss_fitness_career_secondary_cta' );

if ( ! $section_heading ) return;
?>

<section
  id="ss-fitness-career"
  class="ss-module-fitness-career bg-blue-08 relative overflow-hidden pad-section"
>

  <?php if ( $background_watermark ) : ?>
    <img
      src="<?php echo esc_url( $background_watermark['url'] ); ?>"
      alt=""
      aria-hidden="true"
      class="absolute inset-0 w-full h-full object-cover opacity-80 pointer-events-none"
    >
  <?php endif; ?>

  <!-- Content -->
  <div class="relative z-10 container mx-auto px-4">
    <div class="col-center-center-16 text-center">

      <h2 class="text-center">
        <?php echo esc_html( $section_heading ); ?>
        <?php if ( $section_heading_highlight ) : ?>
          <span class="text-orange"><?php echo esc_html( $section_heading_highlight ); ?></span>
        <?php endif; ?>
      </h2>

      <?php if ( $section_subtext ) : ?>
        <p class="text-center max-w-2xl mx-auto">
          <?php echo wp_kses_post( $section_subtext ); ?>
        </p>
      <?php endif; ?>

      <div class="row-center-center gap-4 flex-wrap">

        <?php if ( $primary_cta ) : ?>
          <a href="<?php echo esc_url( $primary_cta['url'] ); ?>"<?php if ( $primary_cta['target'] ) echo ' target="' . esc_attr( $primary_cta['target'] ) . '"'; ?> class="btn-primary btn-primary:hover">
            <?php echo esc_html( $primary_cta['title'] ); ?>
          </a>
        <?php endif; ?>

        <?php if ( $secondary_cta ) : ?>
          <a href="<?php echo esc_url( $secondary_cta['url'] ); ?>"<?php if ( $secondary_cta['target'] ) echo ' target="' . esc_attr( $secondary_cta['target'] ) . '"'; ?> class="btn-secondary btn-secondary:hover">
            <?php echo esc_html( $secondary_cta['title'] ); ?>
          </a>
        <?php endif; ?>

      </div>

    </div>
  </div>

</section>
