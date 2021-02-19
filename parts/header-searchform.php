<?php


namespace pstuctvstzs;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<a class="btn btn-withicon search fancybox" href="#header-search-modal"><?php _e( 'Поиск', PSTUCTVSTZS_TEXTDOMAIN ); ?></a>

<div id="header-search-modal" style="display: none;">
	<?php get_search_form( true ); ?>
</div>