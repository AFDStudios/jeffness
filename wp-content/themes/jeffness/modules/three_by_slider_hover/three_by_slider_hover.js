// Note: Requires flexslider 2, buddy.
jQuery(document).ready(function($) {
	/********************************
	 THREE BY SLIDER
	*********************************/
	// store the slider in a local variable
	var $window = $(window),
		flexslider = { vars:{} 
	};

	// tiny helper function to add breakpoints
	// Basically if the screen on resize is less than 600px wide, then the minItems is 1. Otherwise, 3.
	function getGridSize() {
		// return (window.innerWidth < 1200) ? 2 : 3;
		return (window.innerWidth < 900) ? 1 :
           (window.innerWidth < 1200) ? 2 : 3;
	}
	 
	$window.load(function() {
		$('.three-by-slider-hover-content-slider .flexslider').flexslider({
			animation: "slide",
			prevText: "Previous",
			nextText: "Next",
			controlNav: true,
			directionNav: true,
			itemWidth: 400,
			itemMargin: 20,
			minItems: getGridSize(), // use function to pull in initial value
			maxItems: getGridSize() // use function to pull in initial value
		});
	  });
	 
	  // check grid size on resize event
	  $window.resize(function() {
	    var gridSize = getGridSize();
	 
	    flexslider.vars.minItems = gridSize;
	    flexslider.vars.maxItems = gridSize;
	  });

}); /* end of as page load scripts */