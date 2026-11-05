<?php
get_header();

// Get current author
$author_id = get_queried_object_id();
$user      = get_userdata($author_id);

// ACF User Fields
$role_label = get_field('ss_user_title', 'user_' . $author_id);
$avatar     = get_field('ss_user_profile_image', 'user_' . $author_id);
$cta_label  = get_field('cta_label', 'user_' . $author_id);
$cta_url    = get_field('cta_url', 'user_' . $author_id);

// WP Native Fields
$first_name = $user->first_name;
$last_name  = $user->last_name;
$full_name = $first_name . ' ' . $last_name;
$display    = $user->display_name;
$bio        = get_the_author_meta('description', $author_id);
?>

<section
    id="ss-blog"
    class="ss-module-blog bg-blue-08 pad-section">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 gap-8 md:grid-cols-2 md:items-center">

            <!-- Left: bio content -->
            <div>

                <!-- Author Name -->
                <h2>
                    <?php if ($first_name || $last_name): ?>
                        <?php echo esc_html($first_name); ?>
                        <span class="text-orange"><?php echo esc_html($last_name); ?></span>
                    <?php else: ?>
                        <?php echo esc_html($display); ?>
                    <?php endif; ?>
                </h2>

                <!-- Author Role -->
                <?php if ($role_label): ?>
                    <p class="font-ui font-normal text-sm text-blue leading-normal">
                        -<?php echo esc_html($role_label); ?>
                    </p>
                <?php endif; ?>

                <!-- Author Bio -->
                <?php if ($bio): ?>
                    <p class="mt-4">
                        <?php echo esc_html($bio); ?>
                    </p>
                <?php endif; ?>

                <!-- CTA Button -->
                <?php if ($cta_label && $cta_url): ?>
                    <a
                        href="<?php echo esc_url($cta_url); ?>"
                        class="btn btn-primary mt-4 inline-block">
                        <?php echo esc_html($cta_label); ?>
                    </a>
                <?php endif; ?>

            </div>

            <!-- Right: Author Image -->
            <div class="overflow-hidden flex justify-center md:justify-end">
                <?php if ($avatar): ?>
                    <img
                        src="<?php echo esc_url($avatar['url']); ?>"
                        alt="<?php echo esc_attr($display); ?>"
                        class="w-full object-cover">
                <?php else: ?>
                    <?php echo get_avatar($author_id, '', '', $display, ['class' => 'rounded-full']); ?>
                <?php endif; ?>
            </div>

        </div>
    </div>
</section>

<section
    id="ss-articles"
    class="ss-module-articles bg-white pad-section">
    <div class="container mx-auto px-4">
        <div class="col-center-center-16">

            <div class="mb-8 md:mb-12">
                <!-- acf: section_heading (text) -->
                <h2 class="text-center">
                    Articles By <span class="text-orange"><?php echo esc_html($full_name); ?></span>
                </h2>
                <!-- acf: section_subtext (text) -->
                <p class="text-center max-w-prose mx-auto">
                    Learn from certified professionals who are actively working in the fitness industry.
                </p>
            </div>
            <?php if (have_posts()) : ?>
                <!-- acf: articles (repeater) -->
                <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3 w-full">
                    <?php while (have_posts()) : the_post(); ?>
                        <?php get_template_part('template-parts/content/content'); ?>
                    <?php endwhile; ?>
                </div>
                <div class="mt-8 2xl:mt-10">
                    <?php
                    // Previous/next page navigation.
                    ss_theme_the_posts_navigation();
                    ?>
                </div>
            <?php else: ?>
                <p>No posts found.</p>
            <?php endif; ?>

        </div>
    </div>
</section>

<?php get_footer(); ?>