<?php
/*
Author: GCommerce Solutions
URL: http://gcommercesolutions.com/
*/

@ini_set( 'upload_max_size' , '64M' );
@ini_set( 'post_max_size', '64M');
@ini_set( 'max_execution_time', '300' );

define('THEME_NAME', wp_get_theme() );
define('THEME_TD', THEME_NAME . '_textdomain');

// =========================================
// CUSTOM POST TYPE SETUP
// =========================================
include_once( 'settings/custom-post-type.php' );

// =========================================
//	SET UP THEME OPTIONS
// =========================================
include_once( 'settings/theme-options.php' );

// =========================================
//	THEME IMAGE THUMBNAIL SIZES
// =========================================
add_theme_support( 'post-thumbnails' );

function theme_custom_image_sizes( $sizes ) 
	{
		return array_merge( $sizes, array(
				// THEME_NAME . '-footer-bg' => __('1350px by 456px'),
		) );
	}

add_filter( 'image_size_names_choose', 'theme_custom_image_sizes' );


// =========================================
//	REGISTER THEME MENUS
// =========================================
function stile_register_menus() 
	{
		register_nav_menus(
			array(
				'primary-header-menu' => __( 'Primary Header Menu' ),
				'mobile-menu' => __( 'Mobile Menu' ),
				'footer-menu' => __( 'Footer Menu' )
			)
		);
	}

add_action( 'init', 'stile_register_menus' );

// =========================================
//	ADA COMPLIANT MENUS
// =========================================

/**
 * WAI-ARIA Navigation Menu template functions
 * @see wp-includes/nav-menu-template.php
 */

/**
 * Create HTML list of nav menu items.
 *
 * @since 1.0.0
 * @uses Walker
 * @uses Walker_Nav_Menu
 */
class Aria_Walker_Nav_Menu extends Walker_Nav_Menu {
	/**
	 * Start the element output.
	 *
	 * @see Walker_Nav_Menu::start_el() for parameters and longer explanation
	 */
	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;

		/**
		 * Filter the arguments for a single nav menu item.
		 *
		 * @since 4.4.0
		 *
		 * @param array  $args  An array of arguments.
		 * @param object $item  Menu item data object.
		 * @param int	$depth Depth of menu item. Used for padding.
		 */
		$args = apply_filters( 'nav_menu_item_args', $args, $item, $depth );

		/**
		 * Filter the CSS class(es) applied to a menu item's list item element.
		 *
		 * @since 3.0.0
		 * @since 4.1.0 The `$depth` parameter was added.
		 *
		 * @param array  $classes The CSS classes that are applied to the menu item's `<li>` element.
		 * @param object $item	The current menu item.
		 * @param array  $args	An array of {@see wp_nav_menu()} arguments.
		 * @param int	$depth   Depth of menu item. Used for padding.
		 */
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

