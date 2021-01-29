<?php


namespace pstuctvstzs;


if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
 * Добавляет список социальных сетей в подвале сайта
 */
function add_footer_socials( $list = [] ) {
	return array_merge( $list, [
		'odnoklassniki' => __( 'Профиль в Одноклассниках', PSTUCTVSTZS_TEXTDOMAIN ),
		'vkontacte'     => __( 'Профиль в контте', PSTUCTVSTZS_TEXTDOMAIN ),
		'instagram'     => __( 'Профиль в Instagram', PSTUCTVSTZS_TEXTDOMAIN ),
		'facebook'      => __( 'Профиль в Facebook', PSTUCTVSTZS_TEXTDOMAIN ),
	] );
}

add_filter( 'footer_socials', 'pstuctvstzs\add_footer_socials', 10, 1 );