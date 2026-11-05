<?php

/**
 * Module: Get Started
 * Template Part: template-parts/modules/ss_get_started.php
 * ACF Flexible Content Layout: ss_get_started
 *
 * Sub-fields (flexible content):
 *  - ss_get_started_form_heading (text)
 *  - ss_get_started_form_heading_highlight (text)
 *  - ss_get_started_gravity_form_id (number)
 *  - ss_get_started_locations_heading (text)
 *  - ss_get_started_locations_heading_highlight (text)
 *  - ss_get_started_show_locations (checkbox: orlando, tampa)
 *  - ss_get_started_location_icon (select — icomoon class)
 *  - ss_get_started_contact_icon (select — icomoon class)
 *  - ss_get_started_phone_icon (select — icomoon class)
 *  - ss_get_started_fax_icon (select — icomoon class)
 *  - ss_get_started_email_icon (select — icomoon class)
 *
 * Location data pulled from Global Options (group_header_options.json):
 *  Orlando: orlando_address, orlando_phone, orlando_fax, orlando_email
 *  Tampa:   tampa_address, tampa_phone, tampa_fax, tampa_email
 */

$form_heading        = get_sub_field('ss_get_started_form_heading');
$form_heading_hl     = get_sub_field('ss_get_started_form_heading_highlight');
$gravity_form_id     = get_sub_field('ss_get_started_gravity_form_id');
$locations_heading   = get_sub_field('ss_get_started_locations_heading');
$locations_heading_hl = get_sub_field('ss_get_started_locations_heading_highlight');
$show_locations      = get_sub_field('ss_get_started_show_locations') ?: [];
$location_icon       = get_sub_field('ss_get_started_location_icon');
$contact_icon        = get_sub_field('ss_get_started_contact_icon');
$phone_icon          = get_sub_field('ss_get_started_phone_icon');
$fax_icon            = get_sub_field('ss_get_started_fax_icon');
$email_icon          = get_sub_field('ss_get_started_email_icon');
$location_iframe_orlando          = get_field('orlando_map_url', 'option');

// Location data from Global Options
$locations = [];

if (in_array('orlando', $show_locations)) {
    $locations[] = [
        'name'    => 'Orlando',
        'address' => get_field('orlando_address', 'option'),
        'phone'   => get_field('orlando_phone', 'option'),
        'fax'     => get_field('orlando_fax', 'option'),
        'email'   => get_field('orlando_email', 'option'),
    ];
}

if (in_array('tampa', $show_locations)) {
    $locations[] = [
        'name'    => 'Tampa',
        'address' => get_field('tampa_address', 'option'),
        'phone'   => get_field('tampa_phone', 'option'),
        'fax'     => get_field('tampa_fax', 'option'),
        'email'   => get_field('tampa_email', 'option'),
    ];
}

if (! $form_heading && ! $gravity_form_id && empty($locations)) return;
?>

