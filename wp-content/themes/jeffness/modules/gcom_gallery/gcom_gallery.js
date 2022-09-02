// Note: Requires flexslider 2
jQuery(document).ready(function($) {

	/********************************
	 SWAP TABS ON GCOM GALLERY PAGE
	*********************************/

	// Put the GET variables into an arrow where we can refer to them with get["x"].
	var get = [];
	location.search.replace('?', '').split('&').forEach(function (val) {
		split = val.split("=", 2);
		get[split[0]] = split[1];
	});
	// See if the gallery variable is set.
	var gallery = get["gallery"];
	if ( typeof gallery !== 'undefined' ) {
		// It is set, so change the active gallery.
		// First strip out the active classes from all the nav buttons.
		$('.gcom-gallery-nav-btn').removeClass("active");
		// Now add the active classes back to the gallery set in the URL.
		var targetNavButton = $('.gcom-gallery-nav-btn[data-gallery-id="'+gallery+'"]');
		// targetNavButton.removeClass("btn-transparent");
		targetNavButton.addClass("active");
		// Now remove the active class from the galleries.
		$('.gcom-gallery-single-wrapper').removeClass('active');
		// And add the active class to the correct gallery.
		var targetGallery = $('#gcom-gallery-' + gallery );
		targetGallery.addClass("active");
	}

	// Handle clicks of the gallery nav button
	$('.gcom-gallery-nav-btn').on("click", function(e){
		e.preventDefault();
		$(this).blur();
		var targetGalleryID = $(this).attr("data-gallery-id");
		// First strip out the active classes from all the nav buttons.
		$('.gcom-gallery-nav-btn').removeClass("active");
		// Add the transparent class to inactive buttons.
		// $('.gcom-gallery-nav-btn').addClass("btn-transparent");
		// Now add the active classes back to the the clicked button.
		$(this).addClass("active");
		// $(this).removeClass("btn-transparent");
		$(this).addClass("active");
		// Now remove the active class from the galleries.
		$('.gcom-gallery-single-wrapper').removeClass('active');
		// And add the active class to the correct gallery.
		var targetGallery = $('#gcom-gallery-' + targetGalleryID );
		targetGallery.addClass("active");
		// Change the URL GET variables to the selected gallery so a user can copy/paste them.
		window.history.pushState(null, null, '?gallery=' + targetGalleryID);
	});

}); /* end of as page load scripts */