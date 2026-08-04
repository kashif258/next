<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_theme_support( 'title-tag' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );

add_action( 'wp_enqueue_scripts', 'creatorhub_theme_enqueue' );
function creatorhub_theme_enqueue() {
	wp_enqueue_style( 'creatorhub-theme-style', get_stylesheet_uri(), array(), '1.0.0' );
}