		/**
		 * Filter the ID applied to a menu item's list item element.
		 *
		 * @since 3.0.1
		 * @since 4.1.0 The `$depth` parameter was added.
		 *
		 * @param string $menu_id The ID that is applied to the menu item's `<li>` element.
		 * @param object $item	The current menu item.
		 * @param array  $args	An array of {@see wp_nav_menu()} arguments.
		 * @param int	$depth   Depth of menu item. Used for padding.
		 */
		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args, $depth );
		$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

		$output .= sprintf( '%s<li%s%s%s>',
			$indent,
			$id,
			$class_names,
			in_array( 'menu-item-has-children', $item->classes ) ? ' aria-haspopup="true" aria-expanded="false" tabindex="0"' : ''
		);

		$atts = array();
		$atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
		$atts['target'] = ! empty( $item->target )	 ? $item->target	 : '';
		$atts['rel']	= ! empty( $item->xfn )		? $item->xfn		: '';
		$atts['href']   = ! empty( $item->url )		? $item->url		: '';

		/**
		 * Filter the HTML attributes applied to a menu item's anchor element.
		 *
		 * @since 3.6.0
		 * @since 4.1.0 The `$depth` parameter was added.
		 *
		 * @param array $atts {
		 *	 The HTML attributes applied to the menu item's `<a>` element, empty strings are ignored.
		 *
		 *	 @type string $title  Title attribute.
		 *	 @type string $target Target attribute.
		 *	 @type string $rel	The rel attribute.
		 *	 @type string $href   The href attribute.
		 * }
		 * @param object $item  The current menu item.
		 * @param array  $args  An array of {@see wp_nav_menu()} arguments.
		 * @param int	$depth Depth of menu item. Used for padding.
		 */
		$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

		$attributes = '';
		foreach ( $atts as $attr => $value ) {
			if ( ! empty( $value ) ) {
				$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
				$attributes .= ' ' . $attr . '="' . $value . '"';
			}
		}

		/** This filter is documented in wp-includes/post-template.php */
		$title = apply_filters( 'the_title', $item->title, $item->ID );

		/**
		 * Filter a menu item's title.
		 *
		 * @since 4.4.0
		 *
		 * @param string $title The menu item's title.
		 * @param object $item  The current menu item.
		 * @param array  $args  An array of {@see wp_nav_menu()} arguments.
		 * @param int	$depth Depth of menu item. Used for padding.
		 */
		$title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );

		$item_output = $args->before;
		$item_output .= '<a'. $attributes .' role="menuitem">';
		$item_output .= $args->link_before . $title . $args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;

		/**
		 * Filter a menu item's starting output.
		 *
		 * The menu item's starting output only includes `$args->before`, the opening `<a>`,
		 * the menu item's title, the closing `</a>`, and `$args->after`. Currently, there is
		 * no filter for modifying the opening and closing `<li>` for a menu item.
		 *
		 * @since 3.0.0
		 *
		 * @param string $item_output The menu item's starting HTML output.
		 * @param object $item		Menu item data object.
		 * @param int	$depth	   Depth of menu item. Used for padding.
		 * @param array  $args		An array of {@see wp_nav_menu()} arguments.
		 */
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}

}

// =========================================
//	ENQUEUE THEME SCRIPTS
// =========================================
// Basic JS and CSS that are used by elements not contained in modules, like the home page, footer, etc. It's important that these be registered with the same name here and in individual modules where needed; if the script or style has already been enqueued with the same name here first, and later in a module, it will not be loaded again. This ensures that these assets are only ever loaded once, but are always loaded when needed by a module. Naming consistency is important here.

