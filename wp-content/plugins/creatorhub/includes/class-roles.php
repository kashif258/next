<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class CreatorHub_Roles {
	public static function register_creator_role() {
		add_role(
			'creatorhub_creator',
			__( 'Creator Hub Creator', 'creatorhub' ),
			array(
				'read'                    => true,
				'upload_files'            => true,
				'edit_posts'              => true,
				'edit_others_posts'       => true,
				'publish_posts'           => true,
				'manage_options'          => false,
			)
		);
	}
}
