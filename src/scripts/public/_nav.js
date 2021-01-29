( function() {

	jQuery( document ).ready( function () {

		var $list = jQuery( '#nav-list' );
		var $toggle = jQuery( '#toggle-button' );

		function Toggle() {
			if ( $toggle.hasClass( 'active' ) ) {
				$toggle.removeClass( 'active' );
				$list.slideUp( 200 );
			} else {
				$toggle.addClass( 'active' );
				$list.slideDown( 200 );
			}
		}

		$toggle.on( 'click', Toggle );

	} );

} )();