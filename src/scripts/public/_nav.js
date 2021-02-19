( function() {

	jQuery( document ).ready( function () {

		var $mobilenav = jQuery( '#mobilenav' );
		var $toggle = jQuery( '[data-toggle=nav]' );
		var $body = jQuery( 'body' );
		var $hasSubMenu = jQuery( '#nav .has-sub-menu' );

		if ( typeof $body.attr( 'data-mobilenav' ) == typeof undefined && $body.attr( 'data-mobilenav' ) == false ) {
			$body.attr( 'data-mobilenav', 'inactive' );
			$mobilenav.slideUp( 0 );
		}

		function Toggle() {
			if ( 'active' == $body.attr( 'data-mobilenav' ) ) {
				$body.attr( 'data-mobilenav', 'inactive' );
				$body.css( 'overflow', 'scroll' );
				$mobilenav.slideUp( 200 );
			} else {
				$body.attr( 'data-mobilenav', 'active' );
				$body.css( 'overflow', 'hidden' );
				$mobilenav.slideDown( 200 );
			}
		}

		function OpenSubMenu() {
			jQuery( this ).addClass( 'active' ).find( '.sub-menu' ).slideDown( 200 );
		}

		function CloseSubMenu() {
			jQuery( this ).removeClass( 'active' ).find( '.sub-menu' ).slideUp( 200 );
		}

		$toggle.on( 'click', Toggle );
		$hasSubMenu.hover( OpenSubMenu, CloseSubMenu );

	} );

} )();