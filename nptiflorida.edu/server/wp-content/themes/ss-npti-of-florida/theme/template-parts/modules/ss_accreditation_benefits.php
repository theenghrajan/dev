<?php
/**
 * Module: Accreditation Benefits
 * Template Part: template-parts/modules/ss_accreditation_benefits.php
 * ACF Flexible Content Layout: ss_accreditation_benefits
 *
 * Fields:
 *  - ss_accreditation_benefits_section_heading           (text)
 *  - ss_accreditation_benefits_section_heading_highlight (text)
 *  - ss_accreditation_benefits_section_body              (textarea)
 *  - ss_accreditation_benefits_section_image             (image)
 *  - ss_accreditation_benefits_benefits_heading          (text)
 *  - ss_accreditation_benefit_items             (repeater)
 *    - ss_benefit_items_title     (text)
 *    - ss_benefit_items_text      (textarea)
 */

$section_heading           = get_sub_field( 'ss_accreditation_benefits_section_heading' );
$section_heading_highlight = get_sub_field( 'ss_accreditation_benefits_section_heading_highlight' );
$section_body              = get_sub_field( 'ss_accreditation_benefits_section_body' );
$section_image             = get_sub_field( 'ss_accreditation_benefits_section_image' );
$benefits_heading          = get_sub_field( 'ss_accreditation_benefits_heading' );
?>

<section
  id="ss-accreditation-benefits"
  class="ss-module-accreditation-benefits bg-light-blue py-10 md:py-16 lg:py-20"
>
  <div class="container mx-auto px-4">

    <!-- Row 1: Text + Image -->
    <div class="flex flex-col gap-10 lg:flex-row lg:items-center lg:gap-16 mb-12 lg:mb-16">

      <!-- Left: Heading + Body -->
      <div class="flex flex-col gap-6 flex-1">

        <?php if ( $section_heading || $section_heading_highlight ) : ?>
        <h2 class="font-heading font-bold text-2xl leading-tight text-navy">
          <?php echo esc_html( $section_heading ); ?>
          <?php if ( $section_heading_highlight ) : ?>
            <span class="text-orange"><?php echo esc_html( $section_heading_highlight ); ?></span>
          <?php endif; ?>
        </h2>
        <?php endif; ?>

        <?php if ( $section_body ) : ?>
          <p class="font-body font-normal text-md text-navy leading-relaxed">
            <?php echo wp_kses_post( $section_body ); ?>
          </p>
        <?php endif; ?>

      </div>

      <!-- Right: Image -->
      <?php if ( $section_image ) : ?>
        <div class="flex-1">
          <div class="overflow-hidden rounded-md">
            <img
              src="<?php echo esc_url( $section_image['url'] ); ?>"
              alt="<?php echo esc_attr( $section_image['alt'] ); ?>"
              class="w-full object-cover"
            >
          </div>
        </div>
      <?php endif; ?>

    </div>

    <?php if ( have_rows( 'ss_accreditation_benefit_items' ) ) : ?>

      <!-- Row 2: Labeled Divider -->
      <?php if ( $benefits_heading ) : ?>
        <div class="flex items-center gap-6 mb-10">
          <div class="flex-1 border-t border-navy/30" aria-hidden="true"></div>
          <p class="font-heading font-bold text-xl text-navy whitespace-nowrap">
            <?php echo esc_html( $benefits_heading ); ?>
          </p>
          <div class="flex-1 border-t border-navy/30" aria-hidden="true"></div>
        </div>
      <?php endif; ?>

      <!-- Row 3: Benefits Cards -->
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

        <?php while ( have_rows( 'ss_accreditation_benefit_items' ) ) : the_row();
          $benefit_title = get_sub_field( 'ss_benefit_items_title' );
          $benefit_text  = get_sub_field( 'ss_benefit_items_text' );
          if ( ! $benefit_title ) continue;
        ?>
          <div class="bg-white border-l-accent rounded-md shadow-float p-6 flex flex-col gap-3">
            <p class="font-body font-bold text-md text-navy">
              <?php echo esc_html( $benefit_title ); ?>
            </p>
            <?php if ( $benefit_text ) : ?>
              <div class="[&_p]:font-body [&_p]:font-normal [&_p]:text-md [&_p]:text-navy [&_p]:leading-relaxed">
                <?php echo wp_kses_post( wpautop($benefit_text) ); ?>
            </div>
            <?php endif; ?>
          </div>
        <?php endwhile; ?>

      </div>

    <?php endif; ?>

  </div>
</section>
