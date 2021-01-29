<?php


namespace pstuctvstzs;


if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
 * Регистрация секции настроек для секции главйно страницы типа "default"
 * */
function customizer_settings_home_section_pages( $section_slug, $wp_customize ) {


	$wp_customize->add_setting(
		$section_slug . 'title',
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_text_field',
		]
	);
	$wp_customize->add_control(
		$section_slug . 'title',
		[
			'section'           => PSTUCTVSTZS_SLUG . '_' . $section_slug,
			'label'             => __( 'Заголовок', PSTUCTVSTZS_TEXTDOMAIN ),
			'type'              => 'text',
		]
	); /**/

	$wp_customize->add_setting(
		$section_slug . 'number',
		[
			'transport'         => 'reset',
			'default'           => 0,
			'sanitize_callback' => 'absint',
		]
	);
	$wp_customize->add_control(
		$section_slug . 'number',
		[
			'section'           => PSTUCTVSTZS_SLUG . '_' . $section_slug,
			'label'             => __( 'Количество страниц', PSTUCTVSTZS_TEXTDOMAIN ),
			'type'              => 'number',
			'input_attrs'       => [
				'min'             => 0,
				'max'             => 10,
			],
		]
	); /**/

	for ( $i = 0; $i < get_theme_mod( $section_slug . 'number', 0 ); $i++ ) { 
		$wp_customize->add_setting(
			$section_slug . 'pageids[' . $i . ']',
			[
				'transport'         => 'reset',
				'sanitize_callback' => 'absint',
			]
		);
		$wp_customize->add_control(
			$section_slug . 'pageids[' . $i . ']',
			[
				'section'           => PSTUCTVSTZS_SLUG . '_' . $section_slug,
				'label'             => sprintf( __( 'Выбор страницы %s', PSTUCTVSTZS_TEXTDOMAIN ), ( $i + 1 ) ),
				'type'              => 'dropdown-pages',
			]
		); /**/
	}

}

add_action( 'home_section_' . 'pages' . '_customize_register', 'pstuctvstzs\customizer_settings_home_section_pages', 20, 2 );


/**
 * Добавляет разновидность типа в списку выбора
 * */
function add_home_section_pages_type( $types = [] ) {
	$types[ 'pages' ] = __( 'Список страниц с кратким содержимым', PSTUCTVSTZS_TEXTDOMAIN );
	return $types;
}

add_filter( 'home_section_types', 'pstuctvstzs\add_home_section_pages_type', 5, 1 );