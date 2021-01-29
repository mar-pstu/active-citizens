<?php


namespace pstuctvstzs;


if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
 * Регистрация секции настроек для секции главйно страницы типа "default"
 * */
function customizer_settings_home_section_category( $section_slug, $wp_customize ) {

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
		$section_slug . 'categoryid',
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'absint',
		]
	);
	$wp_customize->add_control(
		$section_slug . 'categoryid',
		[
			'section'           => PSTUCTVSTZS_SLUG . '_' . $section_slug,
			'label'             => __( 'Категория', PSTUCTVSTZS_TEXTDOMAIN ),
			'type'              => 'select',
			'choices'           => get_categories_choices(),
		]
	); /**/

	$wp_customize->add_setting(
		$section_slug . 'numberposts',
		[
			'transport'         => 'reset',
			'default'           => 5,
			'sanitize_callback' => 'absint',
		]
	);
	$wp_customize->add_control(
		$section_slug . 'numberposts',
		[
			'section'           => PSTUCTVSTZS_SLUG . '_' . $section_slug,
			'label'             => __( 'Количество постов', PSTUCTVSTZS_TEXTDOMAIN ),
			'type'              => 'number',
			'input_attrs'       => [
				'min'             => 0,
				'max'             => 10,
			],
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
			'label'             => __( 'Надпись на кнопке', PSTUCTVSTZS_TEXTDOMAIN ),
			'type'              => 'text',
		]
	); /**/

}

add_action( 'home_section_' . 'category' . '_customize_register', 'pstuctvstzs\customizer_settings_home_section_category', 20, 2 );


/**
 * Добавляет разновидность типа в списку выбора
 * */
function add_home_section_category_type( $types = [] ) {
	$types[ 'category' ] = __( 'Посты из категории', PSTUCTVSTZS_TEXTDOMAIN );
	return $types;
}

add_filter( 'home_section_types', 'pstuctvstzs\add_home_section_category_type', 5, 1 );