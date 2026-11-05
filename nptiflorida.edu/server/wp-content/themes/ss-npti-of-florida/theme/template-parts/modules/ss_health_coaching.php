<?php
/**
 * Module: Health Coaching
 * Template Part: template-parts/modules/ss_health_coaching.php
 * ACF Flexible Content Layout: ss_health_coaching
 *
 * Fields:
 *  - ss_health_coaching_section_heading (text)
 *  - ss_health_coaching_section_heading_highlight (text)
 *  - ss_health_coaching_section_subtext (wysiwyg)
 *  - ss_health_coaching_intro_paragraph_1 (textarea)
 *  - ss_health_coaching_intro_paragraph_2 (textarea)
 *  - ss_health_coaching_cta_link (link)
 *  - ss_health_coaching_intro_image (image)
 *  - ss_health_coaching_why_choose_image (image)
 *  - ss_health_coaching_why_choose_heading (text)
 *  - ss_health_coaching_why_choose_intro (textarea)
 *  - ss_health_coaching_accordion_item_icon (image)
 *  - ss_health_coaching_accordion_chevron (image)
 *  - ss_health_coaching_why_choose_items (repeater)
 *  - ss_health_coaching_why_choose_cta_primary (link)
 *  - ss_health_coaching_why_choose_cta_secondary (link)
 *  - ss_health_coaching_salaries_heading (text)
 *  - ss_health_coaching_salaries_intro (textarea)
 *  - ss_health_coaching_salaries_items (repeater)
 *  - ss_health_coaching_salaries_cta_primary (link)
 *  - ss_health_coaching_salaries_cta_secondary (link)
 *  - ss_health_coaching_collage_images (repeater)
 */

$section_heading          = get_sub_field( 'ss_health_coaching_section_heading' );
$heading_highlight        = get_sub_field( 'ss_health_coaching_section_heading_highlight' );
$section_subtext          = get_sub_field( 'ss_health_coaching_section_subtext' );
$intro_paragraph_1        = get_sub_field( 'ss_health_coaching_intro_paragraph_1' );
$intro_paragraph_2        = get_sub_field( 'ss_health_coaching_intro_paragraph_2' );
$cta_link                 = get_sub_field( 'ss_health_coaching_cta_link' );
$intro_image              = get_sub_field( 'ss_health_coaching_intro_image' );
$why_choose_image         = get_sub_field( 'ss_health_coaching_why_choose_image' );
$why_choose_heading       = get_sub_field( 'ss_health_coaching_why_choose_heading' );
$why_choose_intro         = get_sub_field( 'ss_health_coaching_why_choose_intro' );
$accordion_item_icon      = get_sub_field( 'ss_health_coaching_accordion_item_icon' );
$accordion_chevron        = get_sub_field( 'ss_health_coaching_accordion_chevron' );
$why_choose_cta_primary   = get_sub_field( 'ss_health_coaching_why_choose_cta_primary' );
$why_choose_cta_secondary = get_sub_field( 'ss_health_coaching_why_choose_cta_secondary' );
$salaries_heading         = get_sub_field( 'ss_health_coaching_salaries_heading' );
$salaries_intro           = get_sub_field( 'ss_health_coaching_salaries_intro' );
$salaries_cta_primary     = get_sub_field( 'ss_health_coaching_salaries_cta_primary' );
$salaries_cta_secondary   = get_sub_field( 'ss_health_coaching_salaries_cta_secondary' );

if ( ! $section_heading ) return;
?>

<section
  id="ss-health-coaching"
  class="ss-module-health-coaching bg-light-blue py-10 md:py-16 lg:py-20"
