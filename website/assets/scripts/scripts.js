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

  /*Share links*/
  $(".sharelink").click(function() {
    var network = $(this).attr('data-network');
    var link = encodeURI(window.location.href);
    console.log('NW', network, 'url', window.location.href);
    if (network == 'facebook') {
      shareOnFB(link);
    } else if (network == 'twitter') {
      shareOntwitter(link);
    } else if (network == 'linkedin') {
      shareOnLinkedin(link);
    }
  });

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
	/*if ($("body").hasClass("shop") || $("body").hasClass("productCategory") || $("body").hasClass("products") ||$("body").hasClass("product")) headerBackgroundcolor = "darkGreenBackground";
	else headerBackgroundcolor = "whiteBackground";*/

	//Show nested sub-navigation when primary navigation is hovered
	/*$("header .navigation .primary:not(.shop), header .navigation .secondary").hover(function() {*/
	$("header .navigation .primary").hover(function() {
		//Hide shop sub-navigation, since it is not nested
		/*if (!$(this).hasClass("shop")) {
			$("header .navigation .secondary.shop").hide();
		}*/

		//Get height of sub-navigation; use fixed height if none exists
		if ($(this).find(".tertiary").length) {
			navigationHeight = $(this).find(".tertiary").outerHeight() + $(document).width()*0.025;
		} else navigationHeight = "auto";

		//Adjust header height
		$(this).height(navigationHeight);
	}, function() {
		$(this).height("auto");
	});

	/*$("header .navigation .primary").hover(function() {
		//Adjust colors
		if (headerBackgroundcolor == "darkGreenBackground") $("header .darkGreen").addClass("white").removeClass("darkGreen");
		$("header").addClass(headerBackgroundcolor);
	}, function() {
		if (!$(this).hasClass("shop")) {
			//Adjust colors
			if (headerBackgroundcolor == "darkGreenBackground") $("header .white").addClass("darkGreen").removeClass("white");
			$("header").removeClass(headerBackgroundcolor);
		}
	});*/



	//Show non-nested shop-subnavigation when primary shop button is hovered
	/*$("header .navigation .primary.shop").mouseenter(function() {
		//$("header .darkGreen").removeClass("darkGreen").addClass("white");
		$("header .navigation .secondary.shop").show();
	});
	$("header .navigation .subNavigation.shop, header .navigation").mouseleave(function() {
		$("header .navigation .secondary.shop").hide();

		//Adjust colors
		if (headerBackgroundcolor == "darkGreenBackground") $("header .white").addClass("darkGreen").removeClass("white");
		$("header").removeClass(headerBackgroundcolor);
	});*/





});

function shareOnFB(url){
  var url = "https://www.facebook.com/sharer/sharer.php?u="+url+"";
  Facebook = window.open(url, 'Facebook', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');
  return false;
}


function shareOntwitter(url){
  var url = 'https://twitter.com/intent/tweet?url='+url+'';
  TwitterWindow = window.open(url, 'TwitterWindow',width=600,height=300);
  return false;
}

function shareOnLinkedin(url){
  var url = 'https://www.linkedin.com/sharing/share-offsite/?url='+url;
  Linkedin = window.open(url, 'Linkedin',width=600,height=300);
  return false;
}
