<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class CreatorHub_Activity_Feed extends \Elementor\Widget_Base {
	public function get_name() {
		return 'creatorhub_activity_feed';
	}

	public function get_title() {
		return __( 'Activity Feed', 'creatorhub' );
	}

	public function get_icon() {
		return 'eicon-posts-ticker';
	}

	public function get_categories() {
		return array( 'general' );
	}

	protected function render() {
		echo '<div class="creatorhub-card"><h3>' . esc_html__( 'Activity Feed', 'creatorhub' ) . '</h3></div>';
	}
}
