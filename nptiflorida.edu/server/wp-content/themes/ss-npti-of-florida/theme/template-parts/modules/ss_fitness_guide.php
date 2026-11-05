<?php
/**
 * Module: Fitness Guide
 * Template Part: template-parts/modules/ss_fitness_guide.php
 * ACF Flexible Content Layout: ss_fitness_guide
 *
 * Fields:
 *  - ss_fitness_guide_decorative_bg_image (image)
 *  - ss_fitness_guide_book_image (image)
 *  - ss_fitness_guide_section_heading (text)
 *  - ss_fitness_guide_section_body (textarea)
 *  - ss_fitness_guide_bonus_text (text)
 *  - ss_fitness_guide_cta_link (link)
 */

$decorative_bg_image = get_sub_field( 'ss_fitness_guide_decorative_bg_image' );
$book_image          = get_sub_field( 'ss_fitness_guide_book_image' );
$section_heading     = get_sub_field( 'ss_fitness_guide_section_heading' );
$section_body        = get_sub_field( 'ss_fitness_guide_section_body' );
$bonus_text          = get_sub_field( 'ss_fitness_guide_bonus_text' );
$cta_link            = get_sub_field( 'ss_fitness_guide_cta_link' );

if ( ! $section_heading ) return;
?>

<section
  id="ss-fitness-guide"
  class="ss-module-fitness-guide bg-blue overflow-hidden"
>
  <div class="container mx-auto px-4 py-10 lg:py-0 flex flex-col lg:flex-row lg:items-center lg:min-h-[440px] gap-8 lg:gap-16">

    <!-- Left col — book image with decorative vector -->
    <div class="relative flex items-end justify-center lg:justify-start lg:w-5/12 lg:self-stretch shrink-0">

      <?php if ( $decorative_bg_image ) : ?>
        <img
          src="<?php echo esc_url( $decorative_bg_image['url'] ); ?>"
          alt=""
          aria-hidden="true"
          class="absolute bottom-0 left-0 w-full h-auto object-contain pointer-events-none"
        >
      <?php endif; ?>

      <?php if ( $book_image ) : ?>
        <img
          src="<?php echo esc_url( $book_image['url'] ); ?>"
          alt="<?php echo esc_attr( $book_image['alt'] ); ?>"
          width="<?php echo esc_attr( $book_image['width'] ); ?>"
          height="<?php echo esc_attr( $book_image['height'] ); ?>"
          class="relative z-10 w-auto max-h-[380px] lg:max-h-[420px] h-auto drop-shadow-xl"
        >
      <?php endif; ?>

    </div>

    <!-- Right col — content -->
    <div class="flex flex-col items-start gap-5 lg:w-7/12 pb-10 lg:pb-0">

      <?php if ( $section_heading ) : ?>
        <h2 class="font-heading font-bold text-2xl text-white leading-tight">
          <?php echo esc_html( $section_heading ); ?>
        </h2>
      <?php endif; ?>

      <?php if ( $section_body ) : ?>
        <div class="font-body font-normal text-md [&_*]:text-white leading-relaxed">
          <?php echo wp_kses_post( $section_body ); ?>
        </div>
      <?php endif; ?>

      <?php if ( $bonus_text ) : ?>
        <p class="font-body text-md text-white/90 leading-relaxed italic">
          <strong class="font-bold not-italic">Bonus:</strong>
          <?php echo esc_html( $bonus_text ); ?>
        </p>
      <?php endif; ?>

      <?php if ( $cta_link ) : ?>
        <a
          href="<?php echo esc_url( $cta_link['url'] ); ?>"
          <?php if ( $cta_link['target'] ) : ?>target="<?php echo esc_attr( $cta_link['target'] ); ?>"<?php endif; ?>
          class="inline-flex items-center justify-center bg-orange hover:bg-orange/90 text-white font-body font-bold text-sm uppercase rounded-4xl px-9 py-2.5 transition-colors mt-2"
        >
          <?php echo esc_html( $cta_link['title'] ); ?>
        </a>
      <?php endif; ?>

    </div>

  </div>
</section>
