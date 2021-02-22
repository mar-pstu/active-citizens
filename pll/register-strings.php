<?php


namespace pstuctvstzs;


if ( ! defined( 'ABSPATH' ) ) { exit; };


function add_register_strings() {

	$strings = array_merge( apply_filters( 'template_register_strings', [
		'error404title'       => false,
		'error404description' => true,
		'footercopyrightname' => false,
	] ), array_fill_keys( array_map( function ( $key ) {
		return 'socials' . $key . 'url';
	}, array_keys( apply_filters( 'template_socials', [] ) ) ), false ) );

	$strings = apply_filters( 'template_pll_register_strings', $strings );

	foreach ( $strings as $name => $multiline ) {
		$string = get_theme_mod( $name );
		if ( ! empty( $string ) ) {
			pll_register_string( $name, $string, PSTUCTVSTZS_TEXTDOMAIN, $multiline );
		}
	}

}

add_action( 'init', 'pstuctvstzs\add_register_strings', 10, 1 );