<section
    id="ss-get-started"
    class="ss-module-get-started bg-white py-10 md:py-16 lg:py-20">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 gap-8 lg:grid-cols-2 lg:gap-12">
            <!-- Left col: Get Started form -->
            <div class="bg-navy/10 rounded-lg p-8 flex flex-col">

                <?php if ($form_heading || $form_heading_hl) : ?>
                    <h2 class="font-heading font-bold text-xl md:text-2xl text-navy leading-tight">
                        <?php echo esc_html($form_heading); ?> <span class="text-orange"><?php echo esc_html($form_heading_hl); ?></span>
                    </h2>
                <?php endif; ?>

                <?php if ($gravity_form_id) : ?>
                    <div class="ss-gform-wrapper">
                        <?php echo @do_shortcode('[gravityforms id="' . intval($gravity_form_id) . '" title="false" description="false" ajax="true"]'); ?>
                    </div>
                <?php endif; ?>

            </div>

            <!-- Right col: NPTI Locations -->
            <div class="flex flex-col gap-4">
                <?php if ($locations_heading || $locations_heading_hl) : ?>
                    <h2 class="font-heading font-bold text-xl md:text-2xl text-navy leading-tight">
                        <?php echo esc_html($locations_heading); ?> <span class="text-orange"><?php echo esc_html($locations_heading_hl); ?></span>
                    </h2>
                <?php endif; ?>
                <?php foreach ($locations as $location) : ?>
                    <div class="bg-light-blue rounded p-6 2xl:p-8">

                        <!-- Address -->
                        <div class="flex flex-wrap gap-y-6 -mx-4">
                            <div class="w-full sm:w-1/2 px-4">
                                <div class="inline-flex gap-2 mb-3">
                                    <?php if ($location_icon) : ?>
                                        <i class="<?php echo esc_attr($location_icon); ?> text-xl text-orange" aria-hidden="true"></i>
                                    <?php endif; ?>
                                    <h3 class="font-heading font-bold text-lg text-navy"><?php echo esc_html($location['name']); ?></h3>
                                </div>
                                <?php if ($location['address']) : ?>
                                    <address class="not-italic flex flex-col gap-3 pl-4 font-body font-normal text-md text-navy leading-relaxed">
                                        <?php echo $location['address'] ? $location['address'] : ''; ?>
                                    </address>
                                <?php endif; ?>
                            </div>
                            <!-- Contact -->
                            <div class="w-full sm:w-1/2 px-4">
                                <div class="inline-flex gap-2 mb-3">
                                    <?php if ($contact_icon) : ?>
                                        <i class="<?php echo esc_attr($contact_icon); ?> text-xl text-orange" aria-hidden="true"></i>
                                    <?php endif; ?>
                                    <h4 class="font-heading font-bold text-lg text-navy">Contact Information</h4>
                                </div>
                                <ul class="pl-0 flex flex-col gap-2">
                                    <?php if ($location['phone']) : ?>
                                        <li class="inline-flex items-center gap-3">
                                            <?php if ($phone_icon) : ?>
                                                <span class="w-10 h-10 p-2 bg-white grid place-items-center rounded-full"><i class="<?php echo esc_attr($phone_icon); ?> text-blue" aria-hidden="true"></i></span>
                                            <?php endif; ?>
                                            <a href="tel:<?php echo esc_attr(preg_replace('/\D/', '', $location['phone'])); ?>" class="font-body font-normal text-md text-navy hover:text-orange transition-colors">
                                                <?php echo esc_html($location['phone']); ?>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                    <?php if ($location['fax']) : ?>
                                        <li class="inline-flex items-center gap-3">
                                            <?php if ($fax_icon) : ?>
                                                <span class="w-10 h-10 p-2 bg-white grid place-items-center rounded-full"><i class="<?php echo esc_attr($fax_icon); ?> text-blue" aria-hidden="true"></i></span>
                                            <?php endif; ?>
                                            <span class="font-body font-normal text-md text-navy"><?php echo esc_html($location['fax']); ?></span>
                                        </li>
                                    <?php endif; ?>
                                    <?php if ($location['email']) : ?>
                                        <li class="inline-flex items-center gap-3">
                                            <?php if ($email_icon) : ?>
                                                <span class="w-10 h-10 p-2 bg-white grid place-items-center rounded-full"><i class="<?php echo esc_attr($email_icon); ?> text-blue" aria-hidden="true"></i></span>
                                            <?php endif; ?>
                                            <a href="mailto:<?php echo esc_attr($location['email']); ?>" class="font-body break-all font-normal text-md text-navy hover:text-orange transition-colors">
                                                <?php echo esc_html($location['email']); ?>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>

                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<?php if ($location_iframe_orlando) : ?>
    <section
        id="ss-location-map"
        class="ss-module-location-map  pb-10 md:pb-16 lg:pb-20">
        <div class="container mx-auto px-4 relative overflow-hidden rounded"
            style="height: 520px;">
            <!-- Google Maps embed -->
            <iframe
                src="<?php echo esc_url($location_iframe_orlando); ?>"
                width="100%"
                height="100%"
                style="border:0; display:block;"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"
                title="NPTI Florida location map"
                class="absolute inset-0 w-full h-full"></iframe>
        </div>
    </section>
<?php endif; ?>
