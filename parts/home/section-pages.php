<?php


namespace pstuctvstzs;


if ( ! defined( 'ABSPATH' ) ) { exit; };


global $post;


$number = get_theme_mod( $args . 'number' );
$title = get_theme_mod( $args . 'title' );
$pageids = get_theme_mod( $args . 'pageids' );


if ( is_array( $pageids ) && ! empty( $pageids ) ) {

	include get_theme_file_path( 'views/home/section-heading-pages.php' );

	if ( count( $pageids ) > $number ) {
		$pageids = array_slice( $pageids, 0, $number );
	}

	foreach ( $pageids as $pageid ) {
		
		$page = get_page( $pageid, OBJECT, 'raw' );

		if ( is_object( $page ) && ! is_wp_error( $page ) ) {

			$post = $page;

			setup_postdata( $post );

			include get_theme_file_path( 'views/home/section-entry-pages.php' );

		}

	}

	wp_reset_postdata();

}