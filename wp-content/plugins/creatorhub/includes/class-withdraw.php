<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class CreatorHub_Withdraw {
	public static function init() {
		add_action( 'wp_ajax_creatorhub_submit_withdraw', array( __CLASS__, 'submit_withdraw' ) );
	}

	public static function submit_withdraw() {
		check_ajax_referer( 'creatorhub_nonce', 'nonce' );
		if ( ! is_user_logged_in() ) {
			wp_send_json_error();
		}
		$amount = CreatorHub_Security::sanitize_float( isset( $_POST['amount'] ) ? wp_unslash( $_POST['amount'] ) : 0 );
		$method = CreatorHub_Security::sanitize_text( isset( $_POST['method'] ) ? wp_unslash( $_POST['method'] ) : 'bank' );
		global $wpdb;
		$prefix = $wpdb->prefix;
		$table = $prefix . 'creatorhub_withdrawals';
		$wpdb->insert(
			$table,
			array(
				'user_id'         => get_current_user_id(),
				'method'          => $method,
				'amount'          => $amount,
				'status'          => 'pending',
				'account_details' => wp_json_encode( array( 'method' => $method ) ),
				'created_at'      => current_time( 'mysql' ),
				'updated_at'      => current_time( 'mysql' ),
			),
			array( '%d', '%s', '%f', '%s', '%s', '%s', '%s' )
		);
		wp_send_json_success( array( 'message' => __( 'Withdrawal request submitted.', 'creatorhub' ) ) );
	}
}
