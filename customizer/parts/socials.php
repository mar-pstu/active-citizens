<?php


namespace pstuctvstzs;


if ( ! defined( 'ABSPATH' ) ) { exit; };


function add_setting_part_socials( $wp_customize ) {

	$wp_customize->add_section(
		'part_socials',
		[
			'title'            => __( 'Социальные сети', PSTUCTVSTZS_TEXTDOMAIN ),
			'description'      => '',
			'priority'         => 70,
			'panel'            => 'template_parts',
		]
	); /**/


	foreach ( apply_filters( 'template_socials', [] ) as $key => $label ) {
		$wp_customize->add_setting(
			'socials' . $key . 'url',
			[
				'transport'         => 'reset',
				'sanitize_callback' => 'esc_url_raw',
			]
		);
		$wp_customize->add_control(
			'socials' . $key . 'url',
			[
				'section'           => 'part_socials',
				'label'             => $label,
				'type'              => 'text',
			]
		); /**/
	}

}

add_action( 'customize_register', 'pstuctvstzs\add_setting_part_socials', 10, 1 );