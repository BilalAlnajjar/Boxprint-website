/*select the item in Specifications in Business-Card Page*/


$(function(){
    $('.button-opener').click(function()
    {
        document.getElementById("mySidepanel").style.width = "250px";
    });
    $('.closebtn').click(function()
    {
        document.getElementById("mySidepanel").style.width = "0";
    });

});
/**-----------show scrolling To top button---------------------**/
window.onscroll = function() {scrollFunction()};
function scrollFunction() {
    if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
        $('#myBtn').fadeIn();
        $('#topNav').addClass("sticky");
    } else {
        $('#myBtn').fadeOut();
        $('#topNav').removeClass("sticky");
    }
}
// When the user clicks on the button, scroll to the top of the document
$('#myBtn').click(function(){
    $("html, body").animate({ scrollTop: 0 }, 400);
    return false;
});
$('.owl-partners').owlCarousel({
    rtl: true,
    items:4,
    dots:true,
    nav:false,
    margin:10,
    responsive:{
        0:{
            items:2
        },
        991:{
            items:3
        },
        1000:{
            items:4
        },
        1200:{
            items:4
        }
    }
});
var item_count = parseInt($('.owl-partners').find('.slide').length);
if (item_count <= 4) {
    $('.owl-partners').loop = false;
    $('.owl-partners').nav = false;
    $('.owl-partners').owlCarousel('refresh');
}
else {
    $('.owl-partners').loop = true;
    $('.owl-partners').dots = true;
    $('.owl-partners').owlCarousel('refresh');
}
$('.owl-lastest').owlCarousel({
    items: 4,
    dots: false,
    rtl: true,
    margin: 10,
    navText: [
        '<span><i class="fas fa-chevron-left font-16"></i><span>',
        '<span><i class="fas fa-chevron-right font-16"></i></span>'
    ],
    responsive: {
        0: {
            items: 2
        },

        600: {
            items: 2
        },
        1000: {
            items: 3
        },
        1200: {
            items: 4
        }
    }
});
var item_latest_count = parseInt($('.owl-lastest').find('.slide').length);
if (item_latest_count <= 4) {
    $('.owl-lastest').loop = false;
    $('.owl-lastest').owlCarousel('refresh');
}
else {
    $('.owl-lastest').loop = true;
    $('.owl-lastest').dots = true;
    $('.owl-lastest').owlCarousel('refresh');
}
$('.owl-spec-01').owlCarousel({
    loop:true,
    rtl: true,
    items:1,
    dots:true,
    nav:true,
    navText: ["<span><i class='fas fa-chevron-left font-16'></i><span>", " <span><i class='fas fa-chevron-right font-16'></i></span>"]
});
$('.owl-spec-02').owlCarousel({
    loop:true,
    rtl: true,
    items:1,
    dots:true,
    nav:true,
    navText: ["<span><i class='fas fa-chevron-left font-16'></i><span>", " <span><i class='fas fa-chevron-right font-16'></i></span>"]
});
$('.owl-spec-03').owlCarousel({
    loop:true,
    rtl: true,
    items:1,
    dots:true,
    nav:true,
    navText: ["<span><i class='fas fa-chevron-left font-16'></i><span>", " <span><i class='fas fa-chevron-right font-16'></i></span>"]
});
$('.owl-spec-04').owlCarousel({
    loop:true,
    rtl: true,
    items:1,
    dots:true,
    nav:true,
    navText: ["<span><i class='fas fa-chevron-left font-16'></i><span>", " <span><i class='fas fa-chevron-right font-16'></i></span>"]
});
$('.owl-product').owlCarousel({
    loop:true,
    margin:20,
    items:3,
    dots:false,
    rtl:true,
    nav:true,
    lazyLoad: true,
    navText: ["<span><i class='fas fa-chevron-left font-16'></i><span>", " <span><i class='fas fa-chevron-right font-16'></i></span>"]
});


//var item_product_count = parseInt($('.owl-product').find('.slide').length);
//if (item_product_count == 1) {
// $('.owl-product').nav = false;
// $('.owl-product').owlCarousel('refresh');
//}

$('.owl-slider').owlCarousel({
    loop:true,
    rtl: true,
    items:1,
    dots:true
});
$(document).ready(function() {
    $(".scroll").click(function() {
        var x=$(this).find('.nav-item');
        $('.nav-item').removeClass('active');
        var t = $(this).attr("href");

        $("html, body").animate({
            scrollTop: $(t).offset().top - 120
        }, {
            duration: 1e3,
        });
    });


});
