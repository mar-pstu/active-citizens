<?php


namespace pstuctvstzs;


if ( ! defined( 'ABSPATH' ) ) { exit; };


$atts = [
	'class' => 'section',
];


if ( isset( $type ) ) {
	$atts[ 'class' ] .= ' section--' . $type;
}

if ( isset( $slug ) ) {
	$atts[ 'id' ] = 'section-' . $slug;
}


?>


<section <?php echo render_atts( $atts ); ?> >