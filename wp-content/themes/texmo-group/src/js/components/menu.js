jQuery(document).ready(function($) {

	// Primary nav
	var $menuBtn = $(".global-header--nav-btn");
	var $menuContainer = $(".global-header--nav__mobile");
	$menuBtn.click(function() {
		$(this).toggleClass("is-active");
		$("body").toggleClass("menu-active");
		$(".global-header").toggleClass("global-header-active");
		$menuContainer.toggleClass("is-active");
	});

	$(window).on("scroll", function() {
		if($(window).scrollTop() > 80) {
			$("header").addClass("global-header-active");
		} else {
			//remove the background property so it comes transparent again (defined in your css)
			$("header").removeClass("global-header-active");
		}
	});

});

// jQuery(document).ready(function($) {
// // Hide Header on on scroll down
// var didScroll;
// var lastScrollTop = 0;
// var delta = 5;
// var navbarHeight = $('header').outerHeight();

// $(window).scroll(function(event){
//     didScroll = true;
// });

// setInterval(function() {
//     if (didScroll) {
//         hasScrolled();
//         didScroll = false;
//     }
// }, 250);

// function hasScrolled() {
//     var st = $(this).scrollTop();
    
//     // Make sure they scroll more than delta
//     if(Math.abs(lastScrollTop - st) <= delta)
//         return;
    
//     // If they scrolled down and are past the navbar, add class .nav-up.
//     // This is necessary so you never see what is "behind" the navbar.
//     if (st > lastScrollTop && st > navbarHeight){
//         // Scroll Down
//         $('header').removeClass('nav-down').addClass('global-header__hide');
//     } else {
//         // Scroll Up
//         if(st + $(window).height() < $(document).height()) {
//             $('header').removeClass('global-header__hide').addClass('nav-down');
//         }
//     }
    
//     lastScrollTop = st;
// }

// });