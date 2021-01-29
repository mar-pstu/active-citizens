<?php


namespace pstuctvstzs;


if ( ! defined( 'ABSPATH' ) ) { exit; };


function add_hader_blindmode_button() {

	?>

			<button class="blindmode-button" id="blindmode-button">
				<span class="sr-only"><?php _e( 'Версия для людей с нарушением зрения', PSTUCTVSTZS_TEXTDOMAIN ); ?></span>
			</button>

	<?php

}

// add_action( 'header_custom_buttoms', 'pstuctvstzs\add_hader_blindmode_button', 10, 0 );