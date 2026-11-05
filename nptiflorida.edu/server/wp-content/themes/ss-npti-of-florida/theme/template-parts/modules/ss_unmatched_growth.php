<?php
/**
 * Module: Unmatched Growth
 * Template Part: template-parts/modules/ss_unmatched_growth.php
 * ACF Flexible Content Layout: ss_unmatched_growth
 *
 * Fields:
 *  - ss_unmatched_growth_section_heading_highlight (text)
 *  - ss_unmatched_growth_section_heading           (text)
 *  - ss_unmatched_growth_section_body              (textarea)
 *  - ss_unmatched_growth_stats                     (repeater)
 *    - ss_unmatched_growth_stats_stat_value (text)
 *    - ss_unmatched_growth_stats_stat_label (text)
 *  - ss_unmatched_growth_apply_cta                 (link)
 *  - ss_unmatched_growth_program_info_cta          (link)
 *  - ss_unmatched_growth_gallery                   (group)
 *    - image_1 (image) — tall left
 *    - image_2 (image) — top right
 *    - image_3 (image) — bottom right
 */

$section_heading_highlight = get_sub_field( 'ss_unmatched_growth_section_heading_highlight' );
$section_heading           = get_sub_field( 'ss_unmatched_growth_section_heading' );
$section_body              = get_sub_field( 'ss_unmatched_growth_section_body' );
$apply_cta                 = get_sub_field( 'ss_unmatched_growth_apply_cta' );
$program_info_cta          = get_sub_field( 'ss_unmatched_growth_program_info_cta' );
$gallery                   = get_sub_field( 'ss_unmatched_growth_gallery' );

$gallery_image_1 = $gallery['image_1'] ?? null;
$gallery_image_2 = $gallery['image_2'] ?? null;
$gallery_image_3 = $gallery['image_3'] ?? null;

if ( ! $section_heading ) return;
?>

<section
  id="ss-unmatched-growth"
  class="ss-module-unmatched-growth pad-section"
>
  <div class="container mx-auto px-4">

    <div class="flex flex-col gap-10 lg:flex-row lg:gap-16 lg:items-center">

      <!-- Left column — heading, body, stats, CTAs -->
      <div class="col-start-start-24 lg:w-1/2">

        <div class="col-start-start-16">

          <h2>
            <?php if ( $section_heading_highlight ) : ?>
              <span class="text-orange"><?php echo esc_html( $section_heading_highlight ); ?> </span>
            <?php endif; ?>
            <?php echo esc_html( $section_heading ); ?>
          </h2>

          <?php if ( $section_body ) : ?>
            <p>
              <?php echo wp_kses_post( $section_body ); ?>
            </p>
          <?php endif; ?>

        </div>

        <?php if ( have_rows( 'ss_unmatched_growth_stats' ) ) : ?>
          <div class="w-full flex gap-x-3 xl:gap-x-6 gap-y-5 justify-between flex-wrap">

            <?php while ( have_rows( 'ss_unmatched_growth_stats' ) ) : the_row();
              $stat_value = get_sub_field( 'ss_unmatched_growth_stats_stat_value' );
              $stat_label = get_sub_field( 'ss_unmatched_growth_stats_stat_label' );
            ?>

              <div class="col-start-start-8">
                <?php if ( $stat_value ) : ?>
                  <p class="font-heading text-[30px] xl:text-2xl font-bold text-blue leading-tight"><?php echo esc_html( $stat_value ); ?></p>
                <?php endif; ?>
                <?php if ( $stat_label ) : ?>
                  <p class="text-xs xl:text-sm"><?php echo esc_html( $stat_label ); ?></p>
                <?php endif; ?>
              </div>

            <?php endwhile; ?>

          </div>
        <?php endif; ?>

        <div class="row-start-center flex-wrap !justify-center">

          <?php if ( $apply_cta ) : ?>
            <a href="<?php echo esc_url( $apply_cta['url'] ); ?>"<?php if ( $apply_cta['target'] ) echo ' target="' . esc_attr( $apply_cta['target'] ) . '"'; ?> class="btn btn-primary">
              <?php echo esc_html( $apply_cta['title'] ); ?>
            </a>
          <?php endif; ?>

          <?php if ( $program_info_cta ) : ?>
            <a href="<?php echo esc_url( $program_info_cta['url'] ); ?>"<?php if ( $program_info_cta['target'] ) echo ' target="' . esc_attr( $program_info_cta['target'] ) . '"'; ?> class="btn btn-secondary">
              <?php echo esc_html( $program_info_cta['title'] ); ?>
            </a>
          <?php endif; ?>

        </div>

      </div>

      <!-- Right column — 3-image collage -->
      <div class="relative lg:w-1/2">
        <div class="grid grid-cols-2 gap-2 xl:gap-4 items-center">

          <?php if ( $gallery_image_1 ) : ?>
            <div class="row-span-2">
              <img
                src="<?php echo esc_url( $gallery_image_1['url'] ); ?>"
                alt="<?php echo esc_attr( $gallery_image_1['alt'] ); ?>"
                width="<?php echo esc_attr( $gallery_image_1['width'] ); ?>"
                height="<?php echo esc_attr( $gallery_image_1['height'] ); ?>"
                class="img-cover rounded-xl w-full"
              >
            </div>
          <?php endif; ?>

          <div class="col-start-start-16 !gap-0">

            <?php if ( $gallery_image_2 ) : ?>
              <img
                src="<?php echo esc_url( $gallery_image_2['url'] ); ?>"
                alt="<?php echo esc_attr( $gallery_image_2['alt'] ); ?>"
                width="<?php echo esc_attr( $gallery_image_2['width'] ); ?>"
                height="<?php echo esc_attr( $gallery_image_2['height'] ); ?>"
                class="img-cover rounded-xl w-full"
              >
            <?php endif; ?>

            <?php if ( $gallery_image_3 ) : ?>
              <div class="relative rounded-2xl border-light-blue border-[8px] xl:border-16 -ml-[20%] w-[125%]">
              <img
                src="<?php echo esc_url( $gallery_image_3['url'] ); ?>"
                alt="<?php echo esc_attr( $gallery_image_3['alt'] ); ?>"
                width="<?php echo esc_attr( $gallery_image_3['width'] ); ?>"
                height="<?php echo esc_attr( $gallery_image_3['height'] ); ?>"
                class="img-cover rounded-xl"
              >
              </div>
            <?php endif; ?>

          </div>

        </div>
      </div>

    </div>

  </div>
</section>
