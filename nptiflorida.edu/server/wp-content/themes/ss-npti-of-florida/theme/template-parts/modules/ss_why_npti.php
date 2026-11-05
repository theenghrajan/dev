<?php
/**
 * Module: Why NPTI
 * Template Part: template-parts/modules/ss_why_npti.php
 * ACF Flexible Content Layout: ss_why_npti
 *
 * Fields:
 *  - ss_why_npti_section_heading           (text)
 *  - ss_why_npti_section_heading_highlight (text)
 *  - ss_why_npti_row1_heading              (text)
 *  - ss_why_npti_row1_body                 (wysiwyg)
 *  - ss_why_npti_row1_cta                  (link)
 *  - ss_why_npti_row1_image                (image)
 *  - ss_why_npti_row2_image                (image)
 *  - ss_why_npti_row2_heading              (text)
 *  - ss_why_npti_row2_body                 (wysiwyg)
 *  - ss_why_npti_row3_heading              (text)
 *  - ss_why_npti_row3_body                 (wysiwyg)
 *  - ss_why_npti_row3_contact_text         (wysiwyg)
 *  - ss_why_npti_row3_cta                  (link)
 *  - ss_why_npti_row3_image                (image)
 */

$section_heading           = get_sub_field( 'ss_why_npti_section_heading' );
$section_heading_highlight = get_sub_field( 'ss_why_npti_section_heading_highlight' );
$row1_heading              = get_sub_field( 'ss_why_npti_row1_heading' );
$row1_body                 = get_sub_field( 'ss_why_npti_row1_body' );
$row1_cta                  = get_sub_field( 'ss_why_npti_row1_cta' );
$row1_image                = get_sub_field( 'ss_why_npti_row1_image' );
$row2_image                = get_sub_field( 'ss_why_npti_row2_image' );
$row2_heading              = get_sub_field( 'ss_why_npti_row2_heading' );
$row2_body                 = get_sub_field( 'ss_why_npti_row2_body' );
$row3_heading              = get_sub_field( 'ss_why_npti_row3_heading' );
$row3_body                 = get_sub_field( 'ss_why_npti_row3_body' );
$row3_contact_text         = get_sub_field( 'ss_why_npti_row3_contact_text' );
$row3_cta                  = get_sub_field( 'ss_why_npti_row3_cta' );
$row3_image                = get_sub_field( 'ss_why_npti_row3_image' );

if ( ! $section_heading ) return;
?>

<section
  id="ss-why-npti"
  class="ss-module-why-npti bg-blue-08 pad-section"
>
  <div class="container mx-auto px-4">
    <div class="col-start-start-16">

      <h2 class="lg:text-center w-full xl:mb-8">
        <?php echo esc_html( $section_heading ); ?>
        <?php if ( $section_heading_highlight ) : ?>
          <span class="text-orange"><?php echo esc_html( $section_heading_highlight ); ?></span>
        <?php endif; ?>
      </h2>

      <!-- Row 1: text left | image right -->
      <div class="grid grid-cols-1 gap-7 xl:gap-20 lg:grid-cols-[calc(52.5%-2.5rem)_calc(47.5%-2.5rem)] lg:items-center w-full mb-8 xl:mb-16">

        <div class="col-start-start-16 !gap-0">
          <?php if ( $row1_heading ) : ?>
            <h3 class="font-heading font-bold text-xl text-navy leading-snug"><?php echo esc_html( $row1_heading ); ?></h3>
          <?php endif; ?>
          <?php if ( $row1_body ) : ?>
            <?php echo wp_kses_post( $row1_body ); ?>
          <?php endif; ?>
          <?php if ( $row1_cta ) : ?>
            <a href="<?php echo esc_url( $row1_cta['url'] ); ?>"<?php if ( $row1_cta['target'] ) echo ' target="' . esc_attr( $row1_cta['target'] ) . '"'; ?> class="btn btn-primary lg:mt-4">
              <?php echo esc_html( $row1_cta['title'] ); ?>
            </a>
          <?php endif; ?>
        </div>

        <?php if ( $row1_image ) : ?>
          <div class="rounded-lg overflow-hidden">
            <img
              src="<?php echo esc_url( $row1_image['url'] ); ?>"
              alt="<?php echo esc_attr( $row1_image['alt'] ); ?>"
              class="w-full h-[305px] object-cover object-top rounded-lg"
            >
          </div>
        <?php endif; ?>

      </div>

      <!-- Row 2: image left | text right -->
      <div class="grid grid-cols-1 gap-7 xl:gap-20 lg:grid-cols-[calc(47.5%-2.5rem)_calc(52.5%-2.5rem)] lg:items-center w-full mb-8 xl:mb-16">

        <?php if ( $row2_image ) : ?>
          <div class="rounded-lg overflow-hidden order-2 lg:order-1">
            <img
              src="<?php echo esc_url( $row2_image['url'] ); ?>"
              alt="<?php echo esc_attr( $row2_image['alt'] ); ?>"
              class="w-full h-[420px] xl:h-[532px] object-cover object-top rounded-lg"
            >
          </div>
        <?php endif; ?>

        <div class="col-start-start-16 order-1 lg:order-2 !gap-0">
          <?php if ( $row2_heading ) : ?>
            <h3 class="font-heading font-bold text-xl text-navy leading-snug"><?php echo esc_html( $row2_heading ); ?></h3>
          <?php endif; ?>
          <?php if ( $row2_body ) : ?>
            <?php echo wp_kses_post( $row2_body ); ?>
          <?php endif; ?>
        </div>

      </div>

      <!-- Row 3: text left | image right -->
      <div class="grid grid-cols-1 gap-7 xl:gap-20 lg:grid-cols-[calc(52.5%-2.5rem)_calc(47.5%-2.5rem)] lg:items-center w-full mb-8">

        <div class="col-start-start-16 !gap-0">
          <?php if ( $row3_heading ) : ?>
            <h3 class="font-heading font-bold text-xl text-navy leading-snug"><?php echo esc_html( $row3_heading ); ?></h3>
          <?php endif; ?>
          <?php if ( $row3_body ) : ?>
            <?php echo wp_kses_post( $row3_body ); ?>
          <?php endif; ?>
          <?php if ( $row3_contact_text ) : ?>
            <?php echo wp_kses_post( $row3_contact_text ); ?>
          <?php endif; ?>
          <?php if ( $row3_cta ) : ?>
            <a href="<?php echo esc_url( $row3_cta['url'] ); ?>"<?php if ( $row3_cta['target'] ) echo ' target="' . esc_attr( $row3_cta['target'] ) . '"'; ?> class="btn btn-secondary lg:mt-4">
              <?php echo esc_html( $row3_cta['title'] ); ?>
            </a>
          <?php endif; ?>
        </div>

        <?php if ( $row3_image ) : ?>
          <div class="rounded-lg overflow-hidden">
            <img
              src="<?php echo esc_url( $row3_image['url'] ); ?>"
              alt="<?php echo esc_attr( $row3_image['alt'] ); ?>"
              class="w-full h-[360px] object-cover object-top rounded-lg"
            >
          </div>
        <?php endif; ?>

      </div>

    </div>
  </div>
</section>