function stile_application_scripts()
	{
		// Save some cycles, only load if we're not in the admin area.
		if ( !is_admin() ) {
			// Pickadate: http://amsul.ca/pickadate.js/
			wp_register_style( 'pickadate-classic', get_template_directory_uri() . '/assets/vendor/date_picker/classic.css', array(), '', 'all' );
			wp_register_style( 'pickadate-classic-date', get_template_directory_uri() . '/assets/vendor/date_picker/classic.date.css', array(), '', 'all' );
			wp_register_style( 'pickadate-classic-time', get_template_directory_uri() . '/assets/vendor/date_picker/classic.time.css', array(), '', 'all' );
			wp_register_style( 'pickadate-default', get_template_directory_uri() . '/assets/vendor/date_picker/default.css', array(), '', 'all' );
			wp_register_style( 'pickadate-default-date', get_template_directory_uri() . '/assets/vendor/date_picker/default.date.css', array(), '', 'all' );
			wp_register_style( 'pickadate-default-time', get_template_directory_uri() . '/assets/vendor/date_picker/default.time.css', array(), '', 'all' );
			wp_enqueue_style( 'pickadate-default' );
			wp_enqueue_style( 'pickadate-default-date' );

			wp_register_script( 'pickadate-picker-js', get_template_directory_uri() . '/assets/vendor/date_picker/picker.js', array(), 'jquery', true );
			wp_register_script( 'pickadate-picker-date-js', get_template_directory_uri() . '/assets/vendor/date_picker/picker.date.js', array(), 'jquery', true );
			wp_enqueue_script( 'pickadate-picker-js' );
			wp_enqueue_script( 'pickadate-picker-date-js' );

			// Main theme scripts
			wp_enqueue_script('stile-scripts', get_template_directory_uri() . '/assets/dist/scripts/main.min.js', array('jquery'), '1.0.0', true);

			// Main theme style sheet
			wp_enqueue_style( 'style', get_template_directory_uri() . '/assets/dist/styles/style.css' );

			// Flexgrid
			wp_enqueue_style( 'flexboxgrid-style', get_template_directory_uri() . '/assets/vendor/flexboxgrid/flexboxgrid.css' );

			// Vendor Styles: Font Awesome 5 Loaded Locally
			wp_register_style( 'fontawesome5', get_template_directory_uri() . '/assets/vendor/fontawesome5/css/all.min.css', array(), '', 'all' );
			wp_enqueue_style( 'fontawesome5' );

			// Vendor Styles: Font Awesome 6 Loaded Locally
			wp_register_style( 'fontawesome6', get_template_directory_uri() . '/assets/vendor/fontawesome6/css/all.min.css', array(), '', 'all' );
			wp_enqueue_style( 'fontawesome6' );

			// Flexslider 2
			wp_enqueue_style( 'flexslider-style', get_template_directory_uri() . '/assets/vendor/flexslider/flexslider.css' );
			wp_enqueue_script('flexslider-scripts', get_template_directory_uri() . '/assets/vendor/flexslider/jquery.flexslider-min.js', array('jquery'), '1.0.0', true);

			// Selectric Select Box Replacement Library: http://selectric.js.org/
			wp_register_style( 'selectriccss', get_template_directory_uri() . '/assets/vendor/selectric/selectric.css',array(), '', 'all'   );
			wp_register_script( 'selectricjs', get_template_directory_uri() . '/assets/vendor/selectric/jquery.selectric.min.js', array('jquery'), '1.0.0', true);
			wp_enqueue_style( 'selectriccss' );
			wp_enqueue_script( 'selectricjs' );

			// Localize AJAX
			wp_localize_script( 'stile-scripts', 'ajaxpagination', array(
				'ajaxurl' => admin_url( 'admin-ajax.php' )
			));
			wp_localize_script( 'stile-scripts', 'ajaxloadmore', array(
				'ajaxurl' => admin_url( 'admin-ajax.php' ),
			));
		}
	}

add_action('wp_enqueue_scripts', 'stile_application_scripts');

// =========================================
//	INGEST MODULES
// =========================================
// This is the heart of the module system for Stile.
// Get a list of all the subdirectories in the Modules directory.
$dirs = array_filter(glob(get_template_directory() . '/modules/*'), 'is_dir');

foreach ( $dirs as $dir ) :
	// Get the last directory name.
	$moduleName = substr($dir, strrpos($dir, '/') + 1);
	// The directory name should match the name of the initializing php file
	$moduleInitFile = 'modules/' . $moduleName . '/' . $moduleName . '.php';
	// Include the base php file for each module.
	include_once($moduleInitFile);
endforeach;

// =========================================
//	MODULE SCREEN SHOTS
// =========================================
// Function for returning the image of what the block should look like.
function stile_block_screenshot( $moduleName ) {
	// Add instructions on how to use the module, including any included screen shot.
	$theme = wp_get_theme();
	$themeTextDomain = $theme->get( 'TextDomain' );
	$themePath = $theme->theme_root . '/' . $themeTextDomain;
	$instruction = '';
	clearstatcache();
	$filename = $themePath . '/modules/' . $moduleName . '/screenshot.png';
	if (file_exists($filename)) :
		// The directory name should match the name of the initializing php file
		$moduleScreenshotPath = get_template_directory_uri() . '/modules/' . $moduleName . '/' . 'screenshot.png';
		$instrution = '<div style="font-weight: bold;">Sample Layout:</div><img src="' . $moduleScreenshotPath . '" class="gcom-stile-module-screenshot" alt="Screenshot showing the ' . $moduleName . ' module layout">';
	else:
		$instrution = '<div style="font-weight: bold;">No screen shot available for the <i>' . $moduleName . '</i> module.</div>';
	endif;
	return $instrution;
}

