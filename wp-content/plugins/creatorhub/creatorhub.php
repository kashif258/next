<?php
/**
 * Plugin Name: CreatorHub Pro
 * Description: Premium creator dashboard platform for WordPress with dashboard, uploads, analytics, wallet, referrals, and Elementor support.
 * Version: 1.0.0
 * Author: CreatorHub Pro
 * License: GPL-2.0-or-later
 * Text Domain: creatorhub
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'CREATORHUB_PLUGIN_FILE', __FILE__ );
define( 'CREATORHUB_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'CREATORHUB_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'CREATORHUB_VERSION', '1.0.0' );

require_once CREATORHUB_PLUGIN_DIR . 'includes/class-security.php';
require_once CREATORHUB_PLUGIN_DIR . 'includes/class-install.php';
require_once CREATORHUB_PLUGIN_DIR . 'includes/class-roles.php';
require_once CREATORHUB_PLUGIN_DIR . 'includes/class-users.php';
require_once CREATORHUB_PLUGIN_DIR . 'includes/class-dashboard.php';
require_once CREATORHUB_PLUGIN_DIR . 'includes/class-upload.php';
require_once CREATORHUB_PLUGIN_DIR . 'includes/class-video.php';
require_once CREATORHUB_PLUGIN_DIR . 'includes/class-balance.php';
require_once CREATORHUB_PLUGIN_DIR . 'includes/class-referral.php';
require_once CREATORHUB_PLUGIN_DIR . 'includes/class-statistics.php';
require_once CREATORHUB_PLUGIN_DIR . 'includes/class-withdraw.php';
require_once CREATORHUB_PLUGIN_DIR . 'includes/class-payments.php';
require_once CREATORHUB_PLUGIN_DIR . 'includes/class-rest-api.php';
require_once CREATORHUB_PLUGIN_DIR . 'includes/class-ajax.php';
require_once CREATORHUB_PLUGIN_DIR . 'includes/class-shortcodes.php';
require_once CREATORHUB_PLUGIN_DIR . 'includes/class-elementor.php';

register_activation_hook( __FILE__, array( 'CreatorHub_Install', 'activate' ) );
register_deactivation_hook( __FILE__, array( 'CreatorHub_Install', 'deactivate' ) );

add_action( 'plugins_loaded', 'creatorhub_bootstrap' );
add_action( 'wp_enqueue_scripts', 'creatorhub_enqueue_frontend_assets' );
add_action( 'admin_enqueue_scripts', 'creatorhub_enqueue_admin_assets' );

function creatorhub_bootstrap() {
	load_plugin_textdomain( 'creatorhub', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
	CreatorHub_Roles::register_creator_role();
	CreatorHub_Dashboard::init();
	CreatorHub_Upload::init();
	CreatorHub_Video::init();
	CreatorHub_Balance::init();
	CreatorHub_Referral::init();
	CreatorHub_Statistics::init();
	CreatorHub_Withdraw::init();
	CreatorHub_Payments::init();
	CreatorHub_Rest_Api::init();
	CreatorHub_Ajax::init();
	CreatorHub_Shortcodes::init();
	CreatorHub_Elementor::init();
}

function creatorhub_enqueue_frontend_assets() {
	wp_enqueue_style( 'creatorhub-main', CREATORHUB_PLUGIN_URL . 'assets/css/creatorhub.css', array(), CREATORHUB_VERSION );
	wp_enqueue_script( 'creatorhub-main', CREATORHUB_PLUGIN_URL . 'assets/js/creatorhub.js', array( 'jquery' ), CREATORHUB_VERSION, true );
	wp_localize_script( 'creatorhub-main', 'creatorhubData', array(
		'ajaxUrl' => admin_url( 'admin-ajax.php' ),
		'nonce'   => wp_create_nonce( 'creatorhub_nonce' ),
	) );
}

function creatorhub_enqueue_admin_assets() {
	wp_enqueue_style( 'creatorhub-admin', CREATORHUB_PLUGIN_URL . 'assets/css/creatorhub-admin.css', array(), CREATORHUB_VERSION );
	wp_enqueue_script( 'creatorhub-admin', CREATORHUB_PLUGIN_URL . 'assets/js/creatorhub-admin.js', array( 'jquery' ), CREATORHUB_VERSION, true );
}
