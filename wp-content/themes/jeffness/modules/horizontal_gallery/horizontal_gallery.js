jQuery(document).ready(function($) {
	// =========================================
	//   GALLERY SLIDERS
	// =========================================
	// Requires Flexslider 2.

	$('.galleries-list .flexslider').each(function(index){
		$('.galleries-list .flexslider').eq(index).flexslider({
			animation: "slide",
			controlNav: false,
			customDirectionNav: $('#gallery-' + (index + 1) + ' .custom-navigation a'),
			touch: true,
			itemWidth: 0,
			itemMargin: 0
		});
	});
	$('body').on('click', '.gallery-title', function(e){
		e.preventDefault();
		var gallery = $(this).data('gallery-id');

		$('.gallery-title').removeClass('gal-active');
		$(this).addClass('gal-active');

		$('.slideshow-container').hide();
		$('#' + gallery).show();

		$('#' + gallery + ' .flexslider').resize();
	});
}); /* end of as page load scripts */