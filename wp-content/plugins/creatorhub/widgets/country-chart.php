<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class CreatorHub_Country_Chart extends \Elementor\Widget_Base {
	public function get_name() {
		return 'creatorhub_country_chart';
	}

	public function get_title() {
		return __( 'Country Chart', 'creatorhub' );
	}

	public function get_icon() {
		return 'eicon-globe';
	}

	public function get_categories() {
		return array( 'general' );
	}

	protected function render() {
		echo '<div class="creatorhub-card"><h3>' . esc_html__( 'Country Chart', 'creatorhub' ) . '</h3></div>';
	}
}
