<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class CreatorHub_Revenue_Chart extends \Elementor\Widget_Base {
	public function get_name() {
		return 'creatorhub_revenue_chart';
	}

	public function get_title() {
		return __( 'Revenue Chart', 'creatorhub' );
	}

	public function get_icon() {
		return 'eicon-chart-area';
	}

	public function get_categories() {
		return array( 'general' );
	}

	protected function render() {
		echo '<div class="creatorhub-card"><h3>' . esc_html__( 'Revenue Chart', 'creatorhub' ) . '</h3></div>';
	}
}
