<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class CreatorHub_Rest_Api {
	public static function init() {
		add_action( 'rest_api_init', array( __CLASS__, 'register_routes' ) );
	}

	public static function register_routes() {
		register_rest_route( 'creatorhub/v1', '/stats', array(
			'methods'             => 'GET',
			'callback'            => array( __CLASS__, 'get_stats' ),
			'permission_callback' => function () {
				return is_user_logged_in();
			},
		) );
	}

	public static function get_stats( $request ) {
		return rest_ensure_response( CreatorHub_Dashboard::get_summary() );
	}
}
