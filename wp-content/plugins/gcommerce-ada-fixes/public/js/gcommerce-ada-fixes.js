jQuery(window).on('load', function () {

  // var t0 = performance.now();

  /**********************************
    GENERAL 
  ***********************************/
  // Add alt tag to any image missing it
  var $image = jQuery('img');

  $image.each(function() {
    // First figure out of the alt tag is missing or empty.
    if ( jQuery(this).attr('alt') == '' || !(jQuery(this).attr('alt')) )  {
      // The tag is empty or not present, now let's figure out what to do with it.
      if ( jQuery(this).attr('src') !== undefined && jQuery(this).attr('src') !== '' )  {
        // Since we don't have a good alt tag, let's get the name of the file from the img's src
        var imgName = jQuery(this).attr('src');
        // Get the position of the last slash in the src url
        var index = imgName.lastIndexOf("/") + 1;
        // get just the file name itself, stripping out the rest of the url
        var filename = imgName.substr(index);
        // Strip off the extension
        filename = filename.substr(0, filename.length-4);
        // Apply the file name to the alt tag
        jQuery(this).attr('alt', filename );
      } else {
        jQuery(this).attr('alt', 'Image Placeholder');
      }
    }
  });

  // Focus styles for menus when using keyboard navigation
  // Properly update the ARIA states on focus (keyboard) and mouse over events
  jQuery( '[role="menubar"]' ).on( 'focus.aria  mouseenter.aria', '[aria-haspopup="true"]', function ( ev ) {
    jQuery( ev.currentTarget ).attr( 'aria-expanded', true );
  } );

  // Properly update the ARIA states on blur (keyboard) and mouse out events
  jQuery( '[role="menubar"]' ).on( 'blur.aria  mouseleave.aria', '[aria-haspopup="true"]', function ( ev ) {
    jQuery( ev.currentTarget ).attr( 'aria-expanded', false );
  } );

  // Generic next and previous links
  jQuery(".next-link a").attr('aria-label', 'next room');
  jQuery(".prev-link a").attr('aria-label', 'previous room');

  // datepicker fixes
  jQuery(".calendar").attr('aria-label', 'Pick a date');

  // Remove all empty headings (h1, h2, etc.)
  jQuery(':header:empty').remove();

  // Remove all empty labels
  jQuery('label:empty').remove();

  // Add an aria-label to empty anchor tags.
  jQuery('a:empty').attr('aria-label', 'Navigation Link');

  jQuery("#fancybox-left").attr('aria-label', 'left');
  jQuery("#fancybox-right").attr('aria-label', 'right');

  /**********************************
    ENABLE ACCESSIBILITY PLUGIN
  ***********************************/
  // Irony, thy name is Hebrew accessibility tool fix. We load this here because the script wasn't done loading yet when put earlier, it requires the on.load event.
  jQuery(".tr-trigger").attr('role', 'button');
  jQuery(".tr-trigger").attr('aria-label', 'Enable Language');
  jQuery(".tr-trigger").attr('title', 'Enable Language');
  jQuery(".tr-trigger-active").attr('role', 'button');
  jQuery(".tr-trigger-active").attr('aria-label', 'Enable Language');
  jQuery(".tr-trigger-active").attr('title', 'Enable Language');
  jQuery("#enable-toolbar-buttons li").attr('role', 'button');
  jQuery("#enable-logo").parent().attr('aria-label', 'Enable Toolbar Home');
  jQuery(".enable-toolbar-links-section a").attr('aria-label', 'Enable Toolbar Links');
  jQuery("#wfboxPrevious").attr('aria-label', 'Previous');
  jQuery("#wfboxNext").attr('aria-label', 'Next');
  jQuery("#wfboxSlideshow").attr('aria-label', 'Slideshow');

  //this adds aria-label whenever a node or element changes after page load
  jQuery('.fusion-widget-area').on('change DOMNodeInserted DOMNodeInserted', function(){
    jQuery('.swipebox_grid.fancybox.image').attr('aria-label', 'instagram image');
  });

  // Add warning to accessibility tool for IE users.
  jQuery("#enable-toolbar-content").prepend('<div style="color: white; padding-left: 10px;">This tool will only display in Hebrew in Internet Explorer. In order to see English, please switch to an alternate browser like Chrome or Firefox.</div>');

  /**********************************
    FANCYBOX
  ***********************************/
  // Add alt tag to any image missing it
  var $fancylink = jQuery('.fancybox:empty');

  $fancylink.each(function() {
    // If there's no aria-label already, then let's add one.
    if ( ! (jQuery(this).attr('aria-label')))  {
      // Fancybox adds a caption to images, so let's use that as our aria-label. First set the variable.
      var linkName = jQuery(this).attr('caption');
      // Now let's put the caption in as the aria-label.
      jQuery(this).attr('aria-label', linkName );
    }
  });

  /**********************************
    POPUP PLATINUM PLUGIN
  ***********************************/
  jQuery("#sgcboxPrevious, #sgcboxNext, #sgcboxSlideshow").attr('role', 'Slideshow');
  jQuery("#sgcboxPrevious").attr('aria-label', 'Previous');
  jQuery("#sgcboxNext").attr('aria-label', 'Next');
  jQuery("#sgcboxSlideshow").attr('aria-label', 'Slideshow');
  jQuery("#sgcboxPrevious, #sgcboxNext, #sgcboxSlideshow").each(function() {
    if ( ! (jQuery(this).css('display') == 'none'))  {
      jQuery(this).remove();
    }
  });

  /**********************************
    GLIDE SLIDER
  ***********************************/
  jQuery("button.rest-submit, button.glide__bullet, button.glide__arrow").attr('role', 'button');
  jQuery("button.rest-submit, button.glide__bullet, .glide__arrow.next").attr('aria-label', 'next slide');
  jQuery(".glide__arrow.prev").attr('aria-label', 'previous slide');

  /**********************************
    FLEXSLIDER
  ***********************************/
  jQuery(".flex-next, .flex-prev").attr('role', 'button');
  jQuery(".flex-next").attr('aria-label', 'next slide');
  jQuery(".flex-prev").attr('aria-label', 'previous slide');

  /**********************************
    GOOGLE MAPS
  ***********************************/
  // Google Maps images
  jQuery(".gmnoprint img").attr('alt', 'Google Maps icon'); 

  jQuery(".gmpSearchBar input").attr('title', 'Google Maps Control');
  jQuery("#gmpCmcSearchFormPrev_1 input").attr('title', 'Google Maps Search');
  jQuery(".gm-err-icon img").attr('alt', 'Google Maps Error');
  jQuery(".gmpCmcCattsShell .list-group-item input").attr('title', 'Google Maps Tab');
  jQuery(".gmpSliderTitleDescShell a").attr('aria-label', 'Open Marker in Google Map');
  jQuery(".gmpCmcSearchFormShell form input.gmpCmcSearchText").attr('title', 'Google Maps Search');
  jQuery(".gmpCmcSearchFormShell form input.gmpSearchRadius").attr('title', 'Google Maps Search Radius');

  // Confusing "image map area missing alternative text" result
  jQuery(".gmnoprint map area").attr('alt', 'Google Map Area');

  // ready google maps button missing aria-label attribute

  jQuery(document).on('DOMNodeInserted', function(e) {
    jQuery( "#mCSB_1_container .list-group-item" ).each(function( index ) {
        var n = index; 
        console.log(n);
        var selector1 = '#mCSB_1_container ul li:nth-child(' + (n + 1) + ') label span.button-checkbox.bootstrap-checkbox button';
        var selector2 = '#mCSB_1_container ul li:nth-child(' + (n + 1) + ') label span.label-checkbox';
      jQuery(selector1).attr('aria-label', jQuery(selector2).text()); 
    });
    /**********************************
      SLICK SLIDER
    ***********************************/
    // Slick slider
    jQuery('.slick-slide').removeAttr('aria-describedby'); // The plugin was entering incorrect aria data

    /**********************************
      OPTANON
    ***********************************/
    jQuery('.optanon-close-link').attr('aria-label', 'Close Optanon Notice');
    jQuery('#optanon-popup-bottom a').attr('aria-label', 'Optanon Logo');

    jQuery('.vendor-header-container h3:empty').remove();
  });

  /**********************************
    INSTAGRAM PRO
  ***********************************/
  jQuery(".sbi_instagram_link").attr('role', 'button');
  jQuery(".sbi_instagram_link").attr('aria-label', 'Open Instagram Feed');
  jQuery(".sbi_lb-next").attr('aria-label', 'next');
  jQuery(".sbi_lb-prev").attr('aria-label', 'previous');
  jQuery(".sbi_link_area").attr('aria-label', 'Open this image in a lightbox');
  jQuery("#sbi_linkedin_icon").attr('aria-label', 'Linked In');
  jQuery("#sbi_email_icon").attr('aria-label', 'Email');
  jQuery("#sbi_pinterest_icon").attr('aria-label', 'Pinterest');
  jQuery("#sbi_google_icon").attr('aria-label', 'Google');
  jQuery("#sbi_twitter_icon").attr('aria-label', 'Twitter');
  jQuery("#sbi_facebook_icon").attr('aria-label', 'Facebook');

  /**********************************
    FACEBOOK FEED
  ***********************************/
  jQuery(".cff-item a").attr('aria-label', 'View on Facebook');
  jQuery(".cff-link img").attr('alt', 'Facebook Image');
  jQuery(".cff-link a.cff-link img").attr('alt', 'Facebook Image');
  jQuery(".cff-lightbox-next").attr('aria-label', 'next image');
  jQuery(".cff-lightbox-prev").attr('aria-label', 'previous image');

  /**********************************
    FONT AWESOME / GENERAL SOCIAL ICONS
  ***********************************/
  jQuery(".fa-facebook, .sprite--facebook").parent().attr('aria-label', 'Facebook');
  jQuery(".fa-twitter, .sprite--twitter").parent().attr('aria-label', 'Twitter');
  jQuery(".fa-instagram, .sprite--instagram").parent().attr('aria-label', 'Instagram');
  jQuery(".fa-tripadvisor, .sprite--tripadvisor").parent().attr('aria-label', 'Trip Advisor');
  jQuery(".fa-pinterest, .fa-pinterest-p, .sprite--pinterest").parent().attr('aria-label', 'Pinterest');
  jQuery(".fa-linkedin, .sprite--linkedin").parent().attr('aria-label', 'LinkedIn');
  jQuery(".fa-google-plus, .sprite--googleplus").parent().attr('aria-label', 'Google Plus');
  jQuery(".fa-rss").parent().attr('aria-label', 'RSS Feed');
  jQuery(".fa-phone").parent().attr('aria-label', 'Call Us');
  jQuery(".fa-paw").parent().attr('aria-label', 'About Pets');
  jQuery(".fa-video-camera").parent().attr('aria-label', 'View Webcam');
  jQuery(".fa-youtube, .sprite--youtube ").parent().attr('aria-label', 'YouTube');

  jQuery(".facebook").attr('aria-label', 'Facebook');
  jQuery(".twitter").attr('aria-label', 'Twitter');
  jQuery(".instagram").attr('aria-label', 'Instagram');
  jQuery(".pinterest").attr('aria-label', 'Pinterest');

  /**********************************
    GRAVITY FORMS
  ***********************************/
  //While some of these have more broad applications, they are generally associated with Gravity Forms

  // When GF adds complex fields (like the Name field, that adds first name, last name, prefix, etc. all in one field group, or date fields), it adds a label for the entire group that references the ID of the first element in the group, throwing "Multiple form label" errors. This function finds those and replaces the wrapping LABEL with a wrapping SPAN instead.
  jQuery(".gfield_label_before_complex").each(function() {
    jQuery(this).replaceWith("<span class='gfield_label gfield_label_before_complex'>" + jQuery(this).text() + "</span>");
  });
  
  // Add title tag to any select element missing one (helps resolve Gravity Forms issues on sites where we use placeholders instead of labels)
  var $selectBox = jQuery('select');
  $selectBox.each(function() {
    if ( ! (jQuery(this).attr('title')))  {
      jQuery(this).attr('title', 'Gravity Forms Select Box' );
    }
  });

  // Remove empty table heads (Gravity Forms throws these sometimes) or those with just &nbsp;
  var $formHeaders = jQuery('th');
  $formHeaders.each(function() {
    if ( (jQuery(this).html() == '&nbsp;') || (jQuery(this).html() == '') )  {
      jQuery(this).remove();
    }
  });

  // Gravity forms submit buttons that don't have text need an aria-label
  jQuery(".gform_submit_button").attr('aria-label', 'Submit'); 

  // Add title tag to any input element missing one (helps resolve Gravity Forms issues on sites where we use placeholders instead of labels)
  var $inputField = jQuery('input');
  $inputField.each(function() {
    if ( ! (jQuery(this).attr('title')))  {
      jQuery(this).attr('title', 'Form Input Box' );
    }
  });

  // Add title tag to any textarea element missing one (helps resolve Gravity Forms issues on sites where we use placeholders instead of labels)
  var $textBox = jQuery('textarea');
  $textBox.each(function() {
    if ( ! (jQuery(this).attr('title')))  {
      jQuery(this).attr('title', 'Gravity Forms Select Box' );
    }
  });
  /**********************************
    jQuery Colorbox
  ***********************************/
  jQuery('#cboxNext').attr('aria-label', 'Next item');
  jQuery('#cboxPrevious').attr('aria-label', 'Previous item');
  jQuery('#cboxSlideshow').attr('aria-label', 'Navigation Control');

  /**********************************
    SITE SPECIFIC FIXES
  ***********************************/

  jQuery(".logo a").attr('aria-label', 'Home'); // SSR
  jQuery(".sliding-menu-button").attr('role', 'button'); // SSR
  jQuery(".sliding-menu-button").attr('aria-label', 'button'); // SSR
  jQuery("p.subtitle a").attr('aria-label', 'Learn more about this special'); // SSR Special slider in footer
  jQuery("#requestType").attr('title', 'Select special type'); // SSR Booking Widget
  jQuery("#codebox").attr('title', 'Enter special code'); // SSR Booking Widget
  jQuery(".select2-offscreen").attr('aria-label', 'Form control'); // SSR Booking Widget
  jQuery(".select2-offscreen").attr('title', 'Form control'); // SSR Booking Widget
  jQuery("#select2_autogen3_search").attr('title', 'Search box'); // SSR Booking Widget
  jQuery("#s2id_autogen3_search").attr('title', 'Search box'); // SSR Booking Widget

  jQuery('.select-container #location').attr('aria-label', 'Choose a location');

  // Hotel Figueroa
  jQuery(".uk-offcanvas-close").attr('aria-label', 'Close');
  jQuery(".uk-navbar-toggle").attr('aria-label', 'Toggle Menu');
  jQuery(".wk-slidenav-previous").attr('aria-label', 'Previous');
  jQuery(".wk-slidenav-next").attr('aria-label', 'Next');
  jQuery("a[uk-icon='icon: instagram']").attr('aria-label', 'Instagram');
  jQuery("a[uk-icon='icon: facebook']").attr('aria-label', 'Facebook');
  jQuery("a[uk-icon='icon: twitter']").attr('aria-label', 'Twitter');
  jQuery("a[uk-icon='icon: google-plus']").attr('aria-label', 'Google+');
  jQuery("a.uk-position-cover").html('This is a clickable overlay.');
  jQuery("a.uk-position-cover").css('opacity', 0);
  jQuery("a.wk-position-cover").html('This is a clickable overlay.');
  jQuery("a.wk-position-cover").css('opacity', 0);

  // Madrona -- MenuModo widget as an empty navigation link
  jQuery('go-top').attr('aria-label', 'Go to the top of the page');
  
  // Ninja Forms honeypot error on PelicanInn.com
  jQuery('.nf-form-hp').remove();
  jQuery('.component-gallery-slideshow__left').attr('aria-label', 'Previous Slide');
  jQuery('.component-gallery-slideshow__right').attr('aria-label', 'Next Slide');
  jQuery('.component-gallery-slideshow__close').attr('aria-label', 'Close');


  // var t1 = performance.now();
  // console.log("Correcting common ADA mistakes took " + (t1 - t0) + " milliseconds.")    

})