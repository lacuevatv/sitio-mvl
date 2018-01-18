/**
 * File script.js
 *
 * @required jQuery
 * @ver 1.0
 --------------------------------------------------------------
>>> TABLE OF CONTENTS:
1.0 NAVIGATION
2.0 OWL SLIDERS
3.0 PAGINATION
4.0 POPUP PROMO
5.0 CONTACT FORM
--------------------------------------------------------------*/

var baseUrl = 'http://' + window.location.host;
var ajaxFileUrl = baseUrl + '/inc/ajax.php';

//se pasa con numeral #page
function scrollToID ( id ) {
    $('html, body').stop().animate({
        scrollTop: $(id).offset().top -90
    }, 'slow');
}

/*--------------------------------------------------------------
1.0 NAVIGATION
--------------------------------------------------------------*/

$(document).ready(function(){
    $(document).on('click', '.toggle_menu', function(){
        var menu = $('.main-menu');

        if ( menu.css('height') == '0px' ) {
            menu.css('height', 'auto');
            var h = menu.css('height');
            menu.css('height', '0px');
            menu.animate({
                'height': h,
            }, 2000);
        } else {
            menu.animate({
                'height': '0px',
            }, 500);
        }
    });//.click toggle

});//.ready()

/*--------------------------------------------------------------
2.0 OWL SLIDERS
--------------------------------------------------------------*/

$(window).on('load', function(){
    
    $('#header-slider').owlCarousel({
        loop:true,
        margin:50,
        nav:true,
        navText : ['<span class="icon-arrow icon-arrow-left"></span>','<span class="icon-arrow icon-arrow-right"></span>'],
        dots:true,
        responsive:{
            0:{
                items:1
            },
        },
    });

    $('#content-agenda').owlCarousel({
        loop:true,
        margin:20,
        nav:true,
        navText : ['<span class="icon-arrow-colors icon-arrow-left-violeta"></span>','<span class="icon-arrow-colors icon-arrow-right-violeta"></span>'],
        dots:false,
        responsiveClass:true,
        responsive:{
            0:{
                items:1,
                nav:true
            },
            992:{
                items:3,
                nav:true,
                loop:false
            },
            1150:{
                items:4,
                nav:true,
                loop:false
            },
            1300:{
                items:5,
                nav:true,
                loop:false
            },
            1600:{
                items:6,
                nav:true,
                loop:false
            },
        }
    });

    $('#content-tramites').owlCarousel({
        loop:true,
        margin:20,
        nav:true,
        navText : ['<span class="icon-arrow-colors icon-arrow-left-verde"></span>','<span class="icon-arrow-colors icon-arrow-right-verde"></span>'],
        dots:false,
        responsiveClass:true,
        responsive:{
            0:{
                items:1,
                nav:true
            },
            992:{
                items:3,
                nav:true,
                loop:false
            },
            1150:{
                items:4,
                nav:true,
                loop:false
            },
            1300:{
                items:5,
                nav:true,
                loop:false
            },
            1600:{
                items:6,
                nav:true,
                loop:false
            },
        }
    })

    $('#content-gestion').owlCarousel({
        loop:true,
        margin:20,
        nav:true,
        navText : ['<span class="icon-arrow-colors icon-arrow-left-azul"></span>','<span class="icon-arrow-colors icon-arrow-right-azul"></span>'],
        dots:false,
        responsiveClass:true,
        responsive:{
            0:{
                items:1,
                nav:true
            },
            992:{
                items:3,
                nav:true,
                loop:false
            },
            1150:{
                items:4,
                nav:true,
                loop:false
            },
            1300:{
                items:5,
                nav:true,
                loop:false
            },
            1600:{
                items:6,
                nav:true,
                loop:false
            },
        }
    })
    if ( window.innerWidth < 992 ) {
        $('#content-empleos').owlCarousel({
            loop:true,
            margin:10,
            nav:true,
            navText : ['<span class="icon-arrow-colors icon-arrow-left-amarillo"></span>','<span class="icon-arrow-colors icon-arrow-right-amarillo"></span>'],
            dots:false,
            responsiveClass:true,
            responsive:{
                0:{
                    items:1,
                    nav:true
                },
            }
        });
    }
    
    
    if ( window.innerWidth < 992 ) {
        $('#content-telefonos').owlCarousel({
            loop:true,
            margin:10,
            nav:true,
            navText : ['<span class="icon-arrow-colors icon-arrow-left-rojo"></span>','<span class="icon-arrow-colors icon-arrow-right-rojo"></span>'],
            dots:false,
            responsiveClass:true,
            responsive:{
                0:{
                    items:1,
                    nav:true
                },
            }
        });
    }

    if ( window.innerWidth > 992 ) {
        $('#content-empleos-pc').owlCarousel({
            loop:true,
            margin:10,
            nav:true,
            navText : ['<span class="icon-arrow-colors icon-arrow-left-amarillo"></span>','<span class="icon-arrow-colors icon-arrow-right-amarillo"></span>'],
            dots:false,
            responsiveClass:true,
            responsive:{
                0:{
                    items:1,
                    nav:true
                },
            }
        });
    }

    //sliders single post
    $('#single-slider').owlCarousel({
        loop:true,
        margin:50,
        nav:true,
        navText : ['<span class="icon-arrow icon-arrow-left"></span>','<span class="icon-arrow icon-arrow-right"></span>'],
        dots:true,
        responsive:{
            0:{
                items:1
            },
        },
    });


});//on load

