<?php

/**
 * Module: Youth Fitness Certifications
 * Template Part: template-parts/modules/ss_youth_fitness_certifications.php
 * ACF Flexible Content Layout: ss_youth_fitness_certifications
 *
 * Fields:
 *  - ss_youth_fitness_certifications_alignment (select)
 *  - ss_youth_fitness_certifications_howto_image (image)
 *  - ss_youth_fitness_certifications_howto_heading (text)
 *  - ss_youth_fitness_certifications_howto_steps (repeater)
 *      - ss_youth_fitness_certifications_howto_steps_step_label (text)
 *      - ss_youth_fitness_certifications_howto_steps_step_body (wysiwyg)
 *  - ss_youth_fitness_certifications_howto_cta_label (text)
 *  - ss_youth_fitness_certifications_howto_cta_link (link)
 */


// $howto_image  = get_sub_field('ss_youth_fitness_certifications_howto_image');

// if (! $howto_heading) return;

// $card_position_class = ($alignment === 'left') ? 'lg:ml-10' : 'lg:ml-auto';
?>

<?php if (have_rows('ss_youth_fitness_certifications_howto_steps')) : ?>
      <?php while (have_rows('ss_youth_fitness_certifications_howto_steps')) : the_row(); ?>
        <?php
        $step_label = get_sub_field('ss_youth_fitness_certifications_howto_steps_step_label');
        $step_body  = get_sub_field('ss_youth_fitness_certifications_howto_steps_step_body');
        $alignment    = get_sub_field('ss_youth_fitness_certifications_alignment');
        $howto_image  = get_sub_field('ss_youth_fitness_certifications_howto_image');
        $howto_heading = get_sub_field('ss_youth_fitness_certifications_howto_heading');
        $cta_link     = get_sub_field('ss_youth_fitness_certifications_howto_cta_link');

        if (! $howto_heading) return;

        $card_position_class = ($alignment === 'left') ? 'lg:ml-10' : 'lg:ml-auto';
        ?>
  <section
    id="ss-youth-fitness-certifications"
    class="ss-module-youth-fitness-certifications">
    <div class="container mx-auto px-4">
        <div class="relative overflow-hidden rounded mb-4" style="background: #000000 url('<?php echo esc_url($howto_image['url']); ?>') no-repeat center; background-size: cover;">

          <!-- White card: stacked on mobile, left-side or right-side overlay on desktop -->
          <div class="lg:bg-white bg-white/80 p-4 flex flex-col m-4 lg:ml-auto lg:w-[55%] rounded-lg lg:p-6 lg:justify-center <?php echo esc_attr($card_position_class); ?>">

            <div class="flex flex-col gap-3">

              <?php if ($howto_heading) : ?>
                <h2 class="font-heading font-bold text-xl leading-snug text-navy">
                  <?php echo esc_html($howto_heading); ?>
                </h2>
              <?php endif; ?>


              <div class="flex flex-col">
                  <?php echo wp_kses_post($step_body); ?>
              </div>

              <?php if ($cta_link) : ?>
                <div>
                  <a
                    href="<?php echo esc_url($cta_link['url']); ?>"
                    class="btn-secondary"
                    <?php if (! empty($cta_link['target'])) : ?>
                    target="<?php echo esc_attr($cta_link['target']); ?>"
                    <?php endif; ?>>
                    <?php echo esc_html($cta_link['title']); ?>
                  </a>
                </div>
              <?php endif; ?>

            </div>

          </div>
        </div>

    </div>
  </section>

        <?php endwhile; ?>
<?php endif; ?>