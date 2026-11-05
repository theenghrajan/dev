<?php
/**
 * Module: Guide Essential
 * Template Part: template-parts/modules/ss_guide_essential.php
 * ACF Flexible Content Layout: ss_guide_essential
 *
 * Fields:
 *  - ss_guide_essential_section_heading (text)
 *  - ss_guide_essential_section_heading_highlight (text)
 *  - ss_guide_essential_cards (repeater)
 *      - ss_guide_essential_cards_card_image (image)
 *      - ss_guide_essential_cards_card_title (text)
 *      - ss_guide_essential_cards_card_body (textarea)
 *
 * Component CSS:
 *  - .ss-guide-essential__card — flex flex-col bg-white border border-navy/[.16] rounded overflow-hidden
 */

$section_heading           = get_sub_field( 'ss_guide_essential_section_heading' );
$section_heading_highlight = get_sub_field( 'ss_guide_essential_section_heading_highlight' );

if ( ! $section_heading && ! have_rows( 'ss_guide_essential_cards' ) ) return;
?>

<section
  id="ss-guide-essential"
  class="ss-module-guide-essential bg-white py-10 md:py-16 lg:py-20"
>
  <div class="container mx-auto px-4">

    <?php if ( $section_heading || $section_heading_highlight ) : ?>
      <h2 class="font-heading font-bold text-2xl md:text-3xl text-navy text-center leading-tight mb-10 md:mb-12">
        <?php echo esc_html( $section_heading ); ?>
        <?php if ( $section_heading_highlight ) : ?>
          <span class="text-orange"><?php echo esc_html( $section_heading_highlight ); ?></span>
        <?php endif; ?>
      </h2>
    <?php endif; ?>

    <?php if ( have_rows( 'ss_guide_essential_cards' ) ) : ?>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

        <?php while ( have_rows( 'ss_guide_essential_cards' ) ) : the_row();
          $card_image = get_sub_field( 'ss_guide_essential_cards_card_image' );
          $card_title = get_sub_field( 'ss_guide_essential_cards_card_title' );
          $card_body  = get_sub_field( 'ss_guide_essential_cards_card_body' );
        ?>

          <div class="ss-guide-essential__card border border-navy/[16%] rounded-[0.5rem] p-5">
            <?php if ( $card_image ) : ?>
              <div class="aspect-card w-full overflow-hidden mb-5">
                <img
                  src="<?php echo esc_url( $card_image['url'] ); ?>"
                  alt="<?php echo esc_attr( $card_image['alt'] ); ?>"
                  width="<?php echo esc_attr( $card_image['width'] ); ?>"
                  height="<?php echo esc_attr( $card_image['height'] ); ?>"
                  class="w-full h-full object-cover rounded-sm"
                >
              </div>
            <?php endif; ?>
            <div class="flex flex-col gap-3">
              <?php if ( $card_title ) : ?>
                <h3 class="font-heading font-bold text-lg text-navy leading-snug">
                  <?php echo esc_html( $card_title ); ?>
                </h3>
              <?php endif; ?>
              <?php if ( $card_body ) : ?>
                <div class="font-body font-normal text-sm text-navy/80 leading-normal">
                  <?php echo wp_kses_post( $card_body ); ?>
                </div>
              <?php endif; ?>
            </div>
          </div>

        <?php endwhile; ?>

      </div><!-- /grid -->
    <?php endif; ?>

  </div>
</section>
