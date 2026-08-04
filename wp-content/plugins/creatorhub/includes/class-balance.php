<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class CreatorHub_Balance {
	public static function init() {
		add_action( 'init', array( __CLASS__, 'ensure_balance_row' ) );
	}

	public static function ensure_balance_row() {
		if ( ! is_user_logged_in() ) {
			return;
		}
		$user_id = get_current_user_id();
		global $wpdb;
		$prefix = $wpdb->prefix;
		$table  = $prefix . 'creatorhub_balances';
		$exists = $wpdb->get_var( $wpdb->prepare( "SELECT id FROM $table WHERE user_id = %d", $user_id ) );
		if ( ! $exists ) {
			$wpdb->insert(
				$table,
				array(
					'user_id'           => $user_id,
					'balance'           => 0.00,
					'pending_balance'   => 0.00,
					'approved_balance'  => 0.00,
					'created_at'        => current_time( 'mysql' ),
					'updated_at'        => current_time( 'mysql' ),
				),
				array( '%d', '%f', '%f', '%f', '%s', '%s' )
			);
		}
	}

	public static function get_balance( $user_id = 0 ) {
		$user_id = $user_id ? $user_id : get_current_user_id();
		global $wpdb;
		$prefix = $wpdb->prefix;
		$table = $prefix . 'creatorhub_balances';
		return $wpdb->get_row( $wpdb->prepare( "SELECT * FROM $table WHERE user_id = %d", $user_id ), ARRAY_A );
	}
}
