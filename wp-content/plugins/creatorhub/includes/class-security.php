<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class CreatorHub_Security {
	public static function verify_nonce( $nonce_name, $nonce_value = '' ) {
		$nonce = $nonce_value;
		if ( empty( $nonce ) ) {
			$nonce = isset( $_REQUEST['_wpnonce'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['_wpnonce'] ) ) : '';
		}
		return wp_verify_nonce( $nonce, $nonce_name );
	}

	public static function sanitize_text( $value ) {
		return sanitize_text_field( wp_unslash( $value ) );
	}

	public static function sanitize_textarea( $value ) {
		return sanitize_textarea_field( wp_unslash( $value ) );
	}

	public static function sanitize_int( $value ) {
		return absint( $value );
	}

	public static function sanitize_float( $value ) {
		return floatval( $value );
	}

	public static function check_user_capability( $required_cap = 'read' ) {
		return current_user_can( $required_cap );
	}

	public static function rate_limit( $action, $limit = 10, $seconds = 60 ) {
		$transient_key = 'creatorhub_rate_' . md5( $action . wp_get_current_user()->ID . wp_get_remote_ip() );
		$attempts      = get_transient( $transient_key );
		if ( false === $attempts ) {
			set_transient( $transient_key, 1, $seconds );
			return true;
		}
		if ( intval( $attempts ) >= $limit ) {
			return false;
		}
		set_transient( $transient_key, intval( $attempts ) + 1, $seconds );
		return true;
	}
}
