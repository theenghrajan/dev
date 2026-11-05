<?php

/**
 * Module: Our Programs
 * Template Part: template-parts/modules/ss_our_programs.php
 * ACF Flexible Content Layout: ss_our_programs
 *
 * Fields:
 *  - ss_our_programs_section_heading           (text)
 *  - ss_our_programs_section_heading_highlight (text)
 *  - ss_our_programs_section_subtext           (textarea)
 *  - ss_our_programs_group_label               (text)
 *  - ss_our_programs_programs                  (relationship → ss_programs)
 *  - ss_our_programs_program_cta_label         (text)
 *
 * CPT fields accessed via get_field( $name, $post->ID ):
 *  - program_image             (image)
 *  - program_track_label       (text)
 *  - program_short_description (textarea)
 *  - program_card_style        (select: default | featured)
 */

$section_heading           = get_sub_field('ss_our_programs_section_heading');
$section_heading_highlight = get_sub_field('ss_our_programs_section_heading_highlight');
$section_subtext           = get_sub_field('ss_our_programs_section_subtext');
$group_label               = get_sub_field('ss_our_programs_group_label');
$programs                  = get_sub_field('ss_our_programs_programs');
$program_cta_label         = get_sub_field('ss_our_programs_program_cta_label');

if (! $section_heading) return;
?>

<section
  id="ss-our-programs"
  class="ss-module-our-programs bg-blue-08 pad-section">
  <div class="container mx-auto px-4">
    <div class="col-center-center-16 text-center">

      <h2 class="text-center">
        <?php echo esc_html($section_heading); ?>
        <?php if ($section_heading_highlight) : ?>
          <span class="text-orange"><?php echo esc_html($section_heading_highlight); ?></span>
        <?php endif; ?>
      </h2>

      <?php if ($section_subtext) : ?>
        <div class="text-center max-w-prose mx-auto mb-4 xl:mb-8">
          <?php echo wp_kses_post($section_subtext); ?>
        </div>
      <?php endif; ?>

      <?php if ($group_label) : ?>
        <h3 class="text-navy w-full text-center mb-4 xl:mb-8">
          <?php echo esc_html($group_label); ?>
        </h3>
      <?php endif; ?>

      <?php if ($programs) : ?>
        <div class="grid grid-cols-1 gap-5 lg:grid-cols-3 w-full">

          <?php foreach ($programs as $post) : setup_postdata($post);
            $program_image             = get_field('program_image',             $post->ID);
            $program_track_label       = get_field('program_track_label',       $post->ID);
            $program_short_description = get_field('program_short_description', $post->ID);
            $program_card_style        = get_field('program_card_style',        $post->ID);
            $is_featured               = ($program_card_style === 'featured');
          ?>

            <?php if ($is_featured) : ?>
              <article class="rounded-xl shadow-card flex flex-col" style="background: linear-gradient(161deg, rgb(90,148,224) 0%, rgb(4,76,171) 91%);">
              <?php else : ?>
                <article class="bg-white group hover:bg-[linear-gradient(167deg,_#5A94E0_-0.86%,_#044CAB_91.01%)] p-6 rounded-xl shadow-card flex flex-col">
                <?php endif; ?>

                <?php if ($program_image) : ?>
                  <div class="rounded-t-xl overflow-hidden">
                    <img
                      src="<?php echo esc_url($program_image['url']); ?>"
                      alt="<?php echo esc_attr($program_image['alt']); ?>"
                      class="w-full h-[260px] object-cover">
                  </div>
                <?php endif; ?>

                <?php if ($program_track_label) : ?>
                  <div class="flex justify-center -mt-5 relative z-10">
                    <?php if ($is_featured) : ?>
                      <span class="font-ui font-semibold text-sm text-orange capitalize px-4 py-2 rounded-pill border border-orange/40 bg-peach whitespace-nowrap ">
                        <?php echo esc_html($program_track_label); ?>
                      </span>
                    <?php else : ?>
                      <span
                        class="font-ui font-semibold text-sm text-white capitalize px-4 py-2 rounded-pill border border-white/40 whitespace-nowrap bg-[linear-gradient(167deg,#5A94E0_-0.86%,#044CAB_91.01%)] group-hover:text-[#ff6400] group-hover:bg-none group-hover:bg-peach group-hover:border-[#ff6400]/40">
                        <?php echo esc_html($program_track_label); ?>
                      </span>
                    <?php endif; ?>
                  </div>
                <?php endif; ?>

                <div class="flex flex-col flex-1 items-center gap-3 pt-3 text-center">

                  <h3 class="font-heading font-bold text-xl <?php echo $is_featured ? 'text-white' : 'text-navy'; ?> leading-snug w-full group-hover:text-white">
                    <?php echo esc_html(get_the_title($post->ID)); ?>
                  </h3>

                  <?php if ($program_short_description) : ?>
                    <div class="text-sm group-hover:text-white <?php echo $is_featured ? 'text-white' : 'text-navy'; ?> flex-1">
                      <?php echo wp_kses_post($program_short_description); ?>
                    </div>
                  <?php endif; ?>

                  <?php if ($program_cta_label) : ?>
                    <a href="<?php echo esc_url(get_permalink($post->ID)); ?>" class="<?php echo $is_featured ? 'btn-primary btn-primary:hover' : 'btn-secondary btn-secondary:hover'; ?> w-full group-hover:bg-[#ff6400] group-hover:text-white">
                      <?php echo esc_html($program_cta_label); ?>
                    </a>
                  <?php endif; ?>

                </div>

                </article>

              <?php endforeach;
            wp_reset_postdata(); ?>

        </div>
      <?php endif; ?>

    </div>
  </div>
</section>