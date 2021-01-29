<?php


namespace pstuctvstzs;


if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
 * Регистрация секции настроек для секции главйно страницы типа "default"
 * */
function customizer_settings_additional_scripts( $wp_customize ) {

	$wp_customize->add_section(
		PSTUCTVSTZS_SLUG . '_additional_scripts',
		[
			'title'            => __( 'Дополнительные скрипты', PSTUCTVSTZS_TEXTDOMAIN ),
			'priority'         => 70,
		]
	); /**/


	$wp_customize->add_setting(
		'additionalscriptsafterhead',
		[
			'transport'         => 'reset',
		]
	);
	$wp_customize->add_control(
		'additionalscriptsafterhead',
		[
			'section'           => PSTUCTVSTZS_SLUG . '_additional_scripts',
			'label'             => __( 'После тега head', PSTUCTVSTZS_TEXTDOMAIN ),
			'type'              => 'textarea',
		]
	); /**/

	$wp_customize->add_setting(
		'additionalscriptsafterbody',
		[
			'transport'         => 'reset',
		]
	);
	$wp_customize->add_control(
		'additionalscriptsafterbody',
		[
			'section'           => PSTUCTVSTZS_SLUG . '_additional_scripts',
			'label'             => __( 'После тега body', PSTUCTVSTZS_TEXTDOMAIN ),
			'type'              => 'textarea',
		]
	); /**/

}

add_action( 'customize_register', 'pstuctvstzs\customizer_settings_additional_scripts', 10, 1 );