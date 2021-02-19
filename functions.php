<?php


if ( ! defined( 'ABSPATH' ) ) { exit; };


define( 'PSTUCTVSTZS_URL', get_template_directory_uri() . '/' );
define( 'PSTUCTVSTZS_DIR', get_template_directory() . '/' );
define( 'PSTUCTVSTZS_TEXTDOMAIN', 'pstuctvstzs' );
define( 'PSTUCTVSTZS_SLUG', 'pstuctvstzs' );


// регистрация подолнительных "возможностей" темы
get_template_part( 'includes/template-supports' );

// служебные ф-ции
get_template_part( 'includes/template-functions' );

// кастомные хуки темы
get_template_part( 'includes/template-hooks' );

// подключение локализации темы
get_template_part( 'includes/textdomain' );

// регистрация меню
get_template_part( 'includes/menus' );

// регистрация сайдбаров
get_template_part( 'includes/sidebars' );

if ( function_exists( 'pll_register_string' ) && function_exists( 'pll__' ) ) {
	//
}


if ( is_admin() && ! wp_doing_ajax() ) {

	// подключение стилей и скриптов для админки
	get_template_part( 'includes/enqueue-admin' );

	// хуки активации темы и дефорлные настройкиы
	get_template_part( 'includes/template-activate' );

	// регистрация кастомныех колонок в админке
	get_template_part( 'includes/custom-asides-admin' );

} else {

	// подключение хуков ленивой загрузки
	get_template_part( 'includes/lazyload.php' );

	// подключение скриптов и стилей для публичной части
	get_template_part( 'includes/enqueue-public' );

	// хуки поиска в публичной части
	get_template_part( 'includes/search-result' );

	// хуки кастомных колонок в публичной части
	get_template_part( 'includes/custom-asides-public' );

}


if ( is_customize_preview() ) {

	// подключение скриптов и стилей для Customizer API
	get_template_part( 'includes/enqueue-customizer' );

	// кастомные контрол в виде ползунка
	get_template_part( 'customizer/controls/wp-customize-range' );

	// кастомные контрол в виде редактора текста
	get_template_part( 'customizer/controls/wp-customize-tinymce-editor' );

	// список сеций главной страницы
	get_template_part( 'customizer/controls/wp-customizer-home-section-list-control' );

	// регистрация глобальных панелей темы в кастомайзере
	get_template_part( 'customizer/registration-panels' );

	// панели с настройками
	get_template_part( 'customizer/additional-scripts' );
	get_template_part( 'customizer/parts/header' );
	get_template_part( 'customizer/parts/footer' );
	get_template_part( 'customizer/parts/socials' );
	get_template_part( 'customizer/parts/column' );
	// get_template_part( 'customizer/parts/home-section-default' );
	// get_template_part( 'customizer/parts/home-section-category' );
	// get_template_part( 'customizer/parts/home-section-cover' );
	// get_template_part( 'customizer/parts/home-section-pages' );
	// get_template_part( 'customizer/parts/home-section-smallinfo' );
	get_template_part( 'customizer/templates/home' );
	get_template_part( 'customizer/templates/error404' );
}