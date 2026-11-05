<?php
/**
 * Module: Veteran Owned Business
 * Template Part: template-parts/modules/ss_veteran_owned_business.php
 * ACF Flexible Content Layout: ss_veteran_owned_business
 *
 * Component CSS (tailwind/custom/components/components.css):
 *  - .ss-veteran-owned-business__resource-card — base card (8 classes, 3+ instances)
 *
 * Fields:
 *  - ss_veteran_owned_business_background_image        (image)
 *  - ss_veteran_owned_business_section_heading         (text)
 *  - ss_veteran_owned_business_section_heading_highlight (text)
 *  - ss_veteran_owned_business_section_description     (textarea)
 *  - ss_veteran_owned_business_resource_links          (repeater)
 *      - ss_veteran_owned_business_resource_links_link           (link)
 *      - ss_veteran_owned_business_resource_links_link_icon      (image)
 *      - ss_veteran_owned_business_resource_links_link_icon_size (select)
 *      - ss_veteran_owned_business_resource_links_link_featured  (true_false)
 */

$section_heading           = get_sub_field( 'ss_veteran_owned_business_section_heading' );
$section_heading_highlight = get_sub_field( 'ss_veteran_owned_business_section_heading_highlight' );

if ( ! $section_heading && ! $section_heading_highlight ) return;

$background_image    = get_sub_field( 'ss_veteran_owned_business_background_image' );
$section_description = get_sub_field( 'ss_veteran_owned_business_section_description' );
?>

<section
  id="ss-veteran-owned-business"
  class="ss-module-veteran-owned-business relative overflow-hidden bg-light-blue py-10 md:py-16 lg:py-20"
>

  <!-- Decorative background image overlay -->
  <div class="pointer-events-none absolute inset-0 z-behind overflow-hidden" aria-hidden="true">
    <?php if ( $background_image ) : ?>
      <img
        src="<?php echo esc_url( $background_image['url'] ); ?>"
        alt=""
        class="h-full w-full object-cover opacity-50"
      >
    <?php endif; ?>
  </div>

  <div class="relative container mx-auto px-4">

    <div class="flex flex-col items-center gap-6 text-center">

      <h2 class="font-heading font-bold text-2xl md:text-3xl leading-tight">
        <?php if ( $section_heading ) : ?>
          <span class="text-navy"><?php echo esc_html( $section_heading ); ?></span>
        <?php endif; ?>
        <?php if ( $section_heading_highlight ) : ?>
          <span class="text-orange"><?php echo esc_html( $section_heading_highlight ); ?></span>
        <?php endif; ?>
      </h2>

      <?php if ( $section_description ) : ?>
        <p class="font-body font-normal text-md text-navy leading-relaxed max-w-prose mx-auto">
          <?php echo esc_html( $section_description ); ?>
        </p>
      <?php endif; ?>

      <?php if ( have_rows( 'ss_veteran_owned_business_resource_links' ) ) : ?>
        <div class="flex flex-col items-stretch gap-4 w-full mt-4 md:flex-row md:items-center md:justify-center md:gap-6 md:w-auto">
          <?php while ( have_rows( 'ss_veteran_owned_business_resource_links' ) ) : the_row();
            $link       = get_sub_field( 'ss_veteran_owned_business_resource_links_link' );
            $icon       = get_sub_field( 'ss_veteran_owned_business_resource_links_link_icon' );
            $icon_size  = get_sub_field( 'ss_veteran_owned_business_resource_links_link_icon_size' );
            $featured   = get_sub_field( 'ss_veteran_owned_business_resource_links_link_featured' );
          ?>
            <?php if ( $link ) : ?>
              <a
                href="<?php echo esc_url( $link['url'] ); ?>"
                <?php if ( $link['target'] ) : ?>
                  target="<?php echo esc_attr( $link['target'] ); ?>"
                  <?php if ( $link['target'] === '_blank' ) : ?>rel="noopener noreferrer"<?php endif; ?>
                <?php endif; ?>
                class="ss-veteran-owned-business__resource-card<?php echo $featured ? ' border border-orange' : ''; ?>"
              >
                <?php if ( $icon ) : ?>
                  <i
                    class="<?php echo $icon; ?> text-2xl w-11 h-11 flex-shrink-0"
                    aria-hidden="true"
                  ></i>
                <?php endif; ?>
                <span class="font-body font-semibold text-lg text-navy">
                  <?php echo esc_html( $link['title'] ); ?>
                </span>
              </a>
            <?php endif; ?>
          <?php endwhile; ?>
        </div>
      <?php endif; ?>

    </div>

  </div>
</section>
