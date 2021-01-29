<?php


namespace pstuctvstzs;


if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
 * Регистрация секции настроек для секции главйно страницы типа "default"
 * */
function customizer_settings_home_section_smallinfo( $section_slug, $wp_customize ) {

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
		$section_slug . 'thumbnailsrc',
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'esc_url_raw',
		]
	);
	$wp_customize->add_control(
		new \WP_Customize_Image_Control(
			$wp_customize,
			$section_slug . 'thumbnailsrc',
			[
				'label'      => __( 'Превью', PSTUCTVSTZS_TEXTDOMAIN ),
				'section'    => PSTUCTVSTZS_SLUG . '_' . $section_slug,
				'settings'   => $section_slug . 'thumbnailsrc',
			]
		)
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
			'label'             => __( 'Ссылка на полный контент', PSTUCTVSTZS_TEXTDOMAIN ),
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
			'label'             => __( 'Подпись кнопки', PSTUCTVSTZS_TEXTDOMAIN ),
			'type'              => 'text',
		]
	); /**/

	$wp_customize->add_setting(
		$section_slug . 'direction',
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_text_field',
		]
	);
	$wp_customize->add_control(
		$section_slug . 'direction',
		[
			'section'           => PSTUCTVSTZS_SLUG . '_' . $section_slug,
			'label'             => __( 'Расположение превью', PSTUCTVSTZS_TEXTDOMAIN ),
			'type'              => 'select',
			'choices'           => [
				'row'             => __( 'превью слева', PSTUCTVSTZS_TEXTDOMAIN ),
				'row-reverse'     => __( 'превью справа', PSTUCTVSTZS_TEXTDOMAIN ),
			],
		]
	); /**/

}

add_action( 'home_section_' . 'smallinfo' . '_customize_register', 'pstuctvstzs\customizer_settings_home_section_smallinfo', 20, 2 );


/**
 * Добавляет разновидность типа в списку выбора
 * */
function add_home_section_smallinfo_type( $types = [] ) {
	$types[ 'smallinfo' ] = __( 'Краткая информация и превью', PSTUCTVSTZS_TEXTDOMAIN );
	return $types;
}

add_filter( 'home_section_types', 'pstuctvstzs\add_home_section_smallinfo_type', 5, 1 );