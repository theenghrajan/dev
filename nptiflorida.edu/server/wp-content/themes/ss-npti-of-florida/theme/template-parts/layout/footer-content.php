<?php
/**
 * Footer Content
 *
 * Figma reference : ss-site-footer.html
 * Dynamic content : ACF Theme Options (Theme Options → Footer)
 *
 * ACF option fields used:
 *   footer_logo           (image)
 *   footer_col_1–4        (group: heading + links repeater)
 *   social_links          (repeater: platform + url)
 *   footer_copyright_text (text — use {year} placeholder for dynamic year)
 */

// ── ACF Options ──────────────────────────────────────────────────────────────
$footer_logo = function_exists('get_field') ? get_field('footer_logo', 'option') : null;
$col1 = function_exists('get_field') ? get_field('footer_col_1', 'option') : [];
$col2 = function_exists('get_field') ? get_field('footer_col_2', 'option') : [];
$col3 = function_exists('get_field') ? get_field('footer_col_3', 'option') : [];
$col4 = function_exists('get_field') ? get_field('footer_col_4', 'option') : [];
$social_links = function_exists('get_field') ? get_field('social_links', 'option') : [];
$copyright_raw = function_exists('get_field') ? get_field('footer_copyright_text', 'option') : '';
$statement_link = function_exists('get_field') ? get_field('footer_bottom_links', 'option') : null;

// Dynamic year in copyright
$copyright = esc_html(str_replace('{year}', date('Y'), $copyright_raw ?: 'Copyright ©{year} NPTIFLORIDA.EDU. All Rights Reserved.'));

// Logo
$footer_logo_url = $footer_logo ? esc_url($footer_logo['url']) : '';
$footer_logo_alt = $footer_logo ? esc_attr($footer_logo['alt'] ?: get_bloginfo('name')) : esc_attr(get_bloginfo('name'));
$footer_logo_width = $footer_logo ? absint($footer_logo['width']) : 171;
$footer_logo_height = $footer_logo ? absint($footer_logo['height']) : 64;

// Social icon map — platform → icomoon class + label
$social_icon_map = [
	'facebook' => ['icon' => 'icon-facebook', 'label' => 'Facebook'],
	'instagram' => ['icon' => 'icon-instagram', 'label' => 'Instagram'],
	'youtube' => ['icon' => 'icon-youtube', 'label' => 'YouTube'],
	'twitter' => ['icon' => 'icon-twitter', 'label' => 'Twitter / X'],
	'linkedin' => ['icon' => 'icon-linkedin', 'label' => 'LinkedIn'],
];

// Helper — render a single nav column
function ss_footer_nav_col(array $col): void
{
	if (empty($col['heading']) && empty($col['links']))
		return;
	echo '<div class="col-start-start-16">';
	if (!empty($col['heading'])) {
		echo '<h3 class="font-ui text-lg font-bold text-white leading-snug">' . esc_html($col['heading']) . '</h3>';
	}
	if (!empty($col['links'])) {
		echo '<ul class="col-start-start-16 list-none pl-0 space-y-0">';
		foreach ($col['links'] as $row) {
			$link = $row['link'] ?? [];
			if (empty($link['url']))
				continue;
			$url = esc_url($link['url']);
			$title = esc_html($link['title'] ?: $link['url']);
			$target = ($link['target'] ?? '') === '_blank' ? ' target="_blank" rel="noopener noreferrer"' : '';
			echo '<li><a href="' . $url . '"' . $target . ' class="font-ui text-sm font-normal text-white no-underline transition-fast hover:text-white/70">' . $title . '</a></li>';
		}
		echo '</ul>';
	}
	echo '</div>';
}
?>

<footer class="site-footer bg-navy rounded-t-xl" role="contentinfo">
	<div class="container mx-auto px-4 py-10 md:py-16">

		<!-- ── Main footer grid — logo + 4 nav columns ──────────────────────── -->
		<div class="flex flex-col gap-10 md:flex-row md:gap-8 lg:gap-12">

			<!-- Logo card -->
			<div class="shrink-0">
				<a href="<?php echo esc_url(home_url('/')); ?>"
					aria-label="<?php echo esc_attr(get_bloginfo('name')); ?> — Home" class="no-underline">
					<div class="bg-white rounded-xl px-4 py-3 inline-flex items-center">
						<?php if ($footer_logo_url): ?>
							<img src="<?php echo $footer_logo_url; ?>" alt="<?php echo $footer_logo_alt; ?>"
								width="<?php echo $footer_logo_width; ?>" height="<?php echo $footer_logo_height; ?>" class="h-16 w-auto">
						<?php else: ?>
							<span class="font-heading font-bold text-xl text-navy">
								<?php bloginfo('name'); ?>
							</span>
						<?php endif; ?>
					</div>
				</a>
			</div>

			<!-- Nav columns -->
			<div class="grid grid-cols-2 gap-8 md:grid-cols-4 md:gap-6 lg:gap-10 flex-1">
				<?php
				ss_footer_nav_col($col1 ?: []);
				ss_footer_nav_col($col2 ?: []);
				ss_footer_nav_col($col3 ?: []);
				ss_footer_nav_col($col4 ?: []);
				?>
			</div>

		</div>

	</div>

	<!-- ── Divider ──────────────────────────────────────────────────────────── -->
	<hr class="border-0 border-t border-white/10 my-0">

	<!-- ── Bottom bar — social icons + copyright ────────────────────────────── -->
	<div class="container mx-auto px-4 py-6">
		<div class="row-between-center flex-wrap !gap-4">

			<!-- Social icons -->
			<?php if (!empty($social_links)): ?>
				<div class="row-start-center gap-3">
					<?php foreach ($social_links as $social):
						$platform = $social['platform'] ?? '';
						$url = $social['url'] ?? '';
						if (!$platform || !$url)
							continue;
						$map = $social_icon_map[$platform] ?? ['icon' => 'icon-star', 'label' => ucfirst($platform)];
						?>
						<a href="<?php echo esc_url($url); ?>"
							class="flex items-center justify-center w-10 h-10 lg:w-14 lg:h-14 rounded-full bg-white/10 hover:bg-orange hover:text-white text-white no-underline transition-fast"
							aria-label="<?php echo esc_attr($map['label']); ?>" target="_blank" rel="noopener noreferrer">
							<i class="<?php echo esc_attr($map['icon']); ?> text-sm lg:text-lg" aria-hidden="true"></i>
						</a>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>

			<div class="flex flex-col gap-2 md:items-end">

				<!-- Statement link -->
				<?php if (!empty($statement_link['url'])):
					$statement_target = ($statement_link['target'] ?? '') === '_blank' ? ' target="_blank" rel="noopener noreferrer"' : '';
					?>
					<a href="<?php echo esc_url($statement_link['url']); ?>"<?php echo $statement_target; ?>
						class="font-ui text-sm font-normal text-white transition-fast hover:text-white/70">
						<?php echo esc_html($statement_link['title'] ?: $statement_link['url']); ?>
					</a>
				<?php endif; ?>

				<!-- Copyright -->
				<p class="font-ui text-sm font-normal text-white/80 leading-normal">
					<?php echo $copyright; ?>
				</p>

			</div>

		</div>
	</div>

</footer>