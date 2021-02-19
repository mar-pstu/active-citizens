<?php


namespace pstuctvstzs;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<div id="post-<?php the_ID(); ?>" <?php post_class( 'search__entry entry', get_the_ID() ); ?> role="listitem">
	<h3 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
	<?php the_excerpt(); ?>
</div>