<?php


namespace pstuctvstzs;


if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
 * Перевод настроек
 */
function translate_settings() {

	/**
	 * регистрация настроек секций главной страницы
	 */
	$sections = get_theme_mod( 'homesections' );
	for ( $i = 0; $i < get_theme_mod( 'homesectionscount' ); $i++ ) {
		if ( isset( $sections[ $i ] ) && is_home_section_valid( $sections[ $i ] ) ) {
			do_action( 'home_section_' . $sections[ $i ][ 'type' ] . '_pll_translate_settings', $sections[ $i ][ 'slug' ] );
		}
	}

	/**
	 * подвал - социальные сети
	 */
	foreach ( apply_filters( 'footer_socials', [] ) as $key => $label ) {
		$value = trim( get_theme_mod( 'footersocial' . $key ) );
		if ( is_url( $value ) ) {
			pll_register_string( "contacs_{$key}", $value, PSTUCTVSTZS_TEXTDOMAIN, false );
			add_filter( "theme_mod_{$key}", 'pll__', 10, 1 );
		}
	}

	/**
	 * перевод полей
	 */
	foreach ( [

		// 404 страницы
		'error404title'       => false,
		'error404description' => true,


	] as $key => $multiline ) {
		$value = trim( get_theme_mod( $key ) );
		if ( ! empty( $value ) ) {
			pll_register_string( "contacs_{$key}", $value, PSTUCTVSTZS_TEXTDOMAIN, $multiline );
			add_filter( "theme_mod_{$key}", 'pll__', 10, 1 );
		}
	}

}

add_action( 'init', 'pstuctvstzs\translate_settings', 10, 0 );