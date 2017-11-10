/**
 * File script.js
 *
 * @required jQuery
 * @ver 1.0
 --------------------------------------------------------------
>>> TABLE OF CONTENTS:
1.0 NAVIGATION
2.0 
3.0 
4.0 
--------------------------------------------------------------*/

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


});//on load
