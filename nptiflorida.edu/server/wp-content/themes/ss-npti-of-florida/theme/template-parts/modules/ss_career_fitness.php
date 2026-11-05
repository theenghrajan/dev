<?php
/**
 * Module: Career in Fitness
 * Template Part: template-parts/modules/ss_career_fitness.php
 * ACF Flexible Content Layout: ss_career_fitness
 *
 * Fields:
 *  - ss_career_fitness_section_image             (image)
 *  - ss_career_fitness_section_heading_highlight (text)
 *  - ss_career_fitness_section_heading           (text)
 *  - ss_career_fitness_section_body              (textarea)
 *  - ss_career_fitness_primary_cta               (link)
 *  - ss_career_fitness_secondary_cta             (link)
 */

$section_image             = get_sub_field( 'ss_career_fitness_section_image' );
$section_heading_highlight = get_sub_field( 'ss_career_fitness_section_heading_highlight' );
$section_heading           = get_sub_field( 'ss_career_fitness_section_heading' );
$section_body              = get_sub_field( 'ss_career_fitness_section_body' );
$primary_cta               = get_sub_field( 'ss_career_fitness_primary_cta' );
$secondary_cta             = get_sub_field( 'ss_career_fitness_secondary_cta' );

if ( ! $section_heading ) return;
?>

<section
  id="ss-career-fitness"
  class="ss-module-career-fitness bg-white pad-section"
>
  <div class="container mx-auto px-4">
    <div class="grid grid-cols-1 gap-8 md:grid-cols-2 md:items-center">

      <!-- Left: guide book image -->
      <div class="flex items-center justify-center">
        <?php if ( $section_image ) : ?>
          <img
            src="<?php echo esc_url( $section_image['url'] ); ?>"
            alt="<?php echo esc_attr( $section_image['alt'] ); ?>"
            width="<?php echo esc_attr( $section_image['width'] ); ?>"
            height="<?php echo esc_attr( $section_image['height'] ); ?>"
            class="w-full max-w-[480px] h-auto"
          >
        <?php endif; ?>
      </div>

      <!-- Right: heading + body + CTAs -->
      <div class="col-start-start-16 !gap-0">
        <h2>
          <?php if ( $section_heading_highlight ) : ?>
            <span class="text-orange"><?php echo esc_html( $section_heading_highlight ); ?></span>
          <?php endif; ?>
          <?php echo esc_html( $section_heading ); ?>
        </h2>

        <?php if ( $section_body ) : ?>
          <p>
            <?php echo wp_kses_post( $section_body ); ?>
          </p>
        <?php endif; ?>

        <!-- CTAs -->
        <div class="row-start-center gap-4 flex-wrap">
          <?php if ( $primary_cta ) : ?>
            <a
              href="<?php echo esc_url( $primary_cta['url'] ); ?>"
              class="btn btn-primary btn-primary:hover"
              <?php if ( $primary_cta['target'] ) : ?>target="<?php echo esc_attr( $primary_cta['target'] ); ?>"<?php endif; ?>
            >
              <?php echo esc_html( $primary_cta['title'] ); ?>
            </a>
          <?php endif; ?>
          <?php if ( $secondary_cta ) : ?>
            <a
              href="<?php echo esc_url( $secondary_cta['url'] ); ?>"
              class="btn btn-secondary btn-secondary:hover"
              <?php if ( $secondary_cta['target'] ) : ?>target="<?php echo esc_attr( $secondary_cta['target'] ); ?>"<?php endif; ?>
            >
              <?php echo esc_html( $secondary_cta['title'] ); ?>
            </a>
          <?php endif; ?>
        </div>

      </div>

    </div>
  </div>
</section>
