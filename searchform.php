<?php


namespace pstuctvstzs;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<form class="searchform form" role="search" method="get" action="<?php echo home_url( '/' ) ?>"> 
	<input
		class="form-control"
		type="search"
		value="<?php echo get_search_query() ?>"
		name="s"
		placeholder="<?php _e( 'Поиск ...', PSTUCTVSTZS_TEXTDOMAIN ); ?>"
	/>
	<button class="searchsubmit" type="submit">
		<span class="sr-only"><?php _e( 'Найти', PSTUCTVSTZS_TEXTDOMAIN ); ?></span>
	</button>
</form>