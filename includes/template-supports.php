<?php


namespace pstuctvstzs;


if ( ! defined( 'ABSPATH' ) ) { exit; }


/**
 * регистрация подолнительных "возможностей" темы
 * */
function template_supports() {
	add_theme_support( 'menus' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-logo' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_filter( 'widget_text', 'do_shortcode' );
	add_post_type_support( 'page', 'excerpt' );
	add_theme_support( 'post-formats', [ 'gallery', 'video' ] );
}

add_action( 'after_setup_theme', 'pstuctvstzs\template_supports' );