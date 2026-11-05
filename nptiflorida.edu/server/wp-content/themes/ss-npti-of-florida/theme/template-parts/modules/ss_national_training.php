<?php
/**
 * Module: National Training
 * Template Part: template-parts/modules/ss_national_training.php
 * ACF Flexible Content Layout: ss_national_training
 *
 * Fields:
 *  - ss_national_training_section_heading           (text)
 *  - ss_national_training_section_heading_highlight (text)
 *  - ss_national_training_section_intro             (textarea)
 *  - ss_national_training_row1_heading              (text)
 *  - ss_national_training_row1_body                 (textarea)
 *  - ss_national_training_row1_primary_cta          (link)
 *  - ss_national_training_row1_secondary_cta        (link)
 *  - ss_national_training_row1_image                (image)
 *  - ss_national_training_row2_image                (image)
 *  - ss_national_training_row2_heading              (text)
 *  - ss_national_training_row2_body                 (textarea)
 *  - ss_national_training_row3_heading              (text)
 *  - ss_national_training_row3_body                 (textarea)
 *  - ss_national_training_row3_image                (image)
 *  - ss_national_training_row4_image                (image)
 *  - ss_national_training_row4_heading              (text)
 *  - ss_national_training_row4_body                 (textarea)
 *  - ss_national_training_row4_cta                  (link)
 */

$section_heading           = get_sub_field( 'ss_national_training_section_heading' );
$section_heading_highlight = get_sub_field( 'ss_national_training_section_heading_highlight' );
$section_intro             = get_sub_field( 'ss_national_training_section_intro' );
$row1_heading              = get_sub_field( 'ss_national_training_row1_heading' );
$row1_body                 = get_sub_field( 'ss_national_training_row1_body' );
$row1_primary_cta          = get_sub_field( 'ss_national_training_row1_primary_cta' );
$row1_secondary_cta        = get_sub_field( 'ss_national_training_row1_secondary_cta' );
$row1_image                = get_sub_field( 'ss_national_training_row1_image' );
$row2_image                = get_sub_field( 'ss_national_training_row2_image' );
$row2_heading              = get_sub_field( 'ss_national_training_row2_heading' );
$row2_body                 = get_sub_field( 'ss_national_training_row2_body' );
$row3_heading              = get_sub_field( 'ss_national_training_row3_heading' );
$row3_body                 = get_sub_field( 'ss_national_training_row3_body' );
$row3_image                = get_sub_field( 'ss_national_training_row3_image' );
$row4_image                = get_sub_field( 'ss_national_training_row4_image' );
$row4_heading              = get_sub_field( 'ss_national_training_row4_heading' );
$row4_body                 = get_sub_field( 'ss_national_training_row4_body' );
$row4_cta                  = get_sub_field( 'ss_national_training_row4_cta' );

if ( ! $section_heading ) return;
?>

<section
  id="ss-national-training"
  class="ss-module-national-training bg-blue-08 pad-section"
