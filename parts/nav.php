<?php


namespace pstuctvstzs;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<nav class="wrapper__nav nav" id="nav">

	<div class="container">

		<?php
			if ( has_nav_menu( 'main' ) ) {
				wp_nav_menu( [
					'theme_location'  => 'main',
					'menu'            => 'main',
					'container'       => false,
					'container_class' => '',
					'container_id'    => '',
					'menu_class'      => 'nav__list list',
					'menu_id'         => 'nav-list',
					'echo'            => true,
					'fallback_cb'     => 'wp_page_menu',
					'before'          => '',
					'after'           => '',
					'link_before'     => '',
					'link_after'      => '',
					'items_wrap'      => '<ul id = "%1$s" class = "%2$s">%3$s</ul>',
					'depth'           => 2,
					'walker'          => '',
				] );
			}
			do_action( 'nav_container' );
		?>

		<button class="burger btn btn-withicon" data-toggle="nav"><?php _e( 'Открыть меню', PSTUCTVSTZS_TEXTDOMAIN ); ?></button>

	</div>

</nav>