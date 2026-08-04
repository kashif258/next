<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class CreatorHub_Video {
	public static function init() {
		add_action( 'wp_ajax_creatorhub_record_view', array( __CLASS__, 'record_view' ) );
		add_action( 'wp_ajax_nopriv_creatorhub_record_view', array( __CLASS__, 'record_view' ) );
	}

	public static function record_view() {
		check_ajax_referer( 'creatorhub_nonce', 'nonce' );
		$video_id = CreatorHub_Security::sanitize_int( isset( $_POST['video_id'] ) ? wp_unslash( $_POST['video_id'] ) : 0 );
		if ( ! $video_id ) {
			wp_send_json_error();
		}
		$ip = isset( $_SERVER['REMOTE_ADDR'] ) ? sanitize_text_field( wp_unslash( $_SERVER['REMOTE_ADDR'] ) ) : '0.0.0.0';
		$device = isset( $_SERVER['HTTP_USER_AGENT'] ) ? substr( sanitize_text_field( wp_unslash( $_SERVER['HTTP_USER_AGENT'] ) ), 0, 50 ) : 'unknown';
		$cookie_hash = md5( (string) $ip . (string) $device );
		global $wpdb;
		$prefix = $wpdb->prefix;
		$table = $prefix . 'creatorhub_views';
		$wpdb->insert(
			$table,
			array(
				'video_id'     => $video_id,
				'user_id'      => get_current_user_id(),
				'ip'           => $ip,
				'device'       => $device,
				'source'       => 'dashboard',
				'cookie_hash'  => $cookie_hash,
				'created_at'   => current_time( 'mysql' ),
			),
			array( '%d', '%d', '%s', '%s', '%s', '%s', '%s' )
		);
		wp_send_json_success( array( 'message' => __( 'View recorded.', 'creatorhub' ) ) );
	}

	public static function get_videos( $user_id = 0 ) {
		$user_id = $user_id ? $user_id : get_current_user_id();
		global $wpdb;
		$prefix = $wpdb->prefix;
		$table = $prefix . 'creatorhub_videos';
		return $wpdb->get_results( $wpdb->prepare( "SELECT * FROM $table WHERE user_id = %d ORDER BY created_at DESC LIMIT 10", $user_id ) );
	}
}
