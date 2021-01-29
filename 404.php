<?php


namespace pstuctvstzs;


if ( ! defined( 'ABSPATH' ) ) { exit; };


get_header();


$title = get_theme_mod( 'error404title' );
$description = get_theme_mod( 'error404description' );
$logo_src = esc_url_raw( get_theme_mod( 'error404logosrc' ) );


?>


<div class="container">
	<div class="row middle-xs">

		<?php if ( ! empty( trim( $logo_src ) ) ) : ?>
			<div class="col-xs-12 col-sm-4">
				<img
					class="error404__thumbnail thumbnail lazy"
					src="#"
					data-src="<?php echo esc_attr( $logo_src ); ?>"
					alt="<?php echo esc_attr( $title ); ?>"
				/>
			</div>
		<?php endif; ?>

		<div class="col-xs-12 col-sm-8">
			<div class="error404__content content">

				<?php if ( ! empty( $title ) ) : ?>
					<h1><?php echo $title; ?></h1>
				<?php endif; ?>

				<?php if ( ! empty( $title ) ) : ?>
					<div class="description"><?php echo $description; ?></div>
				<?php endif; ?>

				<?php get_search_form( true ); ?>

			</div>
		</div>

	</div>
</div>


<?php


if ( is_active_sidebar( 'basement' ) ) {
	get_sidebar( 'basement' );
}


get_footer();