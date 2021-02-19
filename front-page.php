<?php


namespace pstuctvstzs;


if ( ! defined( 'ABSPATH' ) ) { exit; };


global $post;


get_header();


if (
	true
	&& $page_on_front_id = get_option( 'page_on_front' )
	&& is_object( $page_on_front = get_page( $page_on_front_id, OBJECT, 'raw' ) )
	&& ! is_wp_error( $page_on_front )
) {

	// выводим страницу
	$post = $page_on_front;
	setup_postdata( $post );
	include get_theme_file_path( 'views/container-before.php' );
	do_action( 'template_content_before' );
	the_content();
	do_action( 'template_content_after' );
	include get_theme_file_path( 'views/container-after.php' );
	wp_reset_postdata();

} else {

	$sections = get_theme_mod( 'homesections' );
	$count = get_theme_mod( 'homesectionscount' );

	if ( $count && is_array( $sections ) && ! empty( $sections ) ) {

		// выводим секции главной
		for ( $i = 0; $i < $count; $i++) {
			if ( isset( $sections[ $i ] ) && is_home_section_valid( $sections[ $i ] ) && get_theme_mod( $sections[ $i ][ 'slug' ] . 'flag', false ) ) {
				extract( $sections[ $i ] );
				include get_theme_file_path( 'views/home/section-before.php' );
				get_template_part( 'parts/home/section', $sections[ $i ][ 'type' ], $sections[ $i ][ 'slug' ] );
				include get_theme_file_path( 'views/home/section-after.php' );
			}
		}

	} else {

		// выводим архив
		include get_theme_file_path( 'views/container-before.php' );
		get_template_part( 'parts/pageheader', 'archive' );
		get_template_part( 'parts/archive' );
		include get_theme_file_path( 'views/container-after.php' );

	}

}


get_footer();