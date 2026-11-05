<?php
/**
 * Module: Price Calculator
 * Template Part: template-parts/modules/ss_price_calculator.php
 * ACF Flexible Content Layout: ss_price_calculator
 *
 * Fields:
 *  - ss_price_calculator_section_heading           (text)
 *  - ss_price_calculator_section_heading_highlight (text)
 *  - ss_price_calculator_section_description       (textarea)
 *  - ss_price_calculator_cta                       (link)
 *  - ss_price_calculator_section_image             (image)
 */

$section_heading           = get_sub_field( 'ss_price_calculator_section_heading' );
$section_heading_highlight = get_sub_field( 'ss_price_calculator_section_heading_highlight' );

if ( ! $section_heading && ! $section_heading_highlight ) return;

$section_description = get_sub_field( 'ss_price_calculator_section_description' );
$cta                 = get_sub_field( 'ss_price_calculator_cta' );
$section_image       = get_sub_field( 'ss_price_calculator_section_image' );
?>

<section
  id="ss-price-calculator"
  class="ss-module-price-calculator bg-white py-10 md:py-16 lg:py-20"
>
  <div class="container mx-auto px-4">

    <div class="flex flex-col gap-10 lg:flex-row lg:items-center lg:gap-12">

      <!-- Left col: content -->
      <div class="flex flex-col gap-6 w-full lg:w-1/2">

        <h2 class="font-heading font-bold text-3xl md:text-4xl text-navy leading-tight">
          <?php if ( $section_heading ) : ?>
            <?php echo esc_html( $section_heading ); ?>
          <?php endif; ?>
          <?php if ( $section_heading_highlight ) : ?>
            <span class="text-orange"><?php echo esc_html( $section_heading_highlight ); ?></span>
          <?php endif; ?>
        </h2>

        <?php if ( $section_description ) : ?>
          <p class="font-body font-normal text-md text-navy leading-relaxed">
            <?php echo esc_html( $section_description ); ?>
          </p>
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

      <!-- Right col: image -->
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

    </div>

  </div>
</section>
