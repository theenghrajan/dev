<?php
/**
 * Module: Transition Guide
 * Template Part: template-parts/modules/ss_transition_guide.php
 * ACF Flexible Content Layout: ss_transition_guide
 *
 * Fields:
 *  - ss_transition_guide_section_heading_highlight (text)
 *  - ss_transition_guide_section_heading (text)
 *  - ss_transition_guide_cta_link (link)
 *  - ss_transition_guide_cards (repeater)
 *      - ss_transition_guide_cards_card_icon (text — icomoon class)
 *      - ss_transition_guide_cards_card_title (text)
 *      - ss_transition_guide_cards_card_description (textarea)
 *
 * Component CSS:
 *  - .ss-transition-guide__card — article card: bg-white rounded-xl p-6 shadow-card flex flex-col gap-6
 */

$section_heading_highlight = get_sub_field( 'ss_transition_guide_section_heading_highlight' );
$section_heading           = get_sub_field( 'ss_transition_guide_section_heading' );
$cta_link                  = get_sub_field( 'ss_transition_guide_cta_link' );
$cards                     = get_sub_field( 'ss_transition_guide_cards' );

if ( ! $section_heading_highlight && ! $section_heading && ! $cta_link && ! $cards ) return;
?>

<section
  id="ss-transition-guide"
  class="ss-module-transition-guide bg-blue-08 pad-section"
>
  <div class="container mx-auto px-4">
    <div class="grid grid-cols-1 gap-5 md:grid-cols-3">

      <!-- Col 1 Row 1: heading + CTA -->
      <div class="col-start-start-16 justify-center">

        <h2>
          <?php if ( $section_heading_highlight ) : ?>
            <span class="text-orange"><?php echo esc_html( $section_heading_highlight ); ?></span>
          <?php endif; ?>
          <?php echo esc_html( $section_heading ); ?>
        </h2>

        <?php if ( $cta_link ) : ?>
          <a
            href="<?php echo esc_url( $cta_link['url'] ); ?>"
            class="btn-secondary btn-secondary:hover self-start"
            <?php if ( $cta_link['target'] ) : ?>target="<?php echo esc_attr( $cta_link['target'] ); ?>"<?php endif; ?>
          >
            <?php echo esc_html( $cta_link['title'] ); ?>
          </a>
        <?php endif; ?>

      </div>

      <?php if ( have_rows( 'ss_transition_guide_cards' ) ) : ?>
        <?php while ( have_rows( 'ss_transition_guide_cards' ) ) : the_row(); ?>
          <?php
          $card_icon        = get_sub_field( 'ss_transition_guide_cards_card_icon' );
          $card_title       = get_sub_field( 'ss_transition_guide_cards_card_title' );
          $card_description = get_sub_field( 'ss_transition_guide_cards_card_description' );
          ?>
          <article class="bg-white rounded-xl p-6 shadow-card flex flex-col gap-6">
              <?php if ( $card_icon ) : ?>
                <i
                  aria-hidden="true"
                  class="text-white text-2xl bg-blue p-5 w-[82px] h-[82px] rounded-full <?php echo $card_icon; ?>"
                ></i>
              <?php endif; ?>
            
            <div class="flex flex-col gap-2 flex-1">
              <?php if ( $card_title ) : ?>
                <h3 class="font-heading font-bold text-xl text-navy leading-snug"><?php echo esc_html( $card_title ); ?></h3>
              <?php endif; ?>
              <?php if ( $card_description ) : ?>
                <div class="text-sm text-navy"><?php echo wp_kses_post( $card_description ); ?></div>
              <?php endif; ?>
            </div>
          </article>
        <?php endwhile; ?>
      <?php endif; ?>

    </div>
  </div>
</section>
