<?php
/**
 * Module: Expert Insights
 * Template Part: template-parts/modules/ss_expert_insights.php
 * ACF Flexible Content Layout: ss_expert_insights
 *
 * Fields:
 *  - ss_expert_insights_section_heading (text)
 *  - ss_expert_insights_section_heading_highlight (text)
 *  - ss_expert_insights_body_paragraph_1 (textarea)
 *  - ss_expert_insights_body_paragraph_2 (textarea)
 *  - ss_expert_insights_cta_primary (link)
 *  - ss_expert_insights_cta_secondary (link)
 *  - ss_expert_insights_section_image (image)
 */

$section_heading           = get_sub_field( 'ss_expert_insights_section_heading' );
$section_heading_highlight = get_sub_field( 'ss_expert_insights_section_heading_highlight' );
$body_paragraph_1          = get_sub_field( 'ss_expert_insights_body_paragraph_1' );
$body_paragraph_2          = get_sub_field( 'ss_expert_insights_body_paragraph_2' );
$cta_primary               = get_sub_field( 'ss_expert_insights_cta_primary' );
$cta_secondary             = get_sub_field( 'ss_expert_insights_cta_secondary' );
$section_image             = get_sub_field( 'ss_expert_insights_section_image' );

if ( ! $section_heading && ! $section_image ) return;
?>

<section
  id="ss-expert-insights"
  class="ss-module-expert-insights bg-light-blue py-10 md:py-16 lg:py-20"
>
  <div class="container mx-auto px-4">

    <div class="flex flex-col gap-10 lg:flex-row lg:items-center lg:gap-12">

      <!-- Left col: content -->
      <div class="flex flex-col gap-6 w-full lg:w-1/2">

        <?php if ( $section_heading || $section_heading_highlight ) : ?>
          <h2 class="font-heading font-bold text-3xl md:text-4xl text-navy leading-tight">
            <?php echo esc_html( $section_heading ); ?>
            <?php if ( $section_heading_highlight ) : ?>
              <span class="text-orange"><?php echo esc_html( $section_heading_highlight ); ?></span>
            <?php endif; ?>
          </h2>
        <?php endif; ?>

        <?php if ( $body_paragraph_1 ) : ?>
            <?php echo  $body_paragraph_1; ?>
        <?php endif; ?>

        <?php if ( $cta_primary || $cta_secondary ) : ?>
          <div class="flex flex-col sm:flex-row items-start gap-4">

            <?php if ( $cta_primary ) : ?>
              <a
                href="<?php echo esc_url( $cta_primary['url'] ); ?>"
                class="btn btn-primary"
                <?php if ( $cta_primary['target'] ) : ?>target="<?php echo esc_attr( $cta_primary['target'] ); ?>"<?php endif; ?>
              >
                <?php echo esc_html( $cta_primary['title'] ); ?>
              </a>
            <?php endif; ?>

            <?php if ( $cta_secondary ) : ?>
              <a
                href="<?php echo esc_url( $cta_secondary['url'] ); ?>"
                class="btn btn-secondary"
                <?php if ( $cta_secondary['target'] ) : ?>target="<?php echo esc_attr( $cta_secondary['target'] ); ?>"<?php endif; ?>
              >
                <?php echo esc_html( $cta_secondary['title'] ); ?>
              </a>
            <?php endif; ?>

          </div>
        <?php endif; ?>

      </div>

      <!-- Right col: image -->
      <?php if ( $section_image ) : ?>
        <div class="w-full lg:w-1/2 flex-shrink-0">
          <div class="overflow-hidden rounded">
            <img
              src="<?php echo esc_url( $section_image['url'] ); ?>"
              alt="<?php echo esc_attr( $section_image['alt'] ); ?>"
              width="<?php echo esc_attr( $section_image['width'] ); ?>"
              height="<?php echo esc_attr( $section_image['height'] ); ?>"
              class="w-full h-auto object-cover"
            >
          </div>
        </div>
      <?php endif; ?>

    </div>

  </div>
</section>
