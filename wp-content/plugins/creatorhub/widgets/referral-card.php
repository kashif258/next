<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class CreatorHub_Referral_Card extends \Elementor\Widget_Base {
	public function get_name() {
		return 'creatorhub_referral_card';
	}

	public function get_title() {
		return __( 'Referral Card', 'creatorhub' );
	}

	public function get_icon() {
		return 'eicon-share';
	}

	public function get_categories() {
		return array( 'general' );
	}

	protected function render() {
		echo '<div class="creatorhub-card"><h3>' . esc_html__( 'Referral Card', 'creatorhub' ) . '</h3></div>';
	}
}
