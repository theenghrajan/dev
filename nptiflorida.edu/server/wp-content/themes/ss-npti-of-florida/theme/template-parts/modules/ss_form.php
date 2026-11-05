<?php
$ss_form = get_sub_field('ss_form_id');
?>

<?php if (!empty($ss_form)) : ?>
<section class="ss-form bg-white py-10 md:py-12">
    <div class="container mx-auto px-4">
        <div class="bg-navy/10 px-[30px] py-[3.125rem] rounded-[8px]">
            <div class="ss-gform-wrapper">
                <?php echo do_shortcode('[gravityforms id="' . esc_attr($ss_form) . '" title="false" description="false" ajax="true"]'); ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
