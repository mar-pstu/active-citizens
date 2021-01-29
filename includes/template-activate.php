<?php


namespace pstuctvstzs;


if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
 * Добавляет опции темы по умолчанию при её активации
 **/
function setup_default_mods( $old_name ) {
	$theme_slug = get_option( 'stylesheet' );
	$mods = get_theme_mods();
	if ( ! is_array( $mods ) ) {
		$mods = [];
	}
	// update_option( "theme_mods_$theme_slug", array_merge( [
	update_option( "theme_mods_$theme_slug", [

		// дополнительные скрипты
		'additionalscriptsafterhead' => '',
		'additionalscriptsafterbody' => '',

		// главная страница
		'homesections' => [],
		'homesectionscount' => 0,

		// страница ошибки 404
		'error404title' => __( 'Ошибка 404', PSTUCTVSTZS_TEXTDOMAIN ),
		'error404description' => '',
		'error404logosrc' => get_theme_file_uri( 'images/error404.svg' ),

		// подвал сайта
		'footersocials' => []

	] );
	// ], $mods ) );
}

add_action( 'after_switch_theme', 'pstuctvstzs\setup_default_mods' );