// =========================================
// GUTENBERG WIDE CONTAINER SUPPORT
// =========================================
/* For whatever reason, "wide blocks" were removed from the default Gutenberg blocks in WordPress. We want to add them back in so the user can toggle that option on, causing the block to go across 100% of the page width. The styles to support the classes are in assets/styles/base/_base.scss starting on line 93. */
/* Register support for Gutenberg wide images in your theme */
function stile_wide_gutenberg_setup() 
	{
		add_theme_support( 'align-wide' );
	}

add_action( 'after_setup_theme', 'stile_wide_gutenberg_setup' );

/** Applies wrapper div around aligned blocks. **/
function stile_wrap_alignment( $block_content, $block ) {
	if ( isset( $block['attrs']['align'] ) && in_array( $block['attrs']['align'], array( 'wide', 'full' ) ) ) {
		$block_content = sprintf(
			'<div class="%1$s">%2$s</div>',
			'align-wrap align-wrap-' . esc_attr( $block['attrs']['align'] ),
			$block_content
		);
	}
	return $block_content;
}

add_filter( 'render_block', 'stile_wrap_alignment', 10, 2 );

// =========================================
//  IMAGE META DATA LOADING
// =========================================
/* This is a legacy function carried over from the COBALT / KRYPTON days before WordPress had a reliable method for retrieving ALT tags for images. ACF largely renders this unnecessary but we retained it for those rare cases when we might port over an older, Krypton-based module. */
// To use: 
// $image = wp_get_attachment ( $post->ID, image_size_name ); 
// echo '<img src="'.$image['src'].'" alt="'.$image['alt'].'">' $image['alt']; etc.
function wp_get_attachment( $attachment_id, $size = NULL ) {

  $attachment = get_post( $attachment_id );
  if ( $size != NULL) :
	$src = wp_get_attachment_image_src( $attachment_id, $size );
	$src = $src['0'];
  else:
	$src = wp_get_attachment_url( $attachment->ID );
  endif;

  return array(
	  'alt' => get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true ),
	  'caption' => $attachment->post_excerpt,
	  'description' => $attachment->post_content,
	  'href' => get_permalink( $attachment->ID ),
	  'src' => $src,
	  'title' => $attachment->post_title
  );
}

// =========================================
// MISC UTILITY FUNCTIONS
// =========================================
// Get the primary category for a post that has more than one.
/* 	USAGE:
	$post_categories = get_post_primary_category($post->ID, 'category'); 
	$primary_category = $post_categories['primary_category'];
	echo $primary_category->name;
*/
function get_post_primary_category($post_id, $term='category', $return_all_categories=false){
	$return = array();

	if (class_exists('WPSEO_Primary_Term')){
		// Show Primary category by Yoast if it is enabled & set
		$wpseo_primary_term = new WPSEO_Primary_Term( $term, $post_id );
		$primary_term = get_term($wpseo_primary_term->get_primary_term());

		if (!is_wp_error($primary_term)){
			$return['primary_category'] = $primary_term;
		}
	}

	if (empty($return['primary_category']) || $return_all_categories){
		$categories_list = get_the_terms($post_id, $term);

		if (empty($return['primary_category']) && !empty($categories_list)){
			$return['primary_category'] = $categories_list[0];  //get the first category
		}
		if ($return_all_categories){
			$return['all_categories'] = array();

			if (!empty($categories_list)){
				foreach($categories_list as &$category){
					$return['all_categories'][] = $category->term_id;
				}
			}
		}
	}

	return $return;
}

// =========================================
//  GRAVITY FORMS ADA SUPPORT
// =========================================

// Add explicit autocomplete to Gravity Forms for ADA compliance
add_filter( 'gform_form_tag', function( $form_tag ) {
	return str_replace( '>', ' autocomplete="on">', $form_tag );
}, 11 );

