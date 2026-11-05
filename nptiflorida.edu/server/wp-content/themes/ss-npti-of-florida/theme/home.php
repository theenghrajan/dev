<?php
get_header();
?>

<?php
if (have_posts()):

    if (is_home() && !is_front_page()):
    ?>
    <?php
    endif; ?>
    <section id="ss-articles" class="ss-module-articles bg-white pad-section">
        <div class="container mx-auto px-4">
            <header>
                <h2 class="sr-only">Blogs</h2>
            </header>
            <div class="col-center-center-16">
                <!-- acf: articles (repeater) -->
                <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3 w-full">
                    <?php while (have_posts()):
                        the_post(); ?>
                        <?php get_template_part('template-parts/content/content'); ?>
                    <?php endwhile; ?>
                </div>
                <div class="mt-6 2xl:mt-10">
                    <?php
                    // Previous/next page navigation.
                    ss_theme_the_posts_navigation();
                    ?>
                </div>
            </div>
        </div>
    </section>

    <?php
    $blog_page_id = get_option('page_for_posts');
    if (have_rows('ss_reusable_modules_flexible_content', $blog_page_id)): ?>
        <?php while (have_rows('ss_reusable_modules_flexible_content', $blog_page_id)):
            the_row(); ?>

            <?php
            // get the layout name
            $layout = get_row_layout();

            // pass the entire row data if needed
            $row_data = get_row(true);
            ?>

            <?php get_template_part('template-parts/modules/' . $layout, null, array('value' => $row_data)); ?>

        <?php endwhile; ?>
    <?php endif; ?>

    <?php get_template_part('template-parts/content/ready-to-speak'); ?>

    <?php
else:
    // If no content, include the "No posts found" template.
    get_template_part('template-parts/content/content', 'none');

endif;
?>

<?php
get_footer();
?>