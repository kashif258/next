<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class CreatorHub_Shortcodes {
	public static function init() {
		add_shortcode( 'creator_dashboard', array( __CLASS__, 'render_dashboard' ) );
		add_shortcode( 'creator_upload', array( __CLASS__, 'render_upload' ) );
		add_shortcode( 'creator_statistics', array( __CLASS__, 'render_statistics' ) );
		add_shortcode( 'creator_wallet', array( __CLASS__, 'render_wallet' ) );
		add_shortcode( 'creator_referrals', array( __CLASS__, 'render_referrals' ) );
		add_shortcode( 'creator_balance', array( __CLASS__, 'render_balance' ) );
	}

	public static function render_dashboard( $atts ) {
		ob_start();
		include CREATORHUB_PLUGIN_DIR . 'templates/dashboard/home.php';
		return ob_get_clean();
	}

	public static function render_upload( $atts ) {
		ob_start();
		include CREATORHUB_PLUGIN_DIR . 'templates/dashboard/upload.php';
		return ob_get_clean();
	}

	public static function render_statistics( $atts ) {
		ob_start();
		include CREATORHUB_PLUGIN_DIR . 'templates/dashboard/statistics.php';
		return ob_get_clean();
	}

	public static function render_wallet( $atts ) {
		ob_start();
		include CREATORHUB_PLUGIN_DIR . 'templates/dashboard/wallet.php';
		return ob_get_clean();
	}

	public static function render_referrals( $atts ) {
		ob_start();
		include CREATORHUB_PLUGIN_DIR . 'templates/dashboard/referrals.php';
		return ob_get_clean();
	}

	public static function render_balance( $atts ) {
		ob_start();
		include CREATORHUB_PLUGIN_DIR . 'templates/dashboard/balance.php';
		return ob_get_clean();
	}
}
