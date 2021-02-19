<?php


namespace pstuctvstzs;


if ( ! defined( 'ABSPATH' ) ) { exit; };


$copyright_name = get_theme_mod( 'footercopyrightname' );

if ( empty( $copyright_name ) ) {
	$copyright_name = get_bloginfo( 'name', 'raw' );
}


?>

			<?php get_sidebar( 'basement' ) ?>

			<footer class="wrapper__footer footer">
				<div class="container">
					<div class="row middle-xs">
						<div class="col-xs-12 col-sm-6">
							<p class="footer__copyright copyright" role="contentinfo">© <?php echo $copyright_name; ?>, <?php echo date( 'Y' ); ?></p>
						</div>
						<div class="col-xs-12 col-sm-6">
							<p class="footer__developer developer"><?php _e( 'Разработано <a href="https://cct.pstu.edu/">ЦКТ ПГТУ</a>', PSTUCTVSTZS_TEXTDOMAIN ); ?></p>
						</div>
					</div>
				</div>
			</footer>
		</div>
		<?php wp_footer(); ?>
	</body>
</html>