<?php
/**
 * Header Content
 *
 * Figma reference : ss-site-header.html
 * Dynamic content : ACF Theme Options (Theme Options → Header)
 * Navigation      : wp_nav_menu() + WP_Bootstrap_Navwalker
 *
 * ACF option fields used:
 *   site_logo          (image)
 *   orlando_email      (email)
 *   orlando_phone      (text)
 *   tampa_email        (email)
 *   tampa_phone        (text)
 *   header_cta_label   (text)
 *   header_cta_url     (url)
 */

// ── ACF Options ──────────────────────────────────────────────────────────────
$logo          = function_exists('get_field') ? get_field('site_logo', 'option')        : null;
$orlando_email = function_exists('get_field') ? get_field('orlando_email', 'option')    : '';
$orlando_phone = function_exists('get_field') ? get_field('orlando_phone', 'option')    : '';
$tampa_email   = function_exists('get_field') ? get_field('tampa_email', 'option')      : '';
$tampa_phone   = function_exists('get_field') ? get_field('tampa_phone', 'option')      : '';
$cta_label     = function_exists('get_field') ? get_field('header_cta_label', 'option') : '';
$cta_url       = function_exists('get_field') ? get_field('header_cta_url', 'option')   : '';

// Fallbacks
$orlando_email = $orlando_email ?: 'admission@nptifl.com';
$orlando_phone = $orlando_phone ?: '407-772-0057';
$tampa_email   = $tampa_email   ?: 'tampa@nptifl.com';
$tampa_phone   = $tampa_phone   ?: '813-374-2017';
$cta_label     = $cta_label     ?: 'Apply Now';
$cta_url       = $cta_url       ?: '/apply/';

// Clean phone numbers for tel: hrefs
$orlando_phone_clean = preg_replace('/[^0-9]/', '', $orlando_phone);
$tampa_phone_clean   = preg_replace('/[^0-9]/', '', $tampa_phone);

// Logo values
$logo_url    = $logo ? esc_url($logo['url'])    : '';
$logo_alt    = $logo ? esc_attr($logo['alt'] ?: get_bloginfo('name')) : esc_attr(get_bloginfo('name'));
$logo_width  = $logo ? absint($logo['width'])   : 171;
$logo_height = $logo ? absint($logo['height'])  : 64;
?>

