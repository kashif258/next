<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class CreatorHub_Dashboard {
	public static function init() {
		add_action( 'template_redirect', array( __CLASS__, 'handle_dashboard_access' ) );
		add_filter( 'the_content', array( __CLASS__, 'render_dashboard_content' ) );
	}

	public static function handle_dashboard_access() {
		if ( is_page( 'creator-dashboard' ) && ! is_user_logged_in() ) {
			wp_redirect( wp_login_url( get_permalink() ) );
			exit;
		}
	}

	public static function render_dashboard_content( $content ) {
		if ( ! is_page( 'creator-dashboard' ) ) {
			return $content;
		}
		if ( ! is_user_logged_in() ) {
			return $content;
		}

		ob_start();
		include CREATORHUB_PLUGIN_DIR . 'templates/dashboard/home.php';
		$output = ob_get_clean();
		return $output;
	}

	public static function get_summary( $user_id = 0 ) {
		$user_id = $user_id ? $user_id : get_current_user_id();
		global $wpdb;
		$prefix = $wpdb->prefix;

		$video_table = $prefix . 'creatorhub_videos';
		$views_table = $prefix . 'creatorhub_views';

		$videos = $wpdb->get_var( $wpdb->prepare( "SELECT COUNT(*) FROM $video_table WHERE user_id = %d", $user_id ) );
		$views  = $wpdb->get_var( $wpdb->prepare( "SELECT COUNT(*) FROM $views_table WHERE user_id = %d", $user_id ) );
		$revenue = $wpdb->get_var( $wpdb->prepare( "SELECT SUM(revenue) FROM $video_table WHERE user_id = %d", $user_id ) );

		return array(
			'videos'  => intval( $videos ),
			'views'   => intval( $views ),
			'revenue' => floatval( $revenue ),
		);
	}
}
