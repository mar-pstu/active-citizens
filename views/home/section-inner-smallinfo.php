<?php


namespace pstuctvstzs;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<div class="section__inner inner">
	<div class="container">
		<div class="<?php echo ( isset( $direction ) && 'row' == $direction ) ? 'row' : 'row-reverse'; ?> middle-xs">

			<?php if ( isset( $thumbnail_src ) && ! empty( $thumbnail_src ) ) : ?>

				<?php

					$thumbnail_id = attachment_url_to_postid( removing_image_size_from_url( $thumbnail_src ) );
					if ( $thumbnail_id && ! is_wp_error( $thumbnail_id ) ) {
						$thumbnail_src = wp_get_attachment_image_url( $thumbnail_id, 'medium', false );
					}
					$thumbnail_alt = get_post_meta( $thumbnail_id, '_wp_attachment_image_alt', true );

				?>

				<div class="col-xs-12 col-sm-6">
					<p class="text-center">
						<img
							class="wp-post-thumbnail display-inline-block lazy"
							src="#"
							data-src="<?php echo esc_attr( $thumbnail_src ); ?>"
							alt="<?php echo esc_attr( $thumbnail_alt ); ?>"
						/>
					</p>
				</div>
			<?php endif; ?>

			<div class="col-xs-12 col-sm">
				
				<?php
					if ( isset( $content ) && ! empty( $content ) ) {
						echo $content;
					}
				?>

				<?php if ( isset( $permalink ) && ! empty( $permalink ) && isset( $label ) && ! empty( $label ) ) : ?>
					<p class="text-center"><a class="btn btn-lg btn-success" href="<?php echo esc_attr( $permalink ); ?>"><?php echo $label; ?></a></p>
				<?php endif; ?>

			</div>

		</div>
	</div>
</div>