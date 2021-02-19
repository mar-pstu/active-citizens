<?php


namespace pstuctvstzs;


if ( ! defined( 'ABSPATH' ) ) { exit; };


function add_setting_part_header( $wp_customize ) {

	$wp_customize->add_section(
		'part_header',
		[
			'title'            => __( 'Шапка сайта', PSTUCTVSTZS_TEXTDOMAIN ),
			'priority'         => 10,
			'description'      => __( 'Настройки шаблона страницы ошибки 404.', PSTUCTVSTZS_TEXTDOMAIN ),
			'panel'            => 'template_parts',
		]
	); /**/


	$wp_customize->add_setting(
		'headersearchformflag',
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'pstuctvstzs\sanitize_checkbox',
		]
	);
	$wp_customize->add_control(
		'headersearchformflag',
		[
			'section'           => 'part_header',
			'label'             => __( 'Показывать форму поиска', PSTUCTVSTZS_TEXTDOMAIN ),
			'type'              => 'checkbox',
		]
	); /**/

	$wp_customize->add_setting(
		'headersocialsflag',
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'pstuctvstzs\sanitize_checkbox',
		]
	);
	$wp_customize->add_control(
		'headersocialsflag',
		[
			'section'           => 'part_header',
			'label'             => __( 'Показывать ссылки на социальные сети', PSTUCTVSTZS_TEXTDOMAIN ),
			'type'              => 'checkbox',
		]
	); /**/

}

add_action( 'customize_register', 'pstuctvstzs\add_setting_part_header', 10, 1 );