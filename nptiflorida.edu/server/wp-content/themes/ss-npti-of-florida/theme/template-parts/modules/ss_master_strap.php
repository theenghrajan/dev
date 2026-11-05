<?php
/**
 * Module: Master Strap
 * Template Part: template-parts/modules/ss_master_strap.php
 * ACF Flexible Content Layout: ss_master_strap
 *
 * Fields:
 *  - ss_master_strap_background_image (image)
 *  - ss_master_strap_section_heading  (text)
 *  - ss_master_strap_section_subheading (textarea)
 *  - ss_master_strap_cta_primary      (link)
 *  - ss_master_strap_cta_secondary    (link)
 */

$background_image = get_sub_field( 'ss_master_strap_background_image' );
$section_heading  = get_sub_field( 'ss_master_strap_section_heading' );

$section_subheading = get_sub_field( 'ss_master_strap_section_subheading' );
$cta_primary        = get_sub_field( 'ss_master_strap_cta_primary' );
$cta_secondary      = get_sub_field( 'ss_master_strap_cta_secondary' );
$ss_image_alignment      = get_sub_field( 'ss_image_alignment' );
?>

<section
  id="ss-master-strap"
  class="ss-module-master-strap relative z-[1] overflow-hidden min-h-[280px] md:min-h-[344px] flex items-center"
>
  <div class="absolute inset-0 -z-[1] <?php echo $ss_image_alignment === 'right' ? 'bg-gradient-to-l' : 'bg-gradient-to-r'; ?> from-blue via-blue/70 to-80% to-transparent"></div>

  <div class="absolute inset-0 -z-[2] pointer-events-none" aria-hidden="true">
    <?php if ( $background_image ) : ?>
      <img
        src="<?php echo esc_url( $background_image['url'] ); ?>"
        alt="<?php echo esc_attr( $background_image['alt'] ); ?>"
        width="<?php echo esc_attr( $background_image['width'] ); ?>"
        height="<?php echo esc_attr( $background_image['height'] ); ?>"
        class="absolute inset-0 -z-[2] w-full h-full object-cover object-center"
      >
    <?php endif; ?>
  </div>

  <div class="relative z-10 container mx-auto px-4 py-12 md:py-16 flex justify-center after:absolute after:inset-0 after:-z-[1]  after:from-blue after:to-95% after:to-transparent <?php echo $ss_image_alignment === 'right' ? "md:justify-end after:-left-[999px] after:bg-gradient-to-r" : "md:justify-start after:-right-[999px] after:bg-gradient-to-l" ?></div>">

    <div class="flex flex-col gap-6 text-center md:text-left w-full md:w-7/12 lg:w-5/12">

      <div class="flex flex-col gap-3">

        <h2 class="font-heading font-bold text-3xl md:text-4xl lg:text-5xl text-white leading-tight">
          <?php echo esc_html( $section_heading ); ?>
        </h2>

        <?php if ( $section_subheading ) : ?>
          <p class="font-body font-normal text-md text-white/90 leading-relaxed">
            <?php echo esc_html( $section_subheading ); ?>
          </p>
        <?php endif; ?>

      </div>

      <?php if ( $cta_primary || $cta_secondary ) : ?>
        <div class="relative flex flex-col sm:flex-row items-center gap-4 justify-center md:justify-start ">
          <?php if ( $cta_primary ) : ?>
            <a
              href="<?php echo esc_url( $cta_primary['url'] ); ?>"
              <?php if ( $cta_primary['target'] ) : ?>target="<?php echo esc_attr( $cta_primary['target'] ); ?>"<?php endif; ?>
              class="inline-flex items-center justify-center bg-orange hover:bg-orange/90 text-white hover:text-white font-body font-bold text-sm uppercase rounded-4xl px-9 py-3 transition-colors"
            >
              <?php echo esc_html( $cta_primary['title'] ); ?>
            </a>
          <?php endif; ?>

          <?php if ( $cta_secondary ) : ?>
            <a
              href="<?php echo esc_url( $cta_secondary['url'] ); ?>"
              <?php if ( $cta_secondary['target'] ) : ?>target="<?php echo esc_attr( $cta_secondary['target'] ); ?>"<?php endif; ?>
              class="inline-flex items-center justify-center bg-white hover:bg-orange/10 text-orange font-body font-bold text-sm uppercase rounded-4xl px-9 py-3 border-1.5 border-orange transition-colors"
            >
              <?php echo esc_html( $cta_secondary['title'] ); ?>
            </a>
          <?php endif; ?>

        </div>
      <?php endif; ?>

    </div>

  </div>

</section>
