<?php
/**
 * Module: Specialization
 * Template Part: template-parts/modules/ss_specialization.php
 * ACF Flexible Content Layout: ss_specialization
 *
 * Fields:
 *  - ss_specialization_section_heading  (text)
 *  - ss_specialization_programs         (relationship → ss_programs)
 *  - ss_specialization_cta_label        (text)
 *  - ss_specialization_cta_arrow_image  (image)
 *
 * CPT fields accessed via get_field( $name, $post->ID ):
 *  - program_image             (image)
 *  - program_short_description (textarea)
 */

$section_heading   = get_sub_field( 'ss_specialization_section_heading' );
$programs          = get_sub_field( 'ss_specialization_programs' );
$cta_label         = get_sub_field( 'ss_specialization_cta_label' );
$cta_arrow_image   = get_sub_field( 'ss_specialization_cta_arrow_image' );

if ( ! $section_heading ) return;
?>

<section
  id="ss-specialization"
  class="ss-module-specialization bg-blue-08 pad-section !pt-0"
>
  <div class="container mx-auto px-4">

    <h3 class="text-center mb-8"><?php echo esc_html( $section_heading ); ?></h3>

    <?php if ( $programs ) : ?>
      <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">

        <?php foreach ( $programs as $post ) : setup_postdata( $post );
          $program_image             = get_field( 'program_image',             $post->ID );
          $program_short_description = get_field( 'program_short_description', $post->ID );
        ?>

          <article class="bg-white border border-smoke rounded-xl p-3 flex flex-col gap-4 sm:flex-row sm:items-center shadow-card">

            <?php if ( $program_image ) : ?>
              <div class="shrink-0 rounded overflow-hidden w-full sm:w-[200px] h-[160px] sm:h-[184px]">
                <img
                  src="<?php echo esc_url( $program_image['url'] ); ?>"
                  alt="<?php echo esc_attr( $program_image['alt'] ); ?>"
                  width="<?php echo esc_attr( $program_image['width'] ); ?>"
                  height="<?php echo esc_attr( $program_image['height'] ); ?>"
                  class="w-full h-full object-cover rounded"
                >
              </div>
            <?php endif; ?>

            <div class="col-start-start-8 flex-1">

              <h3 class="text-navy leading-snug"><?php echo esc_html( get_the_title( $post->ID ) ); ?></h3>

              <?php if ( $program_short_description ) : ?>
                <div class="text-sm text-navy"><?php echo wp_kses_post( $program_short_description ); ?></div>
              <?php endif; ?>

              <?php if ( $cta_label ) : ?>
                <a href="<?php echo esc_url( get_permalink( $post->ID ) ); ?>" class="row-start-center gap-2 text-orange font-bold text-sm uppercase no-underline transition-fast hover:text-orange/80">
                  <?php echo esc_html( $cta_label ); ?>
                  <i class="icon-arrow-right"></i>
                  <?php if ( $cta_arrow_image ) : ?>
                    <img src="<?php echo esc_url( $cta_arrow_image['url'] ); ?>" alt="" aria-hidden="true" width="16" height="16" class="shrink-0">
                  <?php endif; ?>
                </a>
              <?php endif; ?>

            </div>

          </article>

        <?php endforeach; wp_reset_postdata(); ?>

      </div>
    <?php endif; ?>

  </div>
</section>