/*--------------------------------------------------------------
3.0 PAGINATION
--------------------------------------------------------------*/

//función que busca los post y responde el html que lo append en el contenedor, la función está creada porque la ejecutan varios clics
function loadNewPostPagination ( page, postPerPage, categoria, contenedor ) {
    $.ajax( {
            type: 'POST',
            url: ajaxFileUrl,
            data: {
                function: 'paginationLoop',
                page: page,
                postPerPage: postPerPage,
                categoria: categoria,
            },
            //funcion antes de enviar
            beforeSend: function() {
            },
            success: function ( response ) {
                var newPage = $( '<div id="page'+page+'" class="pages-posts">' + response + '</div>' );
                contenedor.append(newPage);
            },
            error: function ( ) {
                console.log('error');
            },
    });//cierre ajax
}

//función que busca las entradas y responde html para búsquedas
function loadNewPageSearch ( page, postPerPage, busqueda, contenedor ) {
    $.ajax( {
            type: 'POST',
            url: ajaxFileUrl,
            data: {
                function: 'searchLoop',
                page: page,
                postPerPage: postPerPage,
                busqueda: busqueda,
            },
            //funcion antes de enviar
            beforeSend: function() {
            },
            success: function ( response ) {
                console.log(response);
                var newPage = $( '<div id="page'+page+'" class="pages-posts">' + response + '</div>' );
                contenedor.append(newPage);
            },
            error: function ( ) {
                console.log('error');
            },
    });//cierre ajax
}


