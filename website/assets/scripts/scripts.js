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
        jQuery('.modal').removeClass('in');
      }
  });
  /* Navigation */
  $('.navigation > ul > li').hover(function() {$(this).parents('.navigation').addClass('in');}, function() {$(this).parents('.navigation').removeClass('in');})
});
