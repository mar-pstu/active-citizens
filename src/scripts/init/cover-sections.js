jQuery( document ).ready( function () {
	jQuery( '.section--cover .bg[ data-mp4 ]' ).each( function ( element, index ) {
		var $element = jQuery( element );
		buildHtmlVideo( {
			parentElement: $element,
			playInMobile: false,
			mp4Status: true,
			playInTablet: true,
			playInDesktop: true,
			mp4Video: $element.attr( 'data-mp4' ),
			callback: function() {
				console.log("Build complete");
			},
			fallbackImage: ""
		} );
	} );
} );