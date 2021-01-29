<?php


namespace pstuctvstzs;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<div class="section__inner inner" role="list">
	<div class="container">
		<div class="row">

			<?php
				if ( isset( $content ) ) {
					echo $content;
				}
			?>

		</div>
	</div>
</div>

<?php if ( isset( $permalink ) && ! empty( $permalink ) && isset( $label ) && ! empty( $label ) ) : ?>
	<p class="text-center"><a href="<?php echo esc_attr( $permalink ); ?>" class="btn btn-lg btn-success"><?php echo $label; ?></a></p>
<?php endif; ?>