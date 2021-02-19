<?php


namespace pstuctvstzs;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<?php if ( is_active_sidebar( 'column' ) ) : ?>

	<aside class="wrapper__column column">

		<?php dynamic_sidebar( 'column' ); ?>

	</aside>

<?php endif; ?>