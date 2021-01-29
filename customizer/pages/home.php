<?php


namespace pstuctvstzs;


if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
 * Регистрация секции настроек главной страницы "Информация"
 * */
function customizer_settings_home( $wp_customize ) {

	$wp_customize->add_section(
		PSTUCTVSTZS_SLUG . '_home',
		[
			'title'            => __( 'Главная страница', PSTUCTVSTZS_TEXTDOMAIN ),
			'priority'         => 10,
			'description'      => __( 'Настройки шаблона главной страницы. Идентификатор, заголовок и тип - обязательные поля. Поле "идентификатор" должно быть уникальным для каждой секции! После сохранения нужно обновить страницу!', PSTUCTVSTZS_TEXTDOMAIN ),
			'panel'            => PSTUCTVSTZS_SLUG . '_templates',
		]
	); /**/

	$wp_customize->add_setting(
		'homesectionscount',
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'absint',
		]
	);
	$wp_customize->add_control(
		'homesectionscount',
		[
			'section'           => PSTUCTVSTZS_SLUG . '_home',
			'label'             => __( 'Количество секций', PSTUCTVSTZS_TEXTDOMAIN ),
			'type'              => 'number',
			'input_attrs'       => [
				'min'             => 1,
				'max'             => 50,
			],
		]
	); /**/

	$types = array_merge( [ '' ], apply_filters( 'home_section_types', [] ) );


	$sections = get_theme_mod( 'homesections', [] );

	if ( ! is_array( $sections ) ) {
		$sections = [];
	}

	for ( $i = 0; $i < get_theme_mod( 'homesectionscount' ); $i++ ) {

		if ( isset( $sections[ $i ] ) && is_home_section_valid( $sections[ $i ] ) ) {
			$wp_customize->add_section(
				PSTUCTVSTZS_SLUG . '_' . $sections[ $i ][ 'slug' ],
				[
					'title'            => sprintf( __( 'Главная страница - %s', PSTUCTVSTZS_TEXTDOMAIN ), $sections[ $i ][ 'title' ] ),
					'priority'         => 10,
					'description'      => apply_filters( 'customizer_settings_fp_section_description', '', $sections[ $i ] ),
					'panel'            => PSTUCTVSTZS_SLUG . '_parts',
				]
			); /**/
			$wp_customize->add_setting(
				$sections[ $i ][ 'slug' ] . 'flag',
				[
					'default'           => false,
					'transport'         => 'reset',
					'sanitize_callback' => 'pstuctvstzs\sanitize_checkbox',
				]
			);
			$wp_customize->add_control(
				$sections[ $i ][ 'slug' ] . 'flag',
				[
					'section'           => PSTUCTVSTZS_SLUG . '_' . $sections[ $i ][ 'slug' ],
					'label'             => __( 'Использовать секцию', PSTUCTVSTZS_TEXTDOMAIN ),
					'type'              => 'checkbox',
				]
			); /**/
			do_action( 'home_section_' . $sections[ $i ][ 'type' ] . '_customize_register', $sections[ $i ][ 'slug' ], $wp_customize );
		}
		
		$wp_customize->add_setting(
			"homesections[{$i}][slug]",
			[
				'transport'         => 'reset',
				'sanitize_callback' => 'sanitize_key',
			]
		);
		$wp_customize->add_control(
			"homesections[{$i}][slug]",
			[
				'section'           => PSTUCTVSTZS_SLUG . '_home',
				'label'             => sprintf( __( 'Идентификатор %s', PSTUCTVSTZS_TEXTDOMAIN ), ( $i + 1 ) ),
				'type'              => 'text',
			]
		); /**/

		$wp_customize->add_setting(
			"homesections[{$i}][title]",
			[
				'transport'         => 'reset',
				'sanitize_callback' => 'sanitize_text_field',
			]
		);
		$wp_customize->add_control(
			"homesections[{$i}][title]",
			[
				'section'           => PSTUCTVSTZS_SLUG . '_home',
				'label'             => sprintf( __( 'Название %s', PSTUCTVSTZS_TEXTDOMAIN ), ( $i + 1 ) ),
				'type'              => 'text',
			]
		); /**/

		$wp_customize->add_setting(
			"homesections[{$i}][type]",
			[
				'transport'         => 'reset',
				'sanitize_callback' => 'sanitize_key',
			]
		);
		$wp_customize->add_control(
			"homesections[{$i}][type]",
			[
				'section'           => PSTUCTVSTZS_SLUG . '_home',
				'label'             => sprintf( __( 'Тип %s', PSTUCTVSTZS_TEXTDOMAIN ), ( $i + 1 ) ),
				'type'              => 'select',
				'choices'           => $types,
			]
		); /**/

	}

}

add_action( 'customize_register', 'pstuctvstzs\customizer_settings_home', 10, 1 );