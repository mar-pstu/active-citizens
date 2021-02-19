<?php


namespace pstuctvstzs;


if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
 * Подключение скриптов
 *
 * @param string $handle Имя / идентификатор скрипта
 * @param string $src URL на файл скрипта
 * @param array $deps массив зависимостей
 * @param string|bool $ver версия
 * @param bool $in_footer подключать в шапке или подвале
 */
function scripts() {
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'pstuctvstzs-public', get_theme_file_uri( 'scripts/public.js' ), [ 'jquery', 'fancybox' ], filemtime( get_theme_file_path( 'scripts/public.js' ) ), true );
	wp_enqueue_script( 'lazyload', get_theme_file_uri( 'scripts/lazyload.js' ), [ 'jquery' ], '1.7.6', true );
	wp_add_inline_script( 'lazyload', 'jQuery( ".lazy" ).lazy();', 'after' );
	wp_enqueue_script( 'superembed', get_theme_file_uri( 'scripts/superembed.js' ), [ 'jquery' ], '3.1', true );
	wp_enqueue_script( 'fancybox', get_theme_file_uri( 'scripts/fancybox.js' ), [ 'jquery' ], '3.3.5', true );
	if ( file_exists( $fancybox_gallery_init = get_theme_file_path( 'scripts/fancybox-init.js' ) ) ) {
		wp_add_inline_script( 'fancybox', file_get_contents( $fancybox_gallery_init ), 'after' );
	}
}

add_action( 'wp_enqueue_scripts', 'pstuctvstzs\scripts' );


/**
 * Отключение стилей при выводе их в шапке, чтобы подкючить в подвале сайта
 */
function print_styles() {
	wp_dequeue_style( 'contact-form-7' );
	wp_dequeue_style( 'wp-block-library' );
	wp_dequeue_style( 'wpdiscuz-font-awesome' );
	wp_dequeue_style( 'wpdiscuz-frontend-css' );
	wp_dequeue_style( 'wpdiscuz-user-content-css' );
}

add_action( 'wp_print_styles', 'pstuctvstzs\print_styles' );


/**
 * Подключение стилей
 *
 * @param string $handle Имя / идентификатор стиля
 * @param string $src URL на файла стиля
 * @param array $deps массив зависимостей
 * @param string|bool $ver версия
 * @param string $media для каких устройств подключать
 */
function styles() {
	wp_enqueue_style( 'pstuctvstzs-public', get_theme_file_uri( 'styles/public.css' ), [ 'fancybox' ], filemtime( get_theme_file_path( 'styles/public.css' ) ), 'all' );
	wp_enqueue_style( 'pstuctvstzs-fonts', get_theme_file_uri( 'styles/fonts.css' ), [], filemtime( get_theme_file_path( 'styles/fonts.css' ) ), 'all' );
	wp_enqueue_style( 'contact-form-7' );
	wp_enqueue_style( 'wp-block-library' );
	wp_enqueue_style( 'wpdiscuz-font-awesome' );
	wp_enqueue_style( 'wpdiscuz-frontend-css' );
	wp_enqueue_style( 'wpdiscuz-user-content-css' );
	wp_enqueue_style( 'fancybox', get_theme_file_uri( 'styles/fancybox.css' ), [], '3.3.5', 'all' );
}

add_action( 'get_footer', 'pstuctvstzs\styles', 10, 0 );


/**
 * Подключение "критических" стилей необходимых для оптимизации загрузки страницы
 */
function ctitical_styles() {
	$file_path = get_theme_file_path( 'styles/critical.css' );
	if ( file_exists( $file_path ) ) {
		echo '<style type="text/css">' . file_get_contents( $file_path ) . '</style>';
	}
}
add_action( 'wp_head', 'pstuctvstzs\ctitical_styles', 10, 0 );