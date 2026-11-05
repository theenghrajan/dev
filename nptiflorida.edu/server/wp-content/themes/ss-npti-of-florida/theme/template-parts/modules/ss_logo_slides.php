<?php
/**
 * Module: Logo Slides
 * Template Part: template-parts/modules/ss_logo_slides.php
 * ACF Flexible Content Layout: ss_logo_slides
 *
 * Fields:
 *  - ss_logo_slides_logos (repeater)
 *    - ss_logo_slides_logos_logo_image (image)
 *    - ss_logo_slides_logos_logo_url   (link)
 */

if (!have_rows('ss_logo_slides_logos'))
  return;
?>

<section id="ss-logo-slides" class="ss-module-logo-slides bg-blue-08 py-8 md:py-10">
  <div class="container mx-auto px-4">

    <div class="flex flex-wrap items-center justify-center gap-8 md:gap-12 lg:justify-between">

      <?php while (have_rows('ss_logo_slides_logos')):
        the_row();
        $logo_image = get_sub_field('ss_logo_slides_logos_logo_image');
        $logo_url = get_sub_field('ss_logo_slides_logos_logo_url');

        if (!$logo_image)
          continue;

        $href = $logo_url ? esc_url($logo_url['url']) : '#';
        $target = $logo_url && $logo_url['target'] ? esc_attr($logo_url['target']) : '';
        ?>

        <a href="<?php echo $href; ?>" <?php if ($target)
             echo ' target="' . $target . '"'; ?>
          class="shrink-0 no-underline" aria-label="<?php echo esc_attr($logo_image['alt']); ?>">
          <img src="<?php echo esc_url($logo_image['url']); ?>" alt="<?php echo esc_attr($logo_image['alt']); ?>"
            width="<?php echo esc_attr($logo_image['width']); ?>"
            height="<?php echo esc_attr($logo_image['height']); ?>"
            class="mix-blend-luminosity h-14 md:h-16 xl:h-auto xl:max-h-24 w-auto max-w-[222px]">
        </a>

      <?php endwhile; ?>

    </div>

  </div>
</section>