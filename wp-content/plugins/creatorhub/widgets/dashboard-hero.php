<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class CreatorHub_Dashboard_Hero extends \
	Elementor\\Widget_Base {
	public function get_name() {
		return 'creatorhub_dashboard_hero';
	}

	public function get_title() {
		return __( 'Dashboard Hero', 'creatorhub' );
	}

	public function get_icon() {
		return 'eicon-archive-title';
	}

	public function get_categories() {
		return array( 'general' );
	}

	protected function render() {
		echo '<div class="creatorhub-dashboard"><div class="creatorhub-hero"><h2>' . esc_html__( 'Creator Dashboard Hero', 'creatorhub' ) . '</h2></div></div>';
	}
}
