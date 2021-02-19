<?php


namespace pstuctvstzs;


if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
 * Подключение скриптов и стилей превью кастомайзера
 */
function customizer_preview_enqueue() {
	wp_enqueue_script(
		'pstuctvstzs-customizer-preview',
		get_theme_file_uri( 'scripts/customizer-preview.js' ),
		[ 'jquery', 'customizer-preview' ],
		filemtime( get_theme_file_path( 'scripts/customizer-preview.js' ) ),
		true
	);
}

add_action( 'customize_preview_init', 'pstuctvstzs\customizer_preview_enqueue', 10, 0 );


/**
 * Подключение скриптов и стилей в панель настройщика
 * */
function customize_controls_enqueue_scripts() {
	wp_enqueue_script(
		'fancybox',
		get_theme_file_uri( 'scripts/fancybox.js' ),
		[ 'jquery' ],
		'3.3.5',
		true
	);
	wp_enqueue_script(
		'pstuctvstzs-cistomizer-home-section-list-control',
		get_theme_file_uri( 'scripts/wp-customizer-home-section-list-control.js' ),
		[ 'jquery', 'fancybox', 'customize-preview' ],
		filemtime( get_theme_file_path( 'scripts/wp-customizer-home-section-list-control.js' ) ),
		true
	);
	wp_enqueue_style(
		'pstuctvstzs-customizer-controls',
		get_theme_file_uri( 'styles/customizer-controls.css' ),
		[],
		filemtime( get_theme_file_path( 'styles/customizer-controls.css' ) ),
		'all'
	);
}

add_action( 'customize_controls_enqueue_scripts', 'pstuctvstzs\customize_controls_enqueue_scripts', 10, 0 );