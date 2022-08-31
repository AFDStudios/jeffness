jQuery(document).ready(function($) {	
	// Accordion Shortcode
	var trigger = $('.gcom-faq-wrapper.accordion-open article .gcom-faq-single-wrapper, .gcom-faq-wrapper.accordion-closed article .gcom-faq-single-wrapper');
	trigger.on('click', function(){
		var currentAccordion = $(this);
		currentAccordion.children('.gcom-faq-answer').slideToggle(500);
		currentAccordion.children('.gcom-faq-answer').toggleClass('content-hidden');
		currentAccordion.find('.gcom-faq-toggle').toggle();
	});
}); /* end of as page load scripts */