>
  <div class="container mx-auto px-4">

    <!-- ── Part 1: Centered header ──────────────────────────────────────── -->
    <div class="flex flex-col items-center gap-4 text-center mb-10 md:mb-14">

      <?php if ( $section_heading || $heading_highlight ) : ?>
      <h2 class="font-heading font-bold text-2xl md:text-3xl leading-tight text-navy">
        <?php echo esc_html( $section_heading ); ?>
        <span class="text-orange"><?php echo esc_html( $heading_highlight ); ?></span>
      </h2>
      <?php endif; ?>

      <?php if ( $section_subtext ) : ?>
      <div class="font-body font-normal text-md text-navy leading-relaxed max-w-prose mx-auto">
        <?php echo wp_kses_post( $section_subtext ); ?>
      </div>
      <?php endif; ?>

    </div>

    <!-- ── Part 2: Left text + Right image ─────────────────────────────── -->
    <div class="flex flex-col gap-8 mb-10 md:mb-14 lg:flex-row lg:items-center lg:gap-10">

      <!-- Left: two paragraphs + CTA -->
      <div class="flex flex-col gap-6 w-full lg:w-1/2">

        <?php if ( $intro_paragraph_1 ) : ?>
        <p class="font-body font-normal text-md text-navy leading-relaxed">
          <?php echo esc_html( $intro_paragraph_1 ); ?>
        </p>
        <?php endif; ?>

        <?php if ( $intro_paragraph_2 ) : ?>
        <p class="font-body font-normal text-md text-navy leading-relaxed">
          <?php echo esc_html( $intro_paragraph_2 ); ?>
        </p>
        <?php endif; ?>

        <?php if ( $cta_link ) : ?>
        <div>
          <a
            href="<?php echo esc_url( $cta_link['url'] ); ?>"
            class="inline-flex items-center justify-center bg-orange hover:bg-orange/90 text-white font-body font-bold text-sm uppercase rounded-4xl px-9 py-3 transition-colors"
            <?php if ( $cta_link['target'] ) : ?>target="<?php echo esc_attr( $cta_link['target'] ); ?>"<?php endif; ?>
          >
            <?php echo esc_html( $cta_link['title'] ); ?>
          </a>
        </div>
        <?php endif; ?>

      </div>

      <!-- Right: image -->
      <?php if ( $intro_image ) : ?>
      <div class="w-full lg:w-1/2 overflow-hidden rounded flex-shrink-0">
        <img
          src="<?php echo esc_url( $intro_image['url'] ); ?>"
          alt="<?php echo esc_attr( $intro_image['alt'] ); ?>"
          width="<?php echo esc_attr( $intro_image['width'] ); ?>"
          height="<?php echo esc_attr( $intro_image['height'] ); ?>"
          class="w-full object-cover"
          style="min-height: 220px;"
        >
      </div>
      <?php endif; ?>

    </div>

    <!-- ── Part 3: Left tall image + Right accordion ─────────────────────── -->
    <div class="flex flex-col gap-8 mb-10 md:mb-14 lg:flex-row lg:items-start lg:gap-10">

      <!-- Left: tall image -->
      <?php if ( $why_choose_image ) : ?>
      <div class="w-full lg:w-5/12 overflow-hidden rounded flex-shrink-0">
        <img
          src="<?php echo esc_url( $why_choose_image['url'] ); ?>"
          alt="<?php echo esc_attr( $why_choose_image['alt'] ); ?>"
          width="<?php echo esc_attr( $why_choose_image['width'] ); ?>"
          height="<?php echo esc_attr( $why_choose_image['height'] ); ?>"
          class="w-full object-cover"
          style="min-height: 320px;"
        >
      </div>
      <?php endif; ?>

      <!-- Right: heading, intro, accordion, buttons -->
      <div class="flex flex-col gap-6 w-full lg:w-7/12">

        <?php if ( $why_choose_heading ) : ?>
        <h3 class="font-heading font-bold text-xl leading-snug text-navy">
          <?php echo esc_html( $why_choose_heading ); ?>
        </h3>
        <?php endif; ?>

        <?php if ( $why_choose_intro ) : ?>
        <p class="font-body font-normal text-md text-navy leading-relaxed">
          <?php echo esc_html( $why_choose_intro ); ?>
        </p>
        <?php endif; ?>

        <?php if ( have_rows( 'ss_health_coaching_why_choose_items' ) ) : ?>
        <div class="ss-accordion flex flex-col gap-3">
          <?php $why_index = 0; while ( have_rows( 'ss_health_coaching_why_choose_items' ) ) : the_row(); $why_index++; ?>
          <?php
            $item_title = get_sub_field( 'ss_health_coaching_why_choose_items_item_title' );
            $item_body  = get_sub_field( 'ss_health_coaching_why_choose_items_item_body' );
            $is_first   = ( $why_index === 1 );
          ?>
          <div class="ss-accordion-item accordion-item <?php echo $is_first ? 'itemActive ' : ''; ?>bg-white rounded px-4 py-3">
            <button
              type="button"
              class="ss-accordion-btn accordionBtn <?php echo $is_first ? 'active ' : ''; ?>flex items-center justify-between w-full text-left gap-2"
              aria-expanded="<?php echo $is_first ? 'true' : 'false'; ?>"
            >
              <span class="flex items-center gap-2">
                <?php if ( $accordion_item_icon ) : ?>
                <img
                  src="<?php echo esc_url( $accordion_item_icon['url'] ); ?>"
                  alt="<?php echo esc_attr( $accordion_item_icon['alt'] ); ?>"
                  class="w-8 h-8 flex-shrink-0"
                  aria-hidden="true"
                >
                <?php endif; ?>
                <span class="font-ui font-semibold text-md text-navy leading-relaxed"><?php echo esc_html( $item_title ); ?></span>
              </span>
              <?php if ( $accordion_chevron ) : ?>
              <img
                src="<?php echo esc_url( $accordion_chevron['url'] ); ?>"
                alt="<?php echo esc_attr( $accordion_chevron['alt'] ); ?>"
                class="ss-accordion-chevron w-6 h-6 flex-shrink-0 <?php echo $is_first ? 'rotate-180 ' : ''; ?>transition-transform"
                aria-hidden="true"
              >
              <?php endif; ?>
            </button>
            <div class="ss-accordion-body accordionBody mt-3"<?php echo $is_first ? '' : ' style="display:none;"'; ?>>
              <?php if ( $item_body ) : ?>
              <p class="font-body font-normal text-md text-navy leading-relaxed">
                <?php echo esc_html( $item_body ); ?>
              </p>
              <?php endif; ?>
            </div>
          </div>
          <?php endwhile; ?>
        </div>
        <?php endif; ?>

        <div class="flex flex-col sm:flex-row items-start gap-4">
          <?php if ( $why_choose_cta_primary ) : ?>
          <a
            href="<?php echo esc_url( $why_choose_cta_primary['url'] ); ?>"
            class="inline-flex items-center justify-center bg-orange hover:bg-orange/90 text-white font-body font-bold text-sm uppercase rounded-4xl px-9 py-3 transition-colors"
            <?php if ( $why_choose_cta_primary['target'] ) : ?>target="<?php echo esc_attr( $why_choose_cta_primary['target'] ); ?>"<?php endif; ?>
          >
            <?php echo esc_html( $why_choose_cta_primary['title'] ); ?>
          </a>
          <?php endif; ?>
          <?php if ( $why_choose_cta_secondary ) : ?>
          <a
            href="<?php echo esc_url( $why_choose_cta_secondary['url'] ); ?>"
            class="inline-flex items-center justify-center bg-white hover:bg-orange/10 text-orange font-body font-bold text-sm uppercase rounded-4xl px-9 py-3 border-1.5 border-orange transition-colors"
            <?php if ( $why_choose_cta_secondary['target'] ) : ?>target="<?php echo esc_attr( $why_choose_cta_secondary['target'] ); ?>"<?php endif; ?>
          >
            <?php echo esc_html( $why_choose_cta_secondary['title'] ); ?>
          </a>
          <?php endif; ?>
        </div>

      </div>

    </div>

    <!-- ── Part 4: Left text + accordion + Right photo collage ─────────── -->
    <div class="flex flex-col gap-8 lg:flex-row lg:items-start lg:gap-10">

      <!-- Left: heading, intro, accordion, buttons -->
      <div class="flex flex-col gap-6 w-full lg:w-1/2">

        <?php if ( $salaries_heading ) : ?>
        <h3 class="font-heading font-bold text-xl leading-snug text-navy">
          <?php echo esc_html( $salaries_heading ); ?>
        </h3>
        <?php endif; ?>

        <?php if ( $salaries_intro ) : ?>
        <p class="font-body font-normal text-md text-navy leading-relaxed">
          <?php echo esc_html( $salaries_intro ); ?>
        </p>
        <?php endif; ?>

        <?php if ( have_rows( 'ss_health_coaching_salaries_items' ) ) : ?>
        <div class="ss-accordion flex flex-col gap-3">
          <?php $sal_index = 0; while ( have_rows( 'ss_health_coaching_salaries_items' ) ) : the_row(); $sal_index++; ?>
          <?php
            $item_title = get_sub_field( 'ss_health_coaching_salaries_items_item_title' );
            $item_body  = get_sub_field( 'ss_health_coaching_salaries_items_item_body' );
            $is_first   = ( $sal_index === 1 );
          ?>
          <div class="ss-accordion-item accordion-item <?php echo $is_first ? 'itemActive ' : ''; ?>bg-white rounded px-4 py-3">
            <button
              type="button"
              class="ss-accordion-btn accordionBtn <?php echo $is_first ? 'active ' : ''; ?>flex items-center justify-between w-full text-left gap-2"
              aria-expanded="<?php echo $is_first ? 'true' : 'false'; ?>"
            >
              <span class="flex items-center gap-2">
                <?php if ( $accordion_item_icon ) : ?>
                <img
                  src="<?php echo esc_url( $accordion_item_icon['url'] ); ?>"
                  alt="<?php echo esc_attr( $accordion_item_icon['alt'] ); ?>"
                  class="w-8 h-8 flex-shrink-0"
                  aria-hidden="true"
                >
                <?php endif; ?>
                <span class="font-ui font-semibold text-md text-navy leading-relaxed"><?php echo esc_html( $item_title ); ?></span>
              </span>
              <?php if ( $accordion_chevron ) : ?>
              <img
                src="<?php echo esc_url( $accordion_chevron['url'] ); ?>"
                alt="<?php echo esc_attr( $accordion_chevron['alt'] ); ?>"
                class="ss-accordion-chevron w-6 h-6 flex-shrink-0 <?php echo $is_first ? 'rotate-180 ' : ''; ?>transition-transform"
                aria-hidden="true"
              >
              <?php endif; ?>
            </button>
            <div class="ss-accordion-body accordionBody mt-3"<?php echo $is_first ? '' : ' style="display:none;"'; ?>>
              <?php if ( $item_body ) : ?>
              <?php echo wp_kses_post( $item_body ); ?>
              <?php endif; ?>
            </div>
          </div>
          <?php endwhile; ?>
        </div>
        <?php endif; ?>

        <div class="flex flex-col sm:flex-row items-start gap-4">
          <?php if ( $salaries_cta_primary ) : ?>
          <a
            href="<?php echo esc_url( $salaries_cta_primary['url'] ); ?>"
            class="inline-flex items-center justify-center bg-orange hover:bg-orange/90 text-white font-body font-bold text-sm uppercase rounded-4xl px-9 py-3 transition-colors"
            <?php if ( $salaries_cta_primary['target'] ) : ?>target="<?php echo esc_attr( $salaries_cta_primary['target'] ); ?>"<?php endif; ?>
          >
            <?php echo esc_html( $salaries_cta_primary['title'] ); ?>
          </a>
          <?php endif; ?>
          <?php if ( $salaries_cta_secondary ) : ?>
          <a
            href="<?php echo esc_url( $salaries_cta_secondary['url'] ); ?>"
            class="inline-flex items-center justify-center bg-white hover:bg-orange/10 text-orange font-body font-bold text-sm uppercase rounded-4xl px-9 py-3 border-1.5 border-orange transition-colors"
            <?php if ( $salaries_cta_secondary['target'] ) : ?>target="<?php echo esc_attr( $salaries_cta_secondary['target'] ); ?>"<?php endif; ?>
          >
            <?php echo esc_html( $salaries_cta_secondary['title'] ); ?>
          </a>
          <?php endif; ?>
        </div>

      </div>

      <!-- Right: staggered photo collage -->
      <?php if ( have_rows( 'ss_health_coaching_collage_images' ) ) : ?>
      <div class="w-full lg:w-1/2 flex-shrink-0">
        <div class="grid grid-cols-2 gap-3">
          <?php $col_index = 0; while ( have_rows( 'ss_health_coaching_collage_images' ) ) : the_row(); $col_index++; ?>
          <?php $collage_image = get_sub_field( 'ss_health_coaching_collage_images_collage_image' ); ?>
          <?php if ( $collage_image ) : ?>

            <?php if ( $col_index === 1 ) : ?>
            <div class="row-span-2 overflow-hidden rounded">
              <img
                src="<?php echo esc_url( $collage_image['url'] ); ?>"
                alt="<?php echo esc_attr( $collage_image['alt'] ); ?>"
                width="<?php echo esc_attr( $collage_image['width'] ); ?>"
                height="<?php echo esc_attr( $collage_image['height'] ); ?>"
                class="w-full h-full object-cover"
                style="min-height: 360px;"
              >
            </div>
            <?php else : ?>
            <div class="overflow-hidden rounded border-16 border-light-blue">
              <img
                src="<?php echo esc_url( $collage_image['url'] ); ?>"
                alt="<?php echo esc_attr( $collage_image['alt'] ); ?>"
                width="<?php echo esc_attr( $collage_image['width'] ); ?>"
                height="<?php echo esc_attr( $collage_image['height'] ); ?>"
                class="w-full h-full object-cover"
                style="<?php echo ( $col_index === 2 ) ? 'min-height: 185px;' : 'min-height: 165px;'; ?>"
              >
            </div>
            <?php endif; ?>

          <?php endif; ?>
          <?php endwhile; ?>
        </div>
      </div>
      <?php endif; ?>

    </div>

  </div>
</section>
