$(document).ready(function(){


    var rtl = false;
    if($("html").attr("lang") == 'ar'){
        rtl = true;
    }

    $('.cIn-remove').click(function(){
        $(this).parent().remove();
    })



    $(".hamburger").click(function(){
        $("body,html").addClass('menu-toggle');
        $(".hamburger").addClass('active');
    });
    $(".m-overlay").click(function(){
        $("body,html").removeClass('menu-toggle');
        $(".hamburger").removeClass('active');
    });
    $(".closed-menu").click(function(){
        $("body,html").removeClass('menu-toggle');
        $(".hamburger").removeClass('active');
    });



    /*Owl Carousel*/


    $("#homeSlider").owlCarousel({
        items: 1,
        loop: true,
        rtl: true,
        margin: 0,
        singleItem:true,
        responsiveClass: true,
        nav: false,
        dots: true,
        smartSpeed: 500,
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
    });

    $("#latest-projects").owlCarousel({
        loop:true,
        rtl: true,
        margin:20,
        singleItem:true,
        responsiveClass:true,
        responsive:{
            0:{
                items:1,
            },
            460:{
                items:1,
            },
            767:{
                items:3,
            },

            992:{
                items:3,
            }

        },
        dots:true,
        nav:false,
        autoplay:true,
    });

    $('#latest-products').owlCarousel({
        loop: true,
        margin: 50,
        rtl: true,
        singleItem:true,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                stagePadding: 30,
                margin: 10
            },
            300: {
                items: 2,

            },
            500: {
                items: 2,

            },
            767: {
                items: 2
            },
            991: {
                items: 3
            },
            1199: {
                items: 4
            }
        },
        dots: true,
        nav: false,
        navText: ['<i class="ti-angle-left"></i>', '<i class="ti-angle-right"></i>'],
        autoplay: true
    });


    $("#client-slider").owlCarousel({
        loop:true,
        margin:20,
        singleItem:true,
        responsiveClass:true,
        responsive:{
            0:{
                items:2,
            },
            460:{
                items:2,
            },
            767:{
                items:3,
            },

            992:{
                items:5,
            }

        },
        dots:true,
        nav:false,
        autoplay:true
    })




})


