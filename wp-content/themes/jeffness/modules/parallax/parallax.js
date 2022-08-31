jQuery(document).ready(function($) {
	// When the page is scrolled, do all the things.
	window.addEventListener("scroll", function() {
		if($(window).width() >= 600){
			$(".parallax-wrapper").each( function() {
				// Detect how far we've scrolled.
				var scrolledHeight = window.pageYOffset,
				limit = this.offsetTop + this.offsetHeight;
				//evaluates to true only when parallax element reaches the top of the viewport and until it is in the viewport.
				// We subtract the browser's viewport height from the first measurement, and add it to the second, so the parallax effect starts as soon as the top of the section comes into the viewport. Otherwise it only starts when the top of the section meets the top of the viewport.
				if ( scrolledHeight > this.offsetTop - document.documentElement.clientHeight && scrolledHeight <= limit + document.documentElement.clientHeight ) {
					this.style.backgroundPositionY = (scrolledHeight - this.offsetTop) /5+ "px";
				} 
				else {
					this.style.backgroundPositionY= "0";
				}
			});
		}
	});

}); /* end of as page load scripts */