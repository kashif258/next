<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class CreatorHub_Payments {
	public static function init() {
		add_action( 'admin_menu', array( __CLASS__, 'register_admin_page' ) );
	}

	public static function register_admin_page() {
		add_menu_page(
			__( 'CreatorHub Payments', 'creatorhub' ),
			__( 'CreatorHub', 'creatorhub' ),
			'manage_options',
			'creatorhub-payments',
			array( __CLASS__, 'render_admin_page' ),
			'dashicons-money-alt',
			25
		);
	}

	public static function render_admin_page() {
		echo '<div class="wrap"><h1>' . esc_html__( 'CreatorHub Payments', 'creatorhub' ) . '</h1><p>' . esc_html__( 'Payment management is ready for extension.', 'creatorhub' ) . '</p></div>';
	}
}
