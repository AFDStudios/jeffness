// Note: Requires flexslider 2 buddy.
jQuery(document).ready(function($) {
	$('.testimonial-slider').slick({
		dots: true,
		infinite: true,
		slidesToShow: 2,
		slidesToScroll: 1,
		arrows: true,
		responsive: [
			{
				breakpoint: 1200,
				settings: {
					slidesToShow: 1,
				}
			}
		]
	});

}); /* end of as page load scripts */