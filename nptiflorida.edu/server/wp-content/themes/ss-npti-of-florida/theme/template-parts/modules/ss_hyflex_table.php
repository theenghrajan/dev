<?php
/**
 * Module: Hyflex Table
 * Template Part: template-parts/modules/ss_hyflex_table.php
 * ACF Flexible Content Layout: ss_hyflex_table
 *
 * Fields:
 *  - ss_hyflex_table_table_rows (repeater)
 *      - ss_hyflex_table_table_rows_course_number (text)
 *      - ss_hyflex_table_table_rows_course_title (text)
 *      - ss_hyflex_table_table_rows_course_description (textarea)
 *      - ss_hyflex_table_table_rows_theory_hours (text)
 *      - ss_hyflex_table_table_rows_practicum_hours (text)
 *      - ss_hyflex_table_table_rows_total_hours (text)
 *      - ss_hyflex_table_table_rows_online (text)
 *      - ss_hyflex_table_table_rows_hyflex (text)
 *  - ss_hyflex_table_footer_label (text)
 *  - ss_hyflex_table_footer_theory_hours (text)
 *  - ss_hyflex_table_footer_practicum_hours (text)
 *  - ss_hyflex_table_footer_total_hours (text)
 *  - ss_hyflex_table_footer_hyflex_hours (text)
 */

$footer_label         = get_sub_field( 'ss_hyflex_table_footer_label' );
$footer_theory_hours  = get_sub_field( 'ss_hyflex_table_footer_theory_hours' );
$footer_practicum     = get_sub_field( 'ss_hyflex_table_footer_practicum_hours' );
$footer_total_hours   = get_sub_field( 'ss_hyflex_table_footer_total_hours' );
$footer_hyflex_hours  = get_sub_field( 'ss_hyflex_table_footer_hyflex_hours' );
$has_rows             = have_rows( 'ss_hyflex_table_table_rows' );

if ( ! $has_rows ) return;
?>

<section
  id="ss-hyflex-table"
  class="ss-module-hyflex-table py-10 md:pb-16 lg:pb-20 bg-light-blue"
>
  <div class="container mx-auto px-4">

    <!-- Responsive scroll wrapper -->
    <div class="overflow-x-auto">

      <!-- acf: table_rows (repeater) -->
      <table class="w-full border-collapse border border-black/10 rounded-sm text-left">

        <!-- ── Header ──────────────────────────────────────────────────── -->
        <thead>
          <tr class="bg-navy">
            <th class="font-heading font-bold text-md text-white text-center py-4 px-4 border-r border-white/10 w-28">
              Course #
            </th>
            <th class="font-heading font-bold text-md text-white text-center py-4 px-4 border-r border-white/10">
              Course Title and Description
            </th>
            <th class="font-heading font-bold text-md text-white text-center py-4 px-4 border-r border-white/10 w-28">
              Theory Hours
            </th>
            <th class="font-heading font-bold text-md text-white text-center py-4 px-4 border-r border-white/10 w-40">
              Practicum/<br>Lab Hours
            </th>
            <th class="font-heading font-bold text-md text-white text-center py-4 px-4 border-r border-white/10 w-28">
              Total Hours
            </th>
            <th class="font-heading font-bold text-md text-white text-center py-4 px-4 border-r border-white/10 w-16">
              Online
            </th>
            <th class="font-heading font-bold text-md text-white text-center py-4 px-4 w-36">
              Hyflex/<br>In Person
            </th>
          </tr>
        </thead>

        <!-- ── Body ───────────────────────────────────────────────────── -->
        <tbody>

          <?php if ( have_rows( 'ss_hyflex_table_table_rows' ) ) : ?>
            <?php while ( have_rows( 'ss_hyflex_table_table_rows' ) ) : the_row(); ?>

              <?php
              $course_number      = get_sub_field( 'ss_hyflex_table_table_rows_course_number' );
              $course_title       = get_sub_field( 'ss_hyflex_table_table_rows_course_title' );
              $course_description = get_sub_field( 'ss_hyflex_table_table_rows_course_description' );
              $theory_hours       = get_sub_field( 'ss_hyflex_table_table_rows_theory_hours' );
              $practicum_hours    = get_sub_field( 'ss_hyflex_table_table_rows_practicum_hours' );
              $total_hours        = get_sub_field( 'ss_hyflex_table_table_rows_total_hours' );
              $online             = get_sub_field( 'ss_hyflex_table_table_rows_online' );
              $hyflex             = get_sub_field( 'ss_hyflex_table_table_rows_hyflex' );
              ?>

              <tr class="border-b border-black/10 bg-blue/[0.02]">
                <td class="font-body font-normal text-md text-navy py-3 px-4 border-r border-black/10 align-top"><?php echo esc_html( $course_number ); ?></td>
                <td class="py-3 px-4 border-r border-black/10 align-top">
                  <?php if ( $course_title ) : ?>
                    <p class="font-heading font-bold text-md text-navy leading-snug mb-2"><?php echo esc_html( $course_title ); ?></p>
                  <?php endif; ?>
                  <?php if ( $course_description ) : ?>
                    <p class="font-body font-normal text-md text-navy leading-relaxed"><?php echo esc_html( $course_description ); ?></p>
                  <?php endif; ?>
                </td>
                <td class="font-body font-normal text-md text-navy text-center py-3 px-4 border-r border-black/10 align-top"><?php echo esc_html( $theory_hours ); ?></td>
                <td class="border-r border-black/10 align-top"><?php echo esc_html( $practicum_hours ); ?></td>
                <td class="font-body font-normal text-md text-navy text-center py-3 px-4 border-r border-black/10 align-top"><?php echo esc_html( $total_hours ); ?></td>
                <td class="border-r border-black/10 align-top"><?php echo esc_html( $online ); ?></td>
                <td class="align-top"><?php echo esc_html( $hyflex ); ?></td>
              </tr>

            <?php endwhile; ?>
          <?php endif; ?>

        </tbody>

        <!-- ── Footer / Totals row ─────────────────────────────────────── -->
        <tfoot>
          <tr class="bg-blue/[0.02] border-t border-black/10">
            <td class="font-heading font-bold text-md text-navy py-4 px-4 border-r border-black/10"><?php echo esc_html( $footer_label ); ?></td>
            <td class="border-r border-black/10 py-4 px-4"></td>
            <td class="font-body font-normal text-md text-navy text-center py-4 px-4 border-r border-black/10"><?php echo esc_html( $footer_theory_hours ); ?></td>
            <td class="font-body font-normal text-md text-navy text-center py-4 px-4 border-r border-black/10"><?php echo esc_html( $footer_practicum ); ?></td>
            <td class="font-body font-normal text-md text-navy text-center py-4 px-4 border-r border-black/10"><?php echo esc_html( $footer_total_hours ); ?></td>
            <td class="border-r border-black/10 py-4 px-4"></td>
            <td class="font-body font-normal text-md text-navy text-center py-4 px-4"><?php echo esc_html( $footer_hyflex_hours ); ?></td>
          </tr>
        </tfoot>

      </table>

    </div>

  </div>
</section>
