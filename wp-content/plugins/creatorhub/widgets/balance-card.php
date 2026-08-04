<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class CreatorHub_Balance_Card extends \Elementor\Widget_Base {
	public function get_name() {
		return 'creatorhub_balance_card';
	}

	public function get_title() {
		return __( 'Balance Card', 'creatorhub' );
	}

	public function get_icon() {
		return 'eicon-money';
	}

	public function get_categories() {
		return array( 'general' );
	}

	protected function render() {
		echo '<div class="creatorhub-card"><h3>' . esc_html__( 'Balance Card', 'creatorhub' ) . '</h3></div>';
	}
}
