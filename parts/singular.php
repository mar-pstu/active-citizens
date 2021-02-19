<?php


namespace pstuctvstzs;


if ( ! defined( 'ABSPATH' ) ) { exit; };


if ( have_posts() ) {

	while ( have_posts() ) {
		
		the_post();

		do_action( 'template_content_before' );

		the_content();

		if ( comments_open( get_the_ID() ) ) {
			comments_template();
		}

		do_action( 'template_content_after' );

	}

}