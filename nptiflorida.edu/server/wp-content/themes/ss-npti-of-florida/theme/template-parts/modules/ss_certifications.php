<?php
/**
 * Module: Certifications
 * Template Part: template-parts/modules/ss_certifications.php
 * ACF Flexible Content Layout: ss_certifications
 *
 * Fields:
 *  - ss_certifications_section_has_bg         (true/false)
 *  - ss_certifications_section_heading           (text)
 *  - ss_certifications_section_heading_highlight (text)
 *  - ss_certifications_section_subtext           (text)
 *  - ss_certifications_programs                  (relationship → ss_programs)
 *  - ss_certifications_program_cta_label         (text)
 *
 * CPT fields accessed via get_field( $name, $post->ID ):
 *  - program_image             (image)
 *  - program_short_description (textarea)
 *  - program_cta_icon          (select)
 */
$section_has_bg            = get_sub_field( 'ss_certifications_section_has_bg' );    
$section_heading           = get_sub_field( 'ss_certifications_section_heading' );
$section_heading_highlight = get_sub_field( 'ss_certifications_section_heading_highlight' );
$section_subtext           = get_sub_field( 'ss_certifications_section_subtext' );
$programs                  = get_sub_field( 'ss_certifications_programs' );
$program_cta_label         = get_sub_field( 'ss_certifications_program_cta_label' );
$section_class             = get_sub_field( 'ss_certifications_section_class' )?:'grid-cols-2';

$has_bg_class = '';
if ( $section_has_bg ) {
  $has_bg_class = 'bg-light-blue pad-section';
} else {
  $has_bg_class = 'my-16';
}
?>

<section id="ss-certifications" class="ss-module-certifications <?php echo esc_attr( $has_bg_class ); ?>">
  <div class="container mx-auto px-4">
    <div class="col-center-center-16 text-center">

    <?php if (!empty( $section_heading_highlight ) || !empty($section_subtext)) : ?>
       <header class="mb-6 2xl:mb-10 text-center">
        <h2 class="max-lg:[&_br]:hidden">
          <?php echo esc_html( $section_heading ); ?>
          <?php if ( $section_heading_highlight ) : ?>
            <span class="text-orange"><?php echo esc_html( $section_heading_highlight ); ?></span>
          <?php endif; ?>
        </h2>
        <?php if ( $section_subtext ) : ?>
          <p class="max-w-2xl mx-auto">
            <?php echo esc_html( $section_subtext ); ?>
          </p>
        <?php endif; ?>
      </header>
      <?php endif; ?>

      <?php if (have_rows('ss_certifications_programs') ): ?>
        <div class="grid grid-cols-1 gap-6 <?php echo esc_attr( 'md:'.$section_class ); ?> w-full text-left">

          <?php  while( have_rows('ss_certifications_programs') ) : the_row();
            $program_image             = get_sub_field( 'ss_image');
            $program_heading            = get_sub_field( 'ss_heading' );
            $program_short_description = get_sub_field( 'ss_description');
            $program_cta_label       = get_sub_field( 'ss_certifications_program_cta');
          ?>
            <article class="rounded-lg p-4 <?php echo $section_has_bg ? "bg-white" : "bg-light-blue" ?>">

              <?php if ( $program_image ) : ?>
                <div class="rounded-lg overflow-hidden mb-6 w-full">
                  <img
                    src="<?php echo esc_url( $program_image['url'] ); ?>"
                    alt="<?php echo esc_attr( $program_image['alt'] ); ?>"
                    class="w-full h-[260px] md:h-[315px] md:aspect-[378/315] object-cover rounded-lg"
                  >
                </div>
              <?php endif; ?>

              <h3 class="mb-2 font-heading font-bold text-[1.125rem] 2xl:text-[1.25rem] text-navy leading-snug">
                <?php echo $program_heading; ?>
              </h3>

              <?php if ( $program_short_description ) : ?>
                <p class="text-base text-navy">
                  <?php echo esc_html( $program_short_description ); ?>
                </p>
              <?php endif; ?>

              <?php if ( $program_cta_label ) : ?>
                <div class="mt-5 2xl:mt-6">
                  <a
                    href="<?php echo $program_cta_label['target']; ?>"
                    class="row-start-center gap-2 text-orange font-semibold text-base capitalize no-underline transition-fast hover:text-orange/80"
                  >
                    <?php echo $program_cta_label['title']; ?>
                      <i class="icon-arrow-right" aria-hidden="true"></i>
                  </a>
                </div>
              <?php endif; ?>

            </article>
          <?php endwhile; ?>

        </div>
      <?php endif; ?>

    </div>
  </div>
</section>
