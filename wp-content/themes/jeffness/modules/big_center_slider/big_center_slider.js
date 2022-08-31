// Note: Requires flexslider 2, buddy.
jQuery(document).ready(function($) {
	
	$('.big-center-slider-wrapper .flexslider').flexslider({
        animation: "slide",
        prevText: "",
        nextText: "",
        itemMargin: 125,
        itemWidth: 847,
        controlNav: true,
        directionNav: false,
        animationSpeed: 600,
        animationLoop: true,
        startAt: 1,
        slideshow: true,
        start: function(slider){
            slider.play;
        }
    });

}); /* end of as page load scripts */