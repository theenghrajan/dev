<?php
/**
 * Module: NPTI Class Dates
 * Template Part: template-parts/modules/ss_npti_class.php
 * ACF Flexible Content Layout: ss_npti_class
 *
 * Fields:
 *  - ss_npti_class_section_heading           (text)
 *  - ss_npti_class_section_heading_highlight (text)
 *  - ss_npti_class_institute_logo            (image)
 *  - ss_npti_class_schedule_year_label       (text)
 *  - ss_npti_class_schedule_program_label    (text)
 *  - ss_npti_class_schedule_col_times        (text)
 *  - ss_npti_class_schedule_col_start        (text)
 *  - ss_npti_class_schedule_col_graduate     (text)
 *  - ss_npti_class_schedule_col_theory       (text)
 *  - ss_npti_class_schedule_col_practical    (text)
 *  - ss_npti_class_schedule_table_year       (text)
 *  - ss_npti_class_schedule_rows             (repeater)
 *    - ss_npti_class_schedule_rows_time_range      (text)
 *    - ss_npti_class_schedule_rows_time_days       (text)
 *    - ss_npti_class_schedule_rows_start_date      (text)
 *    - ss_npti_class_schedule_rows_start_day       (text)
 *    - ss_npti_class_schedule_rows_grad_date       (text)
 *    - ss_npti_class_schedule_rows_grad_day        (text)
 *    - ss_npti_class_schedule_rows_theory_hours    (text)
 *    - ss_npti_class_schedule_rows_practical_hours (text)
 *  - ss_npti_class_winter_break_note         (text)
 *  - ss_npti_class_schedule_footnote         (text)
 *  - ss_npti_class_cta                       (link)
 */

$section_heading           = get_sub_field( 'ss_npti_class_section_heading' );
$section_heading_highlight = get_sub_field( 'ss_npti_class_section_heading_highlight' );
$institute_logo            = get_sub_field( 'ss_npti_class_institute_logo' );
$schedule_year_label       = get_sub_field( 'ss_npti_class_schedule_year_label' );
$schedule_program_label    = get_sub_field( 'ss_npti_class_schedule_program_label' );
$schedule_col_times        = get_sub_field( 'ss_npti_class_schedule_col_times' );
$schedule_col_start        = get_sub_field( 'ss_npti_class_schedule_col_start' );
$schedule_col_graduate     = get_sub_field( 'ss_npti_class_schedule_col_graduate' );
$schedule_col_theory       = get_sub_field( 'ss_npti_class_schedule_col_theory' );
$schedule_col_practical    = get_sub_field( 'ss_npti_class_schedule_col_practical' );
$schedule_table_year       = get_sub_field( 'ss_npti_class_schedule_table_year' );
$winter_break_note         = get_sub_field( 'ss_npti_class_winter_break_note' );
$schedule_footnote         = get_sub_field( 'ss_npti_class_schedule_footnote' );
$cta                       = get_sub_field( 'ss_npti_class_cta' );

if ( ! $section_heading ) return;
?>

<section
  id="ss-npti-class"
  class="ss-module-npti-class bg-white pad-section"