$(document).ready(function(){
    /*
    VARIABLES QUE NO CAMBIAN
    */

    var pages = $('.page-click-btn');
    //variable para saber cuantas paginas son
    var numberPages = pages.length;
    //la cantidad de paginas que puede mostrar el diseño
    var pageHtml = 8;
    //sabe que cantidad de paginas están fuera de la vista
    outViewPages = numberPages-pageHtml;
    //agrega la clase active al primer item
    $(pages[0]).addClass('active');
    //contenedor de las paginas
    contenedor = $('.posts-content');//modificar luego cuando tenga el template
    //cantidad de numeros por paginas
    postPerPage = $('.pagination-items').attr('data-post-per-page');
    //categoria cargada
    categoria = $('.main-title-page').attr('data-categoria');

    /*
    FUNCIONES AL HACER CLIC
    */

    //clic en los numeros de paginas
    $(document).on('click', '.page-click-btn', function( event ){
        event.preventDefault();
        actualPage = $('.active').attr('href');

        page = $(this).attr('href');
        id = '#page'+page;

        if ( page == actualPage ) {
            //si se hace clic en uno que ya esta cargado, simplemente te lleva a ese lugar
            scrollToID(id);
        } 
        if ( $(id)[0]  == undefined ) {
            //si no está cargado, hay que cargarlo, primero vemos si es una búsqueda
            if ( categoria == 'buscar') {
                var busqueda = $('#busqueda').val();
                loadNewPageSearch( page, postPerPage, busqueda, contenedor );
            } else {
                //sino es una búsqueda, sale el query comun
                loadNewPostPagination( page, postPerPage, categoria, contenedor );    
            }
            
            //además quitamos a todos la clase activate
            $('.active').each(function(){
                $(this).removeClass('active');
            });
            //y le asignamos la clase activate al elemento clickeado
            $(this).addClass('active');
        } else {
            $('.active').each(function(){
                $(this).removeClass('active');
            });
            $(this).addClass('active');
            scrollToID(id);
        }
    });//.click .page.click-btn

    //clic en la flecha derecha de navegación
    $(document).on('click', '.pagination-nav-right', function( event ){

        //ve que pagina está activa
        var active = $('.active');
        actualPage = $(active).attr('href');
        //sumar uno a la pagina activa
        page = parseInt(actualPage) + 1;

        if ( page > numberPages ) {
            return;
        } 
        
        //mover los numeros para ver otras paginas de ser necesario
        if ( window.innerWidth < 768 ) {
            $('.pagination-items li a').css('left', '-=40px');
        } else {
            if ( actualPage != 1 && actualPage != 2 ){      
                $('.pagination-items li a').css('left', '-=40px');
            }
        }
        
        //le paso la clase active al que sigue
        $(active).closest('li').next().find('a').addClass('active');
        $(active).removeClass('active');

        
        //por ultimo, cargamos el contenido
        id = '#page'+page;
        //vemos que no esté cargado el contenido
        if ( $(id)[0]  == undefined ) {
            //sino está cargado se pide, primero, vemos que no sea una busqueda
            if ( categoria == 'buscar') {
                var busqueda = $('#busqueda').val();
                loadNewPageSearch( page, postPerPage, busqueda, contenedor );
            } else {
                //sino es una búsqueda, sale el query comun
                loadNewPostPagination( page, postPerPage, categoria, contenedor );    
            }
        } else {
            //si está cargado no hace falta pedirlo otra vez, simplemente vamos hacia ahí
            scrollToID( id );
        }


        //ocultar la pagina anterior
    });

    //clic en la flecha izquierda de navegación
    $(document).on('click', '.pagination-nav-left', function( event ){
        
        var active = $('.active');
        actualPage = $(active).attr('href');
        //sumar uno a la pagina activa
        page = parseInt(actualPage) - 1;
        
        if ( page == 0 ) {
            return;
        }
        
        //mover los numeros para ver otras paginas de ser necesario
        if ( $('.pagination-items li a').css('left') != '60px' ){      
            $('.pagination-items li a').css('left', '+=40px');
        }
        

        //le paso la clase active al anterior
        $(active).closest('li').prev().find('a').addClass('active');
        $(active).removeClass('active');

        //en este caso no se carga el contenido, porque ya está cargado y oculto, solo hay que mostrarlo
        id = '#page'+page;
        scrollToID( id );
    });

});//.ready()

/*--------------------------------------------------------------
4.0 POPUP PROMO
--------------------------------------------------------------*/

$(window).on('load', function(){

    var popup = $( '.popup' );
    var popupIMG = $( '.popup img' );
    var tiempo = 7000;
    if ( popup.length != 0 ) {
        var closeX = $( '.close-popup' );
        var closeBTN = $( '.cerrar-popup' );
        
        function openPop () {
            popup.addClass('popup-active');
            popupIMG.fadeIn();
        }
        
        setTimeout( openPop, tiempo);
        
        function closePopup() {
            popup.removeClass('popup-active');
            popupIMG.fadeOut(tiempo);
        }

        closeX.click(closePopup);
        closeBTN.click(closePopup);

    }
});

/*--------------------------------------------------------------
5.0 CONTACT FORM
esta función viene heredada del formulario
--------------------------------------------------------------*/

function showBarrio(){
    var localidades = document.getElementById("00N4100000cN5wy");
    var value = localidades.options[localidades.selectedIndex].value;
    if(value=='VICENTE LOPEZ'){
            document.getElementById('00N4100000cN5wt').style = '';
            document.getElementById('textoBarrio').style = '';
            
            console.log('block');
    } else {
            document.getElementById('00N4100000cN5wt').style = 'display:none';
            document.getElementById('textoBarrio').style = 'display:none';
            console.log('none');
    }
}