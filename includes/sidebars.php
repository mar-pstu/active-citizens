<?php


namespace pstuctvstzs;


if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
 * Регистрирует сайдбары и дополнительные пользовательские колонки
 * */
function register_theme_sidebars() {
	register_sidebar( [
		'name'             => __( 'Подвал', PSTUCTVSTZS_TEXTDOMAIN ),
		'id'               => 'basement',
		'description'      => '',
		'class'            => '',
		'before_widget'    => '<div class="col-xs-12 col-sm-4"><div id="%1$s" class="widget %2$s">',
		'after_widget'     => '</div></div>',
		'before_title'     => '<h3 class="widget__title title">',
		'after_title'      => '</h3>',
	] );
	register_sidebar( [
		'name'             => __( 'Боковая колонка', PSTUCTVSTZS_TEXTDOMAIN ),
		'id'               => 'column',
		'description'      => '',
		'class'            => '',
		'before_widget'    => '<div id="%1$s" class="widget %2$s">',
		'after_widget'     => '</div>',
		'before_title'     => '<h3 class="widget__title title">',
		'after_title'      => '</h3>',
	] );
	register_sidebar( [
		'name'             => __( 'Мобильное меню', PSTUCTVSTZS_TEXTDOMAIN ),
		'id'               => 'mobile',
		'description'      => '',
		'class'            => '',
		'before_widget'    => '<div class="col-xs-12 col-sm-6"><div id="%1$s" class="widget %2$s">',
		'after_widget'     => '</div></div>',
		'before_title'     => '<h3 class="widget__title title">',
		'after_title'      => '</h3>',
	] );
}

add_action( 'widgets_init', 'pstuctvstzs\register_theme_sidebars' );