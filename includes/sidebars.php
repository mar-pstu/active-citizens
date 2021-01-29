<?php


namespace pstuctvstzs;


if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
 * Регистрация "сайдбаров"
 */
function register_sidebars() {
	register_sidebar( [
		'name'             => __( 'Сайдбар подвала', PSTUCTVSTZS_TEXTDOMAIN ),
		'id'               => 'basement',
		'description'      => __( 'Отображается внизу сайта перед подвалом. Выводится в три колонки. Идентификатор #sidebar-basement', PSTUCTVSTZS_TEXTDOMAIN ),
		'class'            => 'search-modal-sidebar',
		'before_widget'    => '<div class="col-xs-12 col-sm-4"><div id="%1$s" class="basement__widget widget %2$s">',
		'after_widget'     => '</div></div>',
		'before_title'     => '<h3 class="widget__title title">',
		'after_title'      => '</h3>',
	] );
	$asides = array_merge( [ [
		'name'          => __( 'Колонка', PSTUCTVSTZS_TEXTDOMAIN ),
		'id'            => 'column',
		'description'   => '',
		'class'         => '',
	] ], get_theme_mod( 'register_asides', [] ) );
	foreach ( $asides as $aside ) {
		register_sidebar( [
			'name'             => $aside[ 'name' ],
			'id'               => $aside[ 'id' ],
			'description'      => $aside[ 'description' ],
			'class'            => $aside[ 'class' ],
			'before_widget'    => '<div id="%1$s" class="column__widget widget %2$s">',
			'after_widget'     => '</div>',
			'before_title'     => '<h3 class="widget__title title">',
			'after_title'      => '</h3>',
		] );
	}
}

add_action( 'widgets_init', 'pstuctvstzs\register_sidebars' );