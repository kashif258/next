<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class CreatorHub_Statistics_Grid extends \Elementor\Widget_Base {
	public function get_name() {
		return 'creatorhub_statistics_grid';
	}

	public function get_title() {
		return __( 'Statistics Grid', 'creatorhub' );
	}

	public function get_icon() {
		return 'eicon-chart-bar';
	}

	public function get_categories() {
		return array( 'general' );
	}

	protected function render() {
		echo '<div class="creatorhub-dashboard"><div class="creatorhub-grid"><div class="creatorhub-card"><h3>' . esc_html__( 'Statistics', 'creatorhub' ) . '</h3></div></div></div>';
	}
}
