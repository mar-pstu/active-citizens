<?php


namespace pstuctvstzs;


if ( ! defined( 'ABSPATH' ) ) { exit; };


function home_section_category_translate_settings( $section_slug ) {
	foreach ( [
		'title'     => false,
		'description' => true,
		'permalink' => false,
		'label'     => false,
	] as $key => $multiline ) {
		$value = trim( get_theme_mod( $section_slug . $key ) );
		if ( ! empty( $value ) ) {
			pll_register_string( $section_slug . $key, $value, PSTUCTVSTZS_TEXTDOMAIN, $multiline );
			add_filter( 'theme_mod_' . $section_slug . $key, 'pll__', 10, 1 );
		}
	}
	add_filter( 'theme_mod_' . $section_slug . 'categoryid', 'pll_get_term', 10, 1 );
}

add_action( 'home_section_' . 'category' . '_pll_translate_settings', 'pstuctvstzs\home_section_category_translate_settings', 20, 1 );