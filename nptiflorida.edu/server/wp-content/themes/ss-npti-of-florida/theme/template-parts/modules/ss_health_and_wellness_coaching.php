<?php
/**
 * Module: Health and Wellness Coaching
 * Template Part: template-parts/modules/ss_health_and_wellness_coaching.php
 * ACF Flexible Content Layout: ss_health_and_wellness_coaching
 *
 * Fields:
 *  Part 1 — Centered intro header:
 *  - ss_health_and_wellness_coaching_section_heading           (text)
 *  - ss_health_and_wellness_coaching_section_heading_highlight (text)
 *  - ss_health_and_wellness_coaching_intro_paragraph           (textarea)
 *
 *  Part 2 — Two-column layout:
 *  - ss_health_and_wellness_coaching_about_heading             (text)
 *  - ss_health_and_wellness_coaching_about_paragraph_1         (textarea)
 *  - ss_health_and_wellness_coaching_about_paragraph_2         (textarea)
 *  - ss_health_and_wellness_coaching_about_paragraph_3         (textarea)
 *  - ss_health_and_wellness_coaching_cta_primary               (link)
 *  - ss_health_and_wellness_coaching_about_image               (image)
 *
 *  Part 3 — Background image with white card overlay:
 *  - ss_health_and_wellness_coaching_benefits_image            (image)
 *  - ss_health_and_wellness_coaching_benefits_heading          (text)
 *  - ss_health_and_wellness_coaching_benefits_paragraph_1      (textarea)
 *  - ss_health_and_wellness_coaching_benefits_paragraph_2      (textarea)
 *  - ss_health_and_wellness_coaching_benefits_paragraph_3      (textarea)
 *  - ss_health_and_wellness_coaching_cta_secondary             (link)
 */

$m = 'ss_health_and_wellness_coaching';

$section_heading           = get_sub_field( "{$m}_section_heading" );
$section_heading_highlight = get_sub_field( "{$m}_section_heading_highlight" );

if ( ! $section_heading && ! $section_heading_highlight ) return;

$intro_paragraph    = get_sub_field( "{$m}_intro_paragraph" );
$about_heading      = get_sub_field( "{$m}_about_heading" );
$about_paragraph_1  = get_sub_field( "{$m}_about_paragraph_1" );
$about_paragraph_2  = get_sub_field( "{$m}_about_paragraph_2" );
$about_paragraph_3  = get_sub_field( "{$m}_about_paragraph_3" );
$cta_primary        = get_sub_field( "{$m}_cta_primary" );
$about_image        = get_sub_field( "{$m}_about_image" );
$benefits_image     = get_sub_field( "{$m}_benefits_image" );
$benefits_heading   = get_sub_field( "{$m}_benefits_heading" );
$benefits_paragraph_1 = get_sub_field( "{$m}_benefits_paragraph_1" );
$benefits_paragraph_2 = get_sub_field( "{$m}_benefits_paragraph_2" );
$benefits_paragraph_3 = get_sub_field( "{$m}_benefits_paragraph_3" );
$cta_secondary      = get_sub_field( "{$m}_cta_secondary" );
?>

<section
  id="ss-health-and-wellness-coaching"
  class="ss-module-health-and-wellness-coaching py-10 md:py-16 lg:py-20"
