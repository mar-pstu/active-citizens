<?php


namespace pstuctvstzs;


if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
 * Регистрация секции настроек для секции главйно страницы типа "default"
 * */
function customizer_settings_home_section_cover( $section_slug, $wp_customize ) {

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
		$section_slug . 'excerpt',
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_textarea_field',
		]
	);
	$wp_customize->add_control(
		$section_slug . 'excerpt',
		[
			'section'           => PSTUCTVSTZS_SLUG . '_' . $section_slug,
			'label'             => __( 'Подзаголовок', PSTUCTVSTZS_TEXTDOMAIN ),
			'type'              => 'textarea',
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

	$wp_customize->add_setting(
		$section_slug . 'bgisrc',
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'esc_url_raw',
		]
	);
	$wp_customize->add_control(
		new \WP_Customize_Image_Control(
			$wp_customize,
			$section_slug . 'bgisrc',
			[
				'label'      => __( 'Фоновое изображение', PSTUCTVSTZS_TEXTDOMAIN ),
				'section'    => PSTUCTVSTZS_SLUG . '_' . $section_slug,
				'settings'   => $section_slug . 'bgisrc',
			]
		)
	); /**/

}

add_action( 'home_section_' . 'cover' . '_customize_register', 'pstuctvstzs\customizer_settings_home_section_cover', 20, 2 );


/**
 * Добавляет разновидность типа в списку выбора
 * */
function add_home_section_cover_type( $types = [] ) {
	$types[ 'cover' ] = __( 'Обложка', PSTUCTVSTZS_TEXTDOMAIN );
	return $types;
}

add_filter( 'home_section_types', 'pstuctvstzs\add_home_section_cover_type', 5, 1 );