<?php


namespace pstuctvstzs;


if ( ! defined( 'ABSPATH' ) || ! isset( $args ) || empty( $args ) ) { exit; };


$title = get_theme_mod( $args . 'title' );
$excerpt = get_theme_mod( $args . 'excerpt' );
$permalink = get_theme_mod( $args . 'permalink' );
$label = get_theme_mod( $args . 'label' );
$bgisrc = get_theme_mod( $args . 'bgisrc' );


include get_theme_file_path( 'views/home/section-inner-cover.php' );