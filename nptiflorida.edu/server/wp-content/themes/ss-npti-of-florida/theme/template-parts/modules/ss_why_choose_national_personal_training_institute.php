<?php
/**
 * Module: Why Choose National Personal Training Institute
 * Template Part: template-parts/modules/ss_why_choose_national_personal_training_institute.php
 * ACF Flexible Content Layout: ss_why_choose_national_personal_training_institute
 *
 * Fields:
 *  - ss_why_choose_national_personal_training_institute_section_heading (text)
 *  - ss_why_choose_national_personal_training_institute_paragraph_1     (textarea)
 *  - ss_why_choose_national_personal_training_institute_paragraph_2     (textarea)
 *  - ss_why_choose_national_personal_training_institute_paragraph_3     (wysiwyg)
 *  - ss_why_choose_national_personal_training_institute_cta             (link)
 *  - ss_why_choose_national_personal_training_institute_images          (repeater)
 *      - ss_why_choose_national_personal_training_institute_images_image       (image)
 *      - ss_why_choose_national_personal_training_institute_images_image_style (select: tall|bordered)
 *      - ss_why_choose_national_personal_training_institute_images_min_height  (text)
 */

// Alias for brevity inside this template
$m = 'ss_why_choose_national_personal_training_institute';

$section_heading = get_sub_field( "{$m}_section_heading" );

if ( ! $section_heading ) return;

$paragraph_1 = get_sub_field( "{$m}_paragraph_1" );
$paragraph_2 = get_sub_field( "{$m}_paragraph_2" );
$paragraph_3 = get_sub_field( "{$m}_paragraph_3" );
$cta         = get_sub_field( "{$m}_cta" );
?>

<section
  id="ss-why-choose-national-personal-training-institute"
  class="ss-module-why-choose-national-personal-training-institute py-10 md:py-16 lg:py-20"
>
  <div class="container mx-auto px-4">

    <div class="flex flex-col gap-10 lg:flex-row lg:items-start lg:gap-12">

      <!-- Left column: heading, body copy, CTA -->
      <div class="flex flex-col gap-6 w-full lg:w-1/2">

        <h2 class="font-heading font-bold text-xl leading-snug text-navy">
          <?php echo esc_html( $section_heading ); ?>
        </h2>

        <?php if ( $paragraph_1 ) : ?>
          <p class="font-body font-normal text-md text-navy leading-relaxed">
            <?php echo esc_html( $paragraph_1 ); ?>
          </p>
        <?php endif; ?>

        <?php if ( $paragraph_2 ) : ?>
          <p class="font-body font-normal text-md text-navy leading-relaxed">
            <?php echo esc_html( $paragraph_2 ); ?>
          </p>
        <?php endif; ?>

        <?php if ( $paragraph_3 ) : ?>
          <?php echo wp_kses_post( $paragraph_3 ); ?>
        <?php endif; ?>

        <?php if ( $cta ) : ?>
          <div>
            <a
              href="<?php echo esc_url( $cta['url'] ); ?>"
              <?php if ( $cta['target'] ) : ?>target="<?php echo esc_attr( $cta['target'] ); ?>"<?php endif; ?>
              class="inline-flex items-center justify-center bg-orange hover:bg-orange/90 text-white font-body font-bold text-sm uppercase rounded-4xl px-9 py-3 transition-colors"
            >
              <?php echo esc_html( $cta['title'] ); ?>
            </a>
          </div>
        <?php endif; ?>

      </div>

      <!-- Right column: staggered photo collage -->
      <?php if ( have_rows( "{$m}_images" ) ) : ?>
        <div class="w-full lg:w-1/2 flex-shrink-0">
          <div class="grid grid-cols-2 gap-3">
            <?php while ( have_rows( "{$m}_images" ) ) : the_row();
              $image       = get_sub_field( "{$m}_images_image" );
              $image_style = get_sub_field( "{$m}_images_image_style" );
              $min_height  = get_sub_field( "{$m}_images_min_height" );
            ?>
              <?php if ( $image ) : ?>
                <?php if ( $image_style === 'tall' ) : ?>
                  <div class="row-span-2 overflow-hidden rounded">
                    <img
                      src="<?php echo esc_url( $image['url'] ); ?>"
                      alt="<?php echo esc_attr( $image['alt'] ); ?>"
                      class="w-full h-full object-cover"
                      width="<?php echo esc_attr( $image['width'] ); ?>"
                      height="<?php echo esc_attr( $image['height'] ); ?>"
                      <?php if ( $min_height ) : ?>style="min-height: <?php echo esc_attr( $min_height ); ?>;"<?php endif; ?>
                    >
                  </div>
                <?php else : ?>
                  <div class="overflow-hidden rounded border-16 border-light-blue">
                    <img
                      src="<?php echo esc_url( $image['url'] ); ?>"
                      alt="<?php echo esc_attr( $image['alt'] ); ?>"
                      class="w-full h-full object-cover"
                      width="<?php echo esc_attr( $image['width'] ); ?>"
                      height="<?php echo esc_attr( $image['height'] ); ?>"
                      <?php if ( $min_height ) : ?>style="min-height: <?php echo esc_attr( $min_height ); ?>;"<?php endif; ?>
                    >
                  </div>
                <?php endif; ?>
              <?php endif; ?>
            <?php endwhile; ?>
          </div>
        </div>
      <?php endif; ?>

    </div>

  </div>
</section>
