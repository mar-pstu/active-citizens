<?php


namespace pstuctvstzs;


if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
 * Добавляет список языков с выбором в шапку сайта
 */
function add_hader_language_selection_list() {
	$current = pll_current_language( 'slug' );
	$other = pll_the_languages( array(
		'dropdown'           => 0,
		'show_names'         => '',
		'display_names_as'   => 'slug',
		'show_flags'         => 0,
		'hide_if_empty'      => 0,
		'force_home'         => 0,
		'echo'               => 0,
		'hide_if_no_translation' => 0,
		'hide_current'       => 0,
		'post_id'            => ( is_singular() ) ? get_the_ID() : NULL,
		'raw'                => 1,
	) );
	$format_currnent_language_item = apply_filters( 'format_currnent_language_list_item', '<li class="current">%2$s</li>' );
	$format_other_language_item = apply_filters( 'format_other_language_list_item', '<li><a href="%1$s">%2$s</a></li>' );
	echo apply_filters( 'before_languages_list', '<ul class="languages list-inline">' );
	if ( ( $other ) && ( ! empty( $other ) ) ) {
		foreach ( $other as $lang ) {
			printf(
				( $lang[ 'slug' ] == $current ) ? $format_currnent_language_item : $format_other_language_item,
				$lang[ 'url' ],
				$lang[ 'name' ]
			);
		}
	}
	echo apply_filters( 'after_languages_list', '</ul>' );
}

add_action( 'header_custom_buttoms', 'pstuctvstzs\add_hader_language_selection_list', 10, 0 );