<?php

namespace wpengine\sign_on_plugin;

require_once __DIR__ . '/security-checks.php';
\wpengine\sign_on_plugin\check_security();

class RedirectValidator {

	/**
	 * Sanitize and validate a wp-admin redirect URL.
	 *
	 * Portal performs exact-match validation per ASKSEC-9015 security review.
	 * Plugin trusts Portal validation (via secure SSH/signed JWT) and performs
	 * format validation to verify wp-admin structure.
	 *
	 * @param mixed  $redirect_to Raw redirect URL.
	 * @param string $user_email User email for logging.
	 * @return string|false Validated URL or false if invalid.
	 */
	public static function validate( $redirect_to, $user_email = null ) {
		if ( ! is_string( $redirect_to ) ) {
			Logger::log(
				Logger::DEEP_LINKING_ERROR,
				'REJECTED: redirect must be a string, got ' . gettype( $redirect_to ),
				$user_email,
				PWP_NAME
			);
			return false;
		}

		$sanitized = esc_url_raw( $redirect_to );
		$validated = wp_validate_redirect( $sanitized, false );

		if ( false === $validated ) {
			Logger::log(
				Logger::DEEP_LINKING_ERROR,
				"REJECTED: wp_validate_redirect failed for {$redirect_to} (external URL or invalid)",
				$user_email,
				PWP_NAME
			);
			return false;
		}

		$parsed_url = wp_parse_url( $validated );
		if ( ! isset( $parsed_url['path'] ) ) {
			Logger::log(
				Logger::DEEP_LINKING_ERROR,
				"REJECTED: No path component in {$redirect_to}",
				$user_email,
				PWP_NAME
			);
			return false;
		}

		// Decode until stable so encoded traversal sequences (e.g. %2e%2e, %252e%252e) are caught by the .. check.
		$path = $parsed_url['path'];
		do {
			$previous = $path;
			$path     = rawurldecode( $path );
		} while ( $path !== $previous );
		if ( ! preg_match( '#^/wp-admin/(?!.*\.\.).*$#', $path ) ) {
			Logger::log(
				Logger::DEEP_LINKING_ERROR,
				"REJECTED: Path validation failed for {$redirect_to} (must be /wp-admin/ without .. sequences)",
				$user_email,
				PWP_NAME
			);
			return false;
		}

		return $validated;
	}
}
