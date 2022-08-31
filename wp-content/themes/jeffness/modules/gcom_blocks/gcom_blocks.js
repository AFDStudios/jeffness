jQuery(document).ready(function($) {
	// Accordion Shortcode
	var trigger = $('.jsExpander > .js-expander-trigger');
	trigger.on('click', function(){
		var currentAccordion = $(this);
		currentAccordion.children('.expander-content').slideToggle(500);
		currentAccordion.children('.expander-content').toggleClass('content-hidden');
		currentAccordion.toggleClass('expander-hidden');
	});

	// Tabbed content shortcode
	// Set up the navigation buttons.
	$tabList = '<div class="gcom-tab-wrapper">';
	$('.gcom-tab').each( function() {
		$tabList += '<button class="btn btn-tab" data-id="' + $(this).attr('data-id') + '">' + $(this).attr('data-id') + '</button>';
	});
	$('.gcom-tab').not(":eq(0)").css('display', 'none');
	$tabList += '</div>';
	$('.gcom-tab').first().before($tabList);

	$('.btn-tab').first().addClass('active');

	$('.btn-tab').click(function(){
		console.log('clicked');
		$('.btn-tab').removeClass('active');
		$(this).addClass('active');
		$('.gcom-tab').hide();
		$('.gcom-tab[data-id="' + $(this).attr('data-id') + '"]').show();
	});

}); /* end of as page load scripts */