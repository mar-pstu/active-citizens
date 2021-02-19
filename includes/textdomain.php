<?php


namespace pstuctvstzs;


if ( ! defined( 'ABSPATH' ) ) { exit; }


/**
 * Загрузка переводов темы
 */
function load_textdomain() {
	load_theme_textdomain( PSTUCTVSTZS_TEXTDOMAIN, PSTUCTVSTZS_DIR . 'languages/' );
}

add_action( 'after_setup_theme', 'pstuctvstzs\load_textdomain' );