<?php
/**
 * Module: Choose Location
 * Template Part: template-parts/modules/ss_choose_location.php
 * ACF Flexible Content Layout: ss_choose_location
 *
 * Component CSS (tailwind/custom/components/components.css):
 *  - .ss-choose-location__program-card — card wrapper (8 classes, 3+ instances)
 *  - .ss-choose-location__apply-btn    — apply button (14 classes, 4+ instances)
 *
 * Fields:
 *  - ss_choose_location_section_heading           (text)
 *  - ss_choose_location_section_heading_highlight (text)
 *  - ss_choose_location_location_1_name           (text)
 *  - ss_choose_location_orlando_programs          (repeater)
 *      - ss_choose_location_orlando_programs_program_label       (text)
 *      - ss_choose_location_orlando_programs_program_apply_link  (link)
 *  - ss_choose_location_location_2_name           (text)
 *  - ss_choose_location_tampa_programs            (repeater)
 *      - ss_choose_location_tampa_programs_program_label         (text)
 *      - ss_choose_location_tampa_programs_program_apply_link    (link)
 */

$section_heading           = get_sub_field( 'ss_choose_location_section_heading' );
$section_heading_highlight = get_sub_field( 'ss_choose_location_section_heading_highlight' );

if ( ! $section_heading && ! $section_heading_highlight ) return;

$location_1_name = get_sub_field( 'ss_choose_location_location_1_name' );
$location_2_name = get_sub_field( 'ss_choose_location_location_2_name' );
?>

<section
  id="ss-choose-location"
  class="ss-module-choose-location bg-light-blue py-10 md:py-16 lg:py-20"
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

    <!-- Orlando Location -->
    <div class="flex flex-col gap-4 mb-10 md:mb-12">

      <?php if ( $location_1_name ) : ?>
        <h3 class="font-heading font-bold text-xl text-navy text-center">
          <?php echo esc_html( $location_1_name ); ?>
        </h3>
      <?php endif; ?>

      <?php if ( have_rows( 'ss_choose_location_orlando_programs' ) ) : ?>
        <div class="flex flex-wrap justify-center gap-y-6 -mx-3">
          <?php while ( have_rows( 'ss_choose_location_orlando_programs' ) ) : the_row();
            $program_label = get_sub_field( 'ss_choose_location_orlando_programs_program_label' );
            $apply_link    = get_sub_field( 'ss_choose_location_orlando_programs_program_apply_link' );
          ?>
            <div class="w-full sm:w-1/2 md:w-1/3 px-3">
              <div class="ss-choose-location__program-card flex flex-col h-full">
                <?php if ( $program_label ) : ?>
                  <div class="grow">
                    <p class="font-ui font-semibold text-xl text-navy text-center leading-snug">
                      <?php echo esc_html( $program_label ); ?>
                    </p>
                  </div>
                <?php endif; ?>
                <?php if ( $apply_link ) : ?>
                  <a
                    href="<?php echo esc_url( $apply_link['url'] ); ?>"
                    <?php if ( $apply_link['target'] ) : ?>target="<?php echo esc_attr( $apply_link['target'] ); ?>"<?php endif; ?>
                    class="ss-choose-location__apply-btn hover:text-white"
                  >
                    <?php echo esc_html( $apply_link['title'] ); ?>
                  </a>
                <?php endif; ?>
              </div>
            </div>
          <?php endwhile; ?>
        </div>
      <?php endif; ?>
    </div>

    <!-- Tampa Location -->
    <div class="flex flex-col gap-4">

      <?php if ( $location_2_name ) : ?>
        <h3 class="font-heading font-bold text-xl text-navy text-center">
          <?php echo esc_html( $location_2_name ); ?>
        </h3>
      <?php endif; ?>

      <?php if ( have_rows( 'ss_choose_location_tampa_programs' ) ) : ?>
        <div class="flex flex-wrap justify-center gap-y-6 -mx-3">
          <?php while ( have_rows( 'ss_choose_location_tampa_programs' ) ) : the_row();
            $program_label = get_sub_field( 'ss_choose_location_tampa_programs_program_label' );
            $apply_link    = get_sub_field( 'ss_choose_location_tampa_programs_program_apply_link' );
          ?>
            <div class="w-full sm:w-1/2 md:w-1/3 px-3">
              <div class="bg-white border border-navy/10 rounded-2xl p-4 flex flex-col gap-4 items-center w-full">
                <?php if ( $program_label ) : ?>
                  <div class="grow">
                    <p class="font-ui font-semibold text-xl text-navy text-center leading-snug">
                      <?php echo esc_html( $program_label ); ?>
                    </p>
                  </div>
                <?php endif; ?>
                <?php if ( $apply_link ) : ?>
                  <a
                    href="<?php echo esc_url( $apply_link['url'] ); ?>"
                    <?php if ( $apply_link['target'] ) : ?>target="<?php echo esc_attr( $apply_link['target'] ); ?>"<?php endif; ?>
                    class="ss-choose-location__apply-btn hover:text-white"
                  >
                    <?php echo esc_html( $apply_link['title'] ); ?>
                  </a>
                <?php endif; ?>
              </div>
            </div>
          <?php endwhile; ?>
        </div>
      <?php endif; ?>

    </div>

  </div>
</section>
