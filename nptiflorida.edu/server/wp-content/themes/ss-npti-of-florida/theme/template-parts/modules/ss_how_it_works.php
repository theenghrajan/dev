<?php
/**
 * Module: How It Works
 * Template Part: template-parts/modules/ss_how_it_works.php
 * ACF Flexible Content Layout: ss_how_it_works
 *
 * Fields:
 *  - ss_how_it_works_bg_pattern              (image)
 *  - ss_how_it_works_section_heading         (text)
 *  - ss_how_it_works_section_heading_highlight (text)
 *  - ss_how_it_works_section_subtext         (text)
 *  - ss_how_it_works_steps                   (repeater)
 *    - ss_how_it_works_steps_step_number      (number)
 *    - ss_how_it_works_steps_step_title       (text)
 *    - ss_how_it_works_steps_step_description (textarea)
 *  - ss_how_it_works_cta                     (link)
 */

$bg_pattern = get_sub_field('ss_how_it_works_bg_pattern');
$section_heading = get_sub_field('ss_how_it_works_section_heading');
$section_heading_highlight = get_sub_field('ss_how_it_works_section_heading_highlight');
$section_subtext = get_sub_field('ss_how_it_works_section_subtext');
$cta = get_sub_field('ss_how_it_works_cta');

if (!$section_heading)
  return;
?>

<section id="ss-how-it-works" class="ss-module-how-it-works bg-light-blue pad-section relative z-[1] overflow-hidden">
  <?php if ($bg_pattern): ?>
    <div class="absolute inset-0 -z-[1] pointer-events-none opacity-80">
      <img src="<?php echo esc_url($bg_pattern['url']); ?>" alt="" aria-hidden="true" class="w-full h-full object-contain object-right-bottom">
    </div>
  <?php endif; ?>

  <div class="container mx-auto px-4 relative">
    <div class="col-center-center-16 text-center">

      <?php if (!empty($section_heading) || !empty($section_subtext)): ?>
        <header class="mb-6 2xl:mb-10">
          <h2 class="text-center">
            <?php echo esc_html($section_heading); ?>
            <?php if ($section_heading_highlight): ?>
              <span class="text-orange"><?php echo esc_html($section_heading_highlight); ?></span>
            <?php endif; ?>
          </h2>
          <?php if ($section_subtext): ?>
            <p class="text-center max-w-prose mx-auto">
              <?php echo esc_html($section_subtext); ?>
            </p>
          <?php endif; ?>
        </header>
      <?php endif; ?>

      <?php if ( have_rows( 'ss_how_it_works_steps' ) ) : ?>
        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-4 w-full">

          <?php while (have_rows('ss_how_it_works_steps')):
            the_row();
            $step_number = get_sub_field('ss_how_it_works_steps_step_number');
            $step_title = get_sub_field('ss_how_it_works_steps_step_title');
            $step_description = get_sub_field('ss_how_it_works_steps_step_description');
            ?>
            <article class="bg-light-blue border border-blue/20 rounded-lg p-6 flex flex-col gap-6 items-start text-left">
              <div
                class="relative shrink-0 w-[100px] h-[100px] rounded-full text-center bg-blue flex justify-center items-center">
                <?php if ($step_number): ?>
                  <span
                    class="absolute inset-0 flex items-center justify-center font-heading font-bold text-3xl text-blue leading-none [-webkit-text-stroke:1px_white]"><?php echo esc_html($step_number); ?></span>
                <?php endif; ?>
              </div>
              <div class="flex flex-col gap-3">
                <?php if ($step_title): ?>
                  <h3 class="font-heading font-bold text-xl text-navy leading-snug"><?php echo esc_html($step_title); ?>
                  </h3>
                <?php endif; ?>
                <?php if ($step_description): ?>
                  <p class="text-sm 2xl:text-md text-navy"><?php echo wp_kses_post($step_description); ?></p>
                <?php endif; ?>
              </div>
            </article>
          <?php endwhile; ?>

        </div>
      <?php endif; ?>

      <?php if ( $cta ) : ?>
        <div class="mt-6 2xl:mt-10">
          <a
            href="<?php echo esc_url( $cta['url'] ); ?>"
            <?php if ( $cta['target'] ) echo 'target="' . esc_attr( $cta['target'] ) . '"'; ?>
            class="btn-primary btn-primary:hover"
          >
            <?php echo esc_html( $cta['title'] ); ?>
          </a>
        </div>
      <?php endif; ?>

    </div>
  </div>
</section>