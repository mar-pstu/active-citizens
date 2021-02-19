<?php


namespace pstuctvstzs;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<?php if ( is_active_sidebar( 'mobile' ) ) : ?>
	<aside class="aside aside--mobilenav">
		<div class="row">
			<?php dynamic_sidebar( 'mobile' ); ?>
		</div>
	</aside>
<?php endif; ?>