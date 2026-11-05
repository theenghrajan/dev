<?php
/**
 * Module: Ready to Speak
 * Template Part: template-parts/content/ready-to-speak.php
 *
 * ACF Options Fields:
 *  - ss_ready_to_speak_text              (text)   — main heading text
 *  - ss_ready_to_speak_orange_text       (text)   — orange span in heading
 *  - ss_ready_to_speak_sub_text          (text)   — "Call Us Today" label
 *  - ss_ready_to_speak_form_title        (text)   — form card heading
 *  - ss_ready_to_speak_form_title_orange (text)   — orange span in form heading
 *  - ss_ready_to_speak_form_id           (number) — Gravity Forms form ID
 *  - orlando_phone                       (text)   — shared with header (Theme Options)
 *  - tampa_phone                         (text)   — shared with header (Theme Options)
 */

$heading_text       = get_field( 'ss_ready_to_speak_text', 'option' );
$heading_orange     = get_field( 'ss_ready_to_speak_orange_text', 'option' );
$sub_text           = get_field( 'ss_ready_to_speak_sub_text', 'option' );
$form_title         = get_field( 'ss_ready_to_speak_form_title', 'option' );
$form_title_orange  = get_field( 'ss_ready_to_speak_form_title_orange', 'option' );
$form_id            = get_field( 'ss_ready_to_speak_form_id', 'option' );
$get_started_section = get_field( 'ss_remove_page_get_started' );
// Shared global option fields — same source as header-content.php
$orlando_phone = get_field( 'orlando_phone', 'option' ) ?: '407-772-0057';
$tampa_phone   = get_field( 'tampa_phone',   'option' ) ?: '813-374-2017';

// Strip non-numeric characters for tel: href
$orlando_phone_clean = preg_replace( '/[^0-9]/', '', $orlando_phone );
$tampa_phone_clean   = preg_replace( '/[^0-9]/', '', $tampa_phone );
?>
<?php if ( ! $get_started_section ) : ?>
<section id="ss-grid-training" class="ss-module-grid-training bg-white pad-section">
	<div class="container mx-auto px-4">
		<div class="grid grid-cols-1 gap-8 lg:grid-cols-2 lg:items-start">

			<!-- Left column: heading + contact info -->
			<div class="col-start-start-16">

				<?php if ( $heading_text || $heading_orange ) : ?>
					<h2>
						<?php if ( $heading_text ) : ?>
							<?php echo esc_html( $heading_text ); ?>
						<?php endif; ?>
						<?php if ( $heading_orange ) : ?>
							<span class="text-orange"><?php echo esc_html( $heading_orange ); ?></span>
						<?php endif; ?>
					</h2>
				<?php endif; ?>

				<?php if ( $sub_text ) : ?>
					<p class="font-body font-semibold text-xl text-navy leading-snug mt-6 mb-4">
						<?php echo esc_html( $sub_text ); ?>
					</p>
				<?php endif; ?>

				<!-- Campus contacts -->
				<div class="col-start-start-8 gap-4">

					<!-- Orlando -->
					<div class="col-start-start-8 mb-3">
						<p class="font-semibold text-base text-navy leading-snug">Orlando:</p>
						<a href="tel:<?php echo esc_attr( $orlando_phone_clean ); ?>"
							class="row-start-center gap-2 no-underline text-navy text-base leading-snug transition-fast hover:text-orange">
							<i class="icon-call text-white text-xs shrink-0 bg-orange p-4 w-5 h-5 flex justify-center items-center rounded-full"
								aria-hidden="true"></i>
							<?php echo esc_html( $orlando_phone ); ?>
						</a>
					</div>

					<!-- Tampa -->
					<div class="col-start-start-8">
						<p class="font-semibold text-base text-navy leading-snug">Tampa:</p>
						<a href="tel:<?php echo esc_attr( $tampa_phone_clean ); ?>"
							class="row-start-center gap-2 no-underline text-navy text-base leading-snug transition-fast hover:text-orange">
							<i class="icon-call text-white text-xs shrink-0 bg-orange p-4 w-5 h-5 flex justify-center items-center rounded-full"
								aria-hidden="true"></i>
							<?php echo esc_html( $tampa_phone ); ?>
						</a>
					</div>

				</div>
			</div>

			<!-- Right column: Get Started form card -->
			<div class="bg-navy/10 rounded-xl lg:p-8 p-4">

				<?php if ( $form_title || $form_title_orange ) : ?>
					<h2 class="mb-6">
						<?php if ( $form_title ) : ?>
							<?php echo esc_html( $form_title ); ?>
						<?php endif; ?>
						<?php if ( $form_title_orange ) : ?>
							<span class="text-orange"><?php echo esc_html( $form_title_orange ); ?></span>
						<?php endif; ?>
					</h2>
				<?php endif; ?>

				<?php if ( $form_id ) : ?>
					<?php echo do_shortcode( '[gravityform id="' . absint( $form_id ) . '" title="false" description="false" ajax="true"]' ); ?>
				<?php endif; ?>

			</div>

		</div>
	</div>
</section>
<?php endif; ?>
