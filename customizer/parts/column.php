<?php


namespace pstuctvstzs;


if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
 * Регистрация секции настроек главной страницы "Информация"
 * */
function customizer_settings_part_column( $wp_customize ) {

	$wp_customize->add_section(
		'part_column',
		[
			'title'            => __( 'Колонка', PSTUCTVSTZS_TEXTDOMAIN ),
			'priority'         => 10,
			'description'      => __( 'Колонка с сайдбаром', PSTUCTVSTZS_TEXTDOMAIN ),
			'panel'            => 'template_parts',
		]
	); /**/


	$wp_customize->add_setting(
		'columnside',
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_text_field',
		]
	);
	$wp_customize->add_control(
		'columnside',
		[
			'section'           => 'part_column',
			'label'             => __( 'Положение колонки' ),
			'type'              => 'select',
			'choices'           => [
				'left'            => __( 'слева', PSTUCTVSTZS_TEXTDOMAIN ),
				'right'           => __( 'справа', PSTUCTVSTZS_TEXTDOMAIN ),
			],
		]
	); /**/

}

add_action( 'customize_register', 'pstuctvstzs\customizer_settings_part_column', 10, 1 );