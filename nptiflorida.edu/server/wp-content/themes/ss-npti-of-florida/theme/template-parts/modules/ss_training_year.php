<?php
/**
 * Module: Training Year
 * Template Part: template-parts/modules/ss_training_year.php
 * ACF Flexible Content Layout: ss_training_year
 *
 * Fields:
 *  - ss_training_year_section_heading           (text)
 *  - ss_training_year_section_heading_highlight (text)
 *  - ss_training_year_section_body              (textarea)
 *  - ss_training_year_background_image          (image)
 *  - ss_training_year_feature_cards             (repeater)
 *    - ss_training_year_feature_cards_card_icon    (select)
 *    - ss_training_year_feature_cards_card_heading (text)
 *    - ss_training_year_feature_cards_card_body    (textarea)
 *  - ss_training_year_apply_cta                 (link)
 *  - ss_training_year_program_info_cta          (link)
 */

$section_heading = get_sub_field('ss_training_year_section_heading');
$section_heading_highlight = get_sub_field('ss_training_year_section_heading_highlight');
$section_body = get_sub_field('ss_training_year_section_body');
$background_image = get_sub_field('ss_training_year_background_image');
$apply_cta = get_sub_field('ss_training_year_apply_cta');
$program_info_cta = get_sub_field('ss_training_year_program_info_cta');

if (!$section_heading)
  return;
?>

<section id="ss-training-year" class="ss-module-training-year bg-blue-08 pad-section relative overflow-hidden">

  <?php if ($background_image): ?>
    <div class="absolute inset-0 pointer-events-none opacity-80">
      <img src="<?php echo esc_url($background_image['url']); ?>" alt="" aria-hidden="true"
        class="img-cover w-full h-full">
    </div>
  <?php endif; ?>

  <div class="container mx-auto px-4 relative">

    <div class="col-start-center-12">

      <!-- Heading + intro -->
      <div class="items-center text-center max-w-[880px] mx-auto mb-5">

        <h2>
          <?php echo esc_html($section_heading); ?>
          <?php if ($section_heading_highlight): ?>
            <span class="text-orange"><?php echo esc_html($section_heading_highlight); ?></span>
          <?php endif; ?>
        </h2>

        <?php if ($section_body): ?>
          <p>
            <?php echo wp_kses_post($section_body); ?>
          </p>
        <?php endif; ?>

      </div>

      <?php if (have_rows('ss_training_year_feature_cards')): ?>
        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 w-full mb-5 lg:mb-12">

          <?php while (have_rows('ss_training_year_feature_cards')):
            the_row();
            $card_icon = get_sub_field('ss_training_year_feature_cards_card_icon');
            $card_heading = get_sub_field('ss_training_year_feature_cards_card_heading');
            $card_body = get_sub_field('ss_training_year_feature_cards_card_body');
            ?>

            <div class="col-start-start-24 bg-white rounded-xl p-6 border border-smoke shadow-card">

              <?php if ($card_icon): ?>
                <div
                  class="relative shrink-0 w-[82px] h-[82px] rounded-full text-center bg-blue flex justify-center items-center">
                  <i class="<?php echo esc_attr($card_icon); ?> text-2xl text-center text-white" aria-hidden="true"></i>
                </div>
              <?php endif; ?>

              <div class="col-start-start-8">
                <?php if ($card_heading): ?>
                  <h3><?php echo esc_html($card_heading); ?></h3>
                <?php endif; ?>
                <?php if ($card_body): ?>
                  <p class="text-sm">
                    <?php echo wp_kses_post($card_body); ?>
                  </p>
                <?php endif; ?>
              </div>

            </div>

          <?php endwhile; ?>

        </div>
      <?php endif; ?>

      <div class="row-start-center flex-wrap !justify-center gap-4">

        <?php if ($apply_cta): ?>
          <a href="<?php echo esc_url($apply_cta['url']); ?>" <?php if ($apply_cta['target'])
               echo ' target="' . esc_attr($apply_cta['target']) . '"'; ?>
            class="btn btn-primary">
            <?php echo esc_html($apply_cta['title']); ?>
          </a>
        <?php endif; ?>

        <?php if ($program_info_cta): ?>
          <a href="<?php echo esc_url($program_info_cta['url']); ?>" <?php if ($program_info_cta['target'])
               echo ' target="' . esc_attr($program_info_cta['target']) . '"'; ?>
            class="btn btn-secondary">
            <?php echo esc_html($program_info_cta['title']); ?>
          </a>
        <?php endif; ?>

      </div>

    </div>

  </div>
</section>