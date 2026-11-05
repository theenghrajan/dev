<?php
/**
 * Module: Certification & Accreditation
 * Template Part: template-parts/modules/ss_certification_accre.php
 * ACF Flexible Content Layout: ss_certification_accre
 *
 * Component CSS (defined in tailwind/custom/components/components.css):
 *  - .ss-certification-accre__card — flex flex-row gap-5 items-center bg-white border border-silver rounded-xl px-3 py-3
 *
 * Fields:
 *  - ss_certification_accre_section_heading           (text)
 *  - ss_certification_accre_section_heading_highlight (text)
 *  - ss_certification_accre_section_description       (textarea)
 *  - ss_certification_accre_hero_image                (image)
 *  - ss_certification_accre_programs                  (relationship → ss_programs)
 *  - ss_certification_accre_program_cta_label         (text)
 */

$section_heading           = get_sub_field( 'ss_certification_accre_section_heading' );
$section_heading_highlight = get_sub_field( 'ss_certification_accre_section_heading_highlight' );
$section_description       = get_sub_field( 'ss_certification_accre_section_description' );
$hero_image                = get_sub_field( 'ss_certification_accre_hero_image' );
$programs                  = get_sub_field( 'ss_certification_accre_programs' );
$program_cta_label         = get_sub_field( 'ss_certification_accre_program_cta_label' );

if ( ! $section_heading ) return;
?>

<section
  id="ss-certification-accre"
  class="ss-module-certification-accre bg-white pt-10 md:pt-16 lg:pt-20"
>
  <div class="container mx-auto px-4">

    <div class="flex flex-col mb-14 lg:flex-row lg:gap-12 lg:items-start lg:mb-0">

      <!-- Left column — heading + description + hero image -->
      <div class="flex flex-col gap-2 lg:w-5/12">

        <h2 class="text-navy leading-tight">
          <?php echo esc_html( $section_heading ); ?>
          <?php if ( $section_heading_highlight ) : ?>
            <span class="text-orange"> <?php echo esc_html( $section_heading_highlight ); ?></span>
          <?php endif; ?>
        </h2>

        <?php if ( $section_description ) : ?>
          <p class="font-body text-md font-normal text-navy leading-relaxed">
            <?php echo wp_kses_post( $section_description ); ?>
          </p>
        <?php endif; ?>

        <?php if ( $hero_image ) : ?>
          <img
            src="<?php echo esc_url( $hero_image['url'] ); ?>"
            alt="<?php echo esc_attr( $hero_image['alt'] ); ?>"
            width="<?php echo esc_attr( $hero_image['width'] ); ?>"
            height="<?php echo esc_attr( $hero_image['height'] ); ?>"
            class="w-full h-auto object-cover rounded-xl"
          >
        <?php endif; ?>

      </div>

      <!-- Right column — program cards -->
      <div class="flex flex-col gap-5 lg:w-7/12">

        <?php if ( $programs ) : foreach ( $programs as $post ) : setup_postdata( $post );
          $program_image             = get_field( 'program_image',             $post->ID );
          $program_track_label       = get_field( 'program_track_label',       $post->ID );
          $program_short_description = get_field( 'program_short_description', $post->ID );
          $program_cta_icon          = get_field( 'program_cta_icon',          $post->ID );
        ?>

          <div class="ss-certification-accre__card">

            <?php if ( $program_image ) : ?>
              <img
                src="<?php echo esc_url( $program_image['url'] ); ?>"
                alt="<?php echo esc_attr( $program_image['alt'] ); ?>"
                width="<?php echo esc_attr( $program_image['width'] ); ?>"
                height="<?php echo esc_attr( $program_image['height'] ); ?>"
                class="shrink-0 w-full sm:w-2/6 md:w-48 h-auto object-cover rounded-lg"
              >
            <?php endif; ?>

            <div class="flex flex-col">

              <?php if ( $program_track_label ) : ?>
                <p class="font-ui text-sm font-semibold text-blue capitalize leading-snug">
                  <?php echo esc_html( $program_track_label ); ?>
                </p>
              <?php endif; ?>

              <h3 class="text-navy leading-snug">
                <?php echo esc_html( get_the_title( $post->ID ) ); ?>
              </h3>

              <?php if ( $program_short_description ) : ?>
                <div class="font-body text-sm font-normal text-navy leading-relaxed">
                  <?php echo wp_kses_post( $program_short_description ); ?>
                </div>
              <?php endif; ?>

              <a href="<?php echo esc_url( get_permalink( $post->ID ) ); ?>" class="inline-flex items-center gap-2 font-body text-sm font-bold text-orange uppercase hover:text-blue no-underline transition-all">
                <?php echo esc_html( $program_cta_label ); ?>
                <?php if ( $program_cta_icon ) : ?>
                  <i class="<?php echo esc_attr( $program_cta_icon ); ?>" aria-hidden="true"></i>
                <?php endif; ?>
              </a>

            </div>

          </div>

        <?php endforeach; wp_reset_postdata(); endif; ?>

      </div>

    </div>

  </div>
</section>
