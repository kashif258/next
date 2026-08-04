<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class CreatorHub_Install {
	public static function activate() {
		self::create_tables();
		CreatorHub_Roles::register_creator_role();
		flush_rewrite_rules();
	}

	public static function deactivate() {
		flush_rewrite_rules();
	}

	public static function create_tables() {
		global $wpdb;
		$charset_collate = $wpdb->get_charset_collate();
		$prefix          = $wpdb->prefix;

		$sql = array();

		$sql[] = "CREATE TABLE IF NOT EXISTS {$prefix}creatorhub_videos (
			id BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
			user_id BIGINT(20) UNSIGNED NOT NULL DEFAULT 0,
			title VARCHAR(255) NOT NULL,
			description LONGTEXT NULL,
			tags VARCHAR(255) NULL,
			category VARCHAR(100) NULL,
			visibility VARCHAR(20) NOT NULL DEFAULT 'draft',
			publish_status VARCHAR(20) NOT NULL DEFAULT 'draft',
			thumbnail VARCHAR(255) NULL,
			video_url VARCHAR(255) NULL,
			file_size BIGINT(20) NOT NULL DEFAULT 0,
			duration VARCHAR(20) NULL,
			views BIGINT(20) NOT NULL DEFAULT 0,
			revenue DECIMAL(10,2) NOT NULL DEFAULT 0.00,
			created_at DATETIME NOT NULL,
			updated_at DATETIME NOT NULL,
			PRIMARY KEY  (id),
			KEY user_id (user_id)
		) $charset_collate;";

		$sql[] = "CREATE TABLE IF NOT EXISTS {$prefix}creatorhub_views (
			id BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
			video_id BIGINT(20) UNSIGNED NOT NULL,
			user_id BIGINT(20) UNSIGNED NOT NULL DEFAULT 0,
			ip VARCHAR(45) NOT NULL,
			device VARCHAR(50) NOT NULL,
			source VARCHAR(50) NOT NULL,
			cookie_hash VARCHAR(64) NOT NULL,
			created_at DATETIME NOT NULL,
			PRIMARY KEY  (id),
			KEY video_id (video_id)
		) $charset_collate;";

		$sql[] = "CREATE TABLE IF NOT EXISTS {$prefix}creatorhub_balances (
			id BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
			user_id BIGINT(20) UNSIGNED NOT NULL,
			balance DECIMAL(10,2) NOT NULL DEFAULT 0.00,
			pending_balance DECIMAL(10,2) NOT NULL DEFAULT 0.00,
			approved_balance DECIMAL(10,2) NOT NULL DEFAULT 0.00,
			created_at DATETIME NOT NULL,
			updated_at DATETIME NOT NULL,
			PRIMARY KEY  (id),
			UNIQUE KEY user_id (user_id)
		) $charset_collate;";

		$sql[] = "CREATE TABLE IF NOT EXISTS {$prefix}creatorhub_transactions (
			id BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
			user_id BIGINT(20) UNSIGNED NOT NULL,
			type VARCHAR(50) NOT NULL,
			amount DECIMAL(10,2) NOT NULL DEFAULT 0.00,
			status VARCHAR(20) NOT NULL DEFAULT 'pending',
			reference VARCHAR(255) NULL,
			notes LONGTEXT NULL,
			created_at DATETIME NOT NULL,
			PRIMARY KEY  (id),
			KEY user_id (user_id)
		) $charset_collate;";

		$sql[] = "CREATE TABLE IF NOT EXISTS {$prefix}creatorhub_referrals (
			id BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
			user_id BIGINT(20) UNSIGNED NOT NULL,
			referral_code VARCHAR(50) NOT NULL,
			invited_count BIGINT(20) NOT NULL DEFAULT 0,
			earnings DECIMAL(10,2) NOT NULL DEFAULT 0.00,
			created_at DATETIME NOT NULL,
			updated_at DATETIME NOT NULL,
			PRIMARY KEY  (id),
			UNIQUE KEY referral_code (referral_code)
		) $charset_collate;";

		$sql[] = "CREATE TABLE IF NOT EXISTS {$prefix}creatorhub_withdrawals (
			id BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
			user_id BIGINT(20) UNSIGNED NOT NULL,
			method VARCHAR(50) NOT NULL,
			amount DECIMAL(10,2) NOT NULL DEFAULT 0.00,
			status VARCHAR(20) NOT NULL DEFAULT 'pending',
			account_details LONGTEXT NULL,
			created_at DATETIME NOT NULL,
			updated_at DATETIME NOT NULL,
			PRIMARY KEY  (id),
			KEY user_id (user_id)
		) $charset_collate;";

		require_once ABSPATH . 'wp-admin/includes/upgrade.php';
		foreach ( $sql as $query ) {
			dbDelta( $query );
		}
	}
}
