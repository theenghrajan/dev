<?php
$ss_gallery_shortcode = get_sub_field('ss_gallery_shortcode');
$ss_cta = get_sub_field('ss_cta');

if (empty($ss_gallery_shortcode) && empty($ss_cta)) {
    return;
}
?>

<section id="ss-gallery" class="ss-module-gallery container mx-auto px-4 my-10 md:my-16 lg:my-20">
    <?php if (!empty($ss_gallery_shortcode)) : ?>
        <div class="[&_.ngg-galleryoverview]:!my-0 [&_.ngg-galleryoverview]:!flex [&_.ngg-galleryoverview]:flex-wrap [&_.ngg-galleryoverview]:gap-3 2xl:[&_.ngg-galleryoverview]:gap-[1.125rem] ax-lg:[&_.ngg-gallery-thumbnail]:h-full max-lg:[&_.ngg-gallery-thumbnail-box]:!w-[calc(50%_-_0.75rem)] [&_.ngg-gallery-thumbnail-box]:block lg:[&_.ngg-gallery-thumbnail-box]:!w-auto [&_.ngg-gallery-thumbnail-box]:!float-none [&_.ngg-gallery-thumbnail_img]:rounded-[0.5rem] max-lg:[&_.ngg-gallery-thumbnail_img]:size-full max-lg:[&_.ngg-gallery-thumbnail_img]:object-cover max-lg:[&_.ngg-galleryoverview.default-view_.ngg-gallery-thumbnail]:h-full max-lg:[&_.ngg-galleryoverview.default-view_.ngg-gallery-thumbnail_a]:h-full">
           <?php echo ($ss_gallery_shortcode) ?>
        </div>
    <?php endif; ?>

    <?php if (!empty($ss_cta)) : ?>
        <div class="mt-6 lg:mt-8 2xl:mt-[3.125rem] text-center">
            <a href="<?php echo esc_url($ss_cta['url']); ?>"
               class="btn btn-primary"
               target="<?php echo esc_attr($ss_cta['target'] ?: '_self'); ?>">
                <?php echo esc_html($ss_cta['title']); ?>
            </a>
        </div>
    <?php endif; ?>
</section>