<header class="site-header w-full" role="banner">
	<div class="flex w-full">

		<!-- ── Logo — white bg, left-anchored ──────────────────────────────── -->
		<a
			href="<?php echo esc_url(home_url('/')); ?>"
			class="grid place-items-center shrink-0 bg-white px-5 py-4 -ml-4 no-underline"
			aria-label="<?php echo esc_attr(get_bloginfo('name')); ?> — Home"
		>
			<?php if ($logo_url) : ?>
				<img
					src="<?php echo $logo_url; ?>"
					alt="<?php echo $logo_alt; ?>"
					width="<?php echo $logo_width; ?>"
					height="<?php echo $logo_height; ?>"
					class="h-12 xl:h-16 w-auto"
				>
			<?php else : ?>
				<span class="font-heading font-bold text-xl text-navy">
					<?php bloginfo('name'); ?>
				</span>
			<?php endif; ?>
		</a>

		<div class="flex flex-col w-full">

			<!-- ── Top bar — contact info (md+) ──────────────────────────────── -->
			<div class="bg-light-blue hidden lg:block">
				<div class="container mx-auto px-4">
					<div class="row-between-center py-2">

						<!-- Orlando contact -->
						<div class="row-start-center gap-4">
							<span class="font-ui text-xs font-semibold text-navy">Orlando:</span>

							<a
								href="mailto:<?php echo esc_attr($orlando_email); ?>"
								class="row-start-center gap-2 no-underline text-navy font-ui text-xs font-semibold transition-fast"
							>
								<i class="icon-mail text-blue text-xs shrink-0 bg-white p-4 w-5 h-5 flex justify-center items-center rounded-full" aria-hidden="true"></i>
								<?php echo esc_html($orlando_email); ?>
							</a>

							<a
								href="tel:<?php echo esc_attr($orlando_phone_clean); ?>"
								class="row-start-center gap-2 no-underline text-navy font-ui text-xs font-semibold transition-fast"
							>
								<i class="icon-call text-blue text-xs shrink-0 bg-white p-4 w-5 h-5 flex justify-center items-center rounded-full" aria-hidden="true"></i>
								<?php echo esc_html($orlando_phone); ?>
							</a>
						</div>

						<!-- Tampa contact -->
						<div class="row-start-center gap-4">
							<span class="font-ui text-xs font-semibold text-navy">Tampa:</span>

							<a
								href="mailto:<?php echo esc_attr($tampa_email); ?>"
								class="row-start-center gap-2 no-underline text-navy font-ui text-xs font-semibold transition-fast"
							>
								<i class="icon-mail text-blue text-xs shrink-0 bg-white p-4 w-5 h-5 flex justify-center items-center rounded-full" aria-hidden="true"></i>
								<?php echo esc_html($tampa_email); ?>
							</a>

							<a
								href="tel:<?php echo esc_attr($tampa_phone_clean); ?>"
								class="row-start-center gap-2 no-underline text-navy font-ui text-xs font-semibold transition-fast"
							>
								<i class="icon-call text-blue text-xs shrink-0 bg-white p-4 w-5 h-5 flex justify-center items-center rounded-full" aria-hidden="true"></i>
								<?php echo esc_html($tampa_phone); ?>
							</a>
						</div>

					</div>
				</div>
			</div><!-- /top bar -->

			<!-- ── Main nav bar ────────────────────────────────────────────────── -->
			<nav class="bg-blue" role="navigation" aria-label="<?php esc_attr_e('Main navigation', 'ss_theme'); ?>">
				<div class="container mx-auto px-4">
					<div class="row-between-center py-0 min-h-[84px] !gap-x-4 max-xl:!justify-end">

						<!-- Desktop nav — WP_Bootstrap_Navwalker outputs .navbar-nav ul -->
						<div class="max-xl:hidden">
							<?php
							wp_nav_menu([
								'theme_location' => 'PriMenu',
								'depth'          => 3,
								'container'      => false,
								'menu_id'        => 'desktop-nav',
								'menu_class'     => 'navbar-nav [&_ul]:space-y-0',
								'walker'         => new WP_Bootstrap_Navwalker(),
								'fallback_cb'    => 'WP_Bootstrap_Navwalker::fallback',
							]);
							?>
						</div>

						<!-- Desktop CTA + Mobile hamburger toggler -->
						<div class="row-start-center gap-4">
							<a
								href="<?php echo esc_url($cta_url); ?>"
								class="hidden lg:flex py-4 px-9 bg-white item-center justify-center text-blue rounded-pill no-underline font-body text-sm font-bold uppercase border-blue-1 transition-fast hover:bg-orange hover:text-white w-full min-w-[170px]"
							>
								<?php echo esc_html($cta_label); ?>
							</a>

							<!-- Hamburger — script.js toggles .collapsed + .navbar-collapse.show -->
							<button
								class="navbar-toggler"
								aria-label="<?php esc_attr_e('Toggle navigation', 'ss_theme'); ?>"
								aria-expanded="false"
								aria-controls="mobile-nav"
							>
								<span></span>
								<span></span>
								<span></span>
							</button>
						</div>
					</div>
				</div>

				<!-- ── Mobile nav panel — shown via .navbar-collapse.show ──────── -->
				<div id="mobile-nav" class="navbar-collapse xl:hidden">

					<!-- Mobile nav menu -->
					<?php
					wp_nav_menu([
						'theme_location' => 'PriMenu',
						'depth'          => 3,
						'container'      => false,
						'menu_id'        => 'mobile-nav-list',
						'menu_class'     => 'navbar-nav list-none space-y-0 w-full !pl-0',
						'walker'         => new WP_Bootstrap_Navwalker(),
						'fallback_cb'    => 'WP_Bootstrap_Navwalker::fallback',
					]);
					?>

					<!-- Mobile CTA + contact info -->
					<div class="px-4 pb-6 col-start-start-8 overflow-hidden">
						<a
							href="<?php echo esc_url($cta_url); ?>"
							class="inline-flex row-center-center bg-white text-blue rounded-pill no-underline font-body text-sm font-bold uppercase border-blue-1 hover:bg-orange hover:text-white w-full transition-fast"
						>
							<?php echo esc_html($cta_label); ?>
						</a>

						<div class="col-start-start-8 pt-4 w-[calc(100%+16px)] -mr-4 mt-2 relative after:content-[''] after:absolute after:top-0 after:-inset-x-[999px] after:border-t after:border-white/20">
							<div class="row-start-center gap-3 flex-wrap">
								<span class="font-ui text-xs font-semibold text-white/70">Orlando:</span>
								<a
									href="tel:<?php echo esc_attr($orlando_phone_clean); ?>"
									class="font-ui text-xs font-semibold text-white no-underline"
								><i class="icon-call"></i> <?php echo esc_html($orlando_phone); ?></a>
							</div>
							<div class="row-start-center gap-3 flex-wrap">
								<span class="font-ui text-xs font-semibold text-white/70">Tampa:</span>
								<a
									href="tel:<?php echo esc_attr($tampa_phone_clean); ?>"
									class="font-ui text-xs font-semibold text-white no-underline"
								><i class="icon-call"></i> <?php echo esc_html($tampa_phone); ?></a>
							</div>
						</div>
					</div>

				</div><!-- /mobile-nav -->

			</nav><!-- /main nav -->
		</div>
	</div>
</header>
