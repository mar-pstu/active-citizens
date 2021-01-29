<?php


namespace pstuctvstzs;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<nav class="wrapper__nav nav" id="nav">
	<div class="container">
		<?php
			wp_nav_menu( array(
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
				'depth'           => 1,
				'walker'          => '',
			) );
		?>
		<button class="toggle-button" id="toggle-button">
			<span class="label"><?php _e( 'Открыть меню', PSTUCTVSTZS_TEXTDOMAIN ); ?></span>
		</button>
	</div>
</nav>