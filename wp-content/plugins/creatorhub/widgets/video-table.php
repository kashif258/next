<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class CreatorHub_Video_Table extends \Elementor\Widget_Base {
	public function get_name() {
		return 'creatorhub_video_table';
	}

	public function get_title() {
		return __( 'Video Table', 'creatorhub' );
	}

	public function get_icon() {
		return 'eicon-table';
	}

	public function get_categories() {
		return array( 'general' );
	}

	protected function render() {
		echo '<div class="creatorhub-card"><h3>' . esc_html__( 'Video Table', 'creatorhub' ) . '</h3></div>';
	}
}
