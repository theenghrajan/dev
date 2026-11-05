<?php
/**
 * Module: The Process
 * Template Part: template-parts/modules/ss_the_process.php
 * ACF Flexible Content Layout: ss_the_process
 *
 * Component CSS (tailwind/custom/components/components.css):
 *  - .ss-the-process__step-card  — step card wrapper (7 classes, 3 instances)
 *  - .ss-the-process__step-icon  — icon badge wrapper (7 classes, 3 instances)
 *
 * Fields:
 *  - ss_the_process_section_heading           (text)
 *  - ss_the_process_section_heading_highlight (text)
 *  - ss_the_process_process_steps             (repeater)
 *      - ss_the_process_process_steps_step_icon        (select)
 *      - ss_the_process_process_steps_step_label       (text)
 *      - ss_the_process_process_steps_step_description (textarea)
 *  - ss_the_process_benefit_items             (wysiwyg)
 *  - ss_the_process_contact_heading           (text)
 *  - ss_the_process_contact_heading_highlight (text)
 *  - ss_the_process_contact_description       (textarea)
 *  - ss_the_process_contact_cta               (link)
 *  - ss_the_process_footer_note               (text)
 */

$section_heading           = get_sub_field( 'ss_the_process_section_heading' );
$section_heading_highlight = get_sub_field( 'ss_the_process_section_heading_highlight' );

if ( ! $section_heading && ! $section_heading_highlight ) return;

$benefit_items             = get_sub_field( 'ss_the_process_benefit_items' );
$contact_heading           = get_sub_field( 'ss_the_process_contact_heading' );
$contact_heading_highlight = get_sub_field( 'ss_the_process_contact_heading_highlight' );
$contact_description       = get_sub_field( 'ss_the_process_contact_description' );
$contact_cta               = get_sub_field( 'ss_the_process_contact_cta' );
$footer_note               = get_sub_field( 'ss_the_process_footer_note' );
?>

<section
  id="ss-the-process"
  class="ss-module-the-process bg-white py-10 md:py-16 lg:py-20"
>
  <div class="container mx-auto px-4">

    <!-- Heading -->
    <h2 class="font-heading font-bold text-3xl md:text-4xl text-navy text-center leading-tight mb-10 md:mb-12">
      <?php if ( $section_heading ) : ?>
        <?php echo esc_html( $section_heading ); ?>
      <?php endif; ?>
      <?php if ( $section_heading_highlight ) : ?>
        <span class="text-orange"><?php echo esc_html( $section_heading_highlight ); ?></span>
      <?php endif; ?>
    </h2>

    <!-- Row 1: 3 step cards -->
    <?php if ( have_rows( 'ss_the_process_process_steps' ) ) : ?>
      <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-10 md:mb-14">
        <?php while ( have_rows( 'ss_the_process_process_steps' ) ) : the_row();
          $step_icon        = get_sub_field( 'ss_the_process_process_steps_step_icon' );
          $step_label       = get_sub_field( 'ss_the_process_process_steps_step_label' );
          $step_description = get_sub_field( 'ss_the_process_process_steps_step_description' );
        ?>
          <div class="ss-the-process__step-card">
            <div class="ss-the-process__step-icon">
              <?php if ( $step_icon ) : ?>
                <i class="<?php echo esc_attr( $step_icon ); ?> text-white text-xl" aria-hidden="true"></i>
              <?php endif; ?>
            </div>
            <div class="flex flex-col gap-2">
              <?php if ( $step_label ) : ?>
                <p class="font-body font-bold text-md text-navy"><?php echo esc_html( $step_label ); ?></p>
              <?php endif; ?>
              <?php if ( $step_description ) : ?>
                <p class="font-body font-normal text-md text-navy leading-relaxed">
                  <?php echo esc_html( $step_description ); ?>
                </p>
              <?php endif; ?>
            </div>
          </div>
        <?php endwhile; ?>
      </div>
    <?php endif; ?>

    <!-- Row 2: Two-column info with vertical divider -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12 mb-10 md:mb-14 lg:divide-x lg:divide-navy/20">

      <!-- Left: Benefit Items -->
      <div class="ss-list-items flex flex-col lg:gap-2">
        <?php if ( $benefit_items ) : ?>
          <?php echo wp_kses_post( $benefit_items ); ?>
        <?php endif; ?>
      </div>

      <!-- Right: Contact -->
      <div class="flex flex-col gap-4 lg:pl-12">

        <?php if ( $contact_heading || $contact_heading_highlight ) : ?>
          <h3 class="font-heading font-bold text-xl text-navy leading-snug">
            <?php if ( $contact_heading ) : ?>
              <?php echo esc_html( $contact_heading ); ?>
            <?php endif; ?>
            <?php if ( $contact_heading_highlight ) : ?>
              <span class="text-orange"><?php echo esc_html( $contact_heading_highlight ); ?></span>
            <?php endif; ?>
          </h3>
        <?php endif; ?>

        <?php if ( $contact_description ) : ?>
          <p class="font-body font-normal text-md text-navy leading-relaxed">
            <?php echo esc_html( $contact_description ); ?>
          </p>
        <?php endif; ?>

        <?php if ( $contact_cta ) : ?>
          <div>
            <a
              href="<?php echo esc_url( $contact_cta['url'] ); ?>"
              <?php if ( $contact_cta['target'] ) : ?>target="<?php echo esc_attr( $contact_cta['target'] ); ?>"<?php endif; ?>
              class="inline-flex items-center justify-center bg-white hover:bg-orange/10 text-orange font-body font-bold text-sm uppercase rounded-4xl px-9 py-3 border-1.5 border-orange transition-colors"
            >
              <?php echo esc_html( $contact_cta['title'] ); ?>
            </a>
          </div>
        <?php endif; ?>

      </div>

    </div>

    <!-- Row 3: Footer note -->
    <?php if ( $footer_note ) : ?>
      <p class="font-body font-semibold text-md text-navy text-center leading-relaxed">
        <?php echo esc_html( $footer_note ); ?>
      </p>
    <?php endif; ?>

  </div>
</section>
