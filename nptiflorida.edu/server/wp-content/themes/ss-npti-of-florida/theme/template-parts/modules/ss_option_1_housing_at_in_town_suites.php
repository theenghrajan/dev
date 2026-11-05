<?php
/**
 * Module: Option 1: Housing at In Town Suites
 * Template Part: template-parts/modules/ss_option_1_housing_at_in_town_suites.php
 * ACF Flexible Content Layout: ss_option_1_housing_at_in_town_suites
 *
 * Fields:
 *  - ss_option_1_housing_at_in_town_suites_section_heading_highlight (text)
 *  - ss_option_1_housing_at_in_town_suites_section_heading (text)
 *  - ss_option_1_housing_at_in_town_suites_section_intro (textarea)
 *  - ss_option_1_housing_at_in_town_suites_gallery_images (gallery)
 *  - ss_option_1_housing_at_in_town_suites_closer_look_label (text)
 *  - ss_option_1_housing_at_in_town_suites_closer_image (image)
 *  - ss_option_1_housing_at_in_town_suites_amenities_heading (text)
 *  - ss_option_1_housing_at_in_town_suites_amenities_icon (image)
 *  - ss_option_1_housing_at_in_town_suites_amenities (repeater)
 *      - ss_option_1_housing_at_in_town_suites_amenities_item_text (text)
 *  - ss_option_1_housing_at_in_town_suites_cta_label (text)
 *  - ss_option_1_housing_at_in_town_suites_cta_link (link)
 */

$section_heading_highlight = get_sub_field( 'ss_option_1_housing_at_in_town_suites_section_heading_highlight' );
$section_heading           = get_sub_field( 'ss_option_1_housing_at_in_town_suites_section_heading' );
$section_intro             = get_sub_field( 'ss_option_1_housing_at_in_town_suites_section_intro' );
$gallery_images            = get_sub_field( 'ss_option_1_housing_at_in_town_suites_gallery_images' );
$closer_look_label         = get_sub_field( 'ss_option_1_housing_at_in_town_suites_closer_look_label' );
$closer_image              = get_sub_field( 'ss_option_1_housing_at_in_town_suites_closer_image' );
$amenities_heading         = get_sub_field( 'ss_option_1_housing_at_in_town_suites_amenities_heading' );
$amenities_icon            = get_sub_field( 'ss_option_1_housing_at_in_town_suites_amenities_icon' );
$cta_label                 = get_sub_field( 'ss_option_1_housing_at_in_town_suites_cta_label' );
$cta_link                  = get_sub_field( 'ss_option_1_housing_at_in_town_suites_cta_link' );

if ( ! $section_heading && ! $section_heading_highlight ) return;
?>

<section
  id="ss-option-1-housing-at-in-town-suites"
  class="ss-module-option-1-housing-at-in-town-suites bg-light-blue py-10 md:py-16 lg:py-20"
