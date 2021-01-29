<?php


namespace pstuctvstzs;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<div class="col-xs-6">
	<a
		id="post-<?php the_ID(); ?>"
		class="<?php echo join( ' ', get_post_class( 'pager__entry entry ' . ( isset( $classes ) ? $classes : '' ) ) ); ?>"
		href="<?php the_permalink(); ?>"
	>
		<div class="icon">
			<?php if ( isset( $label ) && ! empty( $label ) ) : ?>
				<span class="sr-only"><?php echo $label; ?></span>
			<?php endif; ?>
		</div>
		<div class="title"><?php the_title(); ?></div>
	</a>
</div>