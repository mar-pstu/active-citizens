<?php


namespace pstuctvstzs;


if ( ! defined( 'ABSPATH' ) ) { exit; };


function registration_customizer_panels( $wp_customize ) {

	$wp_customize->add_panel(
		'template_parts',
		[
			'capability'      => 'edit_theme_options',
			'title'           => __( 'Блоки темы', PSTUCTVSTZS_TEXTDOMAIN ),
			'priority'        => 202
		]
	);

	$wp_customize->add_panel(
		'page_templates',
		[
			'capability'      => 'edit_theme_options',
			'title'           => __( 'Шаблоны страниц темы', PSTUCTVSTZS_TEXTDOMAIN ),
			'priority'        => 203
		]
	);

}

add_action( 'customize_register', 'pstuctvstzs\registration_customizer_panels', 10, 1 );