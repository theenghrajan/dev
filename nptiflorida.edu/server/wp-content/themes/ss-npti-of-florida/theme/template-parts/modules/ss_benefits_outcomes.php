<?php
/**
 * Module: Benefits & Outcomes
 * Template Part: template-parts/modules/ss_benefits_outcomes.php
 * ACF Flexible Content Layout: ss_benefits_outcomes
 *
 * Fields:
 *  - ss_benefits_outcomes_section_heading           (text)
 *  - ss_benefits_outcomes_section_heading_highlight (text)
 *  - ss_benefits_outcomes_section_subheading        (text)
 *  - ss_benefits_outcomes_benefit_items             (repeater)
 *    - ss_benefits_outcomes_benefit_items_card_image       (image)
 *    - ss_benefits_outcomes_benefit_items_card_title       (text)
 *    - ss_benefits_outcomes_benefit_items_card_description (textarea)
 *    - ss_benefits_outcomes_benefit_items_card_link        (link)
 *    - ss_benefits_outcomes_benefit_items_card_link_icon   (select)
 */

$section_heading           = get_sub_field( 'ss_benefits_outcomes_section_heading' );
$section_heading_highlight = get_sub_field( 'ss_benefits_outcomes_section_heading_highlight' );
$section_subheading        = get_sub_field( 'ss_benefits_outcomes_section_subheading' );

if ( ! $section_heading ) return;
?>

<section
  id="ss-benefits-outcomes"
  class="ss-module-benefits-outcomes bg-light-blue py-10 md:py-16 lg:py-20"
>
  <div class="container mx-auto px-4">

    <!-- Section header -->
    <div class="text-center mb-10 md:mb-12">

      <h2 class="font-heading font-bold text-3xl md:text-4xl text-navy leading-tight mb-3">
        <?php echo esc_html( $section_heading ); ?>
        <?php if ( $section_heading_highlight ) : ?>
          <span class="text-orange"><?php echo esc_html( $section_heading_highlight ); ?></span>
        <?php endif; ?>
      </h2>

      <?php if ( $section_subheading ) : ?>
        <p class="font-body font-normal text-md text-navy leading-relaxed">
          <?php echo esc_html( $section_subheading ); ?>
        </p>
      <?php endif; ?>

    </div>

    <?php if ( have_rows( 'ss_benefits_outcomes_benefit_items' ) ) : ?>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        <?php while ( have_rows( 'ss_benefits_outcomes_benefit_items' ) ) : the_row();
          $card_image       = get_sub_field( 'ss_benefits_outcomes_benefit_items_card_image' );
          $card_title       = get_sub_field( 'ss_benefits_outcomes_benefit_items_card_title' );
          $card_description = get_sub_field( 'ss_benefits_outcomes_benefit_items_card_description' );
          $card_link        = get_sub_field( 'ss_benefits_outcomes_benefit_items_card_link' );
          $card_link_icon   = get_sub_field( 'ss_benefits_outcomes_benefit_items_card_link_icon' );
        ?>
          <div class="bg-blue border border-navy/[.16] rounded-2xl overflow-hidden flex flex-col sm:flex-row items-stretch">

            <?php if ( $card_image ) : ?>
              <div class="sm:w-[45%] flex-shrink-0 p-4 pb-0 sm:pb-4 sm:pr-0">
                <div class="h-44 sm:h-full overflow-hidden rounded border border-white">
                  <img
                    src="<?php echo esc_url( $card_image['url'] ); ?>"
                    alt="<?php echo esc_attr( $card_image['alt'] ); ?>"
                    class="w-full h-full object-cover"
                  >
                </div>
              </div>
            <?php endif; ?>

            <div class="flex flex-col gap-3 p-4 justify-center">
              <?php if ( $card_title ) : ?>
                <h3 class="font-heading font-bold text-md text-white leading-snug">
                  <?php echo esc_html( $card_title ); ?>
                </h3>
              <?php endif; ?>
              <?php if ( $card_description ) : ?>
                <p class="font-body font-normal text-md text-white leading-relaxed">
                  <?php echo wp_kses_post( $card_description ); ?>
                </p>
              <?php endif; ?>
              <?php if ( $card_link ) : ?>
                <a
                  href="<?php echo esc_url( $card_link['url'] ); ?>"
                  <?php if ( $card_link['target'] ) echo 'target="' . esc_attr( $card_link['target'] ) . '"'; ?>
                  class="inline-flex items-center gap-2 font-body font-bold text-sm text-white uppercase hover:text-white/80 transition-colors no-underline"
                >
                  <?php echo esc_html( $card_link['title'] ); ?>
                  <?php if ( $card_link_icon ) : ?>
                    <i class="<?php echo esc_attr( $card_link_icon ); ?>" aria-hidden="true"></i>
                  <?php endif; ?>
                </a>
              <?php endif; ?>
            </div>

          </div>
        <?php endwhile; ?>

      </div>
    <?php endif; ?>

  </div>
</section>
