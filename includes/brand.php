<?php


namespace pstuctvstzs;


if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
 * Замена логотипа на странице входа
 **/
function custom_login_logo() {
	$custom_logo_id = get_theme_mod( 'custom_logo' );
	if ( ( bool ) $custom_logo_id ) {
		$custom_logo_url = wp_get_attachment_image_url( $custom_logo_id, 'thumbnail', false );
		if ( $custom_logo_url ) {
			$blog_name = get_bloginfo( 'name' );
			echo css_array_to_css( array(
				'body.login h1 a' => array(
					'background-image'   => 'url( ' . $custom_logo_url . ' )',
					'background-repeat'  => 'no-repeat',
					'width'              => '100px',
					'height'             => '100px',
					'background-size'    => '75px 75px',
					'background-position'=> 'center center',
					'margin'             => '0 auto',
					'background-color'   => 'transparent',
				),
				'body.login h1::after' => array(
					'content'            => "'{$blog_name}'",
					'display'            => 'block',
					'margin-bottom'      => '25px',
				),
			), array( 'container' => true ) );
		}
	}
}

add_action( 'login_enqueue_scripts', 'pstuctvstzs\custom_login_logo' );


/**
 * Замена ссылки на логотипе
 **/
function change_admin_logo_url( $url ) {
	return home_url('/');
}
add_filter( 'login_headerurl', 'pstuctvstzs\change_admin_logo_url', 10, 1 );