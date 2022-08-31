<?php
// =========================================
//   CUSTOM IMAGE SIZES
// =========================================
// If you need to add custom image sizes for this module, do so here.
add_image_size( THEME_NAME . '-big-image-slider', 1920, 900, true );

// Add image sizes to drop down list when adding an image in the CMS
function big_image_slider_custom_image_sizes( $sizes ) {
    return array_merge( $sizes, array(
        THEME_NAME . '-big-image-slider' => __('1920px by 900px (Big Image Slider)'),
    ) );
}

add_filter( 'image_size_names_choose', 'big_image_slider_custom_image_sizes' );

// =========================================
//   REGISTER THE GUTENBERG BLOCK
// =========================================
function register_acf_block_big_image_slider() 
	{
	    acf_register_block_type(array(
	    	'mode'				=> 'edit',
			'supports' => array( 'anchor' => true ),
	        'name'              => 'big_image_slider',
	        'title'             => __('GCommerce Big Image Slider'),
	        'description'       => __('A large image that swaps out for another when clicked, arrow for the cursor changes for the direction nav.'),
	        'render_template'   => 'modules/big_image_slider/big_image_slider_render.php',
	        'category'          => 'formatting',
	        'mode' 				=> 'edit',
	        'keywords'			=> array('gcommerce', 'stile', 'layout', 'slider', 'strip' ),
	        'icon' 				=> 'editor-video',
	        'enqueue_assets'	=> function(){
	        	// Flexslider for slideshows
				wp_enqueue_style( 'flexslider-style', get_template_directory_uri() . '/assets/vendor/flexslider/flexslider.css' );
				wp_enqueue_script('flexslider-scripts', get_template_directory_uri() . '/assets/vendor/flexslider/jquery.flexslider-min.js', array('jquery'), '1.0.0', true);
				// Module-specific
				wp_enqueue_script('big-image-slider-js', get_template_directory_uri() . '/modules/big_image_slider/big_image_slider.min.js', array( 'jquery' ), null, true );
				wp_enqueue_style( 'big-image-slider-style', get_template_directory_uri() . '/modules/big_image_slider/big_image_slider.css' );
			},

	    ));
	}

// Check if function exists and hook into setup.
if( function_exists('acf_register_block_type') ) 
	{
	    add_action('acf/init', 'register_acf_block_big_image_slider');
	}

// =========================================
//   ADD THE FIELD GROUP
// =========================================

if( function_exists('acf_add_local_field_group') ):

	// Use the function from functions.php to get HTML showing the block screenshot or a message indicating it's unavailable.
	// First make sure the function exists, for backwards compatibility if adding a module to an older build.
	if( function_exists('stile_block_screenshot') ) {
		$screenshot = stile_block_screenshot('big_image_slider');
	} else {
		$screenshot = 'GCom block screenshots not enabled.';
	}

acf_add_local_field_group(array(
	'key' => 'group_61561ed061c08',
	'title' => 'GCommerce Big Image Slider',
	'fields' => array(
		array(
			'key' => 'field_61561edae0ab6',
			'label' => 'GCommerce Big Image Slider',
			'name' => '',
			'type' => 'accordion',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'open' => 0,
			'multi_expand' => 0,
			'endpoint' => 0,
		),
		array(
			'key' => 'field_61561e7ae4ba5',
			'label' => 'Content Description',
			'name' => '',
			'type' => 'message',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => $screenshot . '<br>A slider where every image is full width, hovering over the right or left halves shows the navigation arrows.',
			'new_lines' => 'wpautop',
			'esc_html' => 0,
		),
		array(
			'key' => 'field_61561ee8e0ab7',
			'label' => 'Images',
			'name' => 'images',
			'type' => 'gallery',
			'instructions' => '1920x900 images for the slider',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'array',
			'preview_size' => 'medium',
			'insert' => 'append',
			'library' => 'all',
			'min' => '',
			'max' => '',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'block',
				'operator' => '==',
				'value' => 'acf/big-image-slider',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
));

endif;