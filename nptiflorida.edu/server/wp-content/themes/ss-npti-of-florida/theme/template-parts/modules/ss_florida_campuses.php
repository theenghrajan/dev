<?php
/**
 * Module: Florida Campuses
 * Template Part: template-parts/modules/ss_florida_campuses.php
 * ACF Flexible Content Layout: ss_florida_campuses
 *
 * Fields:
 *  - ss_florida_campuses_section_heading           (text)
 *  - ss_florida_campuses_section_heading_highlight (text)
 *  - ss_florida_campuses_section_subtext           (text)
 *  - ss_florida_campuses_campuses                  (repeater)
 *    - ss_florida_campuses_campuses_campus_image       (image)
 *    - ss_florida_campuses_campuses_campus_name        (text)
 *    - ss_florida_campuses_campuses_campus_description (textarea)
 *    - ss_florida_campuses_campuses_campus_address     (text)
 *    - ss_florida_campuses_campuses_campus_email       (text)
 *    - ss_florida_campuses_campuses_campus_phone       (text)
 *    - ss_florida_campuses_campuses_campus_cta         (link)
 *    - ss_florida_campuses_campuses_campus_cta_icon    (select)
 *  - ss_florida_campuses_bottom_cta                (link)
 */

$section_heading           = get_sub_field( 'ss_florida_campuses_section_heading' );
$section_heading_highlight = get_sub_field( 'ss_florida_campuses_section_heading_highlight' );
$section_subtext           = get_sub_field( 'ss_florida_campuses_section_subtext' );
$bottom_cta                = get_sub_field( 'ss_florida_campuses_bottom_cta' );

if ( ! $section_heading ) return;
?>

<section
  id="ss-florida-campuses"
  class="ss-module-florida-campuses bg-white pad-section"
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

      <?php if ( have_rows( 'ss_florida_campuses_campuses' ) ) : ?>
        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 w-full max-w-4xl mx-auto text-left">

          <?php while ( have_rows( 'ss_florida_campuses_campuses' ) ) : the_row();
            $campus_image       = get_sub_field( 'ss_florida_campuses_campuses_campus_image' );
            $campus_name        = get_sub_field( 'ss_florida_campuses_campuses_campus_name' );
            $campus_description = get_sub_field( 'ss_florida_campuses_campuses_campus_description' );
            $campus_address     = get_sub_field( 'ss_florida_campuses_campuses_campus_address' );
            $campus_email       = get_sub_field( 'ss_florida_campuses_campuses_campus_email' );
            $campus_phone       = get_sub_field( 'ss_florida_campuses_campuses_campus_phone' );
            $campus_cta         = get_sub_field( 'ss_florida_campuses_campuses_campus_cta' );
            $campus_cta_icon    = get_sub_field( 'ss_florida_campuses_campuses_campus_cta_icon' );
          ?>

            <article class="bg-blue-08 rounded-lg p-4 col-start-start-16 !gap-0">

              <?php if ( $campus_image ) : ?>
                <div class="rounded-lg overflow-hidden mb-6 w-full h-[260px]">
                  <img
                    src="<?php echo esc_url( $campus_image['url'] ); ?>"
                    alt="<?php echo esc_attr( $campus_image['alt'] ); ?>"
                    class="w-full h-full object-cover bg-center rounded-lg"
                  >
                </div>
              <?php endif; ?>

              <?php if ( $campus_name ) : ?>
                <h3 class="text-lg text-navy leading-snug"><?php echo esc_html( $campus_name ); ?></h3>
              <?php endif; ?>

              <?php if ( $campus_description ) : ?>
                <p class="text-sm text-navy">
                  <?php echo wp_kses_post( $campus_description ); ?>
                </p>
              <?php endif; ?>

              <div class="col-start-start-8 gap-3 mt-2">

                <?php if ( $campus_address ) : ?>
                  <div class="row-start-center gap-2">
                    <div class="relative shrink-0 w-6 h-6 text-[12px] bg-white text-blue rounded-full flex justify-center items-center">
                      <i class="icon-pin w-[12px] h-[12px]"></i>
                    </div>
                    <p class="font-semibold text-xs text-navy leading-snug mb-0"><?php echo esc_html( $campus_address ); ?></p>
                  </div>
                <?php endif; ?>

                <?php if ( $campus_email ) : ?>
                  <div class="row-start-center gap-2">
                    <div class="relative shrink-0 w-6 h-6 text-[12px] bg-white text-blue rounded-full flex justify-center items-center">
                      <i class="icon-mail w-[12px] h-[12px]"></i>
                    </div>
                    <a href="mailto:<?php echo esc_attr( $campus_email ); ?>" class="font-semibold text-xs text-navy no-underline hover:text-orange transition-fast"><?php echo esc_html( $campus_email ); ?></a>
                  </div>
                <?php endif; ?>

                <?php if ( $campus_phone ) : ?>
                  <div class="row-start-center gap-2">
                    <div class="relative shrink-0 w-6 h-6 text-[12px] bg-white text-blue rounded-full flex justify-center items-center">
                      <i class="icon-call w-[12px] h-[12px]"></i>
                    </div>
                    <a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9]/', '', $campus_phone ) ); ?>" class="font-semibold text-xs text-navy no-underline hover:text-orange transition-fast"><?php echo esc_html( $campus_phone ); ?></a>
                  </div>
                <?php endif; ?>

              </div>

              <?php if ( $campus_cta ) : ?>
                <a href="<?php echo esc_url( $campus_cta['url'] ); ?>"<?php if ( $campus_cta['target'] ) echo ' target="' . esc_attr( $campus_cta['target'] ) . '"'; ?> class="row-start-center gap-2 text-orange font-bold text-sm uppercase no-underline transition-fast hover:text-orange/80 mt-4">
                  <?php echo esc_html( $campus_cta['title'] ); ?>
                  <?php if ( $campus_cta_icon ) : ?>
                    <i class="<?php echo esc_attr( $campus_cta_icon ); ?>" aria-hidden="true"></i>
                  <?php endif; ?>
                </a>
              <?php endif; ?>

            </article>

          <?php endwhile; ?>

        </div>
      <?php endif; ?>

      <?php if ( $bottom_cta ) : ?>
        <a href="<?php echo esc_url( $bottom_cta['url'] ); ?>"<?php if ( $bottom_cta['target'] ) echo ' target="' . esc_attr( $bottom_cta['target'] ) . '"'; ?> class="btn mt-10 btn-secondary">
          <?php echo esc_html( $bottom_cta['title'] ); ?>
        </a>
      <?php endif; ?>

    </div>
  </div>
</section>
