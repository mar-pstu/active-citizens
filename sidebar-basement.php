<?php


namespace pstuctvstzs;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<?php if ( is_active_sidebar( 'basement' ) ) : ?>
	<aside class="wrapper__basement basement">
		<div class="container">
			<div class="row">

				<?php dynamic_sidebar( 'basement' ); ?>

			</div>
		</div>
	</aside>
<?php endif; ?>