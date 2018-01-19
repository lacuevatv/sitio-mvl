var currentPage = 2;
$(document).ready(myFunctionBoletines);


function myFunctionBoletines(){
//cargar más ajax

	$(document).on('click', '#more-boletines', function( event ){
	    event.preventDefault();

	    var contenedor = $('.list-boletines');
	    var contenedorAjax = $('.loading-news-ajax');
	   
	    $.ajax( {
	        type: 'POST',
	        url: ajaxFunctionDir + '/load-more-boletines.php',
	        data: {
	            page: currentPage,
	        },
	        beforeSend: function() {
	            contenedorAjax.html('cargando');
	        },
	        success: function ( response ) {
	        	
	                currentPage++;
	                contenedor.append(response);
	                contenedorAjax.html('');

	        },
	        error: function ( ) {
	            console.log('error');
	        },
	    });//cierre ajax

	});//load-more-news

	/*
     * guardar boletin
	*/
	$(document).on('click', '.save-boletin-btn', function(){
		var contenedor = this.closest('article');
		var msj = $(contenedor).find('.error-tag');
		var boletin_text = $(contenedor).find('.boletin_text').val();
		var boletin_date = $(contenedor).find('.boletin_date').val();
		var boletin_number = $(contenedor).find('.boletin_number').val();
		var boletin_id = $(this).attr('data-id');

		$.ajax({
	            type: 'POST',
	            url: ajaxFunctionDir + '/save-boletin.php',
	            data: {
	            	boletin_id:boletin_id,
	            	boletin_text:boletin_text,
	            	boletin_date:boletin_date,
	            	boletin_number:boletin_number,
	            },
	            success: function ( response ) {
	            	console.log(response)
	            	msj.text(response);
	            },
	            error: function ( ) {
	                console.log('error');
	            },
	        });//cierre ajax

	});

	/*
     * borrar boletin
	*/
	$(document).on('click', '.del-boletin-btn', function(){
		var contenedor = this.closest('li');
		var msj = $(contenedor).find('.error-tag');
		var boletin_id = $(this).attr('data-id');

		$.ajax( {
	            type: 'POST',
	            url: ajaxFunctionDir + '/delete-boletin.php',
	            data: {boletin_id:boletin_id},
	            success: function ( response ) {
	            	//console.log(response)
	            	msj.text(response);
	                $(contenedor).remove();
	            },
	            error: function ( ) {
	                console.log('error');
	            },
	        });//cierre ajax
		
	});


	/*
     * crear nuevo
	*/
	$(document).on('click', '#new-boletin', function(){
		var contenedor = $('.list-boletines');
		
		$( "#dialog" ).dialog({
			title: 'Biblioteca de imágenes',
			autoOpen: false,
			appendTo: '.contenido-modulo',
			height: 600,
			width:768,
			modal: true,
			buttons: [
		    {
		    	text: "Cerrar",
		      	class: 'btn btn-default',
		      	click: function() {
		        $( this ).dialog( "close" );
		      }
		    },
		  ],
		});

		$( "#dialog" ).dialog( 'open' )
		.load( templatesDir + '/media-boletines.php' );
	});

}