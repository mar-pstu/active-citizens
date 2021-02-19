<?php


namespace pstuctvstzs;


if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
 * Регистрация секции настроек главной страницы "Информация"
 * */
function customizer_settings_template_error404( $wp_customize ) {

	$wp_customize->add_section(
		'template_error404',
		[
			'title'            => __( 'Ошибка 404', PSTUCTVSTZS_TEXTDOMAIN ),
			'priority'         => 10,
			'description'      => __( 'Настройки шаблона страницы ошибки 404.', PSTUCTVSTZS_TEXTDOMAIN ),
			'panel'            => 'page_templates',
		]
	); /**/

	$wp_customize->add_setting(
		'error404title',
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'esc_url_raw',
		]
	);
	$wp_customize->add_control(
		'error404title',
		[
			'section'           => 'template_error404',
			'label'             => __( 'Заголовок страницы', PSTUCTVSTZS_TEXTDOMAIN ),
			'type'              => 'text',
		]
	); /**/

	$wp_customize->add_setting(
		'error404description',
		[
			'transport'             => 'postMessage',
			'sanitize_callback'     => 'wp_kses_post',
		]
	);
	if ( class_exists( 'WP_Customize_Control_Tinymce_Editor' ) ) {
		$wp_customize->add_control(
			new WP_Customize_Control_Tinymce_Editor(
				$wp_customize,
				'error404description', [
					'label'                 => __( 'Описание', PSTUCTVSTZS_TEXTDOMAIN ),
					'section'               => 'template_error404',
					'settings'              => 'error404description',
				]
			)
		); /**/
	} else {
		$wp_customize->add_control(
			'error404description',
			[
				'section'           => 'template_error404',
				'label'             => __( 'Описание', PSTUCTVSTZS_TEXTDOMAIN ),
				'type'              => 'textarea',
			]
		); /**/
	}

	$wp_customize->add_setting(
		'error404logosrc',
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'esc_url_raw',
		]
	);
	$wp_customize->add_control(
		new \WP_Customize_Image_Control(
			$wp_customize,
			'error404logosrc',
			[
				'label'      => __( 'Логотип', PSTUCTVSTZS_TEXTDOMAIN ),
				'section'    => 'template_error404',
				'settings'   => 'error404logosrc',
			]
		)
	); /**/

}

add_action( 'customize_register', 'pstuctvstzs\customizer_settings_template_error404', 10, 1 );