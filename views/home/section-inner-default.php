<?php


namespace pstuctvstzs;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<div class="section__inner inner">

	<div class="container">

		<?php
			if ( isset( $content ) && ! empty( $content ) ) {
				echo $content;
			}
		?>

		<?php if ( isset( $permalink ) && ! empty( $permalink ) && isset( $label ) && ! empty( $label ) ) : ?>
			<p class="text-center"><a class="btn btn-lg btn-success permalink" href="<?php echo esc_attr( $permalink ); ?>"><?php echo $label; ?></a></p>
		<?php endif; ?>

	</div>

</div>