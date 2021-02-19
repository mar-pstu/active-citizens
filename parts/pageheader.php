<?php


namespace pstuctvstzs;


if ( ! defined( 'ABSPATH' ) ) { exit; };


if ( ! isset( $args ) || empty( $args ) ) {
	$args = '';
}

$title = '';
$description = '';

switch ( $args ) {

	case 'archive':
		$title = get_the_archive_title();
		$description = do_shortcode( get_the_archive_description() );
		break;

	case 'search':
		$title = __( 'Поиск по сайту', PSTUCTVSTZS_TEXTDOMAIN );
		$description = sprintf(
			'%1$s: <span class="bg-success">%2$s</span>',
			__( 'Вы искали', PSTUCTVSTZS_TEXTDOMAIN ),
			get_search_query()
		);
		break;

	case 'singular':
		$title = single_post_title( '', false );
		$description = ( has_excerpt( get_the_ID() ) ) ? get_the_excerpt( get_the_ID() ) : false;
		break;

	default:
		$title = get_bloginfo( 'name', 'raw' );
		$description = get_bloginfo( 'description', 'raw' );

}

include get_theme_file_path( 'views/pageheader.php' );