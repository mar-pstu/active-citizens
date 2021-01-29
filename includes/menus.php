<?php


namespace pstuctvstzs;


if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
 * Регистрация меню
 */
function register_theme_nav_menus() {
	register_nav_menus( apply_filters( 'pstuctvstzs_nav_menus', [
		'main' => __( 'Главное меню', PSTUCTVSTZS_TEXTDOMAIN ),
	] ) );
}

add_action( 'after_setup_theme', 'pstuctvstzs\register_theme_nav_menus' );