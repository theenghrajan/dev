<?php

/**
 * Module: Personal Training for Veterans
 * Template Part: template-parts/modules/ss_personal_train.php
 * ACF Flexible Content Layout: ss_personal_train
 *
 * Fields:
 *  - ss_personal_train_accordion_icon_open   (image)
 *  - ss_personal_train_accordion_icon_closed (image)
 *  - ss_personal_train_section_heading           (text)
 *  - ss_personal_train_section_heading_highlight (text)
 *  - ss_personal_train_section_intro             (textarea)
 *  - ss_personal_train_row2_heading              (text)
 *  - ss_personal_train_row2_intro                (textarea)
 *  - ss_personal_train_row2_cta                  (link)
 *  - ss_personal_train_row2_images               (gallery)
 *  - ss_personal_train_row3_image                (image)
 *  - ss_personal_train_row3_heading              (text)
 *  - ss_personal_train_row3_accordion            (repeater) → icon (image), title (text), body (textarea)
 *  - ss_personal_train_row4_heading1             (text)
 *  - ss_personal_train_row4_body1                (textarea)
 *  - ss_personal_train_row4_heading2             (text)
 *  - ss_personal_train_row4_body2                (textarea)
 *  - ss_personal_train_row4_cta                  (link)
 *  - ss_personal_train_row4_image                (image)
 *  - ss_personal_train_row5_image                (image)
 *  - ss_personal_train_row5_heading              (text)
 *  - ss_personal_train_key_points                (repeater) → icon (image), body (textarea)
 *  - ss_personal_train_row6_heading              (text)
 *  - ss_personal_train_row6_body                 (wysiwyg)
 *  - ss_personal_train_row6_cta                  (link)
 *  - ss_personal_train_row6_image                (image)
 *  - ss_personal_train_row7_image                (image)
 *  - ss_personal_train_row7_heading              (text)
 *  - ss_personal_train_row7_body                 (textarea)
 *  - ss_personal_train_row7_cta                  (link)
 *  - ss_personal_train_closing_text              (wysiwyg)
 */

$accordion_icon_open   = get_sub_field('ss_personal_train_accordion_icon_open');
$accordion_icon_closed = get_sub_field('ss_personal_train_accordion_icon_closed');
$section_heading           = get_sub_field('ss_personal_train_section_heading');
$section_heading_highlight = get_sub_field('ss_personal_train_section_heading_highlight');
$section_intro             = get_sub_field('ss_personal_train_section_intro');
$row2_heading              = get_sub_field('ss_personal_train_row2_heading');
$row2_intro                = get_sub_field('ss_personal_train_row2_intro');
$row2_cta                  = get_sub_field('ss_personal_train_row2_cta');
$row2_images               = get_sub_field('ss_personal_train_row2_images');
$row3_image                = get_sub_field('ss_personal_train_row3_image');
$row3_heading              = get_sub_field('ss_personal_train_row3_heading');
$row4_heading1             = get_sub_field('ss_personal_train_row4_heading1');
$row4_body1                = get_sub_field('ss_personal_train_row4_body1');
$row4_heading2             = get_sub_field('ss_personal_train_row4_heading2');
$row4_body2                = get_sub_field('ss_personal_train_row4_body2');
$row4_cta                  = get_sub_field('ss_personal_train_row4_cta');
$row4_image                = get_sub_field('ss_personal_train_row4_image');
$row5_image                = get_sub_field('ss_personal_train_row5_image');
$row5_heading              = get_sub_field('ss_personal_train_row5_heading');
$row6_heading              = get_sub_field('ss_personal_train_row6_heading');
$row6_body                 = get_sub_field('ss_personal_train_row6_body');
$row6_cta                  = get_sub_field('ss_personal_train_row6_cta');
$row6_image                = get_sub_field('ss_personal_train_row6_image');
$row7_image                = get_sub_field('ss_personal_train_row7_image');
$row7_heading              = get_sub_field('ss_personal_train_row7_heading');
$row7_body                 = get_sub_field('ss_personal_train_row7_body');
$row7_cta                  = get_sub_field('ss_personal_train_row7_cta');
$closing_text              = get_sub_field('ss_personal_train_closing_text');

