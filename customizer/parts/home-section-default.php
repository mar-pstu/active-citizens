<?php


namespace pstuctvstzs;


if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
 * Регистрация секции настроек для секции главйно страницы типа "default"
 * */
function customizer_settings_home_section_default( $section_slug, $wp_customize ) {

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
		$section_slug . 'description',
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_textarea_field',
		]
	);
	$wp_customize->add_control(
		$section_slug . 'description',
		[
			'section'           => PSTUCTVSTZS_SLUG . '_' . $section_slug,
			'label'             => __( 'Подзаголовок', PSTUCTVSTZS_TEXTDOMAIN ),
			'type'              => 'textarea',
		]
	); /**/

	$wp_customize->add_setting(
		$section_slug . 'pageid',
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'absint',
		]
	);
	$wp_customize->add_control(
		$section_slug . 'pageid',
		[
			'section'           => PSTUCTVSTZS_SLUG . '_' . $section_slug,
			'label'             => __( 'Выбор страницы', PSTUCTVSTZS_TEXTDOMAIN ),
			'type'              => 'dropdown-pages',
		]
	); /**/

	$wp_customize->add_setting(
		$section_slug . 'permalink',
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'esc_url_raw',
		]
	);
	$wp_customize->add_control(
		$section_slug . 'permalink',
		[
			'section'           => PSTUCTVSTZS_SLUG . '_' . $section_slug,
			'label'             => __( 'URL ссылки', PSTUCTVSTZS_TEXTDOMAIN ),
			'type'              => 'text',
		]
	); /**/

	$wp_customize->add_setting(
		$section_slug . 'label',
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_text_field',
		]
	);
	$wp_customize->add_control(
		$section_slug . 'label',
		[
			'section'           => PSTUCTVSTZS_SLUG . '_' . $section_slug,
			'label'             => __( 'Подзаголовок', PSTUCTVSTZS_TEXTDOMAIN ),
			'type'              => 'text',
		]
	); /**/

}

add_action( 'home_section_' . 'default' . '_customize_register', 'pstuctvstzs\customizer_settings_home_section_default', 20, 2 );


/**
 * Добавляет разновидность типа в списку выбора
 * */
function add_home_section_default_type( $types = [] ) {
	$types[ 'default' ] = __( 'Контент страницы', PSTUCTVSTZS_TEXTDOMAIN );
	return $types;
}

add_filter( 'home_section_types', 'pstuctvstzs\add_home_section_default_type', 5, 1 );