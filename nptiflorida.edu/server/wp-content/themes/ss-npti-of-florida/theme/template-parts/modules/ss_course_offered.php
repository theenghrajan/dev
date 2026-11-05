<?php
/**
 * Module: Course Offered
 * Template Part: template-parts/modules/ss_course_offered.php
 * ACF Flexible Content Layout: ss_course_offered
 *
 * Fields:
 *  - ss_course_offered_section_heading   (text)
 *  - ss_course_offered_section_intro     (textarea)
 *  - ss_course_offered_campus_cards      (repeater)
 *    - ss_course_offered_campus_cards_card_image       (image)
 *    - ss_course_offered_campus_cards_card_campus_name (text)
 *    - ss_course_offered_campus_cards_card_courses     (repeater)
 *      - ss_course_offered_campus_cards_card_courses_course_name (text)
 *    - ss_course_offered_campus_cards_card_cta         (link)
 *    - ss_course_offered_campus_cards_card_cta_icon    (select)
 *  - ss_course_offered_section_body      (textarea)
 *  - ss_course_offered_accommodation_note (textarea)
 *  - ss_course_offered_contact_cta       (link)
 */

$section_heading      = get_sub_field( 'ss_course_offered_section_heading' );
$section_intro        = get_sub_field( 'ss_course_offered_section_intro' );
$section_body         = get_sub_field( 'ss_course_offered_section_body' );
$accommodation_note   = get_sub_field( 'ss_course_offered_accommodation_note' );
$contact_cta          = get_sub_field( 'ss_course_offered_contact_cta' );

if ( ! $section_heading ) return;
?>

<section
  id="ss-course-offered"
  class="ss-module-course-offered bg-blue-08 md:pt-3 pb-16"
>
  <div class="container mx-auto px-4">
    <div class="col-start-start-16">

      <h3><?php echo esc_html( $section_heading ); ?></h3>

      <?php if ( $section_intro ) : ?>
        <p>
          <?php echo wp_kses_post( $section_intro ); ?>
        </p>
      <?php endif; ?>

      <?php if ( have_rows( 'ss_course_offered_campus_cards' ) ) : ?>
        <div class="grid grid-cols-1 gap-6 lg:grid-cols-2 w-full pt-2 pb-3.5 lg:pt-4 lg:pb-6">

          <?php while ( have_rows( 'ss_course_offered_campus_cards' ) ) : the_row();
            $card_image       = get_sub_field( 'ss_course_offered_campus_cards_card_image' );
            $card_campus_name = get_sub_field( 'ss_course_offered_campus_cards_card_campus_name' );
            $card_cta         = get_sub_field( 'ss_course_offered_campus_cards_card_cta' );
            $card_cta_icon    = get_sub_field( 'ss_course_offered_campus_cards_card_cta_icon' );
          ?>

            <div class="bg-blue rounded-xl p-4 col-start-start-16">

              <div class="flex flex-col gap-4 sm:flex-row sm:items-start">

                <?php if ( $card_image ) : ?>
                  <div class="shrink-0 sm:max-w-[50%]">
                    <img
                      src="<?php echo esc_url( $card_image['url'] ); ?>"
                      alt="<?php echo esc_attr( $card_image['alt'] ); ?>"
                      width="<?php echo esc_attr( $card_image['width'] ); ?>"
                      height="<?php echo esc_attr( $card_image['height'] ); ?>"
                      class="rounded-lg object-cover w-full 2xl:w-[290px] 2xl:h-[240px] h-full border border-white"
                    >
                  </div>
                <?php endif; ?>

                <div class="col-start-start-8">

                  <?php if ( $card_campus_name ) : ?>
                    <h3 class="text-white text-lg leading-snug"><?php echo esc_html( $card_campus_name ); ?></h3>
                  <?php endif; ?>

                  <?php if ( have_rows( 'ss_course_offered_campus_cards_card_courses' ) ) : ?>
                    <ul class="list-disc pl-5 col-start-start-8 ml-3 leading-none [&_li]:leading-none [&_li]:!pt-0">
                      <?php while ( have_rows( 'ss_course_offered_campus_cards_card_courses' ) ) : the_row();
                        $course_name = get_sub_field( 'ss_course_offered_campus_cards_card_courses_course_name' );
                      ?>
                        <?php if ( $course_name ) : ?>
                          <li class="font-ui text-sm text-white leading-relaxed"><?php echo esc_html( $course_name ); ?></li>
                        <?php endif; ?>
                      <?php endwhile; ?>
                    </ul>
                  <?php endif; ?>

                  <?php if ( $card_cta ) : ?>
                    <a href="<?php echo esc_url( $card_cta['url'] ); ?>"<?php if ( $card_cta['target'] ) echo ' target="' . esc_attr( $card_cta['target'] ) . '"'; ?> class="row-start-center gap-2 text-white font-bold text-sm uppercase no-underline transition-fast hover:text-orange mt-2">
                      <?php echo esc_html( $card_cta['title'] ); ?>
                      <?php if ( $card_cta_icon ) : ?>
                        <i class="<?php echo esc_attr( $card_cta_icon ); ?>" aria-hidden="true"></i>
                      <?php endif; ?>
                    </a>
                  <?php endif; ?>

                </div>

              </div>

            </div>

          <?php endwhile; ?>

        </div>
      <?php endif; ?>

      <?php if ( $section_body ) : ?>
        <p>
          <?php echo wp_kses_post( $section_body ); ?>
        </p>
      <?php endif; ?>

      <?php if ( $accommodation_note ) : ?>
        <p class="font-ui">
          <?php echo wp_kses_post( $accommodation_note ); ?>
        </p>
      <?php endif; ?>

      <?php if ( $contact_cta ) : ?>
        <a href="<?php echo esc_url( $contact_cta['url'] ); ?>"<?php if ( $contact_cta['target'] ) echo ' target="' . esc_attr( $contact_cta['target'] ) . '"'; ?> class="btn btn-secondary">
          <?php echo esc_html( $contact_cta['title'] ); ?>
        </a>
      <?php endif; ?>

    </div>
  </div>
</section>
