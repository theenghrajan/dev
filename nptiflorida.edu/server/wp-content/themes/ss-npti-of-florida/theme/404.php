<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package ss_theme
 */

get_header();
?>
<section class="container mx-auto px-4 py-12 lg:py-16 xl:py-20 2xl:py-24">
    <div class="max-w-[700px] mx-auto text-center">
        <header class="page-header">
            <h2 class="h1 page-title"><strong class="block text-[6.25rem] 2xl:text-[9.375rem] leading-none">404</strong><?php esc_html_e('Page Not Found', 'ss_theme'); ?></h2>
        </header>

        <div class="[&_.search-field]:!rounded-l-[2.375rem] [&_label]:!mb-0 [&_input[type='search']]:border-r-0 [&_input[type='search']]:!rounded-r-none [&_input[type='submit']]:border-blue [&_input[type='submit']]:border">
            <p><?php esc_html_e('This page could not be found. It might have been removed or renamed, or it may never have existed.', 'ss_theme'); ?></p>
            <?php get_search_form(); ?>
            <div class="flex flex-wrap gap-4 gap-y-5 justify-center mt-6 sm:mt-8">
                <a href="/" class="btn btn-primary">Return to Homepage</a>
                <a href="/contact-us" class="btn btn-secondary">Contact Us</a>
            </div>
        </div>
    </div>
</section>
<?php
get_footer();
