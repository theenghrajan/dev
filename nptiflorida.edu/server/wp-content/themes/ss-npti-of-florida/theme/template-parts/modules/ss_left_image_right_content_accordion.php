<?php
/**
 * Module: Left Image Right Content Accordion
 * Template Part: template-parts/modules/ss_left_image_right_content_accordion.php
 * ACF Flexible Content Layout: ss_left_image_right_content_accordion
 *
 * Fields:
 *  - ss_left_image_right_content_accordion_section_image (image)
 *  - ss_left_image_right_content_accordion_section_heading (text)
 *  - ss_left_image_right_content_accordion_accordion_item_icon (image)
 *  - ss_left_image_right_content_accordion_accordion_chevron_icon (image)
 *  - ss_left_image_right_content_accordion_accordion_items (repeater)
 *      - ss_left_image_right_content_accordion_accordion_items_item_title (text)
 *      - ss_left_image_right_content_accordion_accordion_items_item_body (textarea)
 */

$section_image       = get_sub_field( 'ss_left_image_right_content_accordion_section_image' );
$section_heading     = get_sub_field( 'ss_left_image_right_content_accordion_section_heading' );
$accordion_item_icon = get_sub_field( 'ss_left_image_right_content_accordion_accordion_item_icon' );
$accordion_chevron   = get_sub_field( 'ss_left_image_right_content_accordion_accordion_chevron_icon' );

if ( ! $section_heading ) return;
?>

<section
  id="ss-left-image-right-content-accordion"
  class="ss-module-left-image-right-content-accordion bg-light-blue py-10 md:py-16 lg:py-20"
>
  <div class="container mx-auto px-4">

    <div class="flex flex-col gap-8 lg:flex-row lg:items-start lg:gap-12">

      <!-- Left: tall image -->
      <?php if ( $section_image ) : ?>
        <div class="w-full lg:w-1/2 overflow-hidden rounded flex-shrink-0">
          <img
            src="<?php echo esc_url( $section_image['url'] ); ?>"
            alt="<?php echo esc_attr( $section_image['alt'] ); ?>"
            class="w-full h-full object-cover"
            width="<?php echo esc_attr( $section_image['width'] ); ?>"
            height="<?php echo esc_attr( $section_image['height'] ); ?>"
            style="min-height: 320px;"
          >
        </div>
      <?php endif; ?>

      <!-- Right: heading + accordion -->
      <div class="flex flex-col gap-6 w-full lg:w-1/2">

        <?php if ( $section_heading ) : ?>
          <h2 class="font-heading font-bold text-xl leading-snug text-navy">
            <?php echo esc_html( $section_heading ); ?>
          </h2>
        <?php endif; ?>

        <?php if ( have_rows( 'ss_left_image_right_content_accordion_accordion_items' ) ) : ?>
          <div class="ss-accordion flex flex-col gap-3">

            <?php
            $item_index = 0;
            while ( have_rows( 'ss_left_image_right_content_accordion_accordion_items' ) ) : the_row();
              $item_title  = get_sub_field( 'ss_left_image_right_content_accordion_accordion_items_item_title' );
              $item_body   = get_sub_field( 'ss_left_image_right_content_accordion_accordion_items_item_body' );
              $is_first    = ( $item_index === 0 );
            ?>

              <div class="ss-accordion-item accordion-item <?php echo $is_first ? 'itemActive ' : ''; ?>bg-white rounded px-4 py-3">
                <button
                  type="button"
                  class="ss-accordion-btn accordionBtn <?php echo $is_first ? 'active ' : ''; ?>flex items-center justify-between w-full text-left gap-2"
                  aria-expanded="<?php echo $is_first ? 'true' : 'false'; ?>"
                >
                  <span class="flex items-center gap-2">
                    <?php if ( $accordion_item_icon ) : ?>
                      <img
                        src="<?php echo esc_url( $accordion_item_icon['url'] ); ?>"
                        alt=""
                        class="w-8 h-8 flex-shrink-0"
                        aria-hidden="true"
                      >
                    <?php endif; ?>
                    <span class="font-ui font-semibold text-md text-navy leading-relaxed"><?php echo esc_html( $item_title ); ?></span>
                  </span>
                  <?php if ( $accordion_chevron ) : ?>
                    <img
                      src="<?php echo esc_url( $accordion_chevron['url'] ); ?>"
                      alt=""
                      class="ss-accordion-chevron w-6 h-6 flex-shrink-0 <?php echo $is_first ? 'rotate-180 ' : ''; ?>transition-transform"
                      aria-hidden="true"
                    >
                  <?php endif; ?>
                </button>
                <div
                  class="ss-accordion-body accordionBody mt-3"
                  <?php if ( ! $is_first ) : ?>style="display:none;"<?php endif; ?>
                >
                  <?php if ( $item_body ) : ?>
                    <p class="font-body font-normal text-md text-navy leading-relaxed">
                      <?php echo esc_html( $item_body ); ?>
                    </p>
                  <?php endif; ?>
                </div>
              </div>

            <?php
            $item_index++;
            endwhile;
            ?>

          </div>
        <?php endif; ?>

      </div>

    </div>

  </div>
</section>

<script>
  // ss-left-image-right-content-accordion — vanilla JS for HTML preview
  (function () {
    document.querySelectorAll('.ss-accordion').forEach(function (group) {
      group.querySelectorAll('.ss-accordion-btn').forEach(function (btn) {
        btn.addEventListener('click', function () {
          var item    = this.closest('.ss-accordion-item');
          var body    = item.querySelector('.ss-accordion-body');
          var chevron = item.querySelector('.ss-accordion-chevron');
          var isOpen  = this.getAttribute('aria-expanded') === 'true';

          // Collapse all items in this group
          group.querySelectorAll('.ss-accordion-item').forEach(function (i) {
            var b       = i.querySelector('.ss-accordion-body');
            var c       = i.querySelector('.ss-accordion-chevron');
            var trigger = i.querySelector('.ss-accordion-btn');
            if (b) b.style.display = 'none';
            if (c) c.classList.remove('rotate-180');
            if (trigger) trigger.setAttribute('aria-expanded', 'false');
          });

          // Expand clicked item if it was closed
          if (!isOpen) {
            body.style.display = '';
            chevron.classList.add('rotate-180');
            btn.setAttribute('aria-expanded', 'true');
          }
        });
      });
    });
  })();
</script>
