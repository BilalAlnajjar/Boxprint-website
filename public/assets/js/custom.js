(function($) {
	"use strict";

	//Color-Theme
	$(document).on("click", "a[data-theme]", function() {
		$("head link#theme").attr("href", $(this).data("theme"));
		$(this).toggleClass('active').siblings().removeClass('active');
	});

	// $('.card-taps').on('click', function () {
	// 	window.location.href = $(this).data('link');
	// });

	// $('#upload-passport').on('click', function () {
	// 	$('#up-click').click();
	// });

	// $('.click-add').on('click', function (x) {
	// 	x.preventDefault;
	// 	$('#' + $(this).data('box')).fadeIn();
	// 	$("#button").click(function() {
	// 		$([document.documentElement, document.body]).animate({
	// 			scrollTop: $('#' + $(this).data('box')).offset().top
	// 		}, 2000);
	// 	});
	// });

	$('.click-close').click(function () {
		// escape here if the confirm is false;
		if (!confirm('Are you sure?')) return false;
		var btn = this;
		setTimeout(function () { $(btn).attr('disabled', 'disabled'); }, 1);
		return true;
	});

	var maxField = 10; //Input fields increment limitation
          var addButton = $('.add_button'); //Add button selector
          var wrapper = $('.field_wrapper'); //Input field wrapper
          var fieldHTML = '<div class="col-md-12"><div class="form-group multi-input"><input type="text" class="form-control" name="field_name[]" value=""/><a href="javascript:void(0);" class="remove_button"><i class="fe fe-x-circle"></i></a></div></div>'; //New input field html
          var x = 1; //Initial field counter is 1
          //Once add button is clicked
          $(addButton).click(function(){
            //Check maximum number of input fields
            if(x < maxField){
              x++; //Increment field counter
              $(this).parent(wrapper).after(fieldHTML); //Add field html
            }
          });
          //Once remove button is clicked
          $(wrapper).on('click', '.remove_button', function(e){
            e.preventDefault();
            $(this).parent('div').remove(); //Remove field html
            x--; //Decrement field counter
          });
	
	// ______________Full screen
	$(document).on("click", ".fullscreen-button", function toggleFullScreen() {
		if ((document.fullScreenElement !== undefined && document.fullScreenElement === null) || (document.msFullscreenElement !== undefined && document.msFullscreenElement === null) || (document.mozFullScreen !== undefined && !document.mozFullScreen) || (document.webkitIsFullScreen !== undefined && !document.webkitIsFullScreen)) {
			if (document.documentElement.requestFullScreen) {
				document.documentElement.requestFullScreen();
			} else if (document.documentElement.mozRequestFullScreen) {
				document.documentElement.mozRequestFullScreen();
			} else if (document.documentElement.webkitRequestFullScreen) {
				document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
			} else if (document.documentElement.msRequestFullscreen) {
				document.documentElement.msRequestFullscreen();
			}
		} else {
			if (document.cancelFullScreen) {
				document.cancelFullScreen();
			} else if (document.mozCancelFullScreen) {
				document.mozCancelFullScreen();
			} else if (document.webkitCancelFullScreen) {
				document.webkitCancelFullScreen();
			} else if (document.msExitFullscreen) {
				document.msExitFullscreen();
			}
		}
	})
	
	// ______________ PAGE LOADING
	$(window).on("load", function(e) {
		$("#global-loader").fadeOut("slow");
	})
	
	// ______________ BACK TO TOP BUTTON
	$(window).on("scroll", function(e) {
		if ($(this).scrollTop() > 0) {
			$('#back-to-top').fadeIn('slow');
		} else {
			$('#back-to-top').fadeOut('slow');
		}
	});
	$(document).on("click", "#back-to-top", function(e) {
		$("html, body").animate({
			scrollTop: 0
		}, 600);
		return false;
	});
	
	
	// ______________ COVER IMAGE
	$(".cover-image").each(function() {
		var attr = $(this).attr('data-image-src');
		if (typeof attr !== typeof undefined && attr !== false) {
			$(this).css('background', 'url(' + attr + ') center center');
		}
	});
	
	// ______________ RATING STAR
	var ratingOptions = {
		selectors: {
			starsSelector: '.rating-stars',
			starSelector: '.rating-star',
			starActiveClass: 'is--active',
			starHoverClass: 'is--hover',
			starNoHoverClass: 'is--no-hover',
			targetFormElementSelector: '.rating-value'
		}
	};
	$(".rating-stars").ratingStars(ratingOptions);
	
	// ______________ mCustomScrollbar
	$(".vscroll").mCustomScrollbar();
	$(".app-sidebar").mCustomScrollbar({
		theme:"minimal",
		autoHideScrollbar: true,
		scrollbarPosition: "outside"
	});
	$(".sidebar-right1").mCustomScrollbar({
		theme:"minimal",
		autoHideScrollbar: true,
		scrollbarPosition: "outside"
	});
	
	$(".sidebar-right").mCustomScrollbar({
		theme:"minimal",
		autoHideScrollbar: true,
		scrollbarPosition: "outside"
	});
	
	$(".notifications-menu").mCustomScrollbar({
		theme:"minimal",
		autoHideScrollbar: true,
		scrollbarPosition: "outside"
	});
	$(".message-menu").mCustomScrollbar({
		theme:"minimal",
		autoHideScrollbar: true,
		scrollbarPosition: "outside"
	});
	$(".highlight").mCustomScrollbar({
		theme:"minimal",
		autoHideScrollbar: true,
		scrollbarPosition: "outside"
	});
	
	// ______________Chart-circle
	if ($('.chart-circle').length) {
		$('.chart-circle').each(function() {
			let $this = $(this);
			$this.circleProgress({
				fill: {
					color: $this.attr('data-color')
				},
				size: $this.height(),
				startAngle: -Math.PI / 4 * 2,
				emptyFill: 'rgba(119, 119, 142, 0.2)',
				lineCap: 'round'
			});
		});
	}

	// ______________ CARD
	const DIV_CARD = 'div.card';
	
	// ______________ TOOLTIP
	$('[data-toggle="tooltip"]').tooltip();
	
	// ______________ POPOVER
	$('[data-toggle="popover"]').popover({
		html: true
	});
	
	// ______________ FUNCTION FOR REMOVE CARD
	$(document).on('click', '[data-toggle="card-remove"]', function(e) {
		let $card = $(this).closest(DIV_CARD);
		$card.remove();
		e.preventDefault();
		return false;
	});
	
	
	// ______________ FUNCTIONS FOR COLLAPSED CARD
	$(document).on('click', '[data-toggle="card-collapse"]', function(e) {
		let $card = $(this).closest(DIV_CARD);
		$card.toggleClass('card-collapsed');
		e.preventDefault();
		return false;
	});
	
	// ______________ CARD FULL SCREEN
	$(document).on('click', '[data-toggle="card-fullscreen"]', function(e) {
		let $card = $(this).closest(DIV_CARD);
		$card.toggleClass('card-fullscreen').removeClass('card-collapsed');
		e.preventDefault();
		return false;
	});
	
	// ______________Active Class
	$(".app-sidebar a").each(function() {
	  var pageUrl = window.location.href.split(/[?#]/)[0];
		if (this.href == pageUrl) { 
			$(this).addClass("active");
			$(this).parent().addClass("active"); // add active to li of the current link
			$(this).parent().parent().prev().addClass("active"); // add active class to an anchor
			$(this).parent().parent().prev().click(); // click the item to make it drop
		}
	});
	
	// ______________ Styles ______________//
	
	
	//$('body').addClass('transparent-mode');//
	
	//$('body').addClass('sidemenu-bgimage');//
	
	//$('body').addClass('color-menu');//
	
	//$('body').addClass('light-menu');//
	
	//$('body').addClass('dark-menu');//
	
	//$('body').addClass('gradient-menu');//
	
	//$('body').addClass('light-hor-header');//
	
	//$('body').addClass('color-hor-header');//
	
	//$('body').addClass('gradient-hor-header');//
	
	//$('body').addClass('color-hor-menu');//
	
	//$('body').addClass('light-hor-menu');//
	
	//$('body').addClass('gradient-hor-menu');//
	
	//$('body').addClass('dark-hor-menu');//
	
})(jQuery);
