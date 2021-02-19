( function( $ ) {


	function Add() {
		//
	}

	function Update() {

	}

	function Remoev() {
		//
	}

	function Init() {
		jQuery( '[data-homesectionlist-id]' ).each( function ( index, element ) {
			var id = jQuery( element ).attr( 'data-homesectionlist-id' );
			var $list = jQuery( '#homesectionlist-list-' + id );
			var $input = jQuery( '#homesectionlist-input-' + id );
			var listitem = wp.template( 'homesectionlist-listitem-' + id ),
			var addform = wp.template( 'homesectionlist-addform' + id ),
		} );
	}

	jQuery( document ).ready( Init );

	// $(document).ready(function(){

	// 	$(document).on('click', ".list-control-add", function(){
			
	// 		var id = $(this).closest( '[data-id]' ).attr("data-id");
	// 		console.log( id );
	// 		var list = $("#list-control-" + id );
	// 		list.append('<div class="listinput"><span class="removeInput" >X</span><input type="text" value="" /></div>');
	// 	});


	// 	// $(document).on('click', ".list-control-confirm", function(){
			 
	// 	// 	var id = $(this).attr("data-id");
	// 	// 	var list = $("#list-control-" + id ); 

	// 	// 	var values = [];
	// 	// 	list.children().each(function(){
	// 	// 		var value = $(this).find('input').val();
	// 	// 		values.push(value);
	// 	// 	});

	// 	// 	$("#list-input-" + id ).val( serialize( values ) ).trigger("change");

			
	// 	//  });

	// 	function AddData() {
	// 		var id = $(this).attr("data-id");
	// 		var list = $("#list-control-" + id );
	// 		console.log( 'sdfg' );
	// 		var values = [];
	// 		list.children().each(function(){
	// 			var value = $(this).find('input').val();
	// 			values.push(value);
	// 		});
	// 		$("#list-input-" + id ).val( serialize( values ) ).trigger("change");
	// 	}

	// 	$( '[data-id]' ).on( 'keypress', ".listinput", AddData );


	// 	$(document).on( 'click',".removeInput", function(){
	// 	 	var $parent = $(this).parent(".listinput");
	// 	 	$parent.remove();
	// 	 	AddData();
	// 	});

	// });

} )( jQuery );