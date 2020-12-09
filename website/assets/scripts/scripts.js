$(document).ready(function () {
	//Cookie content management
	/*if (document.cookie.indexOf('cookie-note=1') !== -1) {
		$(".cookiePlaceholder.active").removeClass("active");
		$("iframe").addClass("active");
	}*/

	//Mobile navigation
	/*if (mobile == true) {
		$("header .toggle, header .close").click(function() {
			$("header").toggleClass("active");
		});
	}*/

	/*=================================== Site-specific ===================================*/

	/*Treatments - studio section*/
	$("section.studios .studio").hover(function() {
		$(this).find("h2").addClass("alwaysUnderline");
		$(this).find("img").show();
		$(this).siblings().find("img").hide();
	}, function() {
		$(this).find("h2").removeClass("alwaysUnderline");
	});

	/*Modal dialogue*/
	$('[data-modal-trigger]').on('click', function(e){
	    $('.modal.'+$(this).attr('data-modal-trigger')).addClass('in');
	    e.preventDefault();
	    return false;
	});
	$('body').on('click', function(e) {
	    if (!$(e.originalEvent.target).is('[data-modal-trigger]') && !$(e.originalEvent.target).is('.modal') && !$(e.originalEvent.target).parents('.modal').length) {
	        $('.modal').removeClass('in');
	    }
	});

	/*Navigation*/
	//Set background color depending on current template
	if ($("body").hasClass("shop") || $("body").hasClass("productCategory") || $("body").hasClass("products") ||$("body").hasClass("product")) headerBackgroundcolor = "darkGreenBackground";
	else headerBackgroundcolor = "whiteBackground";

	//Show nested sub-navigation when primary navigation is hovered
	$("header .navigation .primary:not(.shop), header .navigation .secondary").hover(function() {
		//Hide shop sub-navigation, since it is not nested
		if (!$(this).hasClass("shop")) {
			$("header .navigation .secondary.shop").hide();
		}
		
		//Get height of sub-navigation; use fixed height if none exists
		if ($(this).find(".tertiary").length) {
			navigationHeight = $(this).find(".tertiary").outerHeight() + $(document).width()*0.025;
		} else navigationHeight = $(document).width()*0.09;	
		
		//Adjust header height
		$(this).height(navigationHeight);
	}, function() {
		$(this).height("auto");
	});

	$("header .navigation .primary").hover(function() {
		//Adjust colors
		if (headerBackgroundcolor == "darkGreenBackground") $("header .darkGreen").addClass("white").removeClass("darkGreen");
		$("header").addClass(headerBackgroundcolor);
	}, function() {
		if (!$(this).hasClass("shop")) {
			//Adjust colors
			if (headerBackgroundcolor == "darkGreenBackground") $("header .white").addClass("darkGreen").removeClass("white");
			$("header").removeClass(headerBackgroundcolor);
		}
	});



	//Show non-nested shop-subnavigation when primary shop button is hovered
	$("header .navigation .primary.shop").mouseenter(function() {
		//$("header .darkGreen").removeClass("darkGreen").addClass("white");
		$("header .navigation .secondary.shop").show();
	});
	$("header .navigation .subNavigation.shop, header .navigation").mouseleave(function() {
		$("header .navigation .secondary.shop").hide();

		//Adjust colors
		if (headerBackgroundcolor == "darkGreenBackground") $("header .white").addClass("darkGreen").removeClass("white");
		$("header").removeClass(headerBackgroundcolor);
	});

	

	

});
