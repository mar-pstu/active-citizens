<?php


namespace pstuctvstzs;


if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
 * Регистрация секции настроек главной страницы "Информация"
 * */
function customizer_settings_home( $wp_customize ) {

	$wp_customize->add_section(
		'template_home',
		[
			'title'            => __( 'Главная страница', PSTUCTVSTZS_TEXTDOMAIN ),
			'priority'         => 10,
			'description'      => __( 'Настройки шаблона главной страницы. Идентификатор, заголовок и тип - обязательные поля. Поле "идентификатор" должно быть уникальным для каждой секции! После сохранения нужно обновить страницу!', PSTUCTVSTZS_TEXTDOMAIN ),
			'panel'            => 'page_templates',
		]
	); /**/

	$wp_customize->add_setting(
		'homesections',
		[
			'transport'         => 'reset',
		]
	);
	$wp_customize->add_control(
		new \WP_Customizer_Home_Section_List_control(
			$wp_customize,
			'homesections',
			[
				'label'      => __( 'Список секций', PSTUCTVSTZS_TEXTDOMAIN ),
				'section'    => 'template_home',
				'settings'   => 'homesections',
			]
		)
	); /**/

}

add_action( 'customize_register', 'pstuctvstzs\customizer_settings_home', 10, 1 );