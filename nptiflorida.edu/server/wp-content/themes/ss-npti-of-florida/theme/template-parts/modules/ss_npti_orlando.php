<?php
/**
 * Module: NPTI Orlando
 * Template Part: template-parts/modules/ss_npti_orlando.php
 * ACF Flexible Content Layout: ss_npti_orlando
 *
 * Fields:
 *  - ss_npti_orlando_section_heading           (text)
 *  - ss_npti_orlando_section_heading_highlight (text)
 *  - ss_npti_orlando_section_body              (textarea)
 *  - ss_npti_orlando_quick_links_icon          (image)
 *  - ss_npti_orlando_quick_links               (repeater)
 *    - ss_npti_orlando_quick_links_link            (link)
 *  - ss_npti_orlando_primary_cta               (link)
 *  - ss_npti_orlando_secondary_cta             (link)
 *  - ss_npti_orlando_form_heading              (text)
 *  - ss_npti_orlando_form_heading_highlight    (text)
 *  - ss_npti_orlando_form_submit_label         (text)
 */

$section_heading           = get_sub_field( 'ss_npti_orlando_section_heading' );
$section_heading_highlight = get_sub_field( 'ss_npti_orlando_section_heading_highlight' );
$section_body              = get_sub_field( 'ss_npti_orlando_section_body' );
$quick_links_icon          = get_sub_field( 'ss_npti_orlando_quick_links_icon' );
$primary_cta               = get_sub_field( 'ss_npti_orlando_primary_cta' );
$secondary_cta             = get_sub_field( 'ss_npti_orlando_secondary_cta' );
$form_heading              = get_sub_field( 'ss_npti_orlando_form_heading' );
$form_heading_highlight    = get_sub_field( 'ss_npti_orlando_form_heading_highlight' );
$form_submit_label         = get_sub_field( 'ss_npti_orlando_form_submit_label' );
$form_code                 = get_sub_field( 'ss_npti_orlando_form' );
$bg                        = get_sub_field('ss_background_class_name');
?>

<section
  id="ss-npti-orlando"
  class="ss-module-npti-orlando pad-section <?php echo $bg != '' || $bg != null ? $bg : '';  ?>"
>
  <div class="container mx-auto px-4">
    <div class="grid grid-cols-1 gap-8 lg:grid-cols-2 lg:items-start">

      <!-- Left column: heading + body + quick links + CTAs -->
      <div class="col-start-start-16">

        <h2>
          <?php echo esc_html( $section_heading ); ?>&nbsp;
          <?php if ( $section_heading_highlight ) : ?>
            <span class="text-orange"><?php echo esc_html( $section_heading_highlight ); ?></span>
          <?php endif; ?>
        </h2>

        <?php if ( $section_body ) : ?>
            <?php echo wp_kses_post( $section_body ); ?>
        <?php endif; ?>

        <?php if ( have_rows( 'ss_npti_orlando_quick_links' ) ) : ?>
          <div class="flex flex-wrap gap-4 w-full">

            <?php while ( have_rows( 'ss_npti_orlando_quick_links' ) ) : the_row();
              $quick_link = get_sub_field( 'ss_npti_orlando_quick_links_link' );
              if ( ! $quick_link ) continue;
            ?>
              <a
                href="<?php echo esc_url( $quick_link['url'] ); ?>"
                <?php if ( $quick_link['target'] ) echo 'target="' . esc_attr( $quick_link['target'] ) . '"'; ?>
                class="row-start-center gap-2 font-bold text-sm text-navy uppercase underline decoration-solid transition-fast hover:text-orange"
              >
                <?php echo esc_html( $quick_link['title'] ); ?>
                  <i class="icon-arrow-right text-sm" aria-hidden="true"></i>
              </a>
            <?php endwhile; ?>

          </div>
        <?php endif; ?>

        <?php if ( $primary_cta || $secondary_cta ) : ?>
          <div class="row-start-center gap-4 flex-wrap mt-3">
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

      <!-- Right column: Request More Information form -->
      <div class="bg-navy/10 rounded-xl p-8">

        <h2 class="mb-6">
          <?php echo esc_html( $form_heading ); ?>
          <?php if ( $form_heading_highlight ) : ?>
            <span class="text-orange"><?php echo esc_html( $form_heading_highlight ); ?></span>
          <?php endif; ?>
        </h2>

        <div>
          <?php echo do_shortcode($form_code); ?>
        </div>
      </div>
    </div>
  </div>
</section>
