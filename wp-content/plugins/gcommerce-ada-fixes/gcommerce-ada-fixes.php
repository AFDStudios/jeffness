<?php
   /*
   Plugin Name: GCommerce ADA Fixes
   Plugin URI: http://gcommercesolutions.com
   Description: A plugin to centralize fixes related to ADA compliance
   Version: 1.3.2
   Author: GCommerce Solutions
   License: GPL2
   Version History:
    1.3.2   08/11/2020  ARIA role for toolbar buttons changed from "menuitem" to "button"
    1.3.1   11/08/2018  Added Optanon / One Trust codes to asynchronous section
    1.3     11/06/2018  Moved execution for several asynchronously loaded plugins to the onDOMInsert section
    1.2.2   10/22/2018  Errant sgcboxPrevious line removed.
    1.2.1   09/11/2018  Adding aria-abels to Popup Platinum plugin buttons, remove was not working
    1.2     05/08/2018  Major bug fix -- it was replacing all image alt tags with "Image Placeholder".
    1.1.13  05/08/2018  Line 133 throwing jQuery errors and breaking the plugin. Moved Slick Slider to same function as it was loading too late.
    1.1.12  04/24/2018  Fixed the issue of loading jquery before the ready google maps by adding an event.
    1.1.12  04/20/2018  Added functionality to fix ada for ready google maps
    1.1.11  04/19/2018  Added support for jquery colorbox
    1.1.10  04/06/2018  Updated Enable Accessibility Plugin fixes.
    1.1.9   03/27/2018  Error checking based on src attribute being unknown or undefined.
    1.1.8   03/26/2018  Fixing empty anchor tags.
    1.1.7   03/01/2018  Google Map area error fix.
    1.1.5   02/09/2018  Support for Glide slider buttons, labels and roles.
    1.1.4   02/09/2018  Remove Popup Platinum next/previous buttons if they're display:none.
    1.1.3   02/09/2018  Replacing complex Gravity Form fields labels with spans. Added commenting, regrouped some elements.
    1.1.2   01/04/2018  Fixed some errors by WP Bakery front-end editor for Hotel Figueroa.
    1.1.1   12/08/2017  Gravity Forms submit buttons without text
    1.1     12/08/2017  Updated Easy Accessibility plugin verbiage. Initial round of testing complete.
    1.0.9   12/06/2017  Added warning to Easy Accessibility plugin that you an only see Hebrew in IE.
    1.0.8   12/05/2017  Lightbox next and previous button labels.
    1.0.7   12/05/2017  Social media labels not related to Font Awesome.
    1.0.6   12/04/2017  Added title tags to textarea boxes Gravity Forms sometimes leaves out.
    1.0.5   12/04/2017  Stripping empty <th> tags Gravity Forms sometimes adds.
    1.0.4   12/04/2017  Added title tags to all input boxes that lack them to deal with Gravity Forms on sites where placeholders are used instead of labels
    1.0.3   12/04/2017  Added title tags to all select inputs that lack them to deal with Gravity Forms on sites where placeholders are used instead of labels
    1.0.2   11/30/2017: Support for errors on SurfAndSand.com, Scrippsinn.com, and TemeculaCreekInn.com including Slick slider, WordFence in the Hebrew Wave tool, custom social sprites, etc.
    1.0.1   11/30/2017: Commented out console.log
    1.0     Initial release
   */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

// Don't run when in the admin
if ( ! is_admin() ) {

  add_action('wp_enqueue_scripts','gcommerce_ada_init');

  // jQuery script to add ADA compliance to various third party plugins
	function gcommerce_ada_init() {
	    wp_enqueue_script( 'gcommerce-ada-fixes', plugins_url( 'public/js/gcommerce-ada-fixes.js', __FILE__ ), array( 'jquery' ));
	}

	// Adds ability to make a field label hidden but still available to screen readers for ADA compliance
	add_filter( 'gform_enable_field_label_visibility_settings', '__return_true' );

}