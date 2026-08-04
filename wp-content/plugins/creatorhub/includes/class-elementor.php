<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class CreatorHub_Elementor {
	public static function init() {
		if ( class_exists( 'Elementor\Plugin' ) ) {
			add_action( 'elementor/widgets/register', array( __CLASS__, 'register_widgets' ) );
		}
	}

	public static function register_widgets( $widgets_manager ) {
		$widget_files = array(
			'dashboard-hero'   => 'widgets/dashboard-hero.php',
			'statistics-grid'  => 'widgets/statistics-grid.php',
			'balance-card'     => 'widgets/balance-card.php',
			'referral-card'    => 'widgets/referral-card.php',
			'upload-form'      => 'widgets/upload-form.php',
			'revenue-chart'    => 'widgets/revenue-chart.php',
			'country-chart'    => 'widgets/country-chart.php',
			'video-table'      => 'widgets/video-table.php',
			'latest-videos'    => 'widgets/latest-videos.php',
			'activity-feed'    => 'widgets/activity-feed.php',
		);
		foreach ( $widget_files as $widget_name => $path ) {
			$widget_path = CREATORHUB_PLUGIN_DIR . $path;
			if ( file_exists( $widget_path ) ) {
				require_once $widget_path;
				$class_name = 'CreatorHub_' . str_replace( '-', '_', ucwords( $widget_name, '-' ) );
				if ( class_exists( $class_name ) ) {
					$widgets_manager->register( new $class_name() );
				}
			}
		}
	}
}
