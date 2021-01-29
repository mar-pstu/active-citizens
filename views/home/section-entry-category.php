<?php


namespace pstuctvstzs;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<div class="col-xs-12 col-sm-6">
	<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry', get_the_ID() ); ?> role="listitem">
		<div class="row middle-xs">

			<div class="col-xs-12 col-sm-9">
				<h3 class="title"><?php the_title( '', '', true ); ?></h3>
				<?php the_excerpt(); ?>
				<a href="<?php the_permalink(); ?>" class="permalink btn btn-sm btn-success"><?php _e( 'Подробнее', PSTUCTVSTZS_TEXTDOMAIN ); ?></a>
			</div>

			<?php if ( has_post_thumbnail() ) : ?>
				<div class="col-xs-12 col-sm-3 first-xs">
					<a class="thumbnail">
						<img
							class="wp-post-thumbnail lazy"
							src="#"
							data-src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'thumbnail' ); ?>"
							alt="<?php the_title_attribute( [ 'post' => get_the_ID(), 'echo' => true ] ); ?>"
						/>
					</a>
				</div>
			<?php endif; ?>

		</div>
	</article>
</div>