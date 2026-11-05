<?php
/**
 * Module: Live Locations
 * Template Part: template-parts/modules/ss_live_location.php
 * ACF Flexible Content Layout: ss_live_location
 *
 * Fields:
 *  - ss_live_location_section_heading           (text)
 *  - ss_live_location_section_heading_highlight (text)
 *  - ss_live_location_section_subtext           (text)
 *  - ss_live_location_map_embed                 (textarea — raw iframe HTML)
 *  - ss_live_location_map_pin_icon              (image)
 *  - ss_live_location_location_1                (group)
 *    - address_line_1 (text)
 *    - address_line_2 (text)
 *    - card_pos_left  (text)
 *    - card_pos_top   (text)
 *  - ss_live_location_location_2                (group)
 *    - address_line_1 (text)
 *    - address_line_2 (text)
 *    - card_pos_left  (text)
 *    - card_pos_top   (text)
 */

$section_heading           = get_sub_field( 'ss_live_location_section_heading' );
$section_heading_highlight = get_sub_field( 'ss_live_location_section_heading_highlight' );
$section_subtext           = get_sub_field( 'ss_live_location_section_subtext' );
$map_embed                 = get_sub_field( 'ss_live_location_map_embed' );
$map_image                = get_sub_field( 'ss_live_location_map_image' );
$map_pin_icon              = get_sub_field( 'ss_live_location_map_pin_icon' );
$location_1                = get_sub_field( 'ss_live_location_location_1' );
$location_2                = get_sub_field( 'ss_live_location_location_2' );

$loc1_line1     = $location_1['address_line_1'] ?? '';
$loc1_line2     = $location_1['address_line_2'] ?? '';
$loc1_pos_left  = $location_1['card_pos_left']  ?? '20%';
$loc1_pos_top   = $location_1['card_pos_top']   ?? '32%';

$loc2_line1     = $location_2['address_line_1'] ?? '';
$loc2_line2     = $location_2['address_line_2'] ?? '';
$loc2_pos_left  = $location_2['card_pos_left']  ?? '58%';
$loc2_pos_top   = $location_2['card_pos_top']   ?? '29%';

$pin_src    = $map_pin_icon ? esc_url( $map_pin_icon['url'] ) : '';
$pin_width  = $map_pin_icon ? esc_attr( $map_pin_icon['width'] )  : '24';
$pin_height = $map_pin_icon ? esc_attr( $map_pin_icon['height'] ) : '24';

if ( ! $section_heading ) return;
?>

<section
  id="ss-live-location"
  class="ss-module-live-location bg-blue-08 pad-section"
>
  <div class="container mx-auto px-4">
    <div class="col-center-center-16 text-center">

      <h2 class="text-center">
        <?php echo esc_html( $section_heading ); ?>
        <?php if ( $section_heading_highlight ) : ?>
          <span class="text-orange"><?php echo esc_html( $section_heading_highlight ); ?></span>
        <?php endif; ?>
      </h2>

      <?php if ( $section_subtext ) : ?>
        <p class="text-center mb-8">
          <?php echo esc_html( $section_subtext ); ?>
        </p>
      <?php endif; ?>

      <!-- Map with overlaid location cards -->
      <div class="relative w-full rounded-xl overflow-hidden">

        <?php if ( $map_embed ) : ?>
          <?php echo $map_embed; ?>
          <?php else: ?>
            <img
                src="<?php echo $map_image['url']; ?>"
                alt="<?php echo $map_image['alt']; ?>"
                aria-hidden="true"
                width="<?php echo $map_image['width']; ?>"
                height="<?php echo $map_image['height']; ?>"
                class="shrink-0 mt-0.5"
              >
        <?php endif; ?>

        <?php if ( $loc1_line1 ) : ?>
          <!-- Location 1 card -->
          <div class="absolute hidden md:flex items-start gap-2 bg-white border border-black/10 rounded-lg px-4 py-3 shadow-card" style="left:<?php echo esc_attr( $loc1_pos_left ); ?>;top:<?php echo esc_attr( $loc1_pos_top ); ?>;">
            <?php if ( $pin_src ) : ?>
              <img
                src="<?php echo $pin_src; ?>"
                alt=""
                aria-hidden="true"
                width="<?php echo $pin_width; ?>"
                height="<?php echo $pin_height; ?>"
                class="shrink-0 mt-0.5"
              >
            <?php endif; ?>
            <p class="font-ui text-base text-navy leading-snug">
              <?php echo esc_html( $loc1_line1 ); ?><br><?php echo esc_html( $loc1_line2 ); ?>
            </p>
          </div>
        <?php endif; ?>

        <?php if ( $loc2_line1 ) : ?>
          <!-- Location 2 card -->
          <div class="absolute hidden md:flex items-start gap-2 bg-white border border-black/10 rounded-lg px-4 py-3 shadow-card" style="left:<?php echo esc_attr( $loc2_pos_left ); ?>;top:<?php echo esc_attr( $loc2_pos_top ); ?>;">
            <?php if ( $pin_src ) : ?>
              <img
                src="<?php echo $pin_src; ?>"
                alt=""
                aria-hidden="true"
                width="<?php echo $pin_width; ?>"
                height="<?php echo $pin_height; ?>"
                class="shrink-0 mt-0.5"
              >
            <?php endif; ?>
            <p class="font-ui text-base text-navy leading-snug">
              <?php echo esc_html( $loc2_line1 ); ?><br><?php echo esc_html( $loc2_line2 ); ?>
            </p>
          </div>
        <?php endif; ?>

      </div>

      <!-- Mobile fallback: address list below map -->
      <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 w-full md:hidden mt-4">

        <?php if ( $loc1_line1 ) : ?>
          <div class="row-start-center gap-3 bg-white border border-black/10 rounded-lg p-4 shadow-card">
            <?php if ( $pin_src ) : ?>
              <img
                src="<?php echo $pin_src; ?>"
                alt=""
                aria-hidden="true"
                width="<?php echo $pin_width; ?>"
                height="<?php echo $pin_height; ?>"
                class="shrink-0"
              >
            <?php endif; ?>
            <p class="font-ui text-sm text-navy leading-snug">
              <?php echo esc_html( $loc1_line1 ); ?> <?php echo esc_html( $loc1_line2 ); ?>
            </p>
          </div>
        <?php endif; ?>

        <?php if ( $loc2_line1 ) : ?>
          <div class="row-start-center gap-3 bg-white border border-black/10 rounded-lg p-4 shadow-card">
            <?php if ( $pin_src ) : ?>
              <img
                src="<?php echo $pin_src; ?>"
                alt=""
                aria-hidden="true"
                width="<?php echo $pin_width; ?>"
                height="<?php echo $pin_height; ?>"
                class="shrink-0"
              >
            <?php endif; ?>
            <p class="font-ui text-sm text-navy leading-snug">
              <?php echo esc_html( $loc2_line1 ); ?> <?php echo esc_html( $loc2_line2 ); ?>
            </p>
          </div>
        <?php endif; ?>

      </div>

    </div>
  </div>
</section>
