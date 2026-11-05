<?php
/**
 * Module: Coaching Market
 * Template Part: template-parts/modules/ss_coaching_market.php
 * ACF Flexible Content Layout: ss_coaching_market
 *
 * Fields:
 *  - ss_coaching_market_section_heading           (text)
 *  - ss_coaching_market_section_heading_highlight (text)
 *  - ss_coaching_market_section_intro             (textarea)
 *  - ss_coaching_market_market_label              (text)
 *  - ss_coaching_market_stat_cards                (repeater)
 *    - ss_coaching_market_stat_cards_stat_icon         (image)
 *    - ss_coaching_market_stat_cards_stat_icon_overlay (image)
 *    - ss_coaching_market_stat_cards_stat_title        (text)
 *    - ss_coaching_market_stat_cards_stat_description  (textarea)
 *  - ss_coaching_market_drivers_label             (text)
 *  - ss_coaching_market_drivers                   (repeater)
 *    - ss_coaching_market_drivers_driver_label (text)
 *    - ss_coaching_market_drivers_driver_body  (textarea)
 *  - ss_coaching_market_drivers_image             (image)
 *  - ss_coaching_market_citation_cta              (link)
 */

$section_heading           = get_sub_field( 'ss_coaching_market_section_heading' );
$section_heading_highlight = get_sub_field( 'ss_coaching_market_section_heading_highlight' );
$section_intro             = get_sub_field( 'ss_coaching_market_section_intro' );
$market_label              = get_sub_field( 'ss_coaching_market_market_label' );
$drivers_label             = get_sub_field( 'ss_coaching_market_drivers_label' );
$drivers_image             = get_sub_field( 'ss_coaching_market_drivers_image' );
$citation_cta              = get_sub_field( 'ss_coaching_market_citation_cta' );

if ( ! $section_heading ) return;
?>

<section
  id="ss-coaching-market"
  class="ss-module-coaching-market bg-white pad-section"
>
  <div class="container mx-auto px-4">
    <div class="col-start-start-16 !gap-4">

      <h2>
        <?php echo esc_html( $section_heading ); ?>
        <?php if ( $section_heading_highlight ) : ?>
          <span class="text-orange"><?php echo esc_html( $section_heading_highlight ); ?></span>
        <?php endif; ?>
      </h2>

      <?php if ( $section_intro ) : ?>
          <?php echo wp_kses_post( $section_intro ); ?>
      <?php endif; ?>

      <?php if ( $market_label ) : ?>
        <h3 class="text-navy w-full"><?php echo esc_html( $market_label ); ?></h3>
      <?php endif; ?>

      <?php if ( have_rows( 'ss_coaching_market_stat_cards' ) ) : ?>
        <div class="grid grid-cols-1 gap-5 md:grid-cols-3 w-full mb-4">

          <?php while ( have_rows( 'ss_coaching_market_stat_cards' ) ) : the_row();
            $stat_icon         = get_sub_field( 'ss_coaching_market_stat_cards_stat_icon' );
            // $stat_icon_overlay = get_sub_field( 'ss_coaching_market_stat_cards_stat_icon_overlay' );
            $stat_title        = get_sub_field( 'ss_coaching_market_stat_cards_stat_title' );
            $stat_description  = get_sub_field( 'ss_coaching_market_stat_cards_stat_description' );
          ?>
            <div class="bg-white border border-black/10 rounded-lg p-5 col-start-start-16 !gap-0 shadow-card">

              <?php if ( $stat_icon ) : ?>
                <div class="bg-blue/10 rounded-lg w-12 h-12 flex items-center justify-center p-3 shrink-0">
                    <div class="relative text-xl text-blue flex items-center justify-center">
                      <i aria-hidden="true" class="<?php echo  $stat_icon; ?> "></i>
                    </div>
                </div>
              <?php endif; ?>

              <?php if ( $stat_title ) : ?>
                <p class="font-body font-bold text-sm text-navy mt-3"><?php echo esc_html( $stat_title ); ?></p>
              <?php endif; ?>

              <?php if ( $stat_description ) : ?>
                <p class="text-sm text-navy"><?php echo wp_kses_post( $stat_description ); ?></p>
              <?php endif; ?>

            </div>
          <?php endwhile; ?>

        </div>
      <?php endif; ?>

      <!-- Key Drivers: text left | image right -->
      <div class="grid grid-cols-1 gap-8 md:grid-cols-2 md:items-start w-full">

        <!-- Left: heading + numbered drivers -->
        <div class="col-start-start-16">

          <?php if ( $drivers_label ) : ?>
            <p class="font-heading font-bold text-xl text-navy w-full"><?php echo esc_html( $drivers_label ); ?></p>
          <?php endif; ?>

          <?php if ( have_rows( 'ss_coaching_market_drivers' ) ) : ?>
            <div class="col-start-start-16 gap-5 w-full">

              <?php while ( have_rows( 'ss_coaching_market_drivers' ) ) : the_row();
                $driver_label = get_sub_field( 'ss_coaching_market_drivers_driver_label' );
                $driver_body  = get_sub_field( 'ss_coaching_market_drivers_driver_body' );
              ?>
                <div>
                  <p>
                    <?php if ( $driver_label ) : ?>
                      <strong class="font-bold"><?php echo esc_html( $driver_label ); ?></strong>
                    <?php endif; ?>
                    <?php echo wp_kses_post( $driver_body ); ?>
                  </p>
                </div>
              <?php endwhile; ?>

            </div>
          <?php endif; ?>

        </div>

        <!-- Right: photo -->
        <?php if ( $drivers_image ) : ?>
          <div class="rounded-lg overflow-hidden">
            <img
              src="<?php echo esc_url( $drivers_image['url'] ); ?>"
              alt="<?php echo esc_attr( $drivers_image['alt'] ); ?>"
              class="w-full h-[420px] object-cover rounded-lg"
            >
          </div>
        <?php endif; ?>

      </div>

      <?php if ( $citation_cta ) : ?>
        <a
          href="<?php echo esc_url( $citation_cta['url'] ); ?>"
          class="row-center-center border-orange-15 text-orange bg-transparent rounded-pill no-underline uppercase font-bold transition-fast hover:bg-orange hover:border-orange hover:text-white self-start"
          <?php if ( $citation_cta['target'] ) : ?>target="<?php echo esc_attr( $citation_cta['target'] ); ?>"<?php endif; ?>>
          <?php echo esc_html( $citation_cta['title'] ); ?>
        </a>
      <?php endif; ?>

    </div>
  </div>
</section>
