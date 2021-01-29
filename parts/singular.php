<?php


namespace pstuctvstzs;


if ( ! defined( 'ABSPATH' ) ) { exit; };


if ( have_posts() ) {

	while ( have_posts() ) {
		
		the_post();

		include get_theme_file_path( 'views/content-before.php' );

		the_content();

		if ( comments_open( get_the_ID() ) ) {
			comments_template();
		}

		include get_theme_file_path( 'views/content-after.php' );

	}

}