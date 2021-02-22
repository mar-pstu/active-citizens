<?php


namespace pstuctvstzs;


if ( ! defined( 'ABSPATH' ) ) { exit; };


function add_translation_string_mods () {

	$mods = array_merge( apply_filters( 'template_pll_theme_mod_translate', [
		'error404title'       => 'pll__',
		'error404description' => 'pll__',
		'footercopyrightname' => 'pll__',
	] ), array_fill_keys( array_map( function ( $key ) {
		return 'socials' . $key . 'url';
	}, array_keys( apply_filters( 'template_socials', [] ) ) ), 'pll__' ) );

	foreach ( $mods as $name => $func ) {
		add_filter( 'theme_mod_' . $name, $func, 10, 1 );
	}

}

add_action( 'plugins_loaded', 'pstuctvstzs\add_translation_string_mods', 10, 1 );