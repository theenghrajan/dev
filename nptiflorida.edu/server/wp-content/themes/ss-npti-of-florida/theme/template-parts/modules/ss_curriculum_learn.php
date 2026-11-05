<?php
/**
 * Module: Curriculum — What You'll Learn
 * Template Part: template-parts/modules/ss_curriculum_learn.php
 * ACF Flexible Content Layout: ss_curriculum_learn
 *
 * Fields:
 *  - ss_curriculum_learn_section_heading (text)
 *  - ss_curriculum_learn_section_heading_highlight (text)
 *  - ss_curriculum_learn_section_subheading (text)
 *  - ss_curriculum_learn_curriculum_modules (repeater)
 *      - ss_curriculum_learn_curriculum_modules_module_title (text)
 *      - ss_curriculum_learn_curriculum_modules_module_items (wysiwyg)
 */

$section_heading   = get_sub_field( 'ss_curriculum_learn_section_heading' );
$heading_highlight = get_sub_field( 'ss_curriculum_learn_section_heading_highlight' );
$section_subheading = get_sub_field( 'ss_curriculum_learn_section_subheading' );

if ( ! $section_heading ) return;
?>

<section id="ss-curriculum-learn" class="ss-module-curriculum-learn bg-white py-10 md:py-16 lg:py-20">
  <div class="container mx-auto px-4">

    <!-- Section header -->
    <div class="text-center mb-10 md:mb-12">

      <h2 class="font-heading font-bold text-3xl md:text-4xl text-navy leading-tight mb-3">
        <?php echo esc_html( $section_heading ); ?><br>
        <span class="text-orange"><?php echo esc_html( $heading_highlight ); ?></span>
      </h2>

      <?php if ( $section_subheading ) : ?>
      <p class="font-body font-normal text-md text-navy leading-relaxed">
        <?php echo esc_html( $section_subheading ); ?>
      </p>
      <?php endif; ?>

    </div>

    <?php if ( have_rows( 'ss_curriculum_learn_curriculum_modules' ) ) : ?>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

      <?php while ( have_rows( 'ss_curriculum_learn_curriculum_modules' ) ) : the_row(); ?>
      <?php
        $module_title = get_sub_field( 'ss_curriculum_learn_curriculum_modules_module_title' );
        $module_items = get_sub_field( 'ss_curriculum_learn_curriculum_modules_module_items' );
      ?>
      <div class="bg-light-blue rounded p-6 flex flex-col gap-4">

        <?php if ( $module_title ) : ?>
        <h3 class="font-heading font-bold text-lg text-navy leading-snug">
          <?php echo esc_html( $module_title ); ?>
        </h3>
        <?php endif; ?>

        <?php if ( $module_items ) : ?>
        <div class="ss-list-items">
          <?php echo wp_kses_post( $module_items ); ?>
        </div>
        <?php endif; ?>

      </div>
      <?php endwhile; ?>

    </div>
    <?php endif; ?>

  </div>
</section>