// Add ADA required role to Gravity Forms validation errors.
add_filter( 'gform_validation_message', function ( $message, $form ) {
	if ( gf_upgrade()->get_submissions_block() ) {
		return $message;
	}
 
	$message = "<div class='validation_error' role='alert'><p>There was a problem with your submission. Errors have been highlighted below.</p>";
	$message .= '<ul>';
 
	foreach ( $form['fields'] as $field ) {
		if ( $field->failed_validation ) {
			$message .= sprintf( '<li>%s - %s</li>', GFCommon::get_label( $field ), $field->validation_message );
		}
	}
 
	$message .= '</ul></div>';
 
	return $message;
}, 10, 2 );

/**
 * Filters the next, previous and submit buttons.
 * Replaces the forms <input> buttons with <button> while maintaining attributes from original <input>.
 *
 * @param string $button Contains the <input> tag to be filtered.
 * @param object $form Contains all the properties of the current form.
 *
 * @return string The filtered button.
 */
add_filter( 'gform_next_button', 'input_to_button', 10, 2 );
add_filter( 'gform_previous_button', 'input_to_button', 10, 2 );
add_filter( 'gform_submit_button', 'input_to_button', 10, 2 );
function input_to_button( $button, $form ) {
	$dom = new DOMDocument();
	$dom->loadHTML( '<?xml encoding="utf-8" ?>' . $button );
	$input = $dom->getElementsByTagName( 'input' )->item(0);
	$new_button = $dom->createElement( 'button' );
	$new_button->appendChild( $dom->createTextNode( $input->getAttribute( 'value' ) ) );
	$input->removeAttribute( 'value' );
	$classes = $input->getAttribute( 'class' );
	$classes .= " btn btn-black btn-transparent";
	$input->setAttribute( 'class', $classes );
	foreach( $input->attributes as $attribute ) {
		$new_button->setAttribute( $attribute->name, $attribute->value );
	}
	$input->parentNode->replaceChild( $new_button, $input );
 
	return $dom->saveHtml( $new_button );
}

add_filter( 'gform_tabindex_1', 'change_tabindex' , 10, 2 );
function change_tabindex( $tabindex, $form ) {
	return 40;
}

// =========================================
//	REMOVE YOAST STRUCTURED DATA
// =========================================
// Yoast automatically adds structured data that breaks some of our modules that do the same thing for specific blocks or content so we need to remove it.
add_filter( 'wpseo_json_ld_output', '__return_false' );

// Disable Curly Quotes 
remove_filter('the_content', 'wptexturize');
remove_filter('the_title', 'wptexturize');
remove_filter('the_excerpt', 'wptexturize');

// =========================================
//	CONVERT HEX VALUES TO RGBA
// =========================================
/* Used in header.php to get ligher and darker versions of base theme colors. */
function hex2Rgb($hex, $alpha = false) {
   $hex	  = str_replace('#', '', $hex);
   $length   = strlen($hex);
   $rgb['r'] = hexdec($length == 6 ? substr($hex, 0, 2) : ($length == 3 ? str_repeat(substr($hex, 0, 1), 2) : 0));
   $rgb['g'] = hexdec($length == 6 ? substr($hex, 2, 2) : ($length == 3 ? str_repeat(substr($hex, 1, 1), 2) : 0));
   $rgb['b'] = hexdec($length == 6 ? substr($hex, 4, 2) : ($length == 3 ? str_repeat(substr($hex, 2, 1), 2) : 0));
   if ( $alpha ) {
	  $rgb['a'] = $alpha;
   }
   return $rgb;
}

// =========================================
//	REMOVE EMOJIS
// =========================================
/* WE DON'T USE EMOJIS SO DO NOT LOAD THEM */
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

// =========================================
//	MANUAL EXCERPT LENGTHS
// =========================================
/* Limit the length of excerpts where needed in your files without having to set it globally. */
function excerpt($limit, $post_id) 
	{
		$excerpt = explode(' ', get_the_excerpt($post_id), $limit);
			if (count($excerpt)>=$limit) {
			array_pop($excerpt);
			$excerpt = implode(" ",$excerpt).'...';
		} else {
			$excerpt = implode(" ",$excerpt);
		} 
		$excerpt = preg_replace('`[[^]]*]`','',$excerpt);
		
		return $excerpt;
	}

