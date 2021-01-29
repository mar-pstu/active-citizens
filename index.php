<?php


namespace pstuctvstzs;


if ( ! defined( 'ABSPATH' ) ) { exit; };


get_header();


get_template_part( 'parts/breadcrumbs' );


include get_theme_file_path( 'views/container-before.php' );

?>

	<div class="row stratch-sm">

		<?php if ( is_active_sidebar( 'column' ) ) : ?>
			<div class="col-xs-12 col-sm-4 first-sm">
				<?php get_sidebar(); ?>
			</div>
		<?php endif ?>


		<div class="col-xs-12 <?php echo ( is_active_sidebar( 'column' ) ) ? 'col-sm-8' : 'col-sm-12'; ?>  first-xs">

			<main class="wrapper__main main" id="main">

				<?php

					if ( is_singular() ) {
						get_template_part( 'parts/pageheader', 'singular' );
						get_template_part( 'parts/singular' );
						if ( is_single() ) {
							get_template_part( 'parts/pager' );
						}
					} elseif ( is_search() ) {
						get_template_part( 'parts/pageheader', 'search' );
						get_template_part( 'parts/search' );
					} else {
						get_template_part( 'parts/pageheader', 'archive' );
						get_template_part( 'parts/archive' );
					}

				?>

			</main>
		</div>

	</div>


<?php

include get_theme_file_path( 'views/container-after.php' );


if ( is_active_sidebar( 'basement' ) ) {
	get_sidebar( 'basement' );
}


get_footer();