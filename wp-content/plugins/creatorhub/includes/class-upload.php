<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class CreatorHub_Upload {
	public static function init() {
		add_action( 'wp_ajax_creatorhub_upload_video', array( __CLASS__, 'handle_upload' ) );
		add_action( 'wp_ajax_nopriv_creatorhub_upload_video', array( __CLASS__, 'handle_upload' ) );
	}

	public static function handle_upload() {
		check_ajax_referer( 'creatorhub_nonce', 'nonce' );
		if ( ! is_user_logged_in() ) {
			wp_send_json_error( array( 'message' => __( 'Authentication required.', 'creatorhub' ) ) );
		}

		$title       = CreatorHub_Security::sanitize_text( isset( $_POST['title'] ) ? wp_unslash( $_POST['title'] ) : '' );
		$description = CreatorHub_Security::sanitize_textarea( isset( $_POST['description'] ) ? wp_unslash( $_POST['description'] ) : '' );
		$tags        = CreatorHub_Security::sanitize_text( isset( $_POST['tags'] ) ? wp_unslash( $_POST['tags'] ) : '' );
		$category    = CreatorHub_Security::sanitize_text( isset( $_POST['category'] ) ? wp_unslash( $_POST['category'] ) : 'general' );
		$visibility  = CreatorHub_Security::sanitize_text( isset( $_POST['visibility'] ) ? wp_unslash( $_POST['visibility'] ) : 'draft' );

		if ( empty( $title ) ) {
			wp_send_json_error( array( 'message' => __( 'Video title is required.', 'creatorhub' ) ) );
		}

		if ( empty( $_FILES['video_file']['name'] ) ) {
			wp_send_json_error( array( 'message' => __( 'Video file is required.', 'creatorhub' ) ) );
		}

		$allowed = array( 'mp4' );
		$filename = sanitize_file_name( $_FILES['video_file']['name'] );
		$ext = strtolower( pathinfo( $filename, PATHINFO_EXTENSION ) );
		if ( ! in_array( $ext, $allowed, true ) ) {
			wp_send_json_error( array( 'message' => __( 'Only MP4 files are allowed.', 'creatorhub' ) ) );
		}

		$upload = wp_handle_upload( $_FILES['video_file'], array( 'test_form' => false ) );
		if ( isset( $upload['error'] ) ) {
			wp_send_json_error( array( 'message' => $upload['error'] ) );
		}

		global $wpdb;
		$prefix = $wpdb->prefix;
		$table  = $prefix . 'creatorhub_videos';
		$now    = current_time( 'mysql' );

		$wpdb->insert(
			$table,
			array(
				'user_id'         => get_current_user_id(),
				'title'           => $title,
				'description'     => $description,
				'tags'            => $tags,
				'category'        => $category,
				'visibility'      => $visibility,
				'publish_status'  => $visibility,
				'video_url'       => $upload['url'],
				'file_size'       => intval( $_FILES['video_file']['size'] ),
				'created_at'      => $now,
				'updated_at'      => $now,
			),
			array( '%d', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%d', '%s', '%s' )
		);

		wp_send_json_success( array( 'message' => __( 'Video uploaded successfully.', 'creatorhub' ), 'video_id' => $wpdb->insert_id ) );
	}
}
