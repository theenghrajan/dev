<?php
/**
 * Module: Asked Questions (FAQ)
 * Template Part: template-parts/modules/ss_asked_questions.php
 * ACF Flexible Content Layout: ss_asked_questions
 *
 * Fields:
 *  - ss_asked_questions_section_heading           (text)
 *  - ss_asked_questions_section_heading_highlight (text)
 *  - ss_asked_questions_section_subheading        (text)
 *  - ss_asked_questions_section_class             (text)     — extra CSS class(es), default bg-light-blue
 *  - ss_asked_questions_items                     (relationship → ss_faqs post type)
 *      Post title   = question
 *      Post content = answer
 */

$section_heading           = get_sub_field( 'ss_asked_questions_section_heading' );
$section_heading_highlight = get_sub_field( 'ss_asked_questions_section_heading_highlight' );
$section_subheading        = get_sub_field( 'ss_asked_questions_section_subheading' );
$section_class             = get_sub_field( 'ss_asked_questions_section_class' ) ?: 'bg-light-blue';
$faq_posts                 = get_sub_field( 'ss_asked_questions_items' ) ?: [];
?>

<section
  class="ss-module-asked-questions <?php echo esc_attr( $section_class ); ?> py-10 md:py-16 lg:py-20">
  <div class="container mx-auto px-4">

    <!-- Section header -->
    <?php if ( $section_heading || $section_heading_highlight || $section_subheading ) : ?>
      <div class="text-center mb-10 md:mb-12">

        <?php if ( $section_heading || $section_heading_highlight ) : ?>
          <h2 class="font-heading font-bold text-3xl md:text-4xl text-navy leading-tight mb-3">
            <?php echo esc_html( $section_heading ); ?>
            <?php if ( $section_heading_highlight ) : ?>
              <span class="text-orange"><?php echo esc_html( $section_heading_highlight ); ?></span>
            <?php endif; ?>
          </h2>
        <?php endif; ?>

        <?php if ( $section_subheading ) : ?>
          <p class="font-body font-normal text-md text-navy leading-relaxed">
            <?php echo esc_html( $section_subheading ); ?>
          </p>
        <?php endif; ?>

      </div>
    <?php endif; ?>

    <?php if ( ! empty( $faq_posts ) ) : ?>
      <div class="flex flex-col gap-3">

        <?php foreach ( $faq_posts as $faq_index => $faq_post ) :
          $question = get_the_title( $faq_post );
          $answer   = get_the_content( null, false, $faq_post );
          $is_first = $faq_index === 0;
          if ( ! $question ) continue;
        ?>
          <div class="accordion-item<?php echo $is_first ? ' itemActive' : ''; ?> bg-white border border-navy/10 rounded px-6 py-4 cursor-pointer">
            <div class="accordionBtn flex items-start justify-between gap-6 <?php echo $is_first ? ' active' : ''; ?> [&.active_i]:rotate-180 [&.active_i]:before:content-['\e92d']">
              <p class="mb-0 font-body font-semibold text-lg text-navy leading-snug">
                <?php echo esc_html( $question ); ?>
              </p>
              <i class="<?php echo $is_first ? 'icon-minus' : 'icon-plus'; ?> mt-1 shrink-0 text-sm leading-none transition-all duration-300 origin-center pointer-events-none"
                aria-hidden="true"></i>
            </div>
            <?php if ( $answer ) : ?>
              <div class="accordionBody mt-3"<?php echo $is_first ? '' : ' style="display:none;"'; ?>>
                <div class="[&_p]:font-body [&_p]:font-normal [&_p]:text-md [&_p]:text-navy [&_p]:leading-relaxed">
                  <?php echo wp_kses_post( apply_filters( 'the_content', $answer ) ); ?>
                </div>
              </div>
            <?php endif; ?>
          </div>
        <?php endforeach; ?>

      </div>
    <?php endif; ?>

  </div>
</section>
