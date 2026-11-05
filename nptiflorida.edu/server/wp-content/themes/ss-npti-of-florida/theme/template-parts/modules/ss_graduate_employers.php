<?php
/**
 * Module: Graduate Employers
 * Template Part: template-parts/modules/ss_graduate_employers.php
 * ACF Flexible Content Layout: ss_graduate_employers
 *
 * Fields:
 *  - ss_graduate_employers_section_intro          (textarea)
 *  - ss_graduate_employers_employer_logos_row_1   (repeater)
 *      - ss_graduate_employers_employer_logos_row_1_logo (image)
 *  - ss_graduate_employers_employer_logos_row_2   (repeater)
 *      - ss_graduate_employers_employer_logos_row_2_logo (image)
 *  - ss_graduate_employers_cta                    (link)
 */

$section_intro = get_sub_field( 'ss_graduate_employers_section_intro' );
$cta           = get_sub_field( 'ss_graduate_employers_cta' );

if ( ! $section_intro && ! have_rows( 'ss_graduate_employers_employer_logos_row_1' ) ) return;
?>

<section
  id="ss-graduate-employers"
  class="ss-module-graduate-employers bg-white py-10 md:py-16 lg:py-20"
>
  <div class="container mx-auto px-4">

    <!-- Intro text -->
    <?php if ( $section_intro ) : ?>
      <strong class="block font-heading font-semibold text-xl text-navy text-center leading-snug max-w-3xl mx-auto mb-10 md:mb-14">
        <?php echo esc_html( $section_intro ); ?>
      </strong>
    <?php endif; ?>

    <!-- Logo grid — two rows -->
    <div class="flex flex-col gap-8 mb-10 md:mb-14">

      <!-- Row 1 -->
      <?php if ( have_rows( 'ss_graduate_employers_employer_logos_row_1' ) ) : ?>
        <div class="flex flex-wrap items-center justify-center gap-8 md:gap-10 lg:justify-between">
          <?php while ( have_rows( 'ss_graduate_employers_employer_logos_row_1' ) ) : the_row();
            $logo = get_sub_field( 'ss_graduate_employers_employer_logos_row_1_logo' );
          ?>
            <?php if ( $logo ) : ?>
              <div class="h-16 flex items-center">
                <img
                  src="<?php echo esc_url( $logo['url'] ); ?>"
                  alt="<?php echo esc_attr( $logo['alt'] ); ?>"
                  width="<?php echo esc_attr( $logo['width'] ); ?>"
                  height="<?php echo esc_attr( $logo['height'] ); ?>"
                  class="h-full w-auto object-contain"
                >
              </div>
            <?php endif; ?>
          <?php endwhile; ?>
        </div>
      <?php endif; ?>

      <!-- Row 2 -->
      <?php if ( have_rows( 'ss_graduate_employers_employer_logos_row_2' ) ) : ?>
        <div class="flex flex-wrap items-center justify-center gap-8 md:gap-10 lg:justify-between">
          <?php while ( have_rows( 'ss_graduate_employers_employer_logos_row_2' ) ) : the_row();
            $logo = get_sub_field( 'ss_graduate_employers_employer_logos_row_2_logo' );
          ?>
            <?php if ( $logo ) : ?>
              <div class="h-16 flex items-center">
                <img
                  src="<?php echo esc_url( $logo['url'] ); ?>"
                  alt="<?php echo esc_attr( $logo['alt'] ); ?>"
                  width="<?php echo esc_attr( $logo['width'] ); ?>"
                  height="<?php echo esc_attr( $logo['height'] ); ?>"
                  class="h-full w-auto object-contain"
                >
              </div>
            <?php endif; ?>
          <?php endwhile; ?>
        </div>
      <?php endif; ?>

    </div>

    <!-- CTA -->
    <?php if ( $cta ) : ?>
      <div class="flex justify-center">
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
</section>
