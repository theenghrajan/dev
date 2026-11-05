<?php
/**
 * Module: Employer Job
 * Template Part: template-parts/modules/ss_employer_job.php
 * ACF Flexible Content Layout: ss_employer_job
 *
 * Fields:
 *  - ss_employer_job_background_image   (image)
 *  - ss_employer_job_section_heading    (text)
 *  - ss_employer_job_section_description (textarea)
 *  - ss_employer_job_contact_instruction (wysiwyg)
 *  - ss_employer_job_cta                (link)
 */

$section_heading = get_sub_field( 'ss_employer_job_section_heading' );

if ( ! $section_heading ) return;

$background_image    = get_sub_field( 'ss_employer_job_background_image' );
$section_description = get_sub_field( 'ss_employer_job_section_description' );
$contact_instruction = get_sub_field( 'ss_employer_job_contact_instruction' );
$cta                 = get_sub_field( 'ss_employer_job_cta' );
?>

<section
  id="ss-employer-job"
  class="ss-module-employer-job relative overflow-hidden min-h-[280px] md:min-h-[380px] flex items-center"
>

  <!-- Background image + gradient overlay -->
  <div class="absolute inset-0 pointer-events-none" aria-hidden="true">
    <?php if ( $background_image ) : ?>
      <img
        src="<?php echo esc_url( $background_image['url'] ); ?>"
        alt="<?php echo esc_attr( $background_image['alt'] ); ?>"
        width="<?php echo esc_attr( $background_image['width'] ); ?>"
        height="<?php echo esc_attr( $background_image['height'] ); ?>"
        class="absolute inset-0 w-full h-full object-cover object-right"
      >
    <?php endif; ?>
    <div class="absolute inset-0 bg-gradient-to-r from-navy/90 via-navy/70 to-transparent"></div>
  </div>

  <!-- Content — left-aligned -->
  <div class="relative z-10 container mx-auto px-4 py-12 md:py-16">

    <div class="flex flex-col gap-6 w-full md:w-7/12 lg:w-1/2">

      <div class="flex flex-col gap-3">

        <h2 class="font-heading font-bold text-3xl md:text-4xl lg:text-5xl text-white leading-tight">
          <?php echo esc_html( $section_heading ); ?>
        </h2>

        <?php if ( $section_description ) : ?>
          <p class="font-body font-normal text-md text-white/90 leading-relaxed">
            <?php echo esc_html( $section_description ); ?>
          </p>
        <?php endif; ?>

        <?php if ( $contact_instruction ) : ?>
          <div class="font-body font-normal text-md text-white/90 leading-relaxed [&_p]:text-white/90">
            <?php echo wp_kses_post( $contact_instruction ); ?>
          </div>
        <?php endif; ?>
      </div>

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

  </div>

</section>
