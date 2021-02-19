<?php


namespace pstuctvstzs;


if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
 * Регистрация секции настроек главной страницы "Информация"
 * */
function customizer_settings_part_footer( $wp_customize ) {

	$wp_customize->add_section(
		'part_footer',
		[
			'title'            => __( 'Подвал сайта', PSTUCTVSTZS_TEXTDOMAIN ),
			'priority'         => 10,
			'description'      => __( 'Подвал сайта, якорь #footer', PSTUCTVSTZS_TEXTDOMAIN ),
			'panel'            => 'template_parts',
		]
	); /**/


	$wp_customize->add_setting(
		'footercopyrightname',
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_text_field',
		]
	);
	$wp_customize->add_control(
		'footercopyrightname',
		[
			'section'           => 'part_footer',
			'label'             => __( 'Название организации в строке копирайта сайта' ),
			'type'              => 'text',
		]
	); /**/

}

add_action( 'customize_register', 'pstuctvstzs\customizer_settings_part_footer', 10, 1 );