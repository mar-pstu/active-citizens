<?php


namespace pstuctvstzs;


if ( ! defined( 'ABSPATH' ) ) { exit; };


global $post;


$title = get_theme_mod( $args . 'title' );
$description = get_theme_mod( $args . 'description' );
$label = get_theme_mod( $args . 'label' );
$category_id = get_theme_mod( $args . 'categoryid' );
$numberposts = get_theme_mod( 'numberposts', 5 );
$content = '';
$permalink = '';


include get_theme_file_path( 'views/home/section-heading.php' );


if ( $category_id ) {

	$category = get_category( $category_id, OBJECT, 'raw' );

	if ( is_object( $category ) && ! is_wp_error( $category ) ) {

		$entries = get_posts( [
			'numberposts' => $numberposts,
			'category'    => $category->term_id,
			'orderby'     => 'date',
			'order'       => 'DESC',
			'post_type'   => 'post',
			'suppress_filters' => true,
		] );

		if ( is_array( $entries ) && ! empty( $entries ) ) {

			ob_start();

			foreach ( $entries as $entry ) {
				$post = $entry;
				setup_postdata( $post );
				include get_theme_file_path( 'views/home/section-entry-category.php' );
			}

			wp_reset_postdata();

			$content = ob_get_contents();
			ob_end_clean();

			if ( ! empty( $content ) ) {
				$permalink = get_term_link( $category, 'category' );
				include get_theme_file_path( 'views/home/section-inner-category.php' );
			}

		}

	}

}