>
  <div class="container mx-auto px-4">

    <!-- ── Part 1: Centered header ──────────────────────────────────────── -->
    <div class="flex flex-col items-center gap-4 text-center mb-10 md:mb-14">

      <h2 class="font-heading font-bold text-2xl md:text-3xl leading-tight">
        <?php if ( $section_heading_highlight ) : ?>
          <span class="text-orange"><?php echo esc_html( $section_heading_highlight ); ?></span>
        <?php endif; ?>
        <?php if ( $section_heading ) : ?>
          <span class="text-navy"> <?php echo esc_html( $section_heading ); ?></span>
        <?php endif; ?>
      </h2>

      <?php if ( $section_intro ) : ?>
        <p class="font-body font-normal text-md text-navy leading-relaxed max-w-prose mx-auto">
          <?php echo esc_html( $section_intro ); ?>
        </p>
      <?php endif; ?>

    </div>

    <!-- ── Part 2: Main image gallery + thumbnails ──────────────────────── -->
    <?php if ( $gallery_images ) : ?>
      <div class="mb-10 md:mb-14">

        <?php $main_image = $gallery_images[0]; ?>

        <!-- Main gallery image -->
        <div class="overflow-hidden rounded mb-4">
          <img
            id="ss-gallery-main"
            src="<?php echo esc_url( $main_image['url'] ); ?>"
            alt="<?php echo esc_attr( $main_image['alt'] ); ?>"
            class="w-full object-cover"
            width="<?php echo esc_attr( $main_image['width'] ); ?>"
            height="<?php echo esc_attr( $main_image['height'] ); ?>"
            style="min-height: 260px;"
          >
        </div>

        <!-- Thumbnail strip -->
        <div class="flex items-center justify-center gap-4 flex-wrap">

          <?php foreach ( $gallery_images as $index => $image ) :
            $is_active = ( $index === 0 );
          ?>
            <button
              type="button"
              class="ss-gallery-thumb overflow-hidden rounded-sm border-4 <?php echo $is_active ? 'border-blue' : 'border-transparent opacity-50 hover:opacity-100'; ?> flex-shrink-0 transition-opacity"
              data-img-src="<?php echo esc_url( $image['url'] ); ?>"
              data-img-alt="<?php echo esc_attr( $image['alt'] ); ?>"
              aria-label="<?php echo esc_attr( 'View suite photo ' . ( $index + 1 ) ); ?>"
            >
              <img
                src="<?php echo esc_url( $image['sizes']['medium'] ?? $image['url'] ); ?>"
                alt=""
                class="w-[188px] h-[71px] object-cover"
                aria-hidden="true"
              >
            </button>
          <?php endforeach; ?>

        </div>

      </div>
    <?php endif; ?>

    <!-- ── Part 3: Sub-heading + two-column closer look ─────────────────── -->
    <div>

      <?php if ( $closer_look_label ) : ?>
        <p class="font-heading font-bold text-lg text-navy text-center mb-6">
          <?php echo esc_html( $closer_look_label ); ?>
        </p>
      <?php endif; ?>

      <div class="flex flex-col gap-8 lg:flex-row lg:items-start lg:gap-10">

        <!-- Left: suite photo -->
        <?php if ( $closer_image ) : ?>
          <div class="w-full lg:w-1/2 overflow-hidden rounded flex-shrink-0">
            <img
              src="<?php echo esc_url( $closer_image['url'] ); ?>"
              alt="<?php echo esc_attr( $closer_image['alt'] ); ?>"
              class="w-full object-cover"
              width="<?php echo esc_attr( $closer_image['width'] ); ?>"
              height="<?php echo esc_attr( $closer_image['height'] ); ?>"
              style="min-height: 300px;"
            >
          </div>
        <?php endif; ?>

        <!-- Right: heading + checklist + CTA -->
        <div class="flex flex-col gap-6 w-full lg:w-1/2">

          <?php if ( $amenities_heading ) : ?>
            <h3 class="font-heading font-bold text-xl leading-snug text-navy">
              <?php echo esc_html( $amenities_heading ); ?>
            </h3>
          <?php endif; ?>

          <?php if ( have_rows( 'ss_option_1_housing_at_in_town_suites_amenities' ) ) : ?>
            <ul class="flex flex-col gap-3">

              <?php while ( have_rows( 'ss_option_1_housing_at_in_town_suites_amenities' ) ) : the_row(); ?>
                <?php $item_text = get_sub_field( 'ss_option_1_housing_at_in_town_suites_amenities_item_text' ); ?>
                <li class="flex items-start gap-2.5">
                  <?php if ( $amenities_icon ) : ?>
                    <img
                      src="<?php echo esc_url( $amenities_icon['url'] ); ?>"
                      alt=""
                      class="w-8 h-8 flex-shrink-0"
                      aria-hidden="true"
                    >
                  <?php endif; ?>
                  <span class="font-body font-normal text-md text-navy leading-relaxed"><?php echo esc_html( $item_text ); ?></span>
                </li>
              <?php endwhile; ?>

            </ul>
          <?php endif; ?>

          <?php if ( $cta_label && $cta_link ) : ?>
            <div>
              <a
                href="<?php echo esc_url( $cta_link['url'] ); ?>"
                class="inline-flex items-center justify-center bg-orange hover:bg-orange/90 text-white font-body font-bold text-sm uppercase rounded-4xl px-9 py-3 transition-colors"
                <?php if ( ! empty( $cta_link['target'] ) ) : ?>
                  target="<?php echo esc_attr( $cta_link['target'] ); ?>"
                <?php endif; ?>
              >
                <?php echo esc_html( $cta_label ); ?>
              </a>
            </div>
          <?php endif; ?>

        </div>

      </div>

    </div>

  </div>
</section>

<script>
  // ss-option-1-housing thumbnail gallery switcher
  (function () {
    var mainImg  = document.getElementById('ss-gallery-main');
    var thumbs   = document.querySelectorAll('.ss-gallery-thumb');

    thumbs.forEach(function (btn) {
      btn.addEventListener('click', function () {
        // Update main image
        mainImg.src = this.dataset.imgSrc;
        mainImg.alt = this.dataset.imgAlt;

        // Reset all thumbs
        thumbs.forEach(function (t) {
          t.classList.remove('border-blue', 'opacity-100');
          t.classList.add('border-transparent', 'opacity-50');
        });

        // Activate clicked thumb
        this.classList.remove('border-transparent', 'opacity-50');
        this.classList.add('border-blue', 'opacity-100');
      });
    });
  })();
</script>
