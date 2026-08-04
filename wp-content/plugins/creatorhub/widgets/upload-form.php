<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class CreatorHub_Upload_Form extends \Elementor\Widget_Base {
	public function get_name() {
		return 'creatorhub_upload_form';
	}

	public function get_title() {
		return __( 'Upload Form', 'creatorhub' );
	}

	public function get_icon() {
		return 'eicon-upload';
	}

	public function get_categories() {
		return array( 'general' );
	}

	protected function render() {
		echo '<div class="creatorhub-card"><h3>' . esc_html__( 'Upload Form', 'creatorhub' ) . '</h3></div>';
	}
}
