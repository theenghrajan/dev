<?php
/**
 * Module: Your Estimate
 * Template Part: template-parts/modules/ss_your_estimate.php
 * ACF Flexible Content Layout: ss_your_estimate
 *
 * Fields:
 *  - ss_your_estimate_section_image             (image)
 *  - ss_your_estimate_section_heading           (text)
 *  - ss_your_estimate_section_heading_highlight (text)
 *  - ss_your_estimate_section_intro             (wysiwyg)
 */

$section_heading           = get_sub_field( 'ss_your_estimate_section_heading' );
$section_heading_highlight = get_sub_field( 'ss_your_estimate_section_heading_highlight' );

if ( ! $section_heading && ! $section_heading_highlight ) return;

$section_image   = get_sub_field( 'ss_your_estimate_section_image' );
$section_intro   = get_sub_field( 'ss_your_estimate_section_intro' );
?>

<section
  id="ss-your-estimate"
  class="ss-module-your-estimate bg-light-blue py-10 md:py-16 lg:py-20"
>
  <div class="container mx-auto px-4">

    <div class="flex flex-col gap-10 lg:flex-row lg:items-center lg:gap-12">

      <!-- Left col: image -->
      <?php if ( $section_image ) : ?>
        <div class="w-full lg:w-1/2 flex-shrink-0">
          <div class="overflow-hidden rounded">
            <img
              src="<?php echo esc_url( $section_image['url'] ); ?>"
              alt="<?php echo esc_attr( $section_image['alt'] ); ?>"
              width="<?php echo esc_attr( $section_image['width'] ); ?>"
              height="<?php echo esc_attr( $section_image['height'] ); ?>"
              class="w-full h-auto object-cover"
            >
          </div>
        </div>
      <?php endif; ?>

      <!-- Right col: content -->
      <div class="ss-list-items flex flex-col gap-6 w-full lg:w-1/2">

        <h2 class="font-heading font-bold text-3xl md:text-4xl text-navy leading-tight">
          <?php if ( $section_heading ) : ?>
            <?php echo esc_html( $section_heading ); ?>
          <?php endif; ?>
          <?php if ( $section_heading_highlight ) : ?>
            <span class="text-orange"><?php echo esc_html( $section_heading_highlight ); ?></span>
          <?php endif; ?>
        </h2>

        <?php if ( $section_intro ) : ?>
          <?php echo wp_kses_post( $section_intro ); ?>
        <?php endif; ?>

      </div>

    </div>

  </div>
</section>
