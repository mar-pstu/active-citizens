<?php


namespace pstuctvstzs;


if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
 * Регистрация секции настроек главной страницы "Информация"
 * */
function customizer_settings_part_footer( $wp_customize ) {

	$wp_customize->add_section(
		PSTUCTVSTZS_SLUG . '_footer',
		[
			'title'            => __( 'Подвал сайта', PSTUCTVSTZS_TEXTDOMAIN ),
			'priority'         => 10,
			'description'      => __( 'Подвал сайта, якорь #footer', PSTUCTVSTZS_TEXTDOMAIN ),
			'panel'            => PSTUCTVSTZS_SLUG . '_parts',
		]
	); /**/

	foreach ( apply_filters( 'footer_socials', [] ) as $key => $label ) {
		$wp_customize->add_setting(
			'footersocial' . $key,
			[
				'transport'         => 'reset',
				'sanitize_callback' => 'esc_url_raw',
			]
		);
		$wp_customize->add_control(
			'footersocial' . $key,
			[
				'section'           => PSTUCTVSTZS_SLUG . '_footer',
				'label'             => $label,
				'type'              => 'text',
			]
		); /**/
	}

}

add_action( 'customize_register', 'pstuctvstzs\customizer_settings_part_footer', 10, 1 );