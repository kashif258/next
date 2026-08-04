<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class CreatorHub_Statistics {
	public static function init() {
		add_action( 'wp_ajax_creatorhub_get_stats', array( __CLASS__, 'get_stats' ) );
	}

	public static function get_stats() {
		check_ajax_referer( 'creatorhub_nonce', 'nonce' );
		$user_id = get_current_user_id();
		$summary = CreatorHub_Dashboard::get_summary( $user_id );
		wp_send_json_success( $summary );
	}
}
