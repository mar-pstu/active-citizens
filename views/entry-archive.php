<?php


namespace pstuctvstzs;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<article id="post-<?php the_ID(); ?>" <?php post_class( 'archive__entry entry', get_the_ID() ); ?> role="listitem">
	<div class="row">
		<div class="col-xs-12 col-sm-4">
			<a class="entry__thumbnail thumbnail" href="<?php the_permalink(); ?>">
				<img
					class="wp-lazy-thumbnail lazy"
					src="#"
					data-src="<?php echo has_post_thumbnail( get_the_ID() ) ? get_the_post_thumbnail_url( get_the_ID(), 'medium' ) : get_theme_file_uri( 'images/default-medium.jpg' ); ?>"
					alt="<?php the_title_attribute(); ?>"
				/>
			</a>
		</div>
		<div class="col-xs-12 col-sm-8">
			<h3 class="entry__title title">
				<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			</h3>
			<?php the_excerpt(); ?>
			<p>
				<time class="small" datetime="<?php the_time( 'c' ); ?>">
					<span class="sr-only"><?php _e( 'Опубликовано', PSTUCTVSTZS_TEXTDOMAIN ); ?></span> <?php the_time( 'j F Y' ); ?>
				</time>
			</p>
			<p>
				<a class="btn btn-success" href="<?php the_permalink(); ?>"><?php _e( 'Подробнее', PSTUCTVSTZS_TEXTDOMAIN ); ?></a>
			</p>
		</div>
	</div>
</article>