// Gallery: index-based access for the 3-image collage
$row2_img1 = ! empty($row2_images[0]) ? $row2_images[0] : null;
$row2_img2 = ! empty($row2_images[1]) ? $row2_images[1] : null;
$row2_img3 = ! empty($row2_images[2]) ? $row2_images[2] : null;
?>

<section
  id="ss-personal-train"
  class="ss-module-personal-train bg-blue-08 pad-section">
  <div class="container mx-auto px-4">
    <div class="flex flex-col gap-6 md:gap-20">

      <!-- Row 1: centered heading + intro -->
      <div class="text-center w-full ">
        <?php if ($section_heading || $section_heading_highlight) : ?>
          <h2 class="text-center">
            <?php echo $section_heading; ?>
            <?php if ($section_heading_highlight) : ?>
              <span class="text-orange"><?php echo $section_heading_highlight; ?></span>
            <?php endif; ?>
          </h2>
        <?php endif; ?>
        <?php if ($section_intro) : ?>
          <p class="text-center max-w-prose mx-auto">
            <?php echo $section_intro; ?>
          </p>
        <?php endif; ?>
      </div>

      <!-- Row 2: text left | image collage right -->
      <div class="grid grid-cols-1 gap-8 lg:grid-cols-2 w-full ">
        <!-- Left: accordion -->
        <div class="col-start-start-16">
          <?php if ($row2_heading) : ?>
            <h3 class="font-heading font-bold text-xl text-navy leading-snug"><?php echo $row2_heading; ?></h3>
          <?php endif; ?>
          <?php if ($row2_intro) : ?>
            <?php echo $row2_intro; ?>
          <?php endif; ?>

          <?php if (have_rows('ss_personal_train_row2_accordion')) : ?>
            <div class="accordion col-start-start-16 gap-3 w-full">
              <?php $r2_idx = 0;
              while (have_rows('ss_personal_train_row2_accordion')) : the_row();
                $item_icon  = get_sub_field('ss_personal_train_row2_accordion_icon');
                $item_title = get_sub_field('ss_personal_train_row2_accordion_title');
                $item_body  = get_sub_field('ss_personal_train_row2_accordion_body');
                $is_first   = ($r2_idx === 0);
                $toggle_icon = $is_first ? $accordion_icon_open : $accordion_icon_closed;
              ?>
                <div class="accordion-item w-full bg-white rounded-lg overflow-hidden<?php echo $is_first ? ' active itemActive' : ''; ?>">
                  <button class="accordionBtn relative flex items-start gap-2 w-full p-4 pr-14 text-left">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/verified.svg" alt="icon" class="w-6 h-6 shrink-0 transition-fast">
                    <span class="font-ui font-semibold text-sm text-navy"><?php echo $item_title; ?></span>
                    <?php if ($toggle_icon) : ?>
                      <i aria-hidden="true" class="w-6 h-6 shrink-0 transition-fast pointer-events-none absolute top-5 right-3 <?php echo $toggle_icon ?>"></i>
                    <?php endif; ?>
                  </button>
                  <div class="accordionBody" <?php echo $is_first ? '' : ' style="display:none;"'; ?>>
                    <?php if ($item_body) : ?>
                      <div class="px-4 pb-4">
                        <?php echo $item_body; ?>
                      </div>
                    <?php endif; ?>
                  </div>
                </div>
              <?php $r2_idx++;
              endwhile; ?>
            </div>
          <?php endif; ?>

          <?php if ($row2_cta) : ?>
            <a
              href="<?php echo esc_url($row2_cta['url']); ?>"
              class="btn-primary btn-primary:hover self-start"
              <?php if ($row2_cta['target']) : ?>target="<?php echo esc_attr($row2_cta['target']); ?>" <?php endif; ?>><?php echo $row2_cta['title']; ?></a>
          <?php endif; ?>
        </div>

        <!-- Right: image collage -->
        <div class="col-start-start-16">
          <div class="flex">
            <?php if ($row2_img1) : ?>
              <div class="relative z-[1] mb-10 w-full">
                <img
                  src="<?php echo esc_url($row2_img1['url']); ?>"
                  alt="<?php echo esc_attr($row2_img1['alt']); ?>"
                  width="<?php echo esc_attr($row2_img1['width']); ?>"
                  height="<?php echo esc_attr($row2_img1['height']); ?>"
                  class="object-cover rounded-[0.5rem] w-full h-full">
              </div>
            <?php endif; ?>
            <div class="relative z-[2] -ml-[30%] flex flex-col w-full h-full">
                <?php if ($row2_img2) : ?>
                  <div class="flex-1 border-light-blue ml-[32%] mt-[10%] rounded-tl-[0.5rem] 2xl:rounded-tl-[1rem] border-l-[0.5rem] border-t-[0.5rem]  2xl:border-l-[1rem] 2xl:border-t-[1rem]">
                    <img
                      src="<?php echo esc_url($row2_img2['url']); ?>"
                      alt="<?php echo esc_attr($row2_img2['alt']); ?>"
                      aria-hidden="true"
                      class="size-full object-cover">
                  </div>
                <?php endif; ?>
                <?php if ($row2_img3) : ?>
                  <div class="flex-1 border-light-blue rounded-tl-[0.5rem] border-l-[0.5rem] border-t-[0.5rem]  2xl:border-l-[1rem] 2xl:border-t-[1rem]">
                    <img
                      src="<?php echo esc_url($row2_img3['url']); ?>"
                      alt="<?php echo esc_attr($row2_img3['alt']); ?>"
                      aria-hidden="true"
                      class="object-cover rounded-[0.5rem] size-full">
                  </div>
                <?php endif; ?>
            </div>
          </div>
        </div>
      </div>

      <!-- Row 3: image left | accordion right -->
      <div class="grid grid-cols-1 gap-8 md:grid-cols-2 md:items-center w-full ">

        <!-- Left: image -->
        <?php if ($row3_image) : ?>
          <div class="rounded-lg overflow-hidden order-2 md:order-1">
            <img
              src="<?php echo esc_url($row3_image['url']); ?>"
              alt="<?php echo esc_attr($row3_image['alt']); ?>"
              width="<?php echo esc_attr($row3_image['width']); ?>"
              height="<?php echo esc_attr($row3_image['height']); ?>"
              class="w-full h-[26.25rem] object-cover rounded-lg">
          </div>
        <?php endif; ?>

        <!-- Right: accordion -->
        <div class="col-start-start-16 order-1 md:order-2">
          <?php if ($row3_heading) : ?>
            <h3 class="font-heading font-bold text-xl text-navy leading-snug"><?php echo $row3_heading; ?></h3>
          <?php endif; ?>

          <?php if (have_rows('ss_personal_train_row3_accordion')) : ?>
            <div class="accordion col-start-start-16 gap-3 w-full">
              <?php $r3_idx = 0;
              while (have_rows('ss_personal_train_row3_accordion')) : the_row();
                $item_icon  = get_sub_field('ss_personal_train_row3_accordion_icon');
                $item_title = get_sub_field('ss_personal_train_row3_accordion_title');
                $item_body  = get_sub_field('ss_personal_train_row3_accordion_body');
                $is_first   = ($r3_idx === 0);
                $toggle_icon = $is_first ? $accordion_icon_open : $accordion_icon_closed;
              ?>
                <div class="bg-white w-full rounded-lg overflow-hidden<?php echo $is_first ? ' active itemActive' : ''; ?>">
                  <button class="accordionBtn relative flex items-start gap-2 w-full p-4 pr-14 text-left">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/verified.svg" alt="icon" class="w-6 h-6 shrink-0 transition-fast">
                    <span class="font-ui font-semibold text-sm text-navy"><?php echo $item_title; ?></span>
                    <?php if ($toggle_icon) : ?>
                       <i aria-hidden="true" class="w-6 h-6 shrink-0 transition-fast pointer-events-none absolute top-5 right-3 <?php echo $toggle_icon ?>"></i>
                    <?php endif; ?>
                  </button>
                  <div class="accordionBody" <?php echo $is_first ? '' : ' style="display:none;"'; ?>>
                    <?php if ($item_body) : ?>
                      <div class="px-4 pb-4">
                        <p class="text-sm text-navy"><?php echo $item_body; ?></p>
                      </div>
                    <?php endif; ?>
                  </div>
                </div>
              <?php $r3_idx++;
              endwhile; ?>
            </div>
          <?php endif; ?>
        </div>

      </div>

      <!-- Row 4: text left | image right -->
      <div class="grid grid-cols-1 gap-8 md:grid-cols-2 md:items-center w-full ">

        <div class="col-start-start-16">
          <?php if ($row4_heading1) : ?>
            <h3 class="font-heading font-bold text-xl text-navy leading-snug"><?php echo $row4_heading1; ?></h3>
          <?php endif; ?>
          <?php if ($row4_body1) : ?>
            <p><?php echo $row4_body1; ?></p>
          <?php endif; ?>

          <?php if ($row4_heading2) : ?>
            <h3 class="font-heading font-bold text-xl text-navy leading-snug"><?php echo $row4_heading2; ?></h3>
          <?php endif; ?>
          <?php if ($row4_body2) : ?>
            <p><?php echo $row4_body2; ?></p>
          <?php endif; ?>

          <?php if ($row4_cta) : ?>
            <a
              href="<?php echo esc_url($row4_cta['url']); ?>"
              class="btn-secondary btn-secondary:hover self-start"
              <?php if ($row4_cta['target']) : ?>target="<?php echo esc_attr($row4_cta['target']); ?>" <?php endif; ?>><?php echo $row4_cta['title']; ?></a>
          <?php endif; ?>
        </div>

        <?php if ($row4_image) : ?>
          <div class="rounded-lg overflow-hidden">
            <img
              src="<?php echo esc_url($row4_image['url']); ?>"
              alt="<?php echo esc_attr($row4_image['alt']); ?>"
              width="<?php echo esc_attr($row4_image['width']); ?>"
              height="<?php echo esc_attr($row4_image['height']); ?>"
              class="w-full h-[420px] object-cover rounded-lg">
          </div>
        <?php endif; ?>

      </div>

      <!-- Row 5: image left | checklist right -->
      <div class="grid grid-cols-1 gap-8 md:grid-cols-2 md:items-start w-full ">

        <?php if ($row5_image) : ?>
          <div class="rounded-lg overflow-hidden order-2 md:order-1">
            <img
              src="<?php echo esc_url($row5_image['url']); ?>"
              alt="<?php echo esc_attr($row5_image['alt']); ?>"
              width="<?php echo esc_attr($row5_image['width']); ?>"
              height="<?php echo esc_attr($row5_image['height']); ?>"
              class="w-full h-[500px] object-cover rounded-lg">
          </div>
        <?php endif; ?>

        <div class="col-start-start-16 order-1 md:order-2">
          <?php if ($row5_heading) : ?>
            <h3 class="font-heading font-bold text-xl text-navy leading-snug"><?php echo $row5_heading; ?></h3>
          <?php endif; ?>

          <?php if (have_rows('ss_personal_train_key_points')) : ?>
            <div class="col-start-start-16 gap-5 w-full">
              <?php while (have_rows('ss_personal_train_key_points')) : the_row();
                $kp_icon = get_sub_field('ss_personal_train_key_points_icon');
                $kp_body = get_sub_field('ss_personal_train_key_points_body');
              ?>
                <div class="flex items-start gap-3">
                  <?php if ($kp_icon) : ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/images/verified.svg" alt="icon" class="w-6 h-6 shrink-0 transition-fast">
                  <?php endif; ?>
                  <?php if ($kp_body) : ?>
                    <p class="text-sm text-navy flex-1"><?php echo $kp_body; ?></p>
                  <?php endif; ?>
                </div>
              <?php endwhile; ?>
            </div>
          <?php endif; ?>
        </div>

      </div>

      <!-- Row 6: text left | image right -->
      <div class="grid grid-cols-1 gap-8 md:grid-cols-2 md:items-center w-full ">

        <div class="col-start-start-16">
          <?php if ($row6_heading) : ?>
            <h3 class="font-heading font-bold text-xl text-navy leading-snug"><?php echo $row6_heading; ?></h3>
          <?php endif; ?>
          <?php if ($row6_body) : ?>
            <?php echo wp_kses_post($row6_body); ?>
          <?php endif; ?>
          <?php if ($row6_cta) : ?>
            <div class="flex flex-wrap items-center gap-4">
              <a
                href="<?php echo esc_url($row6_cta['url']); ?>"
                class="btn-primary btn-primary:hover self-start"
                <?php if ($row6_cta['target']) : ?>target="<?php echo esc_attr($row6_cta['target']); ?>" <?php endif; ?>><?php echo $row6_cta['title']; ?></a>
              <a href="https://www.salary.com/research/salary/benchmark/personal-trainer-salary" target="_blank" class="row-center-center border-orange-15 text-orange bg-transparent rounded-pill no-underline uppercase font-bold transition-fast hover:bg-orange hover:border-orange hover:text-white self-start">
                View Citation
              </a>
            </div>
          <?php endif; ?>
        </div>

        <?php if ($row6_image) : ?>
          <div class="rounded-lg overflow-hidden">
            <img
              src="<?php echo esc_url($row6_image['url']); ?>"
              alt="<?php echo esc_attr($row6_image['alt']); ?>"
              width="<?php echo esc_attr($row6_image['width']); ?>"
              height="<?php echo esc_attr($row6_image['height']); ?>"
              class="w-full h-[360px] object-cover rounded-lg">
          </div>
        <?php endif; ?>

      </div>

      <!-- Row 7: image left | text right -->
      <div class="grid grid-cols-1 gap-8 md:grid-cols-2 md:items-center w-full ">

        <?php if ($row7_image) : ?>
          <div class="rounded-lg overflow-hidden order-2 md:order-1">
            <img
              src="<?php echo esc_url($row7_image['url']); ?>"
              alt="<?php echo esc_attr($row7_image['alt']); ?>"
              width="<?php echo esc_attr($row7_image['width']); ?>"
              height="<?php echo esc_attr($row7_image['height']); ?>"
              class="w-full h-[320px] object-cover rounded-lg">
          </div>
        <?php endif; ?>

        <div class="col-start-start-16 order-1 md:order-2">
          <?php if ($row7_heading) : ?>
            <h3 class="font-heading font-bold text-xl text-navy leading-snug"><?php echo $row7_heading; ?></h3>
          <?php endif; ?>
          <?php if ($row7_body) : ?>
            <p><?php echo $row7_body; ?></p>
          <?php endif; ?>
          <?php if ($row7_cta) : ?>
            <a
              href="<?php echo esc_url($row7_cta['url']); ?>"
              class="btn-secondary btn-secondary:hover self-start"
              <?php if ($row7_cta['target']) : ?>target="<?php echo esc_attr($row7_cta['target']); ?>" <?php endif; ?>><?php echo $row7_cta['title']; ?></a>
          <?php endif; ?>
        </div>

      </div>

      <!-- Footer CTA paragraph -->
      <?php if ($closing_text) : ?>
        <div class="text-center w-full font-body !font-bold text-sm text-navy">
          <?php echo wp_kses_post($closing_text); ?>
        </div>
      <?php endif; ?>

    </div>
  </div>
</section>
