<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<div class="pageheader">

	<?php if ( isset( $title ) && ! empty( $title ) ) : ?>
		<h1 class="title"><?php echo $title ?></h1>
	<?php endif; ?>

	<?php if ( isset( $description ) && ! empty( $description ) ) : ?>
		<div class="description"><?php echo $description; ?></div>
	<?php endif; ?>

</div>