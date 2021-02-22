<?php


namespace pstuctvstzs;


if ( ! defined( 'ABSPATH' ) ) { exit; };


function get_template_socials() {
	return ( is_customize_preview() ) ? [
		'linkedin'  => __( 'URL профиля в LinkedIn', PSTUCTVSTZS_TEXTDOMAIN ),
		'twitter'   => __( 'URL профиля в Twiiter', PSTUCTVSTZS_TEXTDOMAIN ),
		'instagram' => __( 'URL профиля в Instagram', PSTUCTVSTZS_TEXTDOMAIN ),
		'facebook'  => __( 'URL профиля в Facebook', PSTUCTVSTZS_TEXTDOMAIN ),
		'youtube'   => __( 'URL канала на YouTube', PSTUCTVSTZS_TEXTDOMAIN ),
	] : [
		'linkedin'  => __( 'Наш профиль в LinkedIn', PSTUCTVSTZS_TEXTDOMAIN ),
		'twitter'   => __( 'Наш профиль в Twiiter', PSTUCTVSTZS_TEXTDOMAIN ),
		'instagram' => __( 'Наш профиль в Instagram', PSTUCTVSTZS_TEXTDOMAIN ),
		'facebook'  => __( 'Наш профиль в Facebook', PSTUCTVSTZS_TEXTDOMAIN ),
		'youtube'   => __( 'Наш канал на YouTube', PSTUCTVSTZS_TEXTDOMAIN ),
	];
}

add_filter( 'template_socials', 'pstuctvstzs\get_template_socials', 10, 0 );


/**
 * Добавляет обёртку для содержимого (начало)
 * */
function get_cotent_before() {
	include get_theme_file_path( 'views/content-before.php' );
}

add_action( 'template_content_before', 'pstuctvstzs\get_cotent_before', 10, 0 );


/**
 * Добавляет обёртку для содержимого (конец)
 * */
function get_cotent_after() {
	include get_theme_file_path( 'views/content-фаеук.php' );
}

add_action( 'template_content_after', 'pstuctvstzs\get_cotent_before', 10, 0 );


/**
 * Добавляет обёртку для списка постов (начало)
 * */
function get_entries_list_before() {
	include get_theme_file_path( 'views/entries-list-before.php' );
}

add_action( 'template_archive_list_before', 'pstuctvstzs\get_entries_list_before', 10, 0 );
add_action( 'template_search_list_before', 'pstuctvstzs\get_entries_list_before', 10, 0 );


/**
 * Добавляет обёртку для списка постов (конец)
 * */
function get_entries_list_after() {
	include get_theme_file_path( 'views/entries-list-after.php' );
}

add_action( 'template_archive_list_after', 'pstuctvstzs\get_entries_list_after', 10, 0 );
add_action( 'template_search_list_after', 'pstuctvstzs\get_entries_list_after', 10, 0 );


/**
 * Добавляет текст если посты не найдены
 * */
function get_entries_not_found() {
	_e( 'К сожалению, по вашему запросу ничего не найдено.', PSTUCTVSTZS_TEXTDOMAIN );
}

add_action( 'template_search_not_found', 'pstuctvstzs\get_entries_not_found', 10, 0 );
add_action( 'template_archive_not_found', 'pstuctvstzs\get_entries_not_found', 10, 0 );