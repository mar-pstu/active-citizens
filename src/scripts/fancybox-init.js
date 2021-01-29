jQuery( document ).ready( function ($) {

	jQuery( 'a.fancybox, button.fancybox' ).fancybox();

	jQuery( '.wp-block-button.fancybox a.wp-block-button__link[href^=\'#\']' ).each( function ( index, element ) {
		var hash = new URL( jQuery( element ).attr( 'href' ), window.location.toString() ).hash;
		if ( hash.length > 0 && jQuery( hash ).length > 0 ) {
			jQuery( element ).fancybox();
		}
	} );

	if ( jQuery( '.wp-block-gallery' ) ) {

		jQuery( '.blocks-gallery-item' ).click( function() {

			var galleryImages = $(this).parent().find( 'a' );
			var gallery = [];

			galleryImages.each(function( index, galleryItem ) {

				var caption = $(this).parent().find('figcaption') ?  $(this).find('img').attr('alt') : $(this).parent().find('figcaption')  ;

				gallery.push( {
					src : galleryItem.href,
					opts : {
						caption: caption
					}
				})
			} );

			$.fancybox.open( gallery, { loop: false }, $(this).index() );

			return false;
		} );
	}

} );
