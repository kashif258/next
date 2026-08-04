<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class CreatorHub_Ajax {
	public static function init() {
		add_action( 'wp_ajax_creatorhub_ping', array( __CLASS__, 'ping' ) );
	}

	public static function ping() {
		check_ajax_referer( 'creatorhub_nonce', 'nonce' );
		wp_send_json_success( array( 'message' => __( 'CreatorHub ready.', 'creatorhub' ) ) );
	}
}
