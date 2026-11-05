<?php

/**
 * Module: Single Team Member
 * Template Part: template-parts/modules/ss_single_team.php
 * ACF Flexible Content Layout: ss_single_team
 *
 * Fields:
 *  - ss_single_team_profile_photo       (image)
 *  - ss_single_team_profile_role        (text)
 *  - ss_single_team_social_links        (repeater)
 *    - ss_single_team_social_links_social_link (link)
 *    - ss_single_team_social_links_social_icon (select)
 *  - ss_single_team_profile_first_name  (text)
 *  - ss_single_team_profile_last_name   (text)
 *  - ss_single_team_profile_bio         (textarea)
 *  - ss_single_team_bio_heading         (text)
 *  - ss_single_team_bio_paragraphs      (wysiwyg)
 *  - ss_single_team_accordion_items     (repeater)
 *    - ss_single_team_accordion_items_accordion_title   (text)
 *    - ss_single_team_accordion_items_accordion_body    (textarea)
 *  - ss_as_featured_in                  (repeater)
 *    - ss_site_url                      (link)
 */

$profile_photo      = get_sub_field('ss_single_team_profile_photo');
$profile_role       = get_sub_field('ss_single_team_profile_role');
$profile_first_name = get_sub_field('ss_single_team_profile_first_name');
$profile_last_name  = get_sub_field('ss_single_team_profile_last_name');
$profile_bio        = get_sub_field('ss_single_team_profile_bio');
$bio_heading        = get_sub_field('ss_single_team_bio_heading');
$bio_paragraphs     = get_sub_field('ss_single_team_bio_paragraphs');
$ss_as_featured_in  = get_sub_field('ss_as_featured_in');

if (! $profile_first_name && ! $profile_last_name) return;
?>

<section
	id="ss-single-team"
	class="ss-module-grid-journey bg-white pad-section">
	<div class="container mx-auto px-4">
		<div class="grid grid-cols-1 gap-8 lg:grid-cols-[520px_1fr] lg:items-start">

			<!-- Left: Profile card -->
			<div class="bg-white border border-black/10 rounded-lg p-6 col-start-start-16">

				<?php if ($profile_photo) : ?>
					<img
						src="<?php echo esc_url($profile_photo['url']); ?>"
						alt="<?php echo esc_attr($profile_photo['alt']); ?>"
						class="w-full rounded-lg object-cover mb-2"
						style="max-height:385px;">
				<?php endif; ?>

				<!-- Role badge + social icons row -->
				<div class="flex flex-wrap justify-between w-full items-center gap-4">

					<?php if ($profile_role) : ?>
						<span class="bg-blue/10 text-blue font-semibold text-xs rounded-pill px-4 py-1">
							<?php echo esc_html($profile_role); ?>
						</span>
					<?php endif; ?>

					<?php if (have_rows('ss_single_team_social_links')) : ?>
						<div class="row-between-center gap-2">
							<?php while (have_rows('ss_single_team_social_links')) : the_row();
								$social_link = get_sub_field('ss_single_team_social_links_social_link');
								$social_icon = get_sub_field('ss_single_team_social_links_social_icon');
								if (! $social_link) continue;
							?>
								<a href="<?php echo esc_url($social_link['url']); ?>" <?php if ($social_link['target']) echo ' target="' . esc_attr($social_link['target']) . '"'; ?> aria-label="<?php echo esc_attr($social_link['title']); ?>" class="relative shrink-0 w-6 h-6 bg-navy rounded-full text-center flex justify-center items-center text-white hover:bg-orange hover:text-white">
									<?php if ($social_icon) : ?>
										<i class="<?php echo esc_attr($social_icon); ?> text-[12px]" aria-hidden="true"></i>
									<?php endif; ?>
								</a>
							<?php endwhile; ?>
						</div>
					<?php endif; ?>

				</div>
				<div>
					<h3 class="font-heading font-bold lg:text-[1.875rem] leading-snug mb-3">
						<?php if ($profile_first_name) : ?>
							<span class="text-orange"><?php echo esc_html($profile_first_name); ?></span>
						<?php endif; ?>
						<?php if ($profile_last_name) : ?>
							<?php echo esc_html($profile_last_name); ?>
						<?php endif; ?>
					</h3>

					<?php if ($profile_bio) : ?>
						<p class="text-base text-navy">
							<?php echo wp_kses_post($profile_bio); ?>
						</p>
					<?php endif; ?>
				</div>
			</div>

			<?php if (!empty($ss_as_featured_in) && is_array($ss_as_featured_in)) : ?>
				<div class="link-button-container">
					<h3>As Featured In:</h3>
					<?php foreach ($ss_as_featured_in as $item) :
						$site_link = $item['ss_site_url'] ?? null;
						if (!$site_link || empty($site_link['url'])) continue;
						$url    = $site_link['url'];
						$title  = !empty($site_link['title']) ? $site_link['title'] : $url;
						$target = !empty($site_link['target']) ? ' target="' . esc_attr($site_link['target']) . '"' : '';
						$rel    = (!empty($site_link['target']) && $site_link['target'] === '_blank') ? ' rel="noopener noreferrer"' : '';
					?>
						<a href="<?php echo esc_url($url); ?>" class="link-button" <?php echo $target . $rel; ?>>
							<?php echo esc_html($title); ?>
						</a>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>
<style>
	/* Container for column layout */
	.link-button-container {
		display: flex;
		flex-direction: column;
		gap: 16px;
		/* Space between buttons */
		width: 100%;
		max-width: 650px;
		/* Adjust max-width as needed */
	}

	/* Link Button Base Styles */
	.link-button-container .link-button {
		display: flex;
		align-items: center;
		justify-content: flex-start;
		padding: 16px 24px;
		background-color: #ffffff;
		color: #1e2d3b;
		/* Dark slate text color matching the design */
		border: 1.5px solid #283a48;
		/* Outline border */
		border-radius: 10px;
		/* Rounded corners */
		font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
		font-size: 1.05rem;
		font-weight: 500;
		text-decoration: none;
		box-sizing: border-box;
		transition: all 0.2s ease-in-out;
	}

	/* Hover State */
	.link-button-container .link-button:hover {
		background-color: #283a48;
		color: #ffffff;
		border-color: #283a48;
	}

	/* Active / Click State */
	.link-button-container .link-button:active {
		transform: translateY(1px);
	}

	/* Keyboard Focus State (Accessibility) */
	.link-button-container .link-button:focus-visible {
		outline: 2px solid #283a48;
		outline-offset: 3px;
	}
</style>