<?php
/**
 * Module: Application Today
 * Template Part: template-parts/modules/ss_application_today.php
 * ACF Flexible Content Layout: ss_application_today
 *
 * Fields:
 *  - ss_application_today_section_heading           (text)
 *  - ss_application_today_section_heading_highlight (text)
 *  - ss_application_today_section_tagline           (text)
 *  - ss_application_today_section_intro             (textarea)
 *  - ss_application_today_body_paragraph_1          (textarea)
 *  - ss_application_today_body_paragraph_2          (wysiwyg)
 *  - ss_application_today_cta                       (link)
 *  - ss_application_today_section_image             (image)
 */

$section_heading           = get_sub_field( 'ss_application_today_section_heading' );
$section_heading_highlight = get_sub_field( 'ss_application_today_section_heading_highlight' );

if ( ! $section_heading && ! $section_heading_highlight ) return;

$section_tagline    = get_sub_field( 'ss_application_today_section_tagline' );
$section_intro      = get_sub_field( 'ss_application_today_section_intro' );
$body_paragraph_1   = get_sub_field( 'ss_application_today_body_paragraph_1' );
$body_paragraph_2   = get_sub_field( 'ss_application_today_body_paragraph_2' );
$cta                = get_sub_field( 'ss_application_today_cta' );
$section_image      = get_sub_field( 'ss_application_today_section_image' );
?>

<section
  id="ss-application-today"
  class="ss-module-application-today bg-light-blue py-10 md:py-16 lg:py-20"
>
  <div class="container mx-auto px-4">

    <!-- Row 1: Full-width centered header -->
    <div class="text-center mb-10 md:mb-12 flex flex-col gap-3">

      <h2 class="font-heading font-bold text-3xl md:text-4xl text-navy leading-tight">
        <?php if ( $section_heading ) : ?>
          <?php echo esc_html( $section_heading ); ?>
        <?php endif; ?>
        <?php if ( $section_heading_highlight ) : ?>
          <span class="text-orange"><?php echo esc_html( $section_heading_highlight ); ?></span>
        <?php endif; ?>
      </h2>

      <?php if ( $section_tagline ) : ?>
        <p class="font-body font-normal text-md text-navy leading-relaxed">
          <?php echo esc_html( $section_tagline ); ?>
        </p>
      <?php endif; ?>

      <?php if ( $section_intro ) : ?>
        <p class="font-body font-normal text-md text-navy leading-relaxed max-w-4xl mx-auto">
          <?php echo esc_html( $section_intro ); ?>
        </p>
      <?php endif; ?>

    </div>

    <!-- Row 2: Two-column — text left, image right -->
    <div class="flex flex-col gap-10 lg:flex-row lg:items-start lg:gap-12">

      <!-- Left col: body copy + CTA -->
      <div class="flex flex-col gap-6 w-full lg:w-1/2">

        <?php if ( $body_paragraph_1 ) : ?>
          <p class="font-body font-normal text-md text-navy leading-relaxed">
            <?php echo esc_html( $body_paragraph_1 ); ?>
          </p>
        <?php endif; ?>

        <?php if ( $body_paragraph_2 ) : ?>
          <?php echo wp_kses_post( $body_paragraph_2 ); ?>
        <?php endif; ?>

        <?php if ( $cta ) : ?>
          <div>
            <a
              href="<?php echo esc_url( $cta['url'] ); ?>"
              <?php if ( $cta['target'] ) : ?>target="<?php echo esc_attr( $cta['target'] ); ?>"<?php endif; ?>
              class="inline-flex items-center justify-center bg-white hover:bg-orange/10 text-orange font-body font-bold text-sm uppercase rounded-4xl px-9 py-3 border-1.5 border-orange transition-colors"
            >
              <?php echo esc_html( $cta['title'] ); ?>
            </a>
          </div>
        <?php endif; ?>

      </div>

      <!-- Right col: image -->
      <?php if ( $section_image ) : ?>
        <div class="w-full lg:w-1/2 flex-shrink-0">
          <div class="overflow-hidden rounded">
            <img
              src="<?php echo esc_url( $section_image['url'] ); ?>"
              alt="<?php echo esc_attr( $section_image['alt'] ); ?>"
              width="<?php echo esc_attr( $section_image['width'] ); ?>"
              height="<?php echo esc_attr( $section_image['height'] ); ?>"
              class="w-full h-auto object-cover"
            >
          </div>
        </div>
      <?php endif; ?>

    </div>

  </div>
</section>
