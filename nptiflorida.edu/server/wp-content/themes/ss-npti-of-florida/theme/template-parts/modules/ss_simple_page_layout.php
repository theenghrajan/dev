<?php
/**
 * Module: Simple Page Layout
 * Template Part: template-parts/modules/ss_simple_page_layout.php
 * ACF Flexible Content Layout: ss_simple_page_layout
 *
 * Fields:
 *  - ss_simple_page_body           (wysiwyg)  — main content body
 */
?>

<section class="pad-section">
  <div class="container mx-auto px-4">
    <?php the_sub_field( 'ss_simple_page_body' ); ?>
  </div>
</section>
