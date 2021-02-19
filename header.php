<?php


namespace pstuctvstzs;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<!DOCTYPE html>
<html <?php language_attributes(); ?>>

	<?php get_template_part( 'parts/head' ); ?>

	<body <?php body_class( wp_is_mobile() ? [ 'is-mobile' ] : [] ); ?> >

		<?php echo get_theme_mod( 'additionalscriptsafterbody' ); ?>

		<?php get_template_part( 'parts/mobilenav' ); ?>

		<div class="wrapper" id="wrapper">
			<header class="wrapper__header header" id="header">
				<div class="container">

					<div class="col">
						<?php the_custom_logo(); ?>
						<a class="bloginfo" href="<?php echo home_url( '/', null ); ?>">
							<div class="name"><?php bloginfo( 'name' ); ?></div>
							<div class="deacription"><?php bloginfo( 'description' ); ?></div>
						</a>
					</div>

					<div class="col">
						<?php
							do_action( 'header_languages' );
							 if ( get_theme_mod( 'headersearchformflag' ) ) get_template_part( 'parts/header-searchform' );
							 if ( get_theme_mod( 'headersocialsflag' ) ) get_template_part( 'parts/socials' );
						?>
					</div>

				</div>
			</header>
			
			<?php get_template_part( 'parts/nav' );