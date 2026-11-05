<?php

/**
 * Exit-Intent Popup — site-wide overlay
 *
 * Figma reference : node 7002:69, file 2ipgij5H4O3I2xpQsRqarI
 * Loaded on every page from footer.php. Hidden by default; shown by
 * ss.exitPopup() in javascript/script.js, which also suppresses it via
 * sessionStorage so it only appears once per browser session.
 */

$ss_exit_trust_items = ['Instant Download', 'No Spam', 'Career Roadmap'];
?>

<div id="ss-exit-popup" class="ss-exit-popup fixed inset-0 z-modal hidden items-center justify-center p-4" role="dialog" aria-modal="true" aria-labelledby="ss-exit-popup-title">

	<div class="ss-exit-popup-backdrop absolute inset-0 bg-navy/70"></div>

	<div class="relative bg-white rounded-2xl w-full max-w-[835px] max-h-[90vh] overflow-y-auto overflow-x-hidden flex flex-col lg:flex-row gap-6 lg:gap-10 p-6 lg:p-8 animate-scale-in">

		<button type="button" class="ss-exit-popup-close absolute top-5 right-5 flex items-center justify-center size-5 rounded-full bg-navy text-white" aria-label="Close">
			<svg class="size-2.5" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
				<path d="M1 1L13 13M13 1L1 13" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" />
			</svg>
		</button>

		<div class="hidden lg:block shrink-0 w-[330px]">
			<img src="<?php echo esc_url(get_template_directory_uri() . '/images/exit-intent-guide.jpg'); ?>"
				alt="NPTI Florida Fitness Career Training Guide" width="330" height="398"
				class="w-full h-[398px] object-cover">
		</div>

		<div class="flex flex-col gap-5 w-full lg:w-[397px]">

			<div class="flex flex-col">
				<div class="flex flex-col gap-2.5">
					<div class="flex flex-col gap-2.5">
						<div class="flex items-center gap-3">
							<span class="inline-block size-3 bg-orange shrink-0" aria-hidden="true"></span>
							<p class="font-ui text-[0.75rem] leading-[normal] text-blue mb-0">Wait — before you go</p>
						</div>
						<p id="ss-exit-popup-title" class="font-heading font-bold text-[2rem] leading-[2.5rem] text-navy capitalize">
							Stop Guessing. Start Your Fitness Career.</p>
					</div>
					<p class="font-body text-xs text-navy">Discover the proven roadmap to becoming a successful personal trainer. Learn career paths, salary expectations, certifications, and insider tips from NPTI's expert instructors.</p>
				</div>

				<div class="ss-exit-popup-gform">
					<?php echo do_shortcode('[gravityform id="10" title="false" ajax="true"]'); ?>
				</div>
			</div>

			<div class="flex flex-wrap items-center gap-x-8 gap-y-2">
				<?php foreach ($ss_exit_trust_items as $ss_exit_trust_item): ?>
					<div class="flex items-center gap-1.5">
						<svg class="size-3.5 text-orange shrink-0 -scale-y-100" viewBox="0 0 12.3225 12.0297" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
							<path d="M8.27203 8.14407C6.37984 6.00032 4.77202 4.22845 4.68452 4.19564C4.60796 4.16282 4.06109 4.57845 3.41577 5.16907C2.00484 6.47064 1.86265 6.56907 1.30484 6.56907C0.407962 6.56907 -0.248288 5.61751 0.0907744 4.81907C0.276712 4.3597 3.67827 0.170636 3.94077 0.0721984C4.31265 -0.0699892 4.94702 0.00657335 5.2314 0.225323C5.38452 0.345636 7.0689 2.94876 8.97203 6.0222C11.9689 10.8566 12.4173 11.6222 12.308 11.8191C12.0236 12.3441 11.8158 12.1472 8.27203 8.14407Z" fill="currentColor" />
						</svg>
						<p class="font-body text-[0.75rem] leading-[normal] text-navy"><?php echo esc_html($ss_exit_trust_item); ?></p>
					</div>
				<?php endforeach; ?>
			</div>

		</div>

	</div>

</div>
