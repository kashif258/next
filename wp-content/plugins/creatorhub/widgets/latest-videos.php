<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class CreatorHub_Latest_Videos extends \Elementor\Widget_Base {
	public function get_name() {
		return 'creatorhub_latest_videos';
	}

	public function get_title() {
		return __( 'Latest Videos', 'creatorhub' );
	}

	public function get_icon() {
		return 'eicon-video-camera';
	}

	public function get_categories() {
		return array( 'general' );
	}

	protected function render() {
		echo '<div class="creatorhub-card"><h3>' . esc_html__( 'Latest Videos', 'creatorhub' ) . '</h3></div>';
	}
}
