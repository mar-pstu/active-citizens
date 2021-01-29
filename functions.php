<?php


if ( ! defined( 'ABSPATH' ) ) { exit; };


define( 'PSTUCTVSTZS_URL', get_template_directory_uri() . '/' );
define( 'PSTUCTVSTZS_DIR', get_template_directory() . '/' );
define( 'PSTUCTVSTZS_TEXTDOMAIN', 'pstuctvstzs' );
define( 'PSTUCTVSTZS_SLUG', 'pstuctvstzs' );


get_template_part( 'includes/template-supports' );
get_template_part( 'includes/template-functions' );
get_template_part( 'includes/template-hooks' );
get_template_part( 'includes/textdomain' );
get_template_part( 'includes/menus' );
get_template_part( 'includes/sidebars' );
get_template_part( 'includes/blindmode' );

if ( function_exists( 'pll_register_string' ) && function_exists( 'pll__' ) ) {
	get_template_part( 'pll/language-selection' );
	get_template_part( 'pll/translate-settings' );
	get_template_part( 'pll/home-section-cover' );
	get_template_part( 'pll/home-section-default' );
	get_template_part( 'pll/home-section-category' );
	get_template_part( 'pll/home-section-pages' );
	get_template_part( 'pll/home-section-smallinfo' );
}


if ( is_admin() && ! wp_doing_ajax() ) {
	get_template_part( 'includes/enqueue-admin' );
	get_template_part( 'includes/template-activate' );
	get_template_part( 'includes/custom-asides-admin' );
} else {
	get_template_part( 'includes/lazyload.php' );
	get_template_part( 'includes/enqueue-public' );
	get_template_part( 'includes/search-result' );
	get_template_part( 'includes/custom-asides-public' );
}


if ( is_customize_preview() ) {
	get_template_part( 'customizer/controls/wp-customize-range' );
	get_template_part( 'customizer/controls/wp-customize-tinymce-editor' );
	get_template_part( 'customizer/registering-panels' );
	get_template_part( 'customizer/additional-scripts' );
	get_template_part( 'customizer/parts/footer' );
	get_template_part( 'customizer/parts/home-section-default' );
	get_template_part( 'customizer/parts/home-section-category' );
	get_template_part( 'customizer/parts/home-section-cover' );
	get_template_part( 'customizer/parts/home-section-pages' );
	get_template_part( 'customizer/parts/home-section-smallinfo' );
	get_template_part( 'customizer/pages/home' );
	get_template_part( 'customizer/pages/error404' );
}