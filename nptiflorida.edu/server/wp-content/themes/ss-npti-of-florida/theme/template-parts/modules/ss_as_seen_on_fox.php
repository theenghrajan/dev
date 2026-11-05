<?php
/**
 * Module: As Seen On Fox
 * Template Part: template-parts/modules/ss_as_seen_on_fox.php
 * ACF Flexible Content Layout: ss_as_seen_on_fox
 *
 * Fields:
 *  - ss_as_seen_on_fox_bg_image (image)
 *  - ss_as_seen_on_fox_section_heading (text)
 *  - ss_as_seen_on_fox_section_heading_highlight (text)
 *  - ss_as_seen_on_fox_channel_logo (image)
 *  - ss_as_seen_on_fox_video_thumbnail (image)
 *  - ss_as_seen_on_fox_video_url (text)
 */

$bg_image          = get_sub_field( 'ss_as_seen_on_fox_bg_image' );
$section_heading   = get_sub_field( 'ss_as_seen_on_fox_section_heading' );
$heading_highlight = get_sub_field( 'ss_as_seen_on_fox_section_heading_highlight' );
$channel_logo      = get_sub_field( 'ss_as_seen_on_fox_channel_logo' );
$video_url         = get_sub_field( 'ss_as_seen_on_fox_video_url' );

if ( ! $section_heading && ! $channel_logo && ! $video_url ) return;
?>

<section id="ss-as-seen-on-fox" class="ss-module-as-seen-on-fox bg-white pad-section relative overflow-hidden">

    <?php if ( $bg_image ) : ?>
    <div class="absolute inset-0 pointer-events-none opacity-10">
        <img src="<?php echo esc_url( $bg_image['url'] ); ?>"
             alt="<?php echo esc_attr( $bg_image['alt'] ); ?>"
             width="<?php echo esc_attr( $bg_image['width'] ); ?>"
             height="<?php echo esc_attr( $bg_image['height'] ); ?>"
             aria-hidden="true"
             class="w-full h-full object-cover">
    </div>
    <?php endif; ?>

    <div class="container mx-auto px-4 relative">
        <div class="col-center-center-16 text-center flex flex-col justify-center items-center gap-10">

            <?php if ( $section_heading || $heading_highlight ) : ?>
            <h2 class="text-center">
                <?php echo esc_html( $section_heading ); ?> <span class="text-orange"><?php echo esc_html( $heading_highlight ); ?></span>
            </h2>
            <?php endif; ?>

            <?php if ( $channel_logo ) : ?>
            <img src="<?php echo esc_url( $channel_logo['url'] ); ?>"
                 alt="<?php echo esc_attr( $channel_logo['alt'] ); ?>"
                 width="<?php echo esc_attr( $channel_logo['width'] ); ?>"
                 height="<?php echo esc_attr( $channel_logo['height'] ); ?>"
                 class="w-[200px] md:w-[264px] h-auto">
            <?php endif; ?>

            <?php if ( $video_url ) : ?>
            <div class="w-full max-w-[943px] max-h-[40rem] h-[35rem] mx-auto rounded-xl overflow-hidden shadow-card">
                <iframe class="relative top-0 left-0 w-full h-full"
                        src="<?php echo esc_url( $video_url ); ?>"
                        title="YouTube video"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen>
                </iframe>
            </div>
            <?php endif; ?>

        </div>
    </div>
</section>