>
  <div class="container mx-auto px-4">
    <div class="col-start-start-16 !gap-0">
      <?php if (!empty($section_heading_highlight || $section_intro)) : ?>
    <div class="mb-5 xl:mb-16 lg:text-center mx-auto">
      <h2 class="w-full">
        <?php echo esc_html( $section_heading ); ?>
        <?php if ( $section_heading_highlight ) : ?>
          <span class="text-orange"><?php echo esc_html( $section_heading_highlight ); ?></span>
        <?php endif; ?>
      </h2>

      <?php if ( $section_intro ) : ?>
        <p>
          <?php echo wp_kses_post( $section_intro ); ?>
        </p>
      <?php endif; ?>
      </div>
      <?php endif; ?>
      <!-- Row 1: text left | image right -->
      <div class="grid grid-cols-1 gap-8 lg:grid-cols-2 lg:items-center w-full mb-8 xl:mb-16">

        <div class="col-start-start-16 !gap-0 ">
          <?php if ( $row1_heading ) : ?>
            <h3 class="text-navy leading-snug"><?php echo esc_html( $row1_heading ); ?></h3>
          <?php endif; ?>
          <?php if ( $row1_body ) : ?>
            <p>
              <?php echo wp_kses_post( $row1_body ); ?>
            </p>
          <?php endif; ?>
          <?php if ( $row1_primary_cta || $row1_secondary_cta ) : ?>
            <div class="row-start-center gap-4 flex-wrap mt-5">
              <?php if ( $row1_primary_cta ) : ?>
                <a href="<?php echo esc_url( $row1_primary_cta['url'] ); ?>"<?php if ( $row1_primary_cta['target'] ) echo ' target="' . esc_attr( $row1_primary_cta['target'] ) . '"'; ?> class="btn-primary"><?php echo esc_html( $row1_primary_cta['title'] ); ?></a>
              <?php endif; ?>
              <?php if ( $row1_secondary_cta ) : ?>
                <a href="<?php echo esc_url( $row1_secondary_cta['url'] ); ?>"<?php if ( $row1_secondary_cta['target'] ) echo ' target="' . esc_attr( $row1_secondary_cta['target'] ) . '"'; ?> class="btn-secondary"><?php echo esc_html( $row1_secondary_cta['title'] ); ?></a>
              <?php endif; ?>
            </div>
          <?php endif; ?>
        </div>

        <?php if ( $row1_image ) : ?>
          <div class="rounded-lg overflow-hidden">
            <img
              src="<?php echo esc_url( $row1_image['url'] ); ?>"
              alt="<?php echo esc_attr( $row1_image['alt'] ); ?>"
              class="w-full h-[320px] object-cover rounded-lg"
            >
          </div>
        <?php endif; ?>

      </div>

      <!-- Row 2: image left | text right -->
      <div class="grid grid-cols-1 gap-8 lg:grid-cols-2 lg:items-center w-full mb-8 xl:mb-16">

        <?php if ( $row2_image ) : ?>
          <div class="rounded-lg overflow-hidden order-2 lg:order-1">
            <img
              src="<?php echo esc_url( $row2_image['url'] ); ?>"
              alt="<?php echo esc_attr( $row2_image['alt'] ); ?>"
              class="w-full h-[300px] object-cover rounded-lg"
            >
          </div>
        <?php endif; ?>

        <div class="col-start-start-16 order-1 lg:order-2 !gap-0">
          <?php if ( $row2_heading ) : ?>
            <h3 class="text-navy leading-snug"><?php echo esc_html( $row2_heading ); ?></h3>
          <?php endif; ?>
          <?php if ( $row2_body ) : ?>
            <p>
              <?php echo wp_kses_post( $row2_body ); ?>
            </p>
          <?php endif; ?>
        </div>

      </div>

      <!-- Row 3: text left | image right -->
      <div class="grid grid-cols-1 gap-8 lg:grid-cols-2 lg:items-center w-full mb-8 xl:mb-16">

        <div class="col-start-start-16 !gap-0 ">
          <?php if ( $row3_heading ) : ?>
            <h3 class="text-navy leading-snug"><?php echo esc_html( $row3_heading ); ?></h3>
          <?php endif; ?>
          <?php if ( $row3_body ) : ?>
            <p>
              <?php echo wp_kses_post( $row3_body ); ?>
            </p>
          <?php endif; ?>
        </div>

        <?php if ( $row3_image ) : ?>
          <div class="rounded-lg overflow-hidden">
            <img
              src="<?php echo esc_url( $row3_image['url'] ); ?>"
              alt="<?php echo esc_attr( $row3_image['alt'] ); ?>"
              class="w-full h-[280px] object-cover rounded-lg"
            >
          </div>
        <?php endif; ?>

      </div>

      <!-- Row 4: image left | text right -->
      <div class="grid grid-cols-1 gap-8 lg:grid-cols-2 lg:items-center w-full lg:mb-8">

        <?php if ( $row4_image ) : ?>
          <div class="rounded-lg overflow-hidden order-2 lg:order-1">
            <img
              src="<?php echo esc_url( $row4_image['url'] ); ?>"
              alt="<?php echo esc_attr( $row4_image['alt'] ); ?>"
              class="w-full h-[300px] object-cover rounded-lg"
            >
          </div>
        <?php endif; ?>

        <div class="col-start-start-16 order-1 lg:order-2 !gap-0">
          <?php if ( $row4_heading ) : ?>
            <h3 class="text-navy leading-snug"><?php echo esc_html( $row4_heading ); ?></h3>
          <?php endif; ?>
          <?php if ( $row4_body ) : ?>
            <p>
              <?php echo wp_kses_post( $row4_body ); ?>
            </p>
          <?php endif; ?>
          <?php if ( $row4_cta ) : ?>
            <a href="<?php echo esc_url( $row4_cta['url'] ); ?>"<?php if ( $row4_cta['target'] ) echo ' target="' . esc_attr( $row4_cta['target'] ) . '"'; ?> class="btn btn-primary self-start mt-5"><?php echo esc_html( $row4_cta['title'] ); ?></a>
          <?php endif; ?>
        </div>

      </div>

    </div>
  </div>
</section>
