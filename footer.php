<?php


namespace pstuctvstzs;


if ( ! defined( 'ABSPATH' ) ) { exit; };


$socials = [];

foreach ( apply_filters( 'footer_socials', [] ) as $key => $label ) {
	$url = trim( get_theme_mod( 'footersocial' . $key ) );
	if ( is_url( $url ) ) {
		$socials[ $key ] = [
			'label' => $label,
			'url'   => $url,
		];
	}
}


?>


			<footer class="wrapper__footer footer">
				<div class="container">
					<div class="row middle-xs">
						<div class="col-xs-12 col-sm-6">
							<p class="footer__copyright copyright" role="contentinfo">© <?php bloginfo( 'name' ) ?>, <?php echo date( 'Y' ); ?> </p>
						</div>
						<div class="col-xs-12 col-sm-6">
							<?php if ( ! empty( $socials ) ) : ?>
								<div class="footer__socials socials" role="list">
									<?php foreach ( $socials as $key => $social ) : ?>
										<a class="socials__item item item--<?php echo $key; ?>" href="<?php echo esc_attr( $social[ 'url' ] ); ?>" role="listitem">
											<span class="sr-only"><?php echo $social[ 'label' ]; ?></span>
										</a>
									<?php endforeach; ?>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</footer>
		</div>
		<?php wp_footer(); ?>
	</body>
</html>