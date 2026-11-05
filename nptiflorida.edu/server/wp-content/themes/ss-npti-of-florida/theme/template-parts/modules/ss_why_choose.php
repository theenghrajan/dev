<?php
/**
 * Module: Why Choose NPTI Florida
 * Template Part: template-parts/modules/ss_why_choose.php
 * ACF Flexible Content Layout: ss_why_choose
 *
 * Fields:
 *  - ss_why_choose_section_heading           (text)
 *  - ss_why_choose_section_heading_highlight (text)
 *  - ss_why_choose_section_subtext           (text)
 *  - ss_why_choose_checklist_icon            (image)
 *  - ss_why_choose_checklist_items           (repeater)
 *    - ss_why_choose_checklist_items_item_label (text)
 *    - ss_why_choose_checklist_items_item_body  (textarea)
 *  - ss_why_choose_primary_cta               (link)
 *  - ss_why_choose_secondary_cta             (link)
 *  - ss_why_choose_section_image             (image)
 */

$section_heading           = get_sub_field( 'ss_why_choose_section_heading' );
$section_heading_highlight = get_sub_field( 'ss_why_choose_section_heading_highlight' );
$section_subtext           = get_sub_field( 'ss_why_choose_section_subtext' );
$checklist_icon            = get_sub_field( 'ss_why_choose_checklist_icon' );
$primary_cta               = get_sub_field( 'ss_why_choose_primary_cta' );
$secondary_cta             = get_sub_field( 'ss_why_choose_secondary_cta' );
$section_image             = get_sub_field( 'ss_why_choose_section_image' );

if ( ! $section_heading ) return;
?>

<section
  id="ss-why-choose"
  class="ss-module-why-choose bg-white pad-section"
>
  <div class="container mx-auto px-4">
    <div class="grid grid-cols-1 gap-8 lg:grid-cols-2 md:items-center">

      <!-- Left: heading + checklist + CTAs -->
      <div class="col-start-start-16 !gap-0">

        <h2>
          <?php echo esc_html( $section_heading ); ?>
          <?php if ( $section_heading_highlight ) : ?>
            <span class="text-orange"><?php echo esc_html( $section_heading_highlight ); ?></span>
          <?php endif; ?>
        </h2>

        <?php if ( $section_subtext ) : ?>
          <p>
            <?php echo esc_html( $section_subtext ); ?>
          </p>
        <?php endif; ?>

        <?php if ( have_rows( 'ss_why_choose_checklist_items' ) ) : ?>
          <div class="col-start-start-16 gap-4 w-full">

            <?php while ( have_rows( 'ss_why_choose_checklist_items' ) ) : the_row();
              $item_label = get_sub_field( 'ss_why_choose_checklist_items_item_label' );
              $item_body  = get_sub_field( 'ss_why_choose_checklist_items_item_body' );
            ?>
              <div class="flex items-start gap-3">
                <?php if ( $checklist_icon ) : ?>
                  <img
                    src="<?php echo esc_url( $checklist_icon['url'] ); ?>"
                    alt="list icon"
                    aria-hidden="true"
                    width="32"
                    height="32"
                    class="shrink-0 mt-0.5"
                  >
                  <?php else: ?>
                    <img
                    src="<?php echo get_template_directory_uri(); ?>/images/list-icon.svg"
                    alt="list icon"
                    aria-hidden="true"
                    width="32"
                    height="32"
                    class="shrink-0 w-8 h-8"
                  >
                <?php endif; ?>
                <p class="text-base text-navy">
                  <?php if ( $item_label ) : ?>
                    <strong class="font-bold"><?php echo esc_html( $item_label ); ?></strong>
                  <?php endif; ?>
                  <?php echo wp_kses_post( $item_body ); ?>
                </p>
              </div>
            <?php endwhile; ?>

          </div>
        <?php endif; ?>

        <?php if ( $primary_cta || $secondary_cta ) : ?>
          <div class="row-start-center gap-4 flex-wrap mt-4 xl:mt-6">
            <?php if ( $primary_cta ) : ?>
              <a
                href="<?php echo esc_url( $primary_cta['url'] ); ?>"
                <?php if ( $primary_cta['target'] ) echo 'target="' . esc_attr( $primary_cta['target'] ) . '"'; ?>
                class="btn-primary"
              >
                <?php echo esc_html( $primary_cta['title'] ); ?>
              </a>
            <?php endif; ?>
            <?php if ( $secondary_cta ) : ?>
              <a
                href="<?php echo esc_url( $secondary_cta['url'] ); ?>"
                <?php if ( $secondary_cta['target'] ) echo 'target="' . esc_attr( $secondary_cta['target'] ) . '"'; ?>
                class="btn-secondary"
              >
                <?php echo esc_html( $secondary_cta['title'] ); ?>
              </a>
            <?php endif; ?>
          </div>
        <?php endif; ?>

      </div>

      <!-- Right: tall image -->
      <?php if ( $section_image ) : ?>
        <div class="rounded-lg overflow-hidden h-full">
          <img
            src="<?php echo esc_url( $section_image['url'] ); ?>"
            alt="<?php echo esc_attr( $section_image['alt'] ); ?>"
            class="w-full h-[500px] md:h-full object-cover rounded-lg"
            style="min-height:400px;"
          >
        </div>
      <?php endif; ?>

    </div>
  </div>
</section>
