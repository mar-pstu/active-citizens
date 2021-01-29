<?php


namespace pstuctvstzs;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<?php if ( ( isset( $title ) && ! empty( $title ) ) || ( isset( $description ) && ! empty( $description ) ) ) : ?>

	<div class="section__heading heading">

		<div class="container">

			<?php if ( isset( $title ) && ! empty( $title ) ) : ?>
				<h2 class="title"><?php echo $title; ?></h2>
			<?php endif; ?>
			
			<?php if ( isset( $description ) && ! empty( $description ) ) : ?>
				<p class="description"><?php echo $description; ?></p>
			<?php endif; ?>
		
		</div>

	</div>

<?php endif; ?>