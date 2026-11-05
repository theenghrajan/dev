<?php

/**
 * Banner — ACF-driven hero banner for front page and inner pages.
 *
 * ACF group: group_ss_hero_banner
 * Fields:
 *   hero_heading       text      (required — guard)
 *   hero_subheading    textarea
 *   hero_primary_cta   link
 *   hero_secondary_cta link
 *   background_image   image     (array return)
 *   background_video   url       (front page only)
 */

$hero_heading     = get_field('hero_heading');
$hero_subheading  = get_field('hero_subheading');
$primary_cta      = get_field('hero_primary_cta');
$secondary_cta    = get_field('hero_secondary_cta');
$background_image = get_field('background_image');
$video_url        = get_field('background_video');
$remove_global_banner       = get_field('ss_remove_page_banner');
$hero_overlay = get_field('ss_hero_overlay');

$image_url = $background_image
  ? esc_url($background_image['url'])
  : esc_url(get_template_directory_uri() . '/images/bg-hero.webp');
$image_alt = $background_image ? esc_attr($background_image['alt']) : '';

$hero_overlay_bg_color = '';
$inner_hero_overlay_bg_color = '';

if ($hero_overlay) {
  $hero_overlay_bg_color = 'after:bg-[#172A36]/[.48]';
  $inner_hero_overlay_bg_color = 'after:bg-[#172A36]/[.80]';
}
?>

<?php if (is_front_page()) : ?>
  <!-- Start Banner Section -->
  <section
    id="ss-hero-banner"
    class="ss-module-hero-banner relative z-[1] min-h-screen flex items-center overflow-hidden after:absolute after:inset-0 after:-z-[1] <?php echo $hero_overlay_bg_color; ?>">

    <!-- Background Media Layer -->
    <div class="absolute inset-0 z-0">

      <?php if ($video_url) : ?>
        <video
          class="absolute inset-0 w-full h-full object-cover"
          autoplay
          muted
          loop
          playsinline
          preload="auto"
          poster="<?php echo $image_url; ?>">
          <source src="<?php echo esc_url($video_url); ?>" type="video/mp4">
        </video>
      <?php else : ?>
        <div
          class="absolute inset-0 bg-cover bg-center"
          style="background-image: url(<?php echo $image_url; ?>);"
          role="img"
          aria-label="<?php echo $image_alt; ?>">
        </div>
      <?php endif; ?>

      <!-- Dark overlay for text legibility -->
      <?php if ($hero_overlay) : ?>
        <div class="absolute inset-0 bg-black/40"></div>
      <?php endif; ?>

    </div>

    <!-- Foreground Content -->
    <div class="container mx-auto px-4 relative z-10">

      <div class="flex flex-col gap-8 py-20 md:py-28 lg:py-36 max-w-prose">

        <!-- row-start-1: heading + subheading -->
        <div class="flex flex-col gap-4 pt-10">

          <h1 class="text-white leading-tight">
            <?php echo esc_html($hero_heading); ?>
          </h1>

          <?php if ($hero_subheading) : ?>
            <p class="font-body text-md font-normal text-white leading-relaxed">
              <?php echo wp_kses_post($hero_subheading); ?>
            </p>
          <?php endif; ?>

        </div>

        <!-- row-start-2: CTAs -->
        <?php if ($primary_cta || $secondary_cta) : ?>
          <div class="flex flex-col gap-4 sm:flex-row sm:gap-4">

            <?php if ($primary_cta) : ?>
              <a
                href="<?php echo esc_url($primary_cta['url']); ?>"
                class="btn btn-primary"
                <?php echo $primary_cta['target'] ? 'target="' . esc_attr($primary_cta['target']) . '"' : ''; ?>>
                <?php echo esc_html($primary_cta['title']); ?>
              </a>
            <?php endif; ?>

            <?php if ($secondary_cta) : ?>
              <a
                href="<?php echo esc_url($secondary_cta['url']); ?>"
                class="btn btn-secondary bg-transparent border-white/50 text-white hover:border-white hover:bg-white hover:text-orange"
                <?php echo $secondary_cta['target'] ? 'target="' . esc_attr($secondary_cta['target']) . '"' : ''; ?>>
                <?php echo esc_html($secondary_cta['title']); ?>
              </a>
            <?php endif; ?>

          </div>
        <?php endif; ?>

      </div>

    </div>
  </section>
  <!-- End Banner Section -->

<?php elseif (!$remove_global_banner) : ?>
  <!-- Start Inner Banner Section -->
  <section
    id="ss-hero-banner"
    class="ss-module-hero-banner relative z-[1] flex items-center min-h-[400px] lg:min-h-[550px] lg:!text-4xl after:absolute after:inset-0 after:-z-[1] <?php echo $inner_hero_overlay_bg_color; ?>"
    style="background-image: url(<?php echo $image_url; ?>); background-size: cover; background-position: center;" >
    <div class="container mx-auto px-4">

      <div class="flex flex-col gap-8 py-20 md:py-28 lg:py-36 max-w-4xl">

        <!-- row-start-1: heading + subheading -->
        <div class="flex flex-col gap-4 pt-20">
          <?php if (function_exists('yoast_breadcrumb')) : ?>
            <div class="ss-breadcrumb text-white text-sm justify-start items-center">
              <?php yoast_breadcrumb('<p id="breadcrumbs">', '</p>'); ?>
            </div>
          <?php endif; ?>
          <h1 class="text-white leading-tight lg:text-4xl">
            <?php
            if ($hero_heading) {
              echo esc_html($hero_heading);
            } elseif (is_home() && ! is_front_page()) {
              // Blog page title
              echo esc_html(get_the_title(get_option('page_for_posts')));
            } elseif (is_archive()) {
              echo single_cat_title('', false);
            } elseif (is_singular()) {
              // Single posts/pages
              echo esc_html(get_the_title());
            } else {
              echo esc_html(get_bloginfo('name'));
            }
            ?>
          </h1>

          <?php if ($hero_subheading) : ?>
            <p class="font-body text-md font-normal text-white leading-relaxed">
              <?php echo wp_kses_post($hero_subheading); ?>
            </p>
          <?php endif; ?>

        </div>

        <!-- row-start-2: CTAs -->
        <?php if ($primary_cta || $secondary_cta) : ?>
          <div class="flex flex-col gap-4 sm:flex-row sm:gap-4">

            <?php if ($primary_cta) : ?>
              <a
                href="<?php echo esc_url($primary_cta['url']); ?>"
                class="btn btn-primary"
                <?php echo $primary_cta['target'] ? 'target="' . esc_attr($primary_cta['target']) . '"' : ''; ?>>
                <?php echo esc_html($primary_cta['title']); ?>
              </a>
            <?php endif; ?>

            <?php if ($secondary_cta) : ?>
              <a
                href="<?php echo esc_url($secondary_cta['url']); ?>"
                class="inline-flex items-center justify-center gap-2 px-9 py-3 rounded-pill border border-white text-white font-body text-sm font-bold no-underline transition-all"
                <?php echo $secondary_cta['target'] ? 'target="' . esc_attr($secondary_cta['target']) . '"' : ''; ?>>
                <?php echo esc_html($secondary_cta['title']); ?>
              </a>
            <?php endif; ?>

          </div>
        <?php endif; ?>

      </div>

    </div>
   
  </section>
  <!-- End Inner Banner Section -->
<?php endif; ?>