>
  <div class="container mx-auto px-4">

    <!-- Part 1: Centered intro header -->
    <div class="flex flex-col items-center gap-4 text-center mb-10 md:mb-14">

      <h2 class="font-heading font-bold text-2xl md:text-3xl leading-tight text-navy">
        <?php if ( $section_heading ) : ?>
          <?php echo esc_html( $section_heading ); ?>
        <?php endif; ?>
        <?php if ( $section_heading_highlight ) : ?>
          <span class="text-orange"><?php echo esc_html( $section_heading_highlight ); ?></span>
        <?php endif; ?>
      </h2>

      <?php if ( $intro_paragraph ) : ?>
        <p class="font-body font-normal text-md text-navy leading-relaxed max-w-prose mx-auto">
          <?php echo esc_html( $intro_paragraph ); ?>
        </p>
      <?php endif; ?>

    </div>

    <!-- Part 2: Two-column — text left, image right -->
    <div class="flex flex-col gap-10 lg:flex-row lg:items-center lg:gap-10.5">

      <!-- Left column: heading, body copy, CTA -->
      <div class="flex flex-col gap-6 w-full lg:w-1/2">

        <?php if ( $about_heading ) : ?>
          <h3 class="font-heading font-bold text-xl leading-snug text-navy">
            <?php echo esc_html( $about_heading ); ?>
          </h3>
        <?php endif; ?>

        <?php if ( $about_paragraph_1 ) : ?>
          <p class="font-body font-normal text-md text-navy leading-relaxed">
            <?php echo esc_html( $about_paragraph_1 ); ?>
          </p>
        <?php endif; ?>

        <?php if ( $about_paragraph_2 ) : ?>
          <p class="font-body font-normal text-md text-navy leading-relaxed">
            <?php echo esc_html( $about_paragraph_2 ); ?>
          </p>
        <?php endif; ?>

        <?php if ( $about_paragraph_3 ) : ?>
          <p class="font-body font-normal text-md text-navy leading-relaxed">
            <?php echo esc_html( $about_paragraph_3 ); ?>
          </p>
        <?php endif; ?>

        <?php if ( $cta_primary ) : ?>
          <div>
            <a
              href="<?php echo esc_url( $cta_primary['url'] ); ?>"
              <?php if ( $cta_primary['target'] ) : ?>target="<?php echo esc_attr( $cta_primary['target'] ); ?>"<?php endif; ?>
              class="inline-flex items-center justify-center bg-orange hover:bg-orange/90 text-white font-body font-bold text-sm uppercase rounded-4xl px-9 py-3 transition-colors"
            >
              <?php echo esc_html( $cta_primary['title'] ); ?>
            </a>
          </div>
        <?php endif; ?>

      </div>

      <!-- Right column: image -->
      <?php if ( $about_image ) : ?>
        <div class="w-full lg:w-1/2 overflow-hidden rounded flex-shrink-0" style="min-height: 320px;">
          <img
            src="<?php echo esc_url( $about_image['url'] ); ?>"
            alt="<?php echo esc_attr( $about_image['alt'] ); ?>"
            class="w-full h-full object-cover"
            width="<?php echo esc_attr( $about_image['width'] ); ?>"
            height="<?php echo esc_attr( $about_image['height'] ); ?>"
            style="min-height: 320px;"
          >
        </div>
      <?php endif; ?>

    </div>

    <!-- Part 3: Full-width background image with overlapping white card -->
    <div class="relative mt-10 md:mt-14 overflow-hidden rounded" style="min-height: 400px;">

      <?php if ( $benefits_image ) : ?>
        <img
          src="<?php echo esc_url( $benefits_image['url'] ); ?>"
          alt="<?php echo esc_attr( $benefits_image['alt'] ); ?>"
          class="w-full object-cover"
          width="<?php echo esc_attr( $benefits_image['width'] ); ?>"
          height="<?php echo esc_attr( $benefits_image['height'] ); ?>"
          style="min-height: 400px;"
        >
      <?php endif; ?>

      <!-- White card overlay -->
      <div class="bg-white/90 rounded-md p-8 mt-6 lg:mt-0 lg:absolute lg:top-5 lg:bottom-5 lg:right-10 lg:w-1/2 lg:flex lg:flex-col lg:justify-center">

        <div class="flex flex-col gap-6">

          <?php if ( $benefits_heading ) : ?>
            <h3 class="font-heading font-bold text-xl leading-snug text-navy">
              <?php echo esc_html( $benefits_heading ); ?>
            </h3>
          <?php endif; ?>

          <?php if ( $benefits_paragraph_1 ) : ?>
            <p class="font-body font-normal text-md text-navy leading-relaxed">
              <?php echo esc_html( $benefits_paragraph_1 ); ?>
            </p>
          <?php endif; ?>

          <?php if ( $benefits_paragraph_2 ) : ?>
            <p class="font-body font-normal text-md text-navy leading-relaxed">
              <?php echo esc_html( $benefits_paragraph_2 ); ?>
            </p>
          <?php endif; ?>

          <?php if ( $benefits_paragraph_3 ) : ?>
            <p class="font-body font-normal text-md text-navy leading-relaxed">
              <?php echo esc_html( $benefits_paragraph_3 ); ?>
            </p>
          <?php endif; ?>

          <?php if ( $cta_secondary ) : ?>
            <div>
              <a
                href="<?php echo esc_url( $cta_secondary['url'] ); ?>"
                <?php if ( $cta_secondary['target'] ) : ?>target="<?php echo esc_attr( $cta_secondary['target'] ); ?>"<?php endif; ?>
                class="inline-flex items-center justify-center bg-white hover:bg-orange/10 text-orange font-body font-bold text-sm uppercase rounded-4xl px-9 py-3 border-1.5 border-orange transition-colors"
              >
                <?php echo esc_html( $cta_secondary['title'] ); ?>
              </a>
            </div>
          <?php endif; ?>

        </div>

      </div>

    </div>

  </div>
</section>
