<?php
/**
 * Module: Strap Training
 * Template Part: template-parts/modules/ss_strap_training.php
 * ACF Flexible Content Layout: ss_strap_training
 *
 * Fields:
 *  - ss_strap_training_section_heading           (text)
 *  - ss_strap_training_section_heading_highlight (text)
 *  - ss_strap_training_section_description       (textarea)
 *  - ss_strap_training_feature_cards             (repeater)
 *    - ss_strap_training_feature_cards_card_icon        (select)
 *    - ss_strap_training_feature_cards_card_title       (text)
 *    - ss_strap_training_feature_cards_card_description (textarea)
 *  - ss_strap_training_cta                       (link)
 */

$section_heading           = get_sub_field( 'ss_strap_training_section_heading' );
$section_heading_highlight = get_sub_field( 'ss_strap_training_section_heading_highlight' );
$section_description       = get_sub_field( 'ss_strap_training_section_description' );
$cta                       = get_sub_field( 'ss_strap_training_cta' );

if ( ! $section_heading ) return;
?>

<section id="ss-strap-training" class="ss-module-strap-training bg-light-blue py-10 md:py-16 lg:py-20">
  <div class="container mx-auto px-4">

    <!-- Section header -->
    <div class="text-center mb-10 md:mb-12">

      <h2 class="font-heading font-bold text-3xl md:text-4xl text-navy leading-tight mb-4">
        <?php echo esc_html( $section_heading ); ?>
        <?php if ( $section_heading_highlight ) : ?>
          <span class="text-orange"><?php echo esc_html( $section_heading_highlight ); ?></span>
        <?php endif; ?>
      </h2>

      <?php if ( $section_description ) : ?>
        <div class="font-body font-normal text-md text-navy leading-relaxed max-w-[66rem] mx-auto">
          <?php echo wp_kses_post($section_description); ?>
        </div>
      <?php endif; ?>

    </div>

    <?php if ( have_rows( 'ss_strap_training_feature_cards' ) ) : ?>
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10 md:mb-12">

        <?php while ( have_rows( 'ss_strap_training_feature_cards' ) ) : the_row();
          $card_icon        = get_sub_field( 'ss_strap_training_feature_cards_card_icon' );
          $card_title       = get_sub_field( 'ss_strap_training_feature_cards_card_title' );
          $card_description = get_sub_field( 'ss_strap_training_feature_cards_card_description' );
        ?>
          <div class="bg-white border border-blue/20 rounded p-6 flex flex-col gap-8">

            <div class="relative shrink-0 w-[82px] h-[82px] rounded-full text-center bg-blue flex justify-center items-center">
              <?php if ( $card_icon ) : ?>
                <i class="<?php echo esc_attr( $card_icon ); ?> text-2xl text-center text-white" aria-hidden="true"></i>
              <?php endif; ?>
            </div>

            <div class="flex flex-col gap-3">
              <?php if ( $card_title ) : ?>
                <h3 class="font-heading font-bold text-xl text-navy leading-snug">
                  <?php echo esc_html( $card_title ); ?>
                </h3>
              <?php endif; ?>
              <?php if ( $card_description ) : ?>
                <p class="font-body font-normal text-md text-navy leading-relaxed">
                  <?php echo wp_kses_post( $card_description ); ?>
                </p>
              <?php endif; ?>
            </div>

          </div>
        <?php endwhile; ?>

      </div>
    <?php endif; ?>

    <!-- CTA -->
    <?php if ( $cta ) : ?>
      <div class="flex justify-center">
        <a
          href="<?php echo esc_url( $cta['url'] ); ?>"
          <?php if ( $cta['target'] ) echo 'target="' . esc_attr( $cta['target'] ) . '"'; ?>
          class="inline-flex items-center justify-center bg-orange hover:bg-orange/90 text-white font-body font-bold text-sm uppercase rounded-4xl px-9 py-3 transition-colors"
        >
          <?php echo esc_html( $cta['title'] ); ?>
        </a>
      </div>
    <?php endif; ?>

  </div>
</section>
