<?php


namespace pstuctvstzs;


if ( ! defined( 'ABSPATH' ) ) { exit; };


$bg_atts = [
	'class' => 'bg',
];


if ( isset( $bgisrc ) && ! empty( $bgisrc ) ) {
	$bg_atts[ 'class' ] .= ' lazy';
	$bg_atts[ 'data-src' ] = esc_attr( $bgisrc );
}


?>


<div <?php echo render_atts( $bg_atts ); ?> ></div>

<div class="container">

	<?php if ( isset( $title ) && ! empty( $title ) ) : ?>
		<h1 class="title"><?php echo $title; ?></h1>
	<?php endif; ?>

	<?php if ( isset( $excerpt ) && ! empty( $excerpt ) ) : ?>
		<p class="excerpt"><?php echo $excerpt; ?></p>
	<?php endif; ?>

	<?php if ( isset( $permalink ) && ! empty( $permalink ) && isset( $label ) && ! empty( $label ) ) : ?>
		<p><a class="permalink" href="<?php echo esc_attr( $permalink ); ?>"><?php echo $label; ?></a></p>
	<?php endif; ?>	

</div>