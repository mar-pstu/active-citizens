<?php


namespace pstuctvstzs;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<div class="mobilenav" id="mobilenav" style="display: none;">
	<div class="container">
		
		<div class="text-right">
			<button class="btn btn-withicon" data-toggle="nav"><?php _e( 'Закрыть меню', PSTUCTVSTZS_TEXTDOMAIN ); ?></button>
		</div>

		<?php get_search_form( true ); ?>

		<h3><?php _e( 'Меню', PSTUCTVSTZS_TEXTDOMAIN ); ?></h3>
		<?php
			wp_nav_menu( array(
				'theme_location'  => 'mobile',
				'menu'            => 'mobile',
				'container'       => false,
				'container_class' => '',
				'container_id'    => '',
				'menu_class'      => 'list',
				'menu_id'         => '',
				'echo'            => true,
				'fallback_cb'     => 'wp_page_menu',
				'before'          => '',
				'after'           => '',
				'link_before'     => '',
				'link_after'      => '',
				'items_wrap'      => '<ul id = "%1$s" class = "%2$s">%3$s</ul>',
				'depth'           => 2,
				'walker'          => '',
			) );
		?>

		<?php get_sidebar( 'mobile' ); ?>

	</div>
</div>