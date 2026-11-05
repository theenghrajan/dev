<?php
/**
 * Module: Personal Trainer
 * Template Part: template-parts/modules/ss_personal_trainer.php
 * ACF Flexible Content Layout: ss_personal_trainer
 *
 * Fields:
 *  - ss_personal_trainer_card_heading           (text)
 *  - ss_personal_trainer_card_heading_highlight (text)
 *  - ss_personal_trainer_card_intro             (textarea)
 *  - ss_personal_trainer_roles_left (repeater)
 *    - ss_personal_trainer_roles_left_role_text (textarea)
 *  - ss_personal_trainer_trainer_image          (image)
 *  - ss_personal_trainer_program_info_cta       (link)
 *  - ss_personal_trainer_roles_right (repeater)
 *    - ss_personal_trainer_roles_right_role_text (textarea)
 *  - ss_personal_trainer_section_2_heading      (text)
 *  - ss_personal_trainer_section_2_body         (textarea)
 *  - ss_personal_trainer_section_3_heading      (text)
 *  - ss_personal_trainer_section_3_body         (textarea)
 *  - ss_personal_trainer_apply_cta              (link)
 */

$card_heading = get_sub_field('ss_personal_trainer_card_heading');
$card_heading_highlight = get_sub_field('ss_personal_trainer_card_heading_highlight');
$card_intro = get_sub_field('ss_personal_trainer_card_intro');
$trainer_image = get_sub_field('ss_personal_trainer_trainer_image');
$program_info_cta = get_sub_field('ss_personal_trainer_program_info_cta');
$section_2_heading = get_sub_field('ss_personal_trainer_section_2_heading');
$section_2_body = get_sub_field('ss_personal_trainer_section_2_body');
$section_3_heading = get_sub_field('ss_personal_trainer_section_3_heading');
$section_3_body = get_sub_field('ss_personal_trainer_section_3_body');
$apply_cta = get_sub_field('ss_personal_trainer_apply_cta');

if (!$card_heading)
  return;
?>

<section id="ss-personal-trainer" class="ss-module-personal-trainer bg-blue-08 pad-section">
  <div class="container mx-auto px-4">
    <div class="col-start-start-16 xl:!gap-15">

      <!-- White card — Role of a Professional Personal Trainer -->
      <div class="bg-white rounded-2xl px-8 pt-8 pb-0 md:px-10 md:pt-10 col-start-start-8 w-full">

        <h3 class="text-center w-full">
          <?php echo esc_html($card_heading); ?>
          <?php if ($card_heading_highlight): ?>
            <span class="text-orange"><?php echo esc_html($card_heading_highlight); ?></span>
          <?php endif; ?>
        </h3>

        <?php if ($card_intro): ?>
          <p class="text-center text-sm max-w-4xl mx-auto">
            <?php echo wp_kses_post($card_intro); ?>
          </p>
        <?php endif; ?>

        <!-- 3-column layout: left cards | center image | right cards -->
        <div class="flex flex-col gap-8 lg:flex-row lg:items-center lg:gap-6 w-full">

          <!-- Left role cards -->
          <div class="col-start-start-16 lg:w-[calc(50%-170px)] xl:[&>div:nth-child(odd)]:ml-12">
            <?php if (have_rows('ss_personal_trainer_roles_left')): ?>
              <?php while (have_rows('ss_personal_trainer_roles_left')):
                the_row();
                $role_text = get_sub_field('ss_personal_trainer_roles_left_role_text');
                ?>
                <div class="bg-white border-l-accent rounded-lg shadow-float p-4 lg:max-w-[280px] mb-4 xl:mb-16">
                  <?php if ($role_text): ?>
                    <p class="text-sm leading-relaxed"><?php echo wp_kses_post($role_text); ?></p>
                  <?php endif; ?>
                </div>
              <?php endwhile; ?>
            <?php endif; ?>
          </div>

          <!-- Center image block -->
          <div
            class="flex flex-col items-center shrink-0 mx-auto lg:mx-0 w-full lg:w-1/4 overflow-hidden h-[477px] lg:h-[640px] justify-end">
            <div class="w-full relative bottom-[-105px]">
              <!-- Blue rounded-top background block -->
              <div class="bg-blue rounded-t-[20px] w-full h-[30rem] lg:h-[20rem] xl:h-[30rem]"></div>
              <!-- Trainer cut-out image overlaid -->
              <?php if ($trainer_image): ?>
                <img src="<?php echo esc_url($trainer_image['url']); ?>"
                  alt="<?php echo esc_attr($trainer_image['alt']); ?>"
                  width="<?php echo esc_attr($trainer_image['width']); ?>"
                  height="<?php echo esc_attr($trainer_image['height']); ?>"
                  class="absolute top-0 lg:top-auto lg:bottom-0 left-0 lg:pl-4 lg:pr-4 xl:max-w-[290px] h-auto object-cover">
              <?php endif; ?>
            </div>
            <?php if ($program_info_cta): ?>
              <a href="<?php echo esc_url($program_info_cta['url']); ?>" <?php if ($program_info_cta['target'])
                   echo ' target="' . esc_attr($program_info_cta['target']) . '"'; ?>
                class="btn btn-secondary mt-4 justify-center z-10 mb-10 w-10/12 !px-3 text-center">
                <?php echo esc_html($program_info_cta['title']); ?>
              </a>
            <?php endif; ?>
          </div>

          <!-- Right role cards -->
          <div
            class="col-start-start-16 lg:w-[calc(50%-170px)] xl:[&>div:nth-child(even)]:ml-24 xl:[&>div:first-child]:ml-14">
            <?php if (have_rows('ss_personal_trainer_roles_right')): ?>
              <?php while (have_rows('ss_personal_trainer_roles_right')):
                the_row();
                $role_text = get_sub_field('ss_personal_trainer_roles_right_role_text');
                ?>
                <div class="bg-white border-l-accent rounded-lg shadow-float p-4 xl:ml-5 lg:max-w-[280px] mb-4 xl:mb-16">
                  <?php if ($role_text): ?>
                    <p class="text-sm leading-relaxed"><?php echo wp_kses_post($role_text); ?></p>
                  <?php endif; ?>
                </div>
              <?php endwhile; ?>
            <?php endif; ?>
          </div>

        </div>
      </div>

      <!-- Below card -->
      <div class="col-start-start-16 w-full pt-4">
        <?php if ($section_2_heading || $section_2_body): ?>
          <div class="col-start-start-8 mb-6 md:mb-12">
            <?php if ($section_2_heading): ?>
              <h3><?php echo esc_html($section_2_heading); ?></h3>
            <?php endif; ?>
            <?php if ($section_2_body): ?>
              <p>
                <?php echo wp_kses_post($section_2_body); ?>
              </p>
            <?php endif; ?>
          </div>
        <?php endif; ?>

        <?php if ($section_3_heading || $section_3_body): ?>
          <div class="col-start-start-8">
            <?php if ($section_3_heading): ?>
              <h3><?php echo esc_html($section_3_heading); ?></h3>
            <?php endif; ?>
            <?php if ($section_3_body): ?>
              <p>
                <?php echo wp_kses_post($section_3_body); ?>
              </p>
            <?php endif; ?>
          </div>
        <?php endif; ?>

        <?php if ($apply_cta): ?>
          <a href="<?php echo esc_url($apply_cta['url']); ?>" <?php if ($apply_cta['target'])
               echo ' target="' . esc_attr($apply_cta['target']) . '"'; ?>
            class="btn btn-secondary">
            <?php echo esc_html($apply_cta['title']); ?>
          </a>
        <?php endif; ?>

      </div>

    </div>
  </div>
</section>