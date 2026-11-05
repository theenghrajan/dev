<?php
/**
 * Module: Future Today
 * Template Part: template-parts/modules/ss_future_today.php
 * ACF Flexible Content Layout: ss_future_today
 *
 * Fields:
 *  - ss_future_today_section_heading (text)
 *  - ss_future_today_section_body (textarea)
 *  - ss_future_today_subheading (text)
 *  - ss_future_today_subtext (text)
 *  - ss_future_today_cta_link (link)
 *  - ss_future_today_section_image (image)
 */

$section_heading = get_sub_field( 'ss_future_today_section_heading' );
$section_body    = get_sub_field( 'ss_future_today_section_body' );
$subheading      = get_sub_field( 'ss_future_today_subheading' );
$subtext         = get_sub_field( 'ss_future_today_subtext' );
$cta_link        = get_sub_field( 'ss_future_today_cta_link' );
$section_image   = get_sub_field( 'ss_future_today_section_image' );
$image_alignment   = get_sub_field( 'ss_image_alignment' );
$bg_gradient = get_sub_field('ss_bg_gradient'); 


$image_class = '';

if ($image_alignment === 'left') {  
    $image_class = 'left-0 right-auto';
} elseif ($image_alignment === 'right') {
    $image_class = 'right-0 left-auto';
}

if ( ! $section_heading ) return;
?>

<section
  id="ss-future-today"
  class="ss-module-future-today min-h-[544px] relative z-[2] flex flex-col justify-center  pad-section !pb-0 <?php echo $bg_gradient ? 'after:absolute after:-z-[3] after:inset-0 after:bg-[linear-gradient(94deg,_#172A36_17.89%,_#044CAB_190.38%)]' : 'bg-navy'; ?>"
>
  <div class="max-2xl:before:absolute before:-z-[1] before:inset-0 before:bg-navy/80">
    <div class="container mx-auto px-4">
        <!-- Left: content -->
        <div class="max-w-[40rem] max-sm:mx-auto max-sm:text-center pb-8 <?php echo $image_alignment === 'left' ? 'ml-auto' : 'mr-auto'; ?>">
            <?php if ( $section_heading ) : ?>
              <h2 class="text-white"><?php echo esc_html( $section_heading ); ?></h2>
            <?php endif; ?>
            <?php if ( $section_body ) : ?>
              <div class="[&_p]:text-white"><?php echo wp_kses_post($section_body); ?></div>
            <?php endif; ?>
            <?php if ( $subheading || $subtext ) : ?>
              <div>
                <?php if ( $subheading ) : ?>
                  <p class="font-body font-semibold text-lg text-white leading-relaxed"><?php echo esc_html( $subheading ); ?></p>
                <?php endif; ?>
                <?php if ( $subtext ) : ?>
                  <p class="text-white"><?php echo esc_html( $subtext ); ?></p>
                <?php endif; ?>
              </div>
            <?php endif; ?>
            <?php if ( $cta_link ) : ?>
              <a
                href="<?php echo esc_url( $cta_link['url'] ); ?>"
                class="btn-primary btn-primary:hover self-start mt-4 xl:mt-5"
                <?php if ( $cta_link['target'] ) : ?>target="<?php echo esc_attr( $cta_link['target'] ); ?>"<?php endif; ?>
              >
                <?php echo esc_html( $cta_link['title'] ); ?>
              </a>
            <?php endif; ?>
        </div>
    </div>
    <!-- Right: image -->
      <?php if ( $section_image ) : ?>
        <div class="overflow-hidden absolute -z-[2] top-0 bottom-0 max-w-[60rem] 2xl:-mt-10 <?php echo $image_class; ?>">
          <img
            src="<?php echo esc_url( $section_image['url'] ); ?>"
            alt="<?php echo esc_attr( $section_image['alt'] ); ?>"
            width="<?php echo esc_attr( $section_image['width'] ); ?>"
            height="<?php echo esc_attr( $section_image['height'] ); ?>"
            class="w-full h-full object-cover object-top rounded-lg"
          >
        </div>
      <?php endif; ?>
  </div>
</section>
