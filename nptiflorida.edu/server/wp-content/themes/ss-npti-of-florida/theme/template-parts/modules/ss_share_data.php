<?php
/**
 * Module: Share Data (Privacy Policy)
 * Template Part: template-parts/modules/ss_share_data.php
 * ACF Flexible Content Layout: ss_share_data
 *
 * Fields:
 *  - ss_share_data_toc_title      (text)
 *  - ss_share_data_toc_items      (repeater)
 *      - ss_share_data_toc_items_label     (text)
 *      - ss_share_data_toc_items_anchor    (text)
 *  - ss_share_data_content_sections (repeater)
 *      - ss_share_data_content_sections_anchor_id       (text)
 *      - ss_share_data_content_sections_section_title   (text)
 *      - ss_share_data_content_sections_suggested_label (text)
 *      - ss_share_data_content_sections_section_body    (wysiwyg)
 */

$toc_title = get_sub_field( 'ss_share_data_toc_title' );

if ( ! $toc_title && ! have_rows( 'ss_share_data_content_sections' ) ) return;
?>

<section
  id="ss-share-data"
  class="ss-module-share-data bg-blue-08 pad-section"
>
  <div class="container mx-auto px-4">
    <div class="grid grid-cols-1 gap-8 lg:grid-cols-[300px_1fr] lg:items-start">

      <!-- Table of Contents (sticky sidebar) -->
      <aside class="bg-white rounded-lg p-6 lg:sticky lg:top-[9.75rem]">
        <?php if ( $toc_title ) : ?>
          <p class="font-heading font-bold text-orange text-xl leading-snug mb-4">
            <?php echo esc_html( $toc_title ); ?>
          </p>
        <?php endif; ?>

        <?php if ( have_rows( 'ss_share_data_content_sections' ) ) : ?>
          <nav class="col-start-start-8 gap-3">
            <?php 
            $i = 0;
           while ( have_rows( 'ss_share_data_content_sections' ) ) : the_row();
            $section_title   = get_sub_field( 'ss_share_data_content_sections_section_title' );
            $suggested_label = get_sub_field( 'ss_share_data_content_sections_suggested_label' );
            $section_body    = get_sub_field( 'ss_share_data_content_sections_section_body' );
            ?>
              <?php if ( $section_title ) : ?>
                <a
                  href="#<?php echo esc_attr( str_replace(' ', '-', strtolower($section_title)) . '-' . $i ); ?>"
                  class="js-has-smooth-scroll font-ui font-medium text-navy text-base no-underline hover:text-orange transition-fast block"
                >
                  <?php echo esc_html( $section_title ); ?>
                </a>
              <?php endif; ?>
            <?php 
              $i++;
              endwhile; ?>
          </nav>
        <?php endif; ?>
      </aside>

      <!-- Policy content sections -->
      <?php if ( have_rows( 'ss_share_data_content_sections' ) ) : ?>
        <div class="col-start-start-16">
          <?php
            $i = 0;
             while ( have_rows( 'ss_share_data_content_sections' ) ) : the_row();
            $section_title   = get_sub_field( 'ss_share_data_content_sections_section_title' );
            $suggested_label = get_sub_field( 'ss_share_data_content_sections_suggested_label' );
            $section_body    = get_sub_field( 'ss_share_data_content_sections_section_body' );
          ?>
            <div
              <?php if ( $section_title ) : ?>id="<?php echo esc_attr( str_replace(' ', '-', strtolower($section_title)) . '-' . $i ); ?>"<?php endif; ?>
              class="w-full bg-white rounded-lg p-8"
            >
              <?php if ( $section_title ) : ?>
                <h2 class="text-2xl"><?php echo esc_html( $section_title ); ?></h2>
              <?php endif; ?>

              <?php if ( $suggested_label ) : ?>
                <p class="font-ui font-semibold text-navy"><?php echo esc_html( $suggested_label ); ?></p>
              <?php endif; ?>

              <?php if ( $section_body ) : ?>
                <?php echo wp_kses_post( $section_body ); ?>
              <?php endif; ?>
            </div>
          <?php
              $i++;
               endwhile; ?>
        </div>
      <?php endif; ?>

    </div>
  </div>
</section>
