<?php
/**
 * Module: Meet the Team
 * Template Part: template-parts/modules/ss_meet_team.php
 * ACF Flexible Content Layout: ss_meet_team
 */

$section_heading           = get_sub_field( 'ss_meet_team_section_heading' );
$section_heading_highlight = get_sub_field( 'ss_meet_team_section_heading_highlight' );
$section_subtext           = get_sub_field( 'ss_meet_team_section_subtext' );
$join_cta                  = get_sub_field( 'ss_meet_team_join_cta' );
$team_members              = get_sub_field( 'ss_team' );

if ( ! $section_heading ) return;
?>

<section
  id="ss-meet-team"
  class="ss-module-meet-team bg-white pad-section"
>
  <div class="container mx-auto px-4">
    <div class="col-center-center-16 text-center">

      <?php if ( !empty($section_subtext) || !empty($section_heading_highlight) ) : ?>
        <div class="text-center mb-6 lg:mb-9"> 
          <h2>
            <?php echo esc_html( $section_heading ); ?>
            <?php if ( $section_heading_highlight ) : ?>
              <span class="text-orange"><?php echo esc_html( $section_heading_highlight ); ?></span>
            <?php endif; ?>
          </h2>

          <?php if ( $section_subtext ) : ?>
            <p class="max-w-2xl mx-auto">
             <?php echo wp_kses_post( $section_subtext ); ?>
            </p>
          <?php endif; ?>
        </div>
      <?php endif; ?>

      <?php if ( !empty($team_members) ) { ?>
        <div class="grid grid-cols-1 gap-6 lg:grid-cols-3 w-full text-center">

          <?php foreach ( $team_members as $post ) {
            setup_postdata($post);

            if ( have_rows('ss_reusable_modules_flexible_content', get_the_ID()) ) {
              while ( have_rows('ss_reusable_modules_flexible_content', get_the_ID()) ) {
                the_row();

                $image_field = get_sub_field('ss_single_team_profile_photo');
                $image       = !empty($image_field['ID']) ? $image_field['ID'] : '';

                $member_role = get_sub_field('ss_single_team_profile_role');
                $first_name  = get_sub_field('ss_single_team_profile_first_name');
                $last_name   = get_sub_field('ss_single_team_profile_last_name');
                $member_bio  = get_sub_field('ss_single_team_profile_bio');

                $alt        = !empty($image) ? get_post_meta($image, '_wp_attachment_image_alt', true) : '';
                $image_url  = !empty($image) ? wp_get_attachment_url($image) : '';
                $image_type = !empty($image) ? get_post_mime_type($image) : '';

                if ( empty($image_url) && empty($first_name) && empty($last_name) && empty($member_role) && empty($member_bio) ) {
                  continue;
                }
                ?>

                <article class="bg-blue-08 border border-blue/10 rounded-2xl p-6 shadow-card items-center text-center flex flex-col">

                  <?php if ( !empty($image_url) ) { ?>
                    <figure>
                      <img
                      src="<?php echo esc_url($image_url); ?>"
                      alt="<?php echo esc_attr($alt); ?>"
                      class="rounded-full object-cover mx-auto shrink-0"
                      >
                    </figure>
                  <?php } ?>

                  <div class="items-center w-full py-6">
                    <?php if ( !empty($first_name) || !empty($last_name) ) { ?>
                      <h3 class="font-heading font-bold text-navy text-center leading-snug">
                        <?php echo esc_html(trim($first_name . ' ' . $last_name)); ?>
                      </h3>
                    <?php } ?>

                    <?php if ( !empty($member_role) ) { ?>
                      <p class="font-ui text-base text-orange text-center leading-snug">
                        <?php echo esc_html($member_role); ?>
                      </p>
                    <?php } ?>

           <?php if ( !empty($member_bio) ) { ?>
                <p class="text-base text-navy text-center">
                  <?php echo esc_html( wp_trim_words($member_bio, 50) ); ?>
                </p>
              <?php } ?>
                  </div>

                  <a href="<?php echo esc_url(get_permalink()); ?>" class="row-center-center gap-2 text-orange font-bold text-sm uppercase no-underline transition-fast hover:text-orange/80 mt-auto">
                    View Profile
                    <i class="icon-arrow-right" aria-hidden="true"></i>
                  </a>

                </article>

              <?php }
            }
          }

          wp_reset_postdata();
          ?>

        </div>
      <?php } ?>

      <?php if ( $join_cta ) : ?>
        <a href="<?php echo esc_url( $join_cta['url'] ); ?>"<?php if ( $join_cta['target'] ) echo ' target="' . esc_attr( $join_cta['target'] ) . '"'; ?> class="btn btn-primary mt-8 lg:mt-10">
          <?php echo esc_html( $join_cta['title'] ); ?>
        </a>
      <?php endif; ?>

    </div>
  </div>
</section>