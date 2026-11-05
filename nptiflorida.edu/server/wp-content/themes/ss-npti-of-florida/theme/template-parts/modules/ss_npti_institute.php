<?php
/**
 * Module: NPTI Institute
 * Template Part: template-parts/modules/ss_npti_institute.php
 * ACF Flexible Content Layout: ss_npti_institute
 *
 * Fields:
 *  - ss_npti_institute_section_heading           (text)
 *  - ss_npti_institute_section_heading_highlight (text)
 *  - ss_npti_institute_section_intro             (textarea)
 *  - ss_npti_institute_row2_heading              (text)
 *  - ss_npti_institute_row2_body                 (textarea)
 *  - ss_npti_institute_row2_cta                  (link)
 *  - ss_npti_institute_row2_image                (image)
 *  - ss_npti_institute_row3_image                (image)
 *  - ss_npti_institute_row3_heading              (text)
 *  - ss_npti_institute_row3_body                 (textarea)
 *  - ss_npti_institute_row3_cta                  (link)
 *  - ss_npti_institute_row4_heading              (text)
 *  - ss_npti_institute_row4_body                 (wysiwyg)
 *  - ss_npti_institute_row4_cta                  (link)
 *  - ss_npti_institute_row4_image                (image)
 */

$section_heading           = get_sub_field( 'ss_npti_institute_section_heading' );
$section_heading_highlight = get_sub_field( 'ss_npti_institute_section_heading_highlight' );
$section_intro             = get_sub_field( 'ss_npti_institute_section_intro' );
$row2_heading              = get_sub_field( 'ss_npti_institute_row2_heading' );
$row2_body                 = get_sub_field( 'ss_npti_institute_row2_body' );
$row2_cta                  = get_sub_field( 'ss_npti_institute_row2_cta' );
$row2_image                = get_sub_field( 'ss_npti_institute_row2_image' );
$row3_image                = get_sub_field( 'ss_npti_institute_row3_image' );
$row3_heading              = get_sub_field( 'ss_npti_institute_row3_heading' );
$row3_body                 = get_sub_field( 'ss_npti_institute_row3_body' );
$row3_cta                  = get_sub_field( 'ss_npti_institute_row3_cta' );
$row4_heading              = get_sub_field( 'ss_npti_institute_row4_heading' );
$row4_body                 = get_sub_field( 'ss_npti_institute_row4_body' );
$row4_cta                  = get_sub_field( 'ss_npti_institute_row4_cta' );
$row4_image                = get_sub_field( 'ss_npti_institute_row4_image' );

if ( ! $section_heading ) return;
?>

<section
  id="ss-npti-institute"
  class="ss-module-npti-institute bg-blue-08 pad-section"
>
  <div class="container mx-auto px-4">
    <div class="col-start-start-16 !gap-10 xl:!gap-20">

      <!-- Row 1: centered heading + intro -->
      <div class="col-center-center-16 text-center w-full">

        <h2 class="text-center">
          <?php echo esc_html( $section_heading ); ?>
          <?php if ( $section_heading_highlight ) : ?>
            <span class="text-orange"><?php echo esc_html( $section_heading_highlight ); ?></span>
          <?php endif; ?>
        </h2>

        <?php if ( $section_intro ) : ?>
          <p class="text-center max-w-prose mx-auto">
            <?php echo wp_kses_post( $section_intro ); ?>
          </p>
        <?php endif; ?>

      </div>

      <!-- Row 2: text left | image right -->
      <div class="grid grid-cols-1 gap-8 lg:grid-cols-2 md:items-center w-full">

        <div class="col-start-start-16 !gap-0">
          <?php if ( $row2_heading ) : ?>
            <h3 class="text-navy leading-snug"><?php echo esc_html( $row2_heading ); ?></h3>
          <?php endif; ?>
          <?php if ( $row2_body ) : ?>
            <p><?php echo wp_kses_post( $row2_body ); ?></p>
          <?php endif; ?>
          <?php if ( $row2_cta ) : ?>
            <a
              href="<?php echo esc_url( $row2_cta['url'] ); ?>"
              <?php if ( $row2_cta['target'] ) echo 'target="' . esc_attr( $row2_cta['target'] ) . '"'; ?>
              class="btn-primary self-start"
            ><?php echo esc_html( $row2_cta['title'] ); ?></a>
          <?php endif; ?>
        </div>

        <?php if ( $row2_image ) : ?>
          <div class="rounded-lg overflow-hidden">
            <img
              src="<?php echo esc_url( $row2_image['url'] ); ?>"
              alt="<?php echo esc_attr( $row2_image['alt'] ); ?>"
              class="w-full object-cover rounded-lg"
            >
          </div>
        <?php endif; ?>

      </div>

      <!-- Row 3: full-width bg image with white panel overlay on right -->
      <div class="rounded-lg overflow-hidden flex flex-col w-full md:relative" style="background: #000000 url('<?php echo esc_url( $row3_image['url'] ); ?>') no-repeat center; background-size: cover;">

        <!-- White content panel -->
        <div class="lg:bg-white bg-white/80 p-4 flex flex-col m-4 lg:ml-auto lg:w-[55%] rounded-lg lg:p-6 lg:justify-center">
          <?php if ( $row3_heading ) : ?>
            <h3 class="text-navy leading-snug"><?php echo esc_html( $row3_heading ); ?></h3>
          <?php endif; ?>
          <?php if ( $row3_body ) : ?>
            <p><?php echo wp_kses_post( $row3_body ); ?></p>
          <?php endif; ?>
          <?php if ( $row3_cta ) : ?>
            <a
              href="<?php echo esc_url( $row3_cta['url'] ); ?>"
              <?php if ( $row3_cta['target'] ) echo 'target="' . esc_attr( $row3_cta['target'] ) . '"'; ?>
              class="btn-secondary self-start"
            ><?php echo esc_html( $row3_cta['title'] ); ?></a>
          <?php endif; ?>
        </div>

      </div>

      <!-- Row 4: text left | image right -->
      <div class="grid grid-cols-1 gap-8 lg:grid-cols-2 lg:items-center w-full">

        <div class="col-start-start-16 !gap-0">
          <?php if ( $row4_heading ) : ?>
            <h3 class="text-navy leading-snug"><?php echo esc_html( $row4_heading ); ?></h3>
          <?php endif; ?>
          <?php if ( $row4_body ) : ?>
            <?php echo wp_kses_post( $row4_body ); ?>
          <?php endif; ?>
          <?php if ( $row4_cta ) : ?>
            <a
              href="<?php echo esc_url( $row4_cta['url'] ); ?>"
              <?php if ( $row4_cta['target'] ) echo 'target="' . esc_attr( $row4_cta['target'] ) . '"'; ?>
              class="btn-secondary mt-4 self-start"
            ><?php echo esc_html( $row4_cta['title'] ); ?></a>
          <?php endif; ?>
        </div>

        <?php if ( $row4_image ) : ?>
          <div class="rounded-lg overflow-hidden">
            <img
              src="<?php echo esc_url( $row4_image['url'] ); ?>"
              alt="<?php echo esc_attr( $row4_image['alt'] ); ?>"
              class="w-full h-[400px] object-cover rounded-lg"
            >
          </div>
        <?php endif; ?>

      </div>

    </div>
  </div>
</section>
