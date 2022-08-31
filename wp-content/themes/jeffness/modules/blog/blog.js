jQuery(document).ready(function($) {

	// =========================================
	//   CATEGORY DROP DOWN LIST
	// =========================================

	$(function() {
		// New blog_type selection links, the row not the selectric
		$('.blog-archive-category-row a').on('click', function(event) {
			event.preventDefault();
			// Set up our "global" variables to track posts per page and the offset.
			var offset = 0;
			var ppp = 0;
			var cat = $(this).data("cat");
			// We have to get the ID of the currently selected service.
			var service_name = $('.blog-archive-category-wrapper .blog-archive-services-wrapper .selectric-wrapper .selectric .label').text();
			var service_id = $('.blog-archive-category-wrapper .blog-archive-services-wrapper .selectric-wrapper label .selectric-hide-select select option:contains(' + service_name + ')').val();
			// console.log('service_id=' + service_id);
			
			// Load the posts via AJAX.
			$.ajax({
				url: ajaxloadcat.ajaxurl, // The url is set in blog.php.
				type: 'GET',
				data: {
					action: 'blog_ajax_loadmore', // This function is in blog.php.
					offset: offset,
					cat: cat,
					service: service_id,
					get_post_type: 'post'
				},
				success: function( result ) {
					// console.log('Success function launching.');
					$('.blog-archive-wrapper').empty();
					$('.blog-archive-wrapper').append(result).fadeIn();
					$( document.body ).trigger( 'post-load' ); // Trigger post-load after the content has been inserted for AddToAny to get called.
					offset += ppp;
				}
			})
			// Change the active category.
			$('.blog-archive-category-row a').removeClass('active');
			$(this).addClass('active');
		});
		// Initialize the category dropdown
		$('select').selectric({
			responsive: true,
			inheritOriginalWidth: true,
			arrowButtonMarkup: '<i class="far fa-angle-down"></i>',
			disableOnMobile: false,
  			nativeOnMobile: false
		});

		// When an option is selected
		$('select').on('selectric-select', function(event, element, selectric) {
			console.log('selectric clicked, value is ' + element.value);
			// Set up our "global" variables to track posts per page and the offset.
			var offset = 0;
			var ppp = 0;
			var service = element.value;
			var cat = $('.blog-archive-category-row a.active').data("cat");
			
			// Load the posts via AJAX.
			$.ajax({
				url: ajaxloadcat.ajaxurl, // The url is set in blog.php.
				type: 'GET',
				data: {
					action: 'blog_ajax_loadmore', // This function is in blog.php.
					offset: offset,
					cat: cat,
					service: service,
					get_post_type: 'post'
				},
				success: function( result ) {
					// console.log('Success function launching.');
					$('.blog-archive-wrapper').empty();
					$('.blog-archive-wrapper').append(result).fadeIn();
					$( document.body ).trigger( 'post-load' ); // Trigger post-load after the content has been inserted for AddToAny to get called.
					offset += ppp;
					// console.log('From script, service =' + service);
				}
			})
		 });

		//Add a hidden label around the selectric input for accessibility.
		// console.log('selectric fix');
		$(".selectric-input, .selectric-hide-select").wrap("<label style='position: absolute; left: -10000px;' aria-hidden='true'>Hidden Label</label>");
	});

	// =========================================
	//   LOAD MORE POSTS
	// =========================================

	// Set up our "global" variables to track posts per page and the offset.
	var offset = $('.blog-archive-wrapper').find('.hentry').length;
	var ppp = offset;
	
	// console.log('from main.js, get_post_type = ' + get_post_type);
	// console.log('Initial script load, offset=' + offset);
	// The "Load More" button has been clicked.

	$(document).on("click",".blog-load-more a",function(event){
		// Keep the default click button action from taking place.
		event.preventDefault();
		console.log('click');
		// Remove the load more button, as the php will check to see if it's needed and will return a new one in the results if it is.
		$(this).remove();
		// console.log('Load More button clicked.');
		// console.log('From script, offset=' + offset);
		// Set variables
		// Load the posts via AJAX.
		$.ajax({
			url: ajaxloadmore.ajaxurl, // The url is set in blog.php.
			type: 'GET',
			data: {
				action: 'blog_ajax_loadmore', // This function is in blog.php.
				offset: offset,
				// cat: cat,
				get_post_type: 'post'
			},
			success: function( result ) {
				// console.log('Success function launching.');
				$('.blog-archive-wrapper .hentry').last().after(result).fadeIn();
				$( document.body ).trigger( 'post-load' ); // Trigger post-load after the content has been inserted for AddToAny to get called.
				offset += ppp;
				// console.log('From script, offset has been increased, now =' + offset);
			}
		})
	});
}); /* end of as page load scripts */