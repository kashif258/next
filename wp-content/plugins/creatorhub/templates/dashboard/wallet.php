<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! is_user_logged_in() ) {
	return;
}

$balance = CreatorHub_Balance::get_balance();
?>
<div class="creatorhub-dashboard">
	<div class="creatorhub-card">
		<h2><?php echo esc_html__( 'Wallet', 'creatorhub' ); ?></h2>
		<p><?php echo esc_html__( 'Current Balance', 'creatorhub' ) . ': ' . esc_html( number_format_i18n( floatval( $balance['balance'] ), 2 ) ); ?></p>
		<p><?php echo esc_html__( 'Pending Balance', 'creatorhub' ) . ': ' . esc_html( number_format_i18n( floatval( $balance['pending_balance'] ), 2 ) ); ?></p>
	</div>
</div>