>
  <div class="container mx-auto px-4">
    <div class="col-center-center-16 text-center">

      <h2 class="text-center mb-4 xl:mb-6">
        <?php echo esc_html( $section_heading ); ?><br>
        <?php if ( $section_heading_highlight ) : ?>
          <span class="text-orange"><?php echo esc_html( $section_heading_highlight ); ?></span>
        <?php endif; ?>
      </h2>

      <?php if ( $institute_logo ) : ?>
        <img
          src="<?php echo esc_url( $institute_logo['url'] ); ?>"
          alt="<?php echo esc_attr( $institute_logo['alt'] ); ?>"
          class="mx-auto max-w-5xl w-full h-auto"
        >
      <?php endif; ?>

      <!-- <?php //if ( $schedule_year_label ) : ?>
        <p class="font-ui font-semibold text-blue text-lg leading-snug">
          <?php //echo esc_html( $schedule_year_label ); ?>
        </p>
      <?php //endif; ?>

      <?php //if ( $schedule_program_label ) : ?>
        <p class="font-ui text-navy text-base leading-snug">
          <?php //echo esc_html( $schedule_program_label ); ?>
        </p>
      <?php //endif; ?>

      <div class="w-full overflow-x-auto">
        <table class="w-full border-collapse font-ui text-sm text-navy text-left">
          <thead>
            <tr class="bg-navy text-white">
              <th class="px-4 py-3 font-bold text-center border border-navy/30"><?php //echo esc_html( $schedule_col_times ); ?></th>
              <th class="px-4 py-3 font-bold text-center border border-navy/30"><?php //echo esc_html( $schedule_col_start ); ?></th>
              <th class="px-4 py-3 font-bold text-center border border-navy/30"><?php //echo esc_html( $schedule_col_graduate ); ?></th>
              <th class="px-4 py-3 font-bold text-center border border-navy/30"><?php //echo esc_html( $schedule_col_theory ); ?></th>
              <th class="px-4 py-3 font-bold text-center border border-navy/30"><?php //echo esc_html( $schedule_col_practical ); ?></th>
            </tr>
          </thead>
          <tbody>

            <?php //if ( $schedule_table_year ) : ?>
              <tr>
                <td colspan="5" class="px-4 py-2 font-bold text-center border border-navy/30 bg-orange/10"><?php echo esc_html( $schedule_table_year ); ?></td>
              </tr>
            <?php //endif; ?>

            <?php //if ( have_rows( 'ss_npti_class_schedule_rows' ) ) : ?>
              <?php //while ( have_rows( 'ss_npti_class_schedule_rows' ) ) : the_row();
                // $time_range      = get_sub_field( 'ss_npti_class_schedule_rows_time_range' );
                // $time_days       = get_sub_field( 'ss_npti_class_schedule_rows_time_days' );
                // $start_date      = get_sub_field( 'ss_npti_class_schedule_rows_start_date' );
                // $start_day       = get_sub_field( 'ss_npti_class_schedule_rows_start_day' );
                // $grad_date       = get_sub_field( 'ss_npti_class_schedule_rows_grad_date' );
                // $grad_day        = get_sub_field( 'ss_npti_class_schedule_rows_grad_day' );
                // $theory_hours    = get_sub_field( 'ss_npti_class_schedule_rows_theory_hours' );
                // $practical_hours = get_sub_field( 'ss_npti_class_schedule_rows_practical_hours' );
              ?>
                <tr class="border border-navy/30">
                  <td class="px-4 py-2 text-center border border-navy/30">
                    <?php //echo esc_html( $time_range ); ?><br>
                    <span class="text-xs text-navy/70"><?php //echo esc_html( $time_days ); ?></span>
                  </td>
                  <td class="px-4 py-2 text-center border border-navy/30">
                    <?php //echo esc_html( $start_date ); ?><br>
                    <em class="text-xs"><?php //echo esc_html( $start_day ); ?></em>
                  </td>
                  <td class="px-4 py-2 text-center border border-navy/30">
                    <?php //echo esc_html( $grad_date ); ?><br>
                    <em class="text-xs"><?php //echo esc_html( $grad_day ); ?></em>
                  </td>
                  <td class="px-4 py-2 text-center border border-navy/30"><?php //echo esc_html( $theory_hours ); ?></td>
                  <td class="px-4 py-2 text-center border border-navy/30"><?php //echo esc_html( $practical_hours ); ?></td>
                </tr>
              <?php //endwhile; ?>
            <?php //endif; ?>

            <?php //if ( $winter_break_note ) : ?>
              <tr>
                <td colspan="5" class="px-4 py-2 text-center border border-navy/30 bg-orange/10 text-sm">
                  <?php //echo esc_html( $winter_break_note ); ?>
                </td>
              </tr>
            <?php //endif; ?>

          </tbody>
        </table>
      </div>

      <?php //if ( $schedule_footnote ) : ?>
        <p class="text-sm text-navy/70 text-left w-full mt-2">
          <?php //echo //esc_html( $schedule_footnote ); ?>
        </p>
      <?php //endif; ?>-->

      <?php if ( $cta ) : ?>
        <a
          href="<?php echo esc_url( $cta['url'] ); ?>"
          <?php if ( $cta['target'] ) echo 'target="' . esc_attr( $cta['target'] ) . '"'; ?>
          class="btn-primary mt-16"
        >
          <?php echo esc_html( $cta['title'] ); ?>
        </a>
      <?php endif; ?> 

    </div>
  </div>
</section>
