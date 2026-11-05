<?php
/**
 * Module: 2 Col Content Bottom Image
 * Template Part: template-parts/modules/ss_2_col_content_bottom_image.php
 * ACF Flexible Content Layout: ss_2_col_content_bottom_image
 *
 * Fields:
 *  - ss_2_col_content_bottom_image_section_heading (text)
 *  - ss_2_col_content_bottom_image_left_paragraph (textarea)
 *  - ss_2_col_content_bottom_image_contact_form_link (link)
 *  - ss_2_col_content_bottom_image_right_paragraph_1 (textarea)
 *  - ss_2_col_content_bottom_image_right_paragraph_2 (textarea)
 *  - ss_2_col_content_bottom_image_bottom_image (image)
 */

$section_heading    = get_sub_field( 'ss_2_col_content_bottom_image_section_heading' );
$left_paragraph     = get_sub_field( 'ss_2_col_content_bottom_image_left_paragraph' );
$contact_form_link  = get_sub_field( 'ss_2_col_content_bottom_image_contact_form_link' );
$right_paragraph_1  = get_sub_field( 'ss_2_col_content_bottom_image_right_paragraph_1' );
$right_paragraph_2  = get_sub_field( 'ss_2_col_content_bottom_image_right_paragraph_2' );
$bottom_image       = get_sub_field( 'ss_2_col_content_bottom_image_bottom_image' );

if ( ! $section_heading ) return;
?>

<section
  id="ss-2-col-content-bottom-image"
  class="ss-module-2-col-content-bottom-image py-10 md:py-16 lg:py-20"
>
  <div class="container mx-auto px-4">

    <!-- ── Two-column text row ────────────────────────────────────────── -->
    <div class="flex flex-col gap-8 mb-10 md:mb-14 lg:flex-row lg:items-end lg:gap-20">

      <!-- Left column: orange heading + body with inline link -->
      <div class="flex flex-col gap-5 w-full lg:w-1/2">

        <?php if ( $section_heading ) : ?>
          <h2 class="font-heading font-bold text-2xl md:text-3xl leading-tight text-orange">
            <?php echo esc_html( $section_heading ); ?>
          </h2>
        <?php endif; ?>

        <?php if ( $left_paragraph || $contact_form_link ) : ?>
          <p class="font-ui font-medium text-md text-navy leading-relaxed">
            <?php if ( $left_paragraph ) : ?>
              <?php echo esc_html( $left_paragraph ); ?>
            <?php endif; ?>
            <?php if ( $contact_form_link ) : ?>
              <a
                href="<?php echo esc_url( $contact_form_link['url'] ); ?>"
                class="text-orange hover:underline"
                <?php if ( ! empty( $contact_form_link['target'] ) ) : ?>
                  target="<?php echo esc_attr( $contact_form_link['target'] ); ?>"
                <?php endif; ?>
              ><?php echo esc_html( $contact_form_link['title'] ); ?></a>
            <?php endif; ?>
          </p>
        <?php endif; ?>

      </div>

      <!-- Right column: two body paragraphs -->
      <div class="flex flex-col gap-6 w-full lg:w-1/2">

        <?php if ( $right_paragraph_1 ) : ?>
          <p class="font-ui font-normal text-md text-navy leading-relaxed">
            <?php echo esc_html( $right_paragraph_1 ); ?>
          </p>
        <?php endif; ?>

        <?php if ( $right_paragraph_2 ) : ?>
          <p class="font-ui font-normal text-md text-navy leading-relaxed">
            <?php echo esc_html( $right_paragraph_2 ); ?>
          </p>
        <?php endif; ?>

      </div>

    </div>

    <!-- ── Full-width image below ──────────────────────────────────────── -->
    <?php if ( $bottom_image ) : ?>
      <div class="overflow-hidden rounded">
        <img
          src="<?php echo esc_url( $bottom_image['url'] ); ?>"
          alt="<?php echo esc_attr( $bottom_image['alt'] ); ?>"
          class="w-full object-cover"
          width="<?php echo esc_attr( $bottom_image['width'] ); ?>"
          height="<?php echo esc_attr( $bottom_image['height'] ); ?>"
          style="min-height: 320px;"
        >
      </div>
    <?php endif; ?>

  </div>
</section>
