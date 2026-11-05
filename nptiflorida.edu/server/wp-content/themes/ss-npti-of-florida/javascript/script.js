/**
 * Front-end JavaScript
 *
 * The JavaScript code you place here will be processed by esbuild. The output
 * file will be created at `../theme/js/script.min.js` and enqueued in
 * `../theme/functions.php`.
 *
 * For esbuild documentation, please see:
 * https://esbuild.github.io/
 */
var ss;
(function ($) {
	ss = {
		init: function () {
			this.nav();
			this.form();
			this.misc();
			this.slider();
			this.gallery();
			this.faqTab();
			this.tabs();
			this.exitPopup();
		},
		ie: function () {
			try {
				if (
					/MSIE (\d+\.\d+);/.test(navigator.userAgent) ||
					!!navigator.userAgent.match(/Trident.*rv\:11\./)
				) {
					$('body').addClass('ie-user');
					return true;
				}
			} catch (err) {
				console.log(err);
			}
			return false;
		},
		nav: function () {
			// Function to handle sticky header
			const stickyHeader = function () {
				const height = $(window).scrollTop(); // Get the current scroll position
				const header = $('.site-header'); // Select the header element

				if (height > 60) {
					// If the scroll position is greater than 60 pixels
					header.addClass('stickyHeader'); // Add a class to make the header sticky
				} else {
					// If the scroll position is less than or equal to 60 pixels
					header.removeClass('stickyHeader'); // Remove the sticky class
				}
			};

			// Function to adjust padding for an element ('.banner') based on the header height
			const paddingEl2 = function () {
				const header = $('.site-header'); // Select the header element
				const headerHeight = header.innerHeight(); // Get the height of the header
				const paddingElm = $('.banner'); // Select the element to adjust padding
				paddingElm.css('padding-top', headerHeight); // Set padding-top based on the header height
			};

			// Initial call to the functions
			stickyHeader();

			// Set a timeout to call the functions after 1 second
			setTimeout(function () {
				stickyHeader();
				paddingEl2();
			}, 1000);

			// Event listener for scroll events
			$(window).scroll(function () {
				stickyHeader(); // Call the stickyHeader function on scroll
			});

			// Event listener for resize events
			$(window).resize(function () {
				stickyHeader(); // Call the stickyHeader function on resize
				paddingEl2(); // Call the paddingEl2 function on resize

				// Set a timeout to call the functions again after 1 second
				setTimeout(function () {
					stickyHeader();
					paddingEl2();
				}, 1000);
			});

			// navbar-toggler
			$('.navbar-toggler').on('click', function () {
				$(this).toggleClass('collapsed');
				$('#mobile-nav').toggleClass('show');
			});

			$('.navbar-nav .menu-item-has-children .caret').on(
				'click',
				function () {
					$(this).next('.dropdown-menu').slideToggle();
				}
			);

			var winWidth = jQuery(window).width();
			jQuery(' a.js-has-smooth-scroll[href*="#"]:not([href="#"])').click(
				function () {
					if (
						location.pathname.replace(/^\//, '') ==
							this.pathname.replace(/^\//, '') &&
						location.hostname == this.hostname
					) {
						var target = jQuery(this.hash);
						target = target.length
							? target
							: jQuery('[name=' + this.hash.slice(1) + ']');
						if (target.length) {
							if (winWidth > 1024) {
								jQuery('html, body').animate(
									{
										scrollTop: target.offset().top - 132,
									},
									0
								);
							} else {
								jQuery('html, body').animate(
									{
										scrollTop: target.offset().top,
									},
									0
								);
							}
							return false;
						}
					}
				}
			);
		},
		form: function () {
			try {
				$('.input-text.qty').each(function () {
					var elm = $(this);
					$(
						'<span class="qty-des"><i class="icon-angle-left"></i></span>'
					).insertBefore($(this));
					$(
						'<span class="qty-ins"><i class="icon-angle-right"></i></span>'
					).insertAfter($(this));
					elm.prev('.qty-des').on('click', function () {
						var val = parseInt(elm.val());
						if (val > 1) {
							elm.val(val - 1);
						}
					});
					elm.next('.qty-ins').on('click', function () {
						var val = parseInt(elm.val());
						elm.val(val + 1);
					});
				});
			} catch (err) {
				console.log(err);
			}
		},
		misc: function () {
			try {
				//match-height
				$('[data-fix="height"]').matchHeight();

				// accordion toggle
				// accordion toggle
				$('.accordionBtn').click(function () {
					const btn = $(this);

					if (btn.hasClass('active')) {
						btn.removeClass('active')
							.siblings('.accordionBody')
							.slideUp()
							.parent()
							.removeClass('itemActive');

					} else {
						$('.accordionBtn').removeClass('active');
						$('.accordionBody').slideUp();
						$('.accordion-item').removeClass('itemActive');

						btn.addClass('active')
							.siblings('.accordionBody')
							.slideDown()
							.parent()
							.addClass('itemActive');
					}
				});

				// ss-gallery-thumb (housing block — thumbnail image switcher)
				$('.ss-gallery-thumb').on('click', function () {
					var $btn = $(this);
					var src = $btn.data('img-src');
					var alt = $btn.data('img-alt');
					var $main = $('#ss-gallery-main');

					$main.attr('src', src).attr('alt', alt);

					$('.ss-gallery-thumb')
						.removeClass('border-blue opacity-100')
						.addClass('border-transparent opacity-50');

					$btn.removeClass('border-transparent opacity-50').addClass(
						'border-blue opacity-100'
					);
				});

				// ss-accordion (health-coaching block — chevron-icon accordion)
				$('.ss-accordion').on(
					'click',
					'.ss-accordion-btn',
					function (e) {
						var $btn = $(this);
						var $item = $btn.closest('.ss-accordion-item');
						var $body = $item.find('.ss-accordion-body');
						var $group = $btn.closest('.ss-accordion');
						var isOpen = $btn.attr('aria-expanded') === 'true';

						// Collapse all in group
						$group.find('.ss-accordion-body').slideUp();
						$group
							.find('.ss-accordion-chevron')
							.removeClass('rotate-180');
						$group
							.find('.ss-accordion-btn')
							.attr('aria-expanded', 'false');

						// Expand clicked if it was closed
						if (!isOpen) {
							$body.slideDown();
							$btn.find('.ss-accordion-chevron').addClass(
								'rotate-180'
							);
							$btn.attr('aria-expanded', 'true');
						}
					}
				);

				// toggleBtn
				$('.toggleBtn').click(function () {
					$('.toggleBtn')
						.not(this)
						.siblings('.toggleBlock')
						.slideUp();
					$(this).toggleClass('active');
					$('.toggleBtn').not(this).removeClass('active');
					$(this).siblings('.toggleBlock').slideToggle();
				});
			} catch (err) {
				console.log(err);
			}
		},
		slider: function () {
			// slider-col-1
			$('.slider-col-1').slick({
				dots: true,
				infinite: false,
				slidesToShow: 1,
				slidesToScroll: 1,
				adaptiveHeight: true,
			});

			// slider-col-2
			$('.slider-col-2').slick({
				dots: true,
				infinite: false,
				slidesToShow: 2,
				slidesToScroll: 1,
				adaptiveHeight: true,
				responsive: [
					{
						breakpoint: 768,
						settings: {
							slidesToShow: 1,
							adaptiveHeight: true,
						},
					},
				],
			});

			// slider-col-3
			$('.slider-col-3').slick({
				dots: true,
				infinite: false,
				slidesToShow: 3,
				slidesToScroll: 1,
				adaptiveHeight: true,
				responsive: [
					{
						breakpoint: 1024,
						settings: {
							slidesToShow: 2,
						},
					},
					{
						breakpoint: 768,
						settings: {
							slidesToShow: 1,
							adaptiveHeight: true,
						},
					},
				],
			});

			// slider-col-4
			$('.slider-col-4').slick({
				dots: true,
				infinite: false,
				slidesToShow: 4,
				slidesToScroll: 1,
				responsive: [
					{
						breakpoint: 1280,
						settings: {
							slidesToShow: 3,
						},
					},
					{
						breakpoint: 992,
						settings: {
							slidesToShow: 2,
							adaptiveHeight: true,
						},
					},
					{
						breakpoint: 768,
						settings: {
							slidesToShow: 1,
							adaptiveHeight: true,
						},
					},
				],
			});

			// slider-col-5
			$('.slider-col-5').slick({
				dots: true,
				arrow: true,
				infinite: false,
				slidesToShow: 5,
				slidesToScroll: 1,
				responsive: [
					{
						breakpoint: 1200,
						settings: {
							slidesToShow: 4,
						},
					},
					{
						breakpoint: 768,
						settings: {
							slidesToShow: 3,
						},
					},
					{
						breakpoint: 576,
						settings: {
							slidesToShow: 2,
						},
					},
				],
			});

			// slider-col-6
			$('.slider-col-6').slick({
				dots: true,
				arrow: true,
				infinite: false,
				slidesToShow: 6,
				slidesToScroll: 1,
				responsive: [
					{
						breakpoint: 1200,
						settings: {
							slidesToShow: 5,
						},
					},
					{
						breakpoint: 992,
						settings: {
							slidesToShow: 4,
						},
					},
					{
						breakpoint: 768,
						settings: {
							slidesToShow: 3,
						},
					},
					{
						breakpoint: 576,
						settings: {
							slidesToShow: 2,
						},
					},
				],
			});

			// slider-col-7
			$('.slider-col-7').slick({
				dots: true,
				arrow: true,
				infinite: false,
				slidesToShow: 7,
				slidesToScroll: 1,
				responsive: [
					{
						breakpoint: 1200,
						settings: {
							slidesToShow: 5,
						},
					},
					{
						breakpoint: 992,
						settings: {
							slidesToShow: 4,
						},
					},
					{
						breakpoint: 768,
						settings: {
							slidesToShow: 3,
						},
					},
					{
						breakpoint: 576,
						settings: {
							slidesToShow: 2,
						},
					},
				],
			});

			// slickCenterMode
			var slickCenterMode = [
				{
					breakpoint: 2e4,
					settings: {
						centerMode: true,
						centerPadding: '0px',
						infinite: true,
					},
				},
			];
			$('.slickCenterMode').slick(
				'slickSetOption',
				'responsive',
				slickCenterMode,
				true
			);

			// slickInfinite
			var slickInfinite = [
				{
					breakpoint: 2e4,
					settings: {
						infinite: true,
					},
				},
			];
			$('.slickInfinite').slick(
				'slickSetOption',
				'responsive',
				slickInfinite,
				true
			);

			// slickAutoplayInfinite
			var slickAutoplayInfinite = [
				{
					breakpoint: 2e4,
					settings: {
						autoplay: true,
						speed: 800,
						infinite: true,
					},
				},
			];
			$('.slickAutoplayInfinite').slick(
				'slickSetOption',
				'responsive',
				slickAutoplayInfinite,
				true
			);

			//slickSameHeight
			jQuery('.slickSameHeight').on('setPosition', function () {
				jQuery(this).find('.slide-item').height('auto');
				var slickTrack = jQuery(this).find('.slick-track');
				var slickTrackHeight = jQuery(slickTrack).height();
				jQuery(this)
					.find('.slide-item')
					.css('height', slickTrackHeight + 'px');
			});
		},
		gallery: function () {
			try {
				$('.fancybox').fancybox({
					openEffect: 'none',
					closeEffect: 'none',
				});
			} catch (err) {
				console.log(err);
			}
		},
		faqTab: function () {
			// ── Tab switching for .ss-faq-tab / .ss-faq-panel ──────────────────
			$(document).on('click', '.ss-faq-tab', function () {
				var $btn = $(this);
				var tab = $btn.data('tab');
				var $section = $btn.closest('#ss-trainer-questions');

				// Update active tab button styles
				$section
					.find('.ss-faq-tab')
					.removeClass('bg-blue text-white')
					.addClass('text-blue');
				$btn.removeClass('text-blue').addClass('bg-blue text-white');

				// Show the matching panel, hide the rest
				$section.find('.ss-faq-panel').hide();
				$section.find('.ss-faq-panel[data-panel="' + tab + '"]').show();
			});
		},
		// ── Generic tabs (desktop) + accordion (mobile) ─────────────────────────
		// Usage:
		//   Wrap the whole component in .ss-generic-tabs
		//   Tab bar button:       <button class="tabBtn" data-tab="N">…</button>
		//   Accordion header:     <button class="tabBtn ss-acc-btn lg:hidden" data-tab="N">
		//                           …label… <i class="ss-tab-icon icon-chevron-down">
		//                         </button>
		//   Panel:                <div class="tab-body" data-panel="N">…</div>
		//   Desktop: tab bar visible, accordion headers hidden (lg:hidden)
		//   Mobile:  tab bar hidden, accordion headers visible — opens one panel at a time
		tabs: function () {
			$(document).on('click', '.ss-generic-tabs .tabBtn', function () {
				var $btn = $(this);
				var tab = $btn.data('tab');
				var $wrap = $btn.closest('.ss-generic-tabs');

				var isActive =
					$btn.hasClass('bg-blue') ||
					$btn.hasClass('text-blue font-bold');

				// If already active → toggle OFF
				if (isActive) {
					// Reset tab buttons
					$wrap
						.find('.tabBtn:not(.ss-acc-btn)')
						.removeClass('bg-blue text-white')
						.addClass('text-blue');

					// Reset accordion buttons
					$wrap
						.find('.ss-acc-btn')
						.removeClass('text-blue font-bold')
						.addClass('text-navy font-semibold');

					// Reset chevrons
					$wrap.find('.ss-tab-icon').removeClass('rotate-180');

					// Hide panels
					$wrap.find('.tab-body').hide();

					return; // stop here
				}

				// Otherwise → activate normally

				// Tab buttons
				$wrap
					.find('.tabBtn:not(.ss-acc-btn)')
					.removeClass('bg-blue text-white')
					.addClass('text-blue');

				$wrap
					.find('.tabBtn:not(.ss-acc-btn)[data-tab="' + tab + '"]')
					.removeClass('text-blue')
					.addClass('bg-blue text-white');

				// Accordion buttons
				$wrap
					.find('.ss-acc-btn')
					.removeClass('text-blue font-bold')
					.addClass('text-navy font-semibold');

				$wrap
					.find('.ss-acc-btn[data-tab="' + tab + '"]')
					.removeClass('text-navy font-semibold')
					.addClass('text-blue font-bold');

				// Chevron
				$wrap.find('.ss-tab-icon').removeClass('rotate-180');
				$wrap
					.find('.ss-acc-btn[data-tab="' + tab + '"] .ss-tab-icon')
					.addClass('rotate-180');

				// Panels
				$wrap.find('.tab-body').hide();
				$wrap.find('.tab-body[data-panel="' + tab + '"]').show();
			});
		},
		// ── Exit-intent popup (site-wide) — shown once per browser session ──────
		exitPopup: function () {
			try {
				var $popup = $('#ss-exit-popup');
				if (!$popup.length) {
					return;
				}

				var storageKey = 'ssExitPopupShown';
				var minDelay = 3000; // ignore exit intent while the page is still loading
				var loadedAt = Date.now();

				if (sessionStorage.getItem(storageKey)) {
					return;
				}

				var openPopup = function () {
					sessionStorage.setItem(storageKey, '1');
					$popup.removeClass('hidden').addClass('flex');
					$('body').addClass('overflow-hidden');
					$popup.find('.ss-exit-popup-close').trigger('focus');
					$(document).off('mouseleave.ssExitPopup');
				};

				var closePopup = function () {
					$popup.addClass('hidden').removeClass('flex');
					$('body').removeClass('overflow-hidden');
				};

				$(document).on('mouseleave.ssExitPopup', function (e) {
					if (Date.now() - loadedAt < minDelay) {
						return;
					}
					if (e.clientY <= 0 && !e.relatedTarget) {
						openPopup();
					}
				});

				$popup.on(
					'click',
					'.ss-exit-popup-close, .ss-exit-popup-backdrop',
					closePopup
				);

				$(document).on('keydown.ssExitPopup', function (e) {
					if (e.key === 'Escape' && $popup.hasClass('flex')) {
						closePopup();
					}
				});
			} catch (err) {
				console.log(err);
			}
		},
	};
	$(function () {
		ss.init();
	});
})(jQuery);
