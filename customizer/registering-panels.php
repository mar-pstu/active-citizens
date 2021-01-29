<?php


namespace pstuctvstzs;


if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
 * Регистрация панелей настроек темы
 **/
function customizer_registering_panels ( $wp_customize ) {

	$wp_customize->add_panel(
		PSTUCTVSTZS_SLUG . '_parts',
		[
			'capability'      => 'edit_theme_options',
			'title'           => __( 'Блоки темы', PSTUCTVSTZS_TEXTDOMAIN ),
			'priority'        => 202
		]
	);

	$wp_customize->add_panel(
		PSTUCTVSTZS_SLUG . '_templates',
		[
			'capability'      => 'edit_theme_options',
			'title'           => __( 'Шаблоны страниц темы', PSTUCTVSTZS_TEXTDOMAIN ),
			'priority'        => 203
		]
	);

}

add_action( 'customize_register', 'pstuctvstzs\customizer_registering_panels' );