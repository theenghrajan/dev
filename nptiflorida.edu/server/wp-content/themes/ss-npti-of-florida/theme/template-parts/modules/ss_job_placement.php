<?php
/**
 * Module: Job Placement
 * Template Part: template-parts/modules/ss_job_placement.php
 * ACF Flexible Content Layout: ss_job_placement
 *
 * Fields:
 *  - ss_job_placement_section_heading           (text)
 *  - ss_job_placement_section_heading_highlight (text)
 *  - ss_job_placement_section_intro             (textarea)
 *  - ss_job_placement_body_paragraph_1          (wysiwyg)
 *  - ss_job_placement_body_paragraph_2          (textarea)
 *  - ss_job_placement_cta                       (link)
 *  - ss_job_placement_section_image             (image)
 */

$section_heading           = get_sub_field( 'ss_job_placement_section_heading' );
$section_heading_highlight = get_sub_field( 'ss_job_placement_section_heading_highlight' );

if ( ! $section_heading && ! $section_heading_highlight ) return;

$section_intro    = get_sub_field( 'ss_job_placement_section_intro' );
$body_paragraph_1 = get_sub_field( 'ss_job_placement_body_paragraph_1' );
$body_paragraph_2 = get_sub_field( 'ss_job_placement_body_paragraph_2' );
$cta              = get_sub_field( 'ss_job_placement_cta' );
$section_image    = get_sub_field( 'ss_job_placement_section_image' );
?>

<section
  id="ss-job-placement"
  class="ss-module-job-placement bg-light-blue py-10 md:py-16 lg:py-20"
>
  <div class="container mx-auto px-4">

    <!-- Row 1: Full-width centered header -->
    <div class="text-center mb-10 md:mb-14 flex flex-col gap-3">

      <h2 class="font-heading font-bold text-3xl md:text-4xl text-navy leading-tight">
        <?php if ( $section_heading ) : ?>
          <?php echo esc_html( $section_heading ); ?><br>
        <?php endif; ?>
        <?php if ( $section_heading_highlight ) : ?>
          <span class="text-orange"><?php echo esc_html( $section_heading_highlight ); ?></span>
        <?php endif; ?>
      </h2>

      <?php if ( $section_intro ) : ?>
        <p class="font-body font-normal text-md text-navy leading-relaxed max-w-4xl mx-auto">
          <?php echo esc_html( $section_intro ); ?>
        </p>
      <?php endif; ?>

    </div>

    <!-- Row 2: Two-column — text + CTA left, image right -->
    <div class="flex flex-col gap-10 lg:flex-row lg:items-start lg:gap-12">

      <!-- Left col: two paragraphs + CTA -->
      <div class="flex flex-col gap-6 w-full lg:w-1/2">

        <?php if ( $body_paragraph_1 ) : ?>
          <?php echo wp_kses_post( $body_paragraph_1 ); ?>
        <?php endif; ?>

        <?php if ( $body_paragraph_2 ) : ?>
          <p class="font-body font-normal text-md text-navy leading-relaxed">
            <?php echo esc_html( $body_paragraph_2 ); ?>
          </p>
        <?php endif; ?>

        <?php if ( $cta ) : ?>
          <div>
            <a
              href="<?php echo esc_url( $cta['url'] ); ?>"
              <?php if ( $cta['target'] ) : ?>target="<?php echo esc_attr( $cta['target'] ); ?>"<?php endif; ?>
              class="inline-flex items-center justify-center bg-orange hover:bg-orange/90 text-white font-body font-bold text-sm uppercase rounded-4xl px-9 py-3 transition-colors"
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
