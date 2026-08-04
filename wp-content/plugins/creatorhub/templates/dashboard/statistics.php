<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! is_user_logged_in() ) {
	return;
}

$summary = CreatorHub_Dashboard::get_summary();
?>
<div class="creatorhub-dashboard">
	<div class="creatorhub-grid">
		<div class="creatorhub-card"><h3><?php echo esc_html__( 'Total Views', 'creatorhub' ); ?></h3><p><?php echo esc_html( intval( $summary['views'] ) ); ?></p></div>
		<div class="creatorhub-card"><h3><?php echo esc_html__( 'Total Videos', 'creatorhub' ); ?></h3><p><?php echo esc_html( intval( $summary['videos'] ) ); ?></p></div>
		<div class="creatorhub-card"><h3><?php echo esc_html__( 'Revenue', 'creatorhub' ); ?></h3><p><?php echo esc_html( number_format_i18n( $summary['revenue'], 2 ) ); ?></p></div>
	</div>
</div>
