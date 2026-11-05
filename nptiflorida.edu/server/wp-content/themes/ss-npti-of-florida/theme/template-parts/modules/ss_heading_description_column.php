<?php
/**
 * Module: Heading Description Column
 * Template Part: template-parts/modules/ss_heading_description_column.php
 * ACF Flexible Content Layout: ss_heading_description_column
 *
 * Fields:
 *  - ss_heading_description_column_section_heading (text)
 *  - ss_heading_description_column_section_heading_highlight (text)
 *  - ss_heading_description_column_description_1 (textarea)
 *  - ss_heading_description_column_description_2 (textarea)
 */

$section_heading           = get_sub_field( 'ss_heading_description_column_section_heading' );
$section_heading_highlight = get_sub_field( 'ss_heading_description_column_section_heading_highlight' );
$description_1             = get_sub_field( 'ss_heading_description_column_description_1' );
$description_2             = get_sub_field( 'ss_heading_description_column_description_2' );
$bg = get_sub_field('ss_background_class_name');
$ss_padding_bottom = get_sub_field('ss_padding_bottom');
?>

<section
  id="ss-heading-description-column"
  class="ss-module-heading-description-column <?php echo $ss_padding_bottom == true ? ' py-10 lg:py-16' : 'pt-10 lg:pt-16'; ?> <?php echo $bg != '' || $bg != null ? $bg : '';  ?>""
>
  <div class="container mx-auto px-4">

    <div class="flex flex-col items-center gap-3 text-center">

      <h2 class="leading-tight w-full text-xl mb-0">
        <?php if ( $section_heading ) : ?>
          <span class="text-orange"><?php echo esc_html( $section_heading ); ?></span>
        <?php endif; ?>
        <?php if ( $section_heading_highlight ) : ?>
          <span class="text-navy"><?php echo esc_html( $section_heading_highlight ); ?></span>
        <?php endif; ?>
      </h2>

      <?php if ( $description_1 ) : ?>
        <strong class="text-navy leading-relaxed max-w-6xl mx-auto text-lg">
          <?php echo ( $description_1 ); ?>
        </strong>
      <?php endif; ?>

      <?php if ( $description_2 ) : ?>
        <p class="text-navy leading-relaxed max-w-6xl mx-auto">
          <?php echo ( $description_2 ); ?>
        </p>
      <?php endif; ?>

    </div>

  </div>
</section>
