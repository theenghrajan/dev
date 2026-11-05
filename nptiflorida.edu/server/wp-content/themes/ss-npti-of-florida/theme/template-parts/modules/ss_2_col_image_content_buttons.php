<?php

/**
 * Module: 2 Col Image Content Buttons
 * Template Part: template-parts/modules/ss_2_col_image_content_buttons.php
 * ACF Flexible Content Layout: ss_2_col_image_content_buttons
 *
 * Fields:
 *  - ss_2_col_image_content_buttons_section_heading (text)
 *  - ss_2_col_image_content_buttons_section_description (textarea)
 *  - ss_2_col_image_content_buttons_cta_primary_label (text)
 *  - ss_2_col_image_content_buttons_cta_primary_link (link)
 *  - ss_2_col_image_content_buttons_cta_secondary_label (text)
 *  - ss_2_col_image_content_buttons_cta_secondary_link (link)
 *  - ss_2_col_image_content_buttons_section_image (image)
 */

$section_heading       = get_sub_field('ss_2_col_image_content_buttons_section_heading');
$section_description   = get_sub_field('ss_2_col_image_content_buttons_section_description');
$section_image         = get_sub_field('ss_2_col_image_content_buttons_section_image');
$alignment = get_sub_field('ss_alignment');
$bg = get_sub_field('ss_background_class_name');
$ss_padding_bottom = get_sub_field('ss_padding_bottom');
?>

<section
  class="ss-module-2-col-image-content-buttons <?php echo $ss_padding_bottom == true ? 'py-10 lg:py-16' : 'pt-10 lg:pt-16'; ?> <?php echo $bg != '' || $bg != null ? $bg : '';  ?>">
  <div class="container mx-auto px-4">

    <div class="flex flex-col gap-8 lg:flex-row lg:items-start lg:gap-10 <?php echo $alignment === 'left' ? 'lg:flex-row-reverse' : '' ?>">

      <!-- Left column: heading, body, buttons -->
      <div class="flex flex-col w-full lg:w-1/2">

        <?php if ($section_heading) : ?>
          <h3 class="leading-snug text-navy">
            <?php echo esc_html($section_heading); ?>
          </h3>
        <?php endif; ?>

        <?php if ($section_description) : ?>
          <div class="ss-list-items [&_ul]:!my-4">
            <?php echo wp_kses_post($section_description); ?>
          </div>
        <?php endif; ?>
        <!-- CTAs -->
        <?php if (have_rows('ss_cta_links')) : ?>
          <div class="flex flex-wrap flex-col sm:flex-row items-start gap-4 mt-3.5">
            <?php $i = 0; ?>
            <?php while (have_rows('ss_cta_links')) : the_row();
              $link       = get_sub_field('ss_2_col_image_content_buttons_cta_secondary_link');
              $ss_primary_btn = get_sub_field('ss_primary');
            ?>
              <a
                href="<?php echo esc_url($link['url']); ?>"
                <?php if ($ss_primary_btn === true) : ?>
                class="btn-primary"
                <?php else: ?>
                class="btn-secondary"
                <?php endif; ?>
                <?php if (! empty($link['target'])) : ?>
                target="<?php echo esc_attr($link['target']); ?>"
                <?php endif; ?>>
                <?php echo esc_html($link['title']); ?>
              </a>
            <?php
              $i++;
            endwhile; ?>
          </div>
        <?php endif; ?>

      </div>
      <!-- Right column: image -->
      <?php if ($section_image) : ?>
        <div class="w-full lg:w-1/2 overflow-hidden rounded flex-shrink-0">
          <img
            src="<?php echo esc_url($section_image['url']); ?>"
            alt="<?php echo esc_attr($section_image['alt']); ?>"
            class="w-full object-cover"
            width="<?php echo esc_attr($section_image['width']); ?>"
            height="<?php echo esc_attr($section_image['height']); ?>"
            style="min-height: 260px;">
        </div>
      <?php endif; ?>

    </div>

  </div>
</section>