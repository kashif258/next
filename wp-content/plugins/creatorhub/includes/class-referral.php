<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class CreatorHub_Referral {
	public static function init() {
		add_action( 'init', array( __CLASS__, 'ensure_referral_row' ) );
	}

	public static function ensure_referral_row() {
		if ( ! is_user_logged_in() ) {
			return;
		}
		$user_id = get_current_user_id();
		global $wpdb;
		$prefix = $wpdb->prefix;
		$table = $prefix . 'creatorhub_referrals';
		$exists = $wpdb->get_var( $wpdb->prepare( "SELECT id FROM $table WHERE user_id = %d", $user_id ) );
		if ( ! $exists ) {
			$wpdb->insert(
				$table,
				array(
					'user_id'        => $user_id,
					'referral_code'  => self::generate_code( $user_id ),
					'invited_count'  => 0,
					'earnings'       => 0.00,
					'created_at'     => current_time( 'mysql' ),
					'updated_at'     => current_time( 'mysql' ),
				),
				array( '%d', '%s', '%d', '%f', '%s', '%s' )
			);
		}
	}

	public static function generate_code( $user_id ) {
		return 'CH' . strtoupper( wp_generate_password( 4, false, false ) ) . $user_id;
	}

	public static function get_referral( $user_id = 0 ) {
		$user_id = $user_id ? $user_id : get_current_user_id();
		global $wpdb;
		$prefix = $wpdb->prefix;
		$table = $prefix . 'creatorhub_referrals';
		return $wpdb->get_row( $wpdb->prepare( "SELECT * FROM $table WHERE user_id = %d", $user_id ), ARRAY_A );
	}
}
