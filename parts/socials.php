<?php


namespace pstuctvstzs;


if ( ! defined( 'ABSPATH' ) ) { exit; };


$socials = apply_filters( 'template_socials', [] );

if ( is_array( $socials ) && ! empty( $socials ) ) {

	$links = [];

	$link_format = apply_filters( 'socials_link_format', '<a class="socials__item item item--%s" href="%s" role="listitem"><span class="sr-only">%s</span></a>' );

	foreach ( $socials as $key => $label ) {
		$link = trim( get_theme_mod( 'socials' . $key . 'url' ) );
		if ( is_url( $link ) ) {
			$links[] = sprintf( $link_format, $key, $link, $label );
		}
	}

	if ( ! empty( $links ) ) {
		echo apply_filters( 'socials_links_before', '<div class="socials" role="list">' );
		echo implode( "\r\n", $links );
		echo apply_filters( 'socials_links_after', '</div>' );
	}

}