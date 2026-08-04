<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! is_user_logged_in() ) {
	return;
}
?>
<div class="creatorhub-dashboard">
	<div class="creatorhub-card">
		<h2><?php echo esc_html__( 'Upload Video', 'creatorhub' ); ?></h2>
		<form id="creatorhub-upload-form" enctype="multipart/form-data">
			<input type="hidden" name="action" value="creatorhub_upload_video" />
			<input type="hidden" name="nonce" value="<?php echo esc_attr( wp_create_nonce( 'creatorhub_nonce' ) ); ?>" />
			<p><label><?php echo esc_html__( 'Title', 'creatorhub' ); ?><br /><input type="text" name="title" required /></label></p>
			<p><label><?php echo esc_html__( 'Description', 'creatorhub' ); ?><br /><textarea name="description"></textarea></label></p>
			<p><label><?php echo esc_html__( 'Tags', 'creatorhub' ); ?><br /><input type="text" name="tags" /></label></p>
			<p><label><?php echo esc_html__( 'Category', 'creatorhub' ); ?><br /><input type="text" name="category" /></label></p>
			<p><label><?php echo esc_html__( 'Visibility', 'creatorhub' ); ?><br /><select name="visibility"><option value="draft">Draft</option><option value="publish">Publish</option></select></label></p>
			<p><label><?php echo esc_html__( 'MP4 Video', 'creatorhub' ); ?><br /><input type="file" name="video_file" accept="video/mp4" required /></label></p>
			<p><button type="submit" class="creatorhub-button"><?php echo esc_html__( 'Upload', 'creatorhub' ); ?></button></p>
		</form>
		<div id="creatorhub-upload-response"></div>
	</div>
</div>
