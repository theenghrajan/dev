<?php

/**
 * Module: Contributors
 * Template Part: template-parts/modules/ss_contributors.php
 * ACF Flexible Content Layout: ss_contributors
 *
 * Component CSS (tailwind/custom/components/components.css):
 *  - .ss-contributors__card — contributor card wrapper (9 classes, 3+ instances)
 *
 * Fields:
 *  - ss_contributors_section_heading           (text)
 *  - ss_contributors_section_heading_highlight (text)
 *  - ss_contributors_section_subheading        (text)
 *  - ss_contributors_contributors              (user — multiple, returns object)
 *  - ss_contributors_view_profile_label        (text)
 *  - ss_contributors_view_profile_icon         (image)
 *
 * User meta fields (group_ss_contributors_user.json — location: user_form == all):
 *  - contributor_role_label (text) — accessed via get_field('contributor_role_label', 'user_' . $user->ID)
 *
 * Native WordPress user data:
 *  - $user->display_name       — contributor's full name
 *  - $user->description        — biography text
 *  - get_avatar_url($user->ID) — profile photo
 *  - get_author_posts_url($user->ID) — link to author archive
 */

$section_heading           = get_sub_field('ss_contributors_section_heading');
$section_heading_highlight = get_sub_field('ss_contributors_section_heading_highlight');

if (! $section_heading && ! $section_heading_highlight) return;

$section_subheading    = get_sub_field('ss_contributors_section_subheading');
$contributors          = get_sub_field('ss_contributors_contributors');
$view_profile_label    = get_sub_field('ss_contributors_view_profile_label');
$view_profile_icon_class     = get_sub_field('ss_contributors_view_profile_icon_class');
?>

<section
  id="ss-contributors"
  class="ss-module-contributors bg-white py-10 md:py-16 lg:py-20">
  <div class="container mx-auto px-4">

    <!-- Section header -->
    <div class="text-center mb-10 md:mb-12">
      <h2 class="font-heading font-bold text-3xl md:text-4xl text-navy leading-tight mb-3">
        <?php if ($section_heading) : ?>
          <?php echo esc_html($section_heading); ?>
        <?php endif; ?>
        <?php if ($section_heading_highlight) : ?>
          <span class="text-orange"><?php echo esc_html($section_heading_highlight); ?></span>
        <?php endif; ?>
      </h2>
      <?php if ($section_subheading) : ?>
        <p class="font-body font-normal text-md text-navy leading-relaxed">
          <?php echo esc_html($section_subheading); ?>
        </p>
      <?php endif; ?>
    </div>

    <!-- Contributors grid -->
    <?php if ($contributors) : ?>
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php foreach ($contributors as $user) : ?>
          <?php
          $role_label  = get_field('ss_user_title', 'user_' . $user->ID);
          $avatar_url  = get_field('ss_user_profile_image', 'user_' . $user->ID);
          $profile_url = get_author_posts_url($user->ID);
          ?>
          <div class="ss-contributors__card">
            <?php if ($avatar_url) : ?>
              <img
                src="<?php echo esc_url($avatar_url['url']); ?>"
                alt="<?php echo esc_attr($user->display_name); ?>"
                class="size-36 rounded-full object-cover flex-shrink-0">
            <?php endif; ?>
            <div class="flex flex-col gap-4 items-center w-full flex-1">
              <div class="flex flex-col gap-2">
                <h3 class="font-heading font-bold text-xl text-navy">
                  <?php echo esc_html($user->display_name); ?>
                </h3>
                <?php if ($role_label) : ?>
                  <p class="font-ui font-normal text-sm text-blue">
                    <?php echo esc_html($role_label); ?>
                  </p>
                <?php endif; ?>
              </div>
              <?php if ($user->description) : ?>
                <p class="font-body font-normal text-md text-navy leading-relaxed">
                  <?php echo esc_html($user->description); ?>
                </p>
              <?php endif; ?>
            </div>
            <a
              href="<?php echo esc_url($profile_url); ?>"
              class="group inline-flex items-center gap-2 font-body font-bold text-sm text-orange uppercase hover:text-orange/80 transition-colors no-underline">
              <?php echo esc_html($view_profile_label); ?>
              <?php if ($view_profile_icon_class) : ?>
                <i class="<?php echo esc_attr($view_profile_icon_class); ?> font-bold text-[1rem] text-orange group-hover:text-orange/80"></i>
              <?php endif; ?>
            </a>
          </div>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>

  </div>
</section>