<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! is_user_logged_in() ) {
	return;
}

$referral = CreatorHub_Referral::get_referral();
?>
<div class="creatorhub-dashboard">
	<div class="creatorhub-card">
		<h2><?php echo esc_html__( 'Referrals', 'creatorhub' ); ?></h2>
		<p><?php echo esc_html__( 'Referral Code', 'creatorhub' ) . ': ' . esc_html( $referral['referral_code'] ); ?></p>
		<p><?php echo esc_html__( 'Invited Users', 'creatorhub' ) . ': ' . intval( $referral['invited_count'] ); ?></p>
		<p><?php echo esc_html__( 'Earnings', 'creatorhub' ) . ': ' . esc_html( number_format_i18n( floatval( $referral['earnings'] ), 2 ) ); ?></p>
	</div>
</div>
