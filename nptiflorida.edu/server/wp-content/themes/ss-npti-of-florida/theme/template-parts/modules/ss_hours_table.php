<?php
/**
 * Module: Hours Table
 * Template Part: template-parts/modules/ss_hours_table.php
 * ACF Flexible Content Layout: ss_hours_table
 *
 * Fields:
 *  - ss_hours_table_table_rows (repeater)
 *      - ss_hours_table_table_rows_task_label (wysiwyg)
 *      - ss_hours_table_table_rows_task_hours (text)
 *  - ss_hours_table_footer_label (text)
 *  - ss_hours_table_footer_total_hours (text)
 */

$footer_label       = get_sub_field( 'ss_hours_table_footer_label' );
$footer_total_hours = get_sub_field( 'ss_hours_table_footer_total_hours' );

if ( ! have_rows( 'ss_hours_table_table_rows' ) ) return;
?>

<section
  id="ss-hours-table"
  class="ss-module-hours-table py-10 md:py-16 lg:py-20"
>
  <div class="container mx-auto px-4">

    <!-- Responsive scroll wrapper -->
    <div class="overflow-x-auto">

      <!-- acf: table_rows (repeater) -->
      <table class="w-full border-collapse border border-black/10 text-left">

        <!-- ── Header ──────────────────────────────────────────────────── -->
        <thead>
          <tr class="bg-navy">
            <th class="font-heading font-bold text-md text-white py-4 px-4 border-r border-white/10 w-1/2">
              Task
            </th>
            <th class="font-heading font-bold text-md text-white py-4 px-4 w-1/2">
              Hours
            </th>
          </tr>
        </thead>

        <!-- ── Body ───────────────────────────────────────────────────── -->
        <tbody>

          <?php if ( have_rows( 'ss_hours_table_table_rows' ) ) : ?>
            <?php while ( have_rows( 'ss_hours_table_table_rows' ) ) : the_row(); ?>

              <?php
              $task_label = get_sub_field( 'ss_hours_table_table_rows_task_label' );
              $task_hours = get_sub_field( 'ss_hours_table_table_rows_task_hours' );
              ?>

              <tr class="bg-blue/[0.02] border-b border-black/10">
                <td class="font-body font-normal text-sm text-navy py-4 px-4 border-r border-black/10"><?php echo wp_kses_post( $task_label ); ?></td>
                <td class="font-body font-normal text-md text-navy py-4 px-4"><?php echo esc_html( $task_hours ); ?></td>
              </tr>

            <?php endwhile; ?>
          <?php endif; ?>

        </tbody>

        <!-- ── Footer / Total row ──────────────────────────────────────── -->
        <tfoot>
          <tr class="bg-blue/[0.02]">
            <td class="font-heading font-bold text-md text-navy py-4 px-4 border-r border-black/10"><?php echo esc_html( $footer_label ); ?></td>
            <td class="font-body font-normal text-md text-navy py-4 px-4"><?php echo esc_html( $footer_total_hours ); ?></td>
          </tr>
        </tfoot>

      </table>

    </div>

  </div>
</section>
