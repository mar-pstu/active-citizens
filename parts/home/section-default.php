<?php


namespace pstuctvstzs;


if ( ! defined( 'ABSPATH' ) ) { exit; };


$title = get_theme_mod( $args . 'title' );
$description = get_theme_mod( $args . 'description' );
$permalink = get_theme_mod( $args . 'permalink' );
$label = get_theme_mod( $args . 'label' );
$page_id = get_theme_mod( $args . 'pageid' );
$content = '';


if ( $page_id ) {

	$page = get_page( $page_id, OBJECT, 'raw' );

	if ( is_object( $page ) && ! is_wp_error( $page ) ) {

		$parts = get_extended( $page->post_content );
		$content = apply_filters( 'the_content', do_shortcode( $parts[ 'main' ], false ) );

	}

}


include get_theme_file_path( 'views/home/section-heading.php' );
include get_theme_file_path( 'views/home/section-inner-default.php' );