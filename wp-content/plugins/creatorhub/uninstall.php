<?php
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

$tables = array(
	'creatorhub_videos',
	'creatorhub_views',
	'creatorhub_balances',
	'creatorhub_transactions',
	'creatorhub_referrals',
	'creatorhub_withdrawals',
);

global $wpdb;
foreach ( $tables as $table ) {
	$wpdb->query( "DROP TABLE IF EXISTS {$wpdb->prefix}{$table}" );
}

remove_role( 'creatorhub_creator' );
