<?php


namespace pstuctvstzs;


if ( ! defined( 'ABSPATH' ) ) { exit; };


function add_settings_additional_scripts( $wp_customize ) {

	// регистрация панели
	$wp_customize->add_section(
		'template_additional_scripts',
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
			'section'           => 'template_additional_scripts',
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
			'section'           => 'template_additional_scripts',
			'label'             => __( 'После тега body', PSTUCTVSTZS_TEXTDOMAIN ),
			'type'              => 'textarea',
		]
	); /**/

}

add_action( 'customize_register', 'pstuctvstzs\add_settings_additional_scripts', 10, 1 );