<?php
/**
 * Module: NPTI Florida
 * Template Part: template-parts/modules/ss_npti_florida.php
 * ACF Flexible Content Layout: ss_npti_florida
 *
 * Fields:
 *  - ss_npti_florida_section_image   (image)
 *  - ss_npti_florida_block_1_heading (text)
 *  - ss_npti_florida_block_1_body    (textarea)
 *  - ss_npti_florida_block_2_heading (text)
 *  - ss_npti_florida_block_2_body    (textarea)
 *  - ss_npti_florida_cta_link        (link)
 */

$section_image   = get_sub_field( 'ss_npti_florida_section_image' );
$block_1_heading = get_sub_field( 'ss_npti_florida_block_1_heading' );
$block_1_body    = get_sub_field( 'ss_npti_florida_block_1_body' );
$block_2_heading = get_sub_field( 'ss_npti_florida_block_2_heading' );
$block_2_body    = get_sub_field( 'ss_npti_florida_block_2_body' );
$cta_link        = get_sub_field( 'ss_npti_florida_cta_link' );

if ( ! $section_image && ! $block_1_heading && ! $block_2_heading ) return;
?>

<section
  id="ss-npti-florida"
  class="ss-module-npti-florida bg-white pad-section"
>
  <div class="container mx-auto px-4">
    <div class="grid grid-cols-1 gap-8 md:grid-cols-2 md:items-center">

      <!-- Left: image -->
      <?php if ( $section_image ) : ?>
        <div class="rounded-lg overflow-hidden">
          <img
            src="<?php echo esc_url( $section_image['url'] ); ?>"
            alt="<?php echo esc_attr( $section_image['alt'] ); ?>"
            width="<?php echo esc_attr( $section_image['width'] ); ?>"
            height="<?php echo esc_attr( $section_image['height'] ); ?>"
            class="w-full h-full object-cover rounded-lg"
          >
        </div>
      <?php endif; ?>

      <!-- Right: text blocks + CTA -->
      <div class="col-start-start-16 !gap-0">

        <?php if ( $block_1_heading ) : ?>
          <h3 class="font-heading font-bold text-xl text-navy leading-snug"><?php echo esc_html( $block_1_heading ); ?></h3>
        <?php endif; ?>

        <?php if ( $block_1_body ) : ?>
          <div><?php echo wp_kses_post( $block_1_body ); ?></div>
        <?php endif; ?>

        <?php if ( $block_2_heading ) : ?>
          <h3 class="font-heading font-bold text-xl text-navy leading-snug mt-5"><?php echo esc_html( $block_2_heading ); ?></h3>
        <?php endif; ?>

        <?php if ( $block_2_body ) : ?>
          <div><?php echo wp_kses_post( $block_2_body ); ?></div>
        <?php endif; ?>

        <?php if ( $cta_link ) : ?>
          <a
            href="<?php echo esc_url( $cta_link['url'] ); ?>"
            class="btn-primary btn-primary:hover self-start mt-4"
            <?php if ( $cta_link['target'] ) : ?>target="<?php echo esc_attr( $cta_link['target'] ); ?>"<?php endif; ?>
          >
            <?php echo esc_html( $cta_link['title'] ); ?>
          </a>
        <?php endif; ?>

      </div>

    </div>
  </div>
</section>
