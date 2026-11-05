<?php

/**
 * Module: Passion Fitness
 * Template Part: template-parts/modules/ss_passion_fitness.php
 * ACF Flexible Content Layout: ss_passion_fitness
 *
 * Fields:
 *  - ss_passion_fitness_background_image (image)
 *  - ss_passion_fitness_hero_heading     (text)
 *  - ss_passion_fitness_hero_body        (textarea)
 *  - ss_passion_fitness_guide_heading    (text)
 *  - ss_passion_fitness_guide_subtext    (text)
 *  - ss_passion_fitness_bonus_text       (wysiwyg)
 *  - ss_passion_fitness_primary_cta          (link)
 *  - ss_passion_fitness_secondary_cta        (link)
 *  - ss_passion_fitness_eyebrow              (text)     — eyebrow label e.g. "E-Book"
 *  - ss_passion_fitness_badge_text           (text)     — pill badge text e.g. "Tired of Guessing…"
 *  - ss_passion_fitness_caption_text         (text)   — caption text below CTAs
 *  - ss_passion_fitness_feature_tags         (repeater) — feature tag pills row
 *    └─ ss_passion_fitness_feature_tag_label (text)     — individual tag label
 */

$background_image = get_sub_field('ss_passion_fitness_background_image');
$hero_heading     = get_sub_field('ss_passion_fitness_hero_heading');
$hero_body        = get_sub_field('ss_passion_fitness_hero_body');
$guide_heading    = get_sub_field('ss_passion_fitness_guide_heading');
$guide_subtext    = get_sub_field('ss_passion_fitness_guide_subtext');
$bonus_text       = get_sub_field('ss_passion_fitness_bonus_text');
$primary_cta      = get_sub_field('ss_passion_fitness_primary_cta');
$secondary_cta    = get_sub_field('ss_passion_fitness_secondary_cta');
$eyebrow          = get_sub_field('ss_passion_fitness_eyebrow');
$badge_text       = get_sub_field('ss_passion_fitness_badge_text');
$caption_text     = get_sub_field('ss_passion_fitness_caption_text');
$section_class    = get_sub_field('ss_passion_fitness_section_class');

if (! $hero_heading) return;
?>
<section class="ss-module-passion-fitness relative overflow-hidden pad-section !pt-[8.25rem] lg:!pt-[10.25rem] 2xl:min-h-screen <?php echo esc_attr($section_class); ?>">

  <?php if ($background_image) : ?>
    <img
      src="<?php echo esc_url($background_image['url']); ?>"
      alt="<?php echo esc_attr($background_image['alt']); ?>"
      width="<?php echo esc_attr($background_image['width']); ?>"
      height="<?php echo esc_attr($background_image['height']); ?>"
      aria-hidden="true"
      class="absolute inset-0 w-full h-full object-cover pointer-events-none">
  <?php endif; ?>

  <!-- Dark navy overlay -->
  <div class="absolute inset-0 pointer-events-none" style="background: rgba(23,42,54,0.8);"></div>

  <!-- Content -->
  <div class="relative z-10 container mx-auto px-4">
    <div class="col-center-center-16 text-white text-center space-y-6">

      <!-- Eyebrow label -->
      <div>
        <?php if ($eyebrow) : ?>
          <p class="text-white font-body text-sm font-semibold uppercase tracking-wide mb-0"><?php echo esc_html($eyebrow); ?></p>
        <?php endif; ?>
        <!-- Pill badge -->
        <?php if ($badge_text) : ?>
          <div class="inline-flex items-center justify-center px-6 py-3 mt-3 rounded-pill bg-white/10 border border-white/50">
            <span class="text-white font-heading font-medium text-md leading-normal"><?php echo esc_html($badge_text); ?></span>
          </div>
        <?php endif; ?>
      </div>

      <?php if ($hero_heading) : ?>
        <h2 class="text-white text-center text-2xl md:text-4xl leading-tight">
          <?php echo esc_html($hero_heading); ?>
        </h2>
      <?php endif; ?>

      <?php if ($hero_body) : ?>
        <div class="[&_p]:text-white text-center max-w-3xl mx-auto">
          <?php echo wp_kses_post($hero_body); ?>
        </div>
      <?php endif; ?>

      <?php if ($guide_heading) : ?>
        <h3 class="text-white text-center font-heading font-bold text-2xl leading-snug">
          <?php echo wp_kses_post($guide_heading); ?>
        </h3>
      <?php endif; ?>

      <?php if ($guide_subtext) : ?>
        <p class="text-white text-center">
          <?php echo wp_kses_post($guide_subtext); ?>
        </p>
      <?php endif; ?>

      <!-- Feature tag pills -->
      <?php if (have_rows('ss_passion_fitness_feature_tags')) : ?>
        <div class="flex flex-wrap items-center justify-center gap-3">
          <?php while (have_rows('ss_passion_fitness_feature_tags')) : the_row();
            $tag_label = get_sub_field('ss_passion_fitness_feature_tag_label');
            if (! $tag_label) continue;
          ?>
            <span class="px-5 py-3 rounded border border-white bg-blue text-white font-body font-normal text-md whitespace-nowrap">
              <?php echo esc_html($tag_label); ?>
            </span>
          <?php endwhile; ?>
        </div>
      <?php endif; ?>

      <?php if ($bonus_text) : ?>
        <!-- Bonus bar -->
        <div
          class="w-full max-w-2xl mx-auto py-4 px-8 text-center"
          style="background: linear-gradient(90deg, rgba(4,76,171,0) 0%, rgba(4,76,171,1) 43%, rgba(4,76,171,1) 68%, rgba(4,76,171,0) 94%);">
          <div class="[&_p]:text-white text-center text-base">
            <?php echo wp_kses_post(wpautop($bonus_text)); ?>
          </div>
        </div>
      <?php endif; ?>

      <?php if ($primary_cta || $secondary_cta) : ?>
        <!-- CTAs -->
        <div class="row-center-center gap-4 flex-wrap">
          <?php if ($primary_cta) : ?>
            <a
              href="<?php echo esc_url($primary_cta['url']); ?>"
              target="<?php echo esc_attr($primary_cta['target']); ?>"
              class="btn-primary btn-primary:hover">
              <?php echo esc_html($primary_cta['title']); ?>
            </a>
          <?php endif; ?>
          <?php if ($secondary_cta) : ?>
            <a
              href="<?php echo esc_url($secondary_cta['url']); ?>"
              target="<?php echo esc_attr($secondary_cta['target']); ?>"
              class="btn-secondary btn-secondary:hover">
              <?php echo esc_html($secondary_cta['title']); ?>
            </a>
          <?php endif; ?>
        </div>
      <?php endif; ?>

      <?php if ($caption_text) : ?>
        <div class="text-white font-body italic font-normal text-md leading-relaxed max-w-prose mx-auto mb-0">
          <?php echo wp_kses_post($caption_text); ?>
        </div>
      <?php endif; ?>
    </div>
  </div>

</section>