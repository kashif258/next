<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class CreatorHub_Users {
	public static function get_profile_data( $user_id = 0 ) {
		$user_id = $user_id ? $user_id : get_current_user_id();
		$user    = get_userdata( $user_id );
		if ( ! $user ) {
			return array();
		}
		return array(
			'user_id'     => $user_id,
			'username'    => $user->user_login,
			'display_name' => $user->display_name,
			'email'       => $user->user_email,
			'roles'       => $user->roles,
		);
	}
}
