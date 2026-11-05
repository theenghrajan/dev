<?php
/**
 * Module: Info Catalog
 * Template Part: template-parts/modules/ss_info_cat.php
 * ACF Flexible Content Layout: ss_info_cat
 *
 * Fields:
 *  - ss_info_cat_section_heading (text)
 * - ss_info_cat_catalog_items
 * - ss_info_cat_catalog_items_col2
 * - ss_info_cat_catalog_items_col3
 * - ss_info_cat_catalog_ctas (repeater)
 *   - ss_info_cat_catalog_ctas_cta_link (link)
 */

$section_heading = get_sub_field( 'ss_info_cat_section_heading' );
if ( ! $section_heading ) return;


$col1_content = get_sub_field( 'ss_info_cat_catalog_items');
$col2_content = get_sub_field( 'ss_info_cat_catalog_items_col2');
$col3_content = get_sub_field( 'ss_info_cat_catalog_items_col3');
?>
<section
    id="ss-info-cat"
    class="ss-module-info-cat bg-white pad-section"
>
    <div class="container mx-auto px-4">
        <?php if ( ! empty( $section_heading ) ) : ?>
            <h3 class="text-navy text-center w-full mb-4"><?php echo esc_html( $section_heading ); ?></h3>
        <?php endif; ?>
        <div class="bg-light-blue rounded-lg p-6 col-center-center-16 gap-6 shadow-card mb-6">

            <?php if ( ! empty( $col1_content ) || !empty($col2_content) || !empty($col3_content)) : ?>
            <div class="w-full">
                <div class="grid grid-cols-1 gap-3 md:grid-cols-3">
                    <?php if ( $col1_content ) : ?>
                    <div class="col-start-start-16 gap-3 ss-list-items">
                        <?php echo $col1_content; ?>
                    </div>
                    <?php endif; ?>
                    <?php if ( $col2_content ) : ?>
                    <div class="col-start-start-16 gap-3 ss-list-items">
                        <?php echo $col2_content; ?>
                    </div>
                    <?php endif; ?>
                    <?php if ( $col3_content ) : ?>
                    <div class="col-start-start-16 gap-3 ss-list-items">
                        <?php echo $col3_content; ?>
                    </div>
                    <?php endif; ?>

                </div>
            </div>
            <?php endif; ?>
        </div>

            <?php if ( have_rows( 'ss_info_cat_catalog_ctas' ) ) : ?>
            <div class="text-center flex gap-4 flex-wrap justify-center">
                <?php while ( have_rows( 'ss_info_cat_catalog_ctas' ) ) : the_row();
                    $cta_link = get_sub_field( 'ss_info_cat_catalog_ctas_cta_link' );
                    if ( $cta_link ) :
                ?>
                <a href="<?php echo esc_url( $cta_link['url'] ); ?>"
                   class="btn-secondary"<?php if ( ! empty( $cta_link['target'] ) ) : ?> target="<?php echo esc_attr( $cta_link['target'] ); ?>"<?php endif; ?>>
                    <?php echo esc_html( $cta_link['title'] ); ?>
                </a>
                <?php endif; endwhile; ?>
            </div>
            <?php endif; ?>
    </div>
</section>
