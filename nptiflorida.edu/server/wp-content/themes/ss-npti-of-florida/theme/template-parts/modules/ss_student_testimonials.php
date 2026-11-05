<?php

/**
 * Module: Student Testimonials
 * Template Part: template-parts/modules/ss_student_testimonials.php
 * ACF Flexible Content Layout: ss_student_testimonials
 *
 * Fields:
 *  - ss_student_testimonials_section_heading           (text)
 *  - ss_student_testimonials_section_heading_highlight (text)
 *  - ss_student_testimonials_testimonials              (relationship → ss_testimonials)
 *
 * CPT fields (accessed via get_field($field, $post->ID)):
 *  - reviewer_name     (text)
 *  - reviewer_location (text)
 *  - testimonial_text  (textarea)
 *  - star_rating       (number, 1–5)
 */

$section_heading           = get_sub_field('ss_student_testimonials_section_heading');
$section_heading_highlight = get_sub_field('ss_student_testimonials_section_heading_highlight');
$testimonials              = get_sub_field('ss_student_testimonials_testimonials');
?>

<section
  id="ss-student-testimonials"
  class="ss-module-student-testimonials bg-white pad-section">
  <div class="container mx-auto px-4">

  <?php if ( $section_heading || $section_heading_highlight ) : ?>
    <h2 class="text-center mb-6 lg:mb-12">
      <?php echo esc_html($section_heading); ?>
      <?php if ($section_heading_highlight) : ?>
        <span class="text-orange"><?php echo esc_html($section_heading_highlight); ?></span>
      <?php endif; ?>
    </h2>
    <?php endif; ?>

    <?php if ($testimonials) : ?>
      <div class="slider-col-2 arrow-alt max-lg:pb-15 [&_.slick-dots]:!hidden [&_.slick-track]:flex [&_.slick-list]:-mx-3">

        <?php foreach ($testimonials as $post) : setup_postdata($post);
          $reviewer_name     = get_field('reviewer_name',     $post->ID);
          $reviewer_location = get_field('reviewer_location', $post->ID);
          $testimonial_text  = get_field('testimonial_text',  $post->ID);
          $star_rating       = get_field('star_rating',       $post->ID);
        ?>

          <div class="slide-item px-3">
            <div class="bg-white rounded-2xl p-6 border border-smoke shadow-card relative h-full">
                <div class="absolute top-6 right-6 w-[50px] h-[50px] opacity-1 pointer-events-none overflow-hidden">
                  <svg xmlns="http://www.w3.org/2000/svg" width="50" height="38" viewBox="0 0 50 38" fill="none">
                    <path d="M0 0V37.5L18.75 18.75V0H0ZM31.25 0V37.5L50 18.75V0H31.25Z" fill="#FF660070" />
                  </svg>
                </div>
              <div class="col-start-start-8 mb-4">
                <?php if ($reviewer_name) : ?>
                  <p class="font-ui font-semibold text-xl text-navy leading-snug mb-0"><?php echo esc_html($reviewer_name); ?></p>
                <?php endif; ?>
                <?php if ($reviewer_location) : ?>
                  <p class="font-ui text-base text-orange leading-snug"><?php echo esc_html($reviewer_location); ?></p>
                <?php endif; ?>
              </div>

              <?php if ($testimonial_text) : ?>
                <div class="text-base text-navy opacity-80"><?php echo wp_kses_post(wpautop($testimonial_text));?></div>
              <?php endif; ?>

              <?php if ($star_rating) : ?>
                <div class="row-start-center gap-1 mt-4">
                  <?php for ($i = 0; $i < (int) $star_rating; $i++) : ?>
                    <i class="icon-star text-yellow" aria-hidden="true"></i>
                  <?php endfor; ?>
                </div>
              <?php endif; ?>

              <div class="absolute bottom-0 right-5 w-[55%] h-[3px]">
                <svg xmlns="http://www.w3.org/2000/svg" width="345" height="3" viewBox="0 0 345 3" fill="none">
                  <path d="M8.71212 0H345V3H0L8.71212 0Z" fill="#FF6600" />
                </svg>
              </div>

            </div>
          </div>

        <?php endforeach;
        wp_reset_postdata(); ?>

      </div>
    <?php endif; ?>

  </div>
</section>