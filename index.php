<?php


namespace pstuctvstzs;


if ( ! defined( 'ABSPATH' ) ) { exit; };


$column_right_flag = ( 'right' == get_theme_mod( 'column_side' ) );
$column_sidebar_flag = is_active_sidebar( 'column' );


get_header();


?>


<div class="container mt-3 mb-3">


	<?php get_template_part( 'parts/bredcrumbs' ); ?>


	<div class="row stratch-sm">

		<?php if ( $column_sidebar_flag ) : ?>
			<div class="col-xs-12 col-sm-3 <?php echo ( $column_right_flag ) ? 'last-sm col-sm-offset-1' : 'first-sm'; ?>">
				<?php get_sidebar(); ?>
			</div>
		<?php endif; ?>

		<div class="col-xs-12 <?php echo ( $column_sidebar_flag ) ? 'col-sm-8' : ''; ?> <?php echo ( ! $column_right_flag ) ? 'first-xs' : 'col-sm-offset-1'; ?>">
			<main class="wrapper__main main" id="main">

				<?php

					if ( is_singular() ) {
						get_template_part( 'parts/pageheader', null, 'singular' );
						get_template_part( 'parts/singular' );
						if ( is_single() ) {
							get_template_part( 'parts/pager' );
						}
					} elseif ( is_search() ) {
						get_template_part( 'parts/pageheader', null, 'search' );
						get_template_part( 'parts/search' );
					} else {
						get_template_part( 'parts/pageheader', null, 'archive' );
						get_template_part( 'parts/archive' );
					}

				?>

			</main>
		</div>

	</div>

</div>


<?php


get_footer();