// =========================================
//	ADD DASHBOARD WIDGET
// =========================================
// This just adds a widget to the CMS Dashboard showing who made the theme. Any vital information needed site-wide should be included here.
function stile_add_dashboard_widgets() 
	{
		wp_add_dashboard_widget(
			'stile_dashboard_widget', // Widget slug.
			'Theme Information', // Title.
			'stile_dashboard_widget_function' // Display function.
		);	
	}
add_action( 'wp_dashboard_setup', 'stile_add_dashboard_widgets' );

/** Create the function to output the contents of our Dashboard Widget. */
function stile_dashboard_widget_function() 
	{
		// Display whatever it is you want to show.
		echo "<strong>About This Theme</strong>";
		echo "<p>This theme was created by GCommerce Solutions (<a href=\"https://gcommercesolutions.com\">https://gcommercesolutions.com</a>). It requires the Advanced Custom Fields plugin to function properly.</p>";
	}

// =========================================
//	ADD DNS PRE-FETCHING
// =========================================
// To speed up page loading we pre-fetch the most common sites used on our sites. Every little bit helps.
function stile_dns_prefetch() 
	{
		echo '<meta http-equiv="x-dns-prefetch-control" content="on">
		<link rel="dns-prefetch" href="//fonts.googleapis.com" />
		<link rel="dns-prefetch" href="//fonts.gstatic.com" />
		<link rel="dns-prefetch" href="//ajax.googleapis.com" />
		<link rel="dns-prefetch" href="//apis.google.com" />
		<link rel="dns-prefetch" href="//google-analytics.com" />
		<link rel="dns-prefetch" href="//www.google-analytics.com" />
		<link rel="dns-prefetch" href="//ssl.google-analytics.com" />
		<link rel="dns-prefetch" href="//youtube.com" />
		<link rel="dns-prefetch" href="//api.pinterest.com" />
		<link rel="dns-prefetch" href="//connect.facebook.net" />
		<link rel="dns-prefetch" href="//platform.twitter.com" />
		<link rel="dns-prefetch" href="//syndication.twitter.com" />
		<link rel="dns-prefetch" href="//syndication.twitter.com" />
		<link rel="dns-prefetch" href="//platform.instagram.com" />
		';
	}
add_action('wp_head', 'stile_dns_prefetch', 0);

// =========================================
//	ADMIN STYLES
// =========================================
/* Just some small things to spruce up the login page a little.  */
// Custom login logo
function gcom_login_logo() { ?>
	<style type="text/css">
		<?php if ( get_field('header_logo', 'option') ) : $logo = get_field('header_logo', 'option'); ?>
		#login h1 a, .login h1 a {
			background-image: url(<?php echo $logo['url'];?>);
		height:auto;
		width:222px;
		background-size: contain;
		background-repeat: no-repeat;
			padding-bottom: 30px;
		}
		<?php endif; ?>
		body.login {
			background-image: url(<?php echo get_template_directory_uri() . '/assets/images/seamless-wave-pattern.png'; ?>);
			background-size: contain;
			background-position: bottom;
			background-repeat: repeat-x;
			background-blend-mode: screen;
		}
		body.login div#login form#loginform p label,
		body.login div#login form#loginform > div > label {
			
		}
	</style>
<?php }
add_action( 'login_enqueue_scripts', 'gcom_login_logo' );

function stile_admin_styles() 
	{
	  echo '<style>
		.acf-field.acf-accordion .acf-label.acf-accordion-title { background: #efefef; }
		.acf-field.acf-field-group { background: #efefef; }
		.gcom-stile-module-screenshot {
			border: 5px dashed #efefef;
			margin-bottom: 10px;
			padding: 10px;
		}

	  </style>';
	}

add_action('admin_head', 'stile_admin_styles');

/* DON'T DELETE THIS CLOSING TAG */ ?>