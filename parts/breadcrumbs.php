<?php


namespace pstuctvstzs;


if ( ! defined( 'ABSPATH' ) ) { exit; };


echo apply_filters( 'breadcrumbs_before', '<div class="breadcrumbs mt-3 mb-3" id="bredcrumbs">' );

if ( function_exists( 'yoast_breadcrumb' ) ) {
	yoast_breadcrumb();
} else {
	if ( ! is_front_page() ) {
		echo '<a href="' . home_url() . '">' . __( 'Главная', PSTUCTVSTZS_TEXTDOMAIN ) . '</a> » ';
		if ( is_category() || is_single() ) {
			the_category( ' ' );
			if ( is_single() ) {
				echo " » ";
				the_title();
			}
		} elseif ( is_page() ) {
			the_title();
		}
	}
	else {
		echo __( 'Домашняя страница', PSTUCTVSTZS_TEXTDOMAIN );
	}
}

echo apply_filters( 'breadcrumbs_after', '</div>' );