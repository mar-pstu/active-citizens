<?php


namespace pstuctvstzs;


if ( ! defined( 'ABSPATH' ) ) { exit; };


global $post;


echo apply_filters( 'template_pager_before', '<div class="pager" id="pager"><div class="row middle-xs">' );


foreach ( [
	'previous'  => [
		'classes'   => 'prev',
		'entry'     => get_previous_post(),
		'label'     => __( 'Смотреть предыдущий пост', PSTUCTVSTZS_TEXTDOMAIN ),
	],
	'next'      => [
		'classes'   => 'next',
		'entry'     => get_next_post(),
		'label'     => __( 'Смотреть следующий пост', PSTUCTVSTZS_TEXTDOMAIN ),
	],
] as $key => $value ) {
	extract( $value );
	if ( $entry && ! is_wp_error( $entry ) ) {
		$post = $entry;
		setup_postdata( $post );
		include get_theme_file_path( 'views/adjacent-post.php' );
	}
}

wp_reset_postdata();


echo apply_filters( 'template_pager_after', '<div class="pager" id="pager"><div class="row middle-xs">' );