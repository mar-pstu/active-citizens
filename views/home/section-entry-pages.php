<?php


namespace pstuctvstzs;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<article class="entry">
	<div class="container">
		<div class="row middle-xs">
			<div class="col-xs-12 col-sm-8">
				<h3><?php the_title( '', '', true ); ?></h3>
				<?php the_excerpt(); ?>
				<p><a class="btn btn-success" href="<?php the_permalink(); ?>"><?php _e( 'Подробнее', PSTUCTVSTZS_TEXTDOMAIN ); ?></a></p>
			</div>
			<?php if ( has_post_thumbnail() ) : ?>
				<div class="col-xs-12 col-sm-4 first-xs">
					<a class="thumbnail" href="<?php the_permalink(); ?>">
						<img
							class="lazy wp-post-thumbnail"
							src="#"
							data-src="<?php echo esc_attr( ( has_post_thumbnail() ) ? get_the_post_thumbnail_url( get_the_ID(), 'thumbnail' ) : $thumbnailsrc ); ?>"
							alt="<?php the_title_attribute(); ?>"
						/>
					</a>
				</div>
			<?php endif; ?>
		</div>
	</div>
</article>