/*
 * GCommerce Scripts File
 * Author: GCommerce Solutions
 *
 * This file should contain any scripts you want to add to the site.
 */

jQuery(document).ready(function($) {

	// =========================================
	//	 SECTION ANIMATIONS
	// =========================================

	$(window).on('scroll load', function() {

		$('.fade-in').each(function(i) {
			var objectBottom = $(this).offset().top;
			var windowBottom = $(window).scrollTop() + $(window).height();
			// Retrieve the optional speed parameter so objects can fade in at different speeds
			// The attribute is data-speed, but we use .data so it is retrieved as a number instead of a string.
			var objectSpeed = $(this).data('speed');
			if ( !objectSpeed ) { objectSpeed = 900 }
			// console.log('slide-up objectSpeed=' + objectSpeed + ' and typeOf=' + jQuery.type( objectSpeed ) );
			if ( $(window).width() > 728	&& windowBottom > objectBottom ) {

			$(this).animate({
				'opacity': 1
			}, objectSpeed, "linear");

			}
		});

		$('.slide-up').each(function(i) {
			var objectBottom = $(this).offset().top;
			var windowBottom = $(window).scrollTop() + $(window).height();
			// Retrieve the optional speed parameter so objects can fade in at different speeds
			// The attribute is data-speed, but we use .data so it is retrieved as a number instead of a string.
			var objectSpeed = $(this).data('speed');
			if ( !objectSpeed ) { objectSpeed = 900 }
			// console.log('slide-up objectSpeed=' + objectSpeed + ' and typeOf=' + jQuery.type( objectSpeed ) );
			if ( $(window).width() > 728 && windowBottom > objectBottom) {

			$(this).animate({
				'opacity': 1,
				'top': 0,
			}, objectSpeed, "linear");

			}
		});

		$('.slide-right').each(function(i) {
			$(this).parent().css('overflow', 'hidden');
			var objectBottom = $(this).offset().top;
			var windowBottom = $(window).scrollTop() + $(window).height();
			// Retrieve the optional speed parameter so objects can slide in at different speeds
			var objectSpeed = $(this).data('speed');
			if ( !objectSpeed ) { objectSpeed = 1500 }

			if ($(window).width() > 728 && windowBottom > objectBottom) {
				// console.log('slide-right should be opening');
				$(this).animate({
					'left': 0,
				}, objectSpeed, "linear");
			}

		});
	});

	// =========================================
	//	 ADA COMPLIANT TOP MENU
	// =========================================

	// Open and close sub-menu on click for keyboard accessibility
	var menuItems = $('li.menu-item-has-children');
	$(menuItems).each(function(el,i) {
		$(this).on("click keypress", function(event){
			// Remove the open class from everything but this one so all currently open sub menus get closed.
			$('li.menu-item-has-children').not($(this)).removeClass('open');
			// Set all but this one to unexpanded
			$('li.menu-item-has-children').not($(this)).attr('aria-expanded', "false");
			$(this).toggleClass('open');
			$(this).find('a').on("click keypress",	function(event){
				console.log('item click');
				if ($(this).parent().hasClass("menu-item-has-children")) {
					// The top menu item has been clicked
					// Since we are targeting the anchor, the parent is the li with the relevant class.
					$(this).parent().toggleClass("open");
					$(this).parent().attr('aria-expanded', "true");
					event.preventDefault();
					return false;
				} else {
					// A sub-menu item has been clicked
					$(this).parent().toggleClass("open");
					$(this).parent().attr('aria-expanded', "false");
				}
			});
		});
	});

	// =========================================
	//	 SET HEADER TOP IF ADMIN BAR IS PRESENT
	// =========================================

	$('.logged-in .header').css('top', $('#wpadminbar').outerHeight(true));
	
	// =========================================
	//	 MOBILE MENU
	// =========================================

	$('.sliding-menu-button, .js-menu-trigger-close').on('click touchstart', function(e){
		$('.mobile-menu-wrapper').toggleClass('open');
		// Toggle the open and close mobile menu buttons.
		$('.js-menu-trigger').toggle();
		// Set the site to not scroll while the menu is open.
		$('html, body').toggleClass('no-scroll');
		e.preventDefault();
	});

	// When a mobile menu item that has children is clicked, we toggle open the sub-menu
	$('.sliding-menu-content .menu ul li.menu-item-has-children > a').on('click', function(e){
		e.preventDefault();
		// If this menu was previously open, then remove the open class.
		if ( $(this).parent().hasClass('open') ) {
			$(this).parent().removeClass('open');
		} else {
			// Remove the open class from all the things
			$('.sliding-menu-content .menu ul li').removeClass('open');
			// Now open the clicked item's sub menu
			$(this).siblings('.sub-menu').slideToggle();
			// And add the open class to it to swap out the icon
			$(this).parent().addClass('open');
		}
	});

	// =========================================
	//	 SNAP NAV
	// =========================================
	// Fix header to top on scroll
	if ( $('#wpadminbar').length ) { // There is an admin bar present
		var wpadminBarHeight = $('#wpadminbar').height();
	} else {
		var wpadminBarHeight = 0;
	}
	var navigation = $("header");
	var snapTargetPosition = navigation.height() + wpadminBarHeight;

	function nav() { // Set up a function to fire when the window scrolls
		$(window).scroll(function() { // On scroll ...
			var viewPos = $(window).scrollTop(); // Retrieve the position of the top of the browser window
			if (viewPos > snapTargetPosition) { // If the top of the window is higher than the top of our main nav element ...
				$(navigation).addClass("snapped"); // ... then add snap classes to the container to hold it in place. 
			} else {
				$(navigation).removeClass("snapped"); // The entire nav should be in the viewport
			}
		});
	}

	// Initialize the nav bar scroller so we get everything set up properly.
	nav();

	// Whenever the screen is resized, call the nav function to see if we need to snap.
	$(window).resize(function() {
		nav();
	});

	// =========================================
	//	 SMOOTH SCROLL
	// =========================================
	// to top right away
	if ( window.location.hash ) scroll(0,0);
	// void some browsers issue
	setTimeout( function() { scroll(0,0); }, 1);

	$(function() {

		// Smooth scroll to a named section if the clicked link starts with #
		$('a').on('click', function(e) {
			if ( ($(this).attr('href').charAt(0) == '#') && ( $(this).attr('href').charAt(1) != '' ) ) {
				e.preventDefault();
				$('html, body').animate({
					scrollTop: $($(this).attr('href')).offset().top - 150 + 'px'
				}, 1000, 'swing');
			}
		});

		// *only* if we have anchor on the url
		if(window.location.hash) {

			// smooth scroll to the anchor id
			$('html, body').animate({
				scrollTop: ($(window.location.hash).offset().top - 250) + 'px'
			}, 1000, 'swing');
		}

	});

}); /* end of as page load scripts */