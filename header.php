<?php


namespace pstuctvstzs;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<?php get_template_part( 'parts/head' ); ?>
	<body <?php body_class( wp_is_mobile() ? [ 'is-mobile' ] : [] ); ?> >
		<?php echo get_theme_mod( 'additionalscriptsafterbody' ); ?>
		<div class="wrapper" id="wrapper">
			<header class="wrapper__header header" id="header">
				<div class="container">
					<?php the_custom_logo(); ?>
					<a class="bloginfo" href="<?php echo home_url( '/', null ); ?>">
						<div class="name"><?php bloginfo( 'name' ); ?></div>
						<div class="deacription"><?php bloginfo( 'description' ); ?></div>
					</a>
					<?php
						get_search_form( true );
						do_action( 'header_custom_buttoms' );
					?>
				</div>
			</header>
			<?php
				if ( has_nav_menu( 'main' ) ) {
					get_template_part( 'parts/nav' );
				}
