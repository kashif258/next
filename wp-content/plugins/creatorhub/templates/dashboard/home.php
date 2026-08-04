<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! is_user_logged_in() ) {
	return;
}

$summary = CreatorHub_Dashboard::get_summary();
$balance = CreatorHub_Balance::get_balance();
$referral = CreatorHub_Referral::get_referral();
$videos = CreatorHub_Video::get_videos();
$user = CreatorHub_Users::get_profile_data();
?>
<div class="creatorhub-dashboard">
	<div class="creatorhub-hero">
		<div>
			<h2><?php echo esc_html__( 'Welcome back', 'creatorhub' ) . ', ' . esc_html( $user['display_name'] ); ?></h2>
			<p><?php echo esc_html__( 'Your creator dashboard is live with premium analytics, uploads, referrals, and wallet tools.', 'creatorhub' ); ?></p>
		</div>
		<div class="creatorhub-chip"><?php echo esc_html__( 'Creator Status: Pro', 'creatorhub' ); ?></div>
	</div>

	<div class="creatorhub-grid">
		<div class="creatorhub-card">
			<h3><?php echo esc_html__( 'Quick Stats', 'creatorhub' ); ?></h3>
			<ul>
				<li><?php echo esc_html__( 'Videos', 'creatorhub' ) . ': ' . intval( $summary['videos'] ); ?></li>
				<li><?php echo esc_html__( 'Views', 'creatorhub' ) . ': ' . intval( $summary['views'] ); ?></li>
				<li><?php echo esc_html__( 'Revenue', 'creatorhub' ) . ': ' . esc_html( number_format_i18n( $summary['revenue'], 2 ) ); ?></li>
			</ul>
		</div>
		<div class="creatorhub-card">
			<h3><?php echo esc_html__( 'Balance', 'creatorhub' ); ?></h3>
			<p><?php echo esc_html__( 'Current Balance', 'creatorhub' ) . ': ' . esc_html( number_format_i18n( floatval( $balance['balance'] ), 2 ) ); ?></p>
			<p><?php echo esc_html__( 'Pending', 'creatorhub' ) . ': ' . esc_html( number_format_i18n( floatval( $balance['pending_balance'] ), 2 ) ); ?></p>
		</div>
		<div class="creatorhub-card">
			<h3><?php echo esc_html__( 'Referral', 'creatorhub' ); ?></h3>
			<p><?php echo esc_html__( 'Code', 'creatorhub' ) . ': ' . esc_html( $referral['referral_code'] ); ?></p>
			<p><?php echo esc_html__( 'Invited Users', 'creatorhub' ) . ': ' . intval( $referral['invited_count'] ); ?></p>
		</div>
	</div>

	<div class="creatorhub-grid">
		<div class="creatorhub-card wide">
			<h3><?php echo esc_html__( 'Recent Videos', 'creatorhub' ); ?></h3>
			<?php if ( empty( $videos ) ) : ?>
				<p><?php echo esc_html__( 'No videos yet. Upload your first MP4 to get started.', 'creatorhub' ); ?></p>
			<?php else : ?>
				<ul>
					<?php foreach ( $videos as $video ) : ?>
						<li><strong><?php echo esc_html( $video->title ); ?></strong> — <?php echo esc_html( $video->visibility ); ?></li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>
		</div>
	</div>
</div>
