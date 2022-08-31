<?php
// =========================================
//   CUSTOM IMAGE SIZES
// =========================================
// If you need to add custom image sizes for this module, do so here.
add_image_size( THEME_NAME . '-three-by-slider', 400, 563, true );

// Add image sizes to drop down list when adding an image in the CMS
function three_by_slider_custom_image_sizes( $sizes ) {
    return array_merge( $sizes, array(
        THEME_NAME . '-three-by-slider' => __('400px by 563px (Three By Slider)'),
    ) );
}

add_filter( 'image_size_names_choose', 'three_by_slider_custom_image_sizes' );

// =========================================
//   REGISTER THE GUTENBERG BLOCK
// =========================================
function register_acf_block_three_by_slider() 
	{

	    acf_register_block_type(array(
	    	'mode'				=> 'edit',
			'supports' => array( 'anchor' => true ),
	        'name'              => 'three_by_slider',
	        'title'             => __('GCommerce Three By Slider'),
	        'description'       => __('Three blocks of content with optional headline & intro text.'),
	        'render_template'   => 'modules/three_by_slider/three_by_slider_render.php',
	        'category'          => 'formatting',
	        'keywords'			=> array('gcommerce', 'stile', 'layout', 'slider', 'three by slider'),
	        'icon' 				=> 'schedule',
	        'enqueue_assets'	=> function(){
				wp_enqueue_style( 'flexslider-style', get_template_directory_uri() . '/assets/vendor/flexslider/flexslider.css' );
				wp_enqueue_script('flexslider-scripts', get_template_directory_uri() . '/assets/vendor/flexslider/jquery.flexslider-min.js', array('jquery'), '1.0.0', true);
				wp_enqueue_script('three-by-slider-js', get_template_directory_uri() . '/modules/three_by_slider/three_by_slider.min.js', array( 'jquery' ), null, true );
				wp_enqueue_style( 'three-by-slider-style', get_template_directory_uri() . '/modules/three_by_slider/three_by_slider.css' );
			},

	    ));
	}

// Check if function exists and hook into setup.
if( function_exists('acf_register_block_type') ) 
	{
	    add_action('acf/init', 'register_acf_block_three_by_slider');
	}

// =========================================
//   ADD THE FIELD GROUP
// =========================================

if( function_exists('acf_add_local_field_group') ):

	// Use the function from functions.php to get HTML showing the block screenshot or a message indicating it's unavailable.
    // First make sure the function exists, for backwards compatibility if adding a module to an older build.
    if( function_exists('stile_block_screenshot') ) {
        $screenshot = stile_block_screenshot('three_by_slider');
    } else {
        $screenshot = 'GCom block screenshots not enabled.';
    }

acf_add_local_field_group(array(
	'key' => 'group_5e45bd19e124f',
	'title' => 'GCommerce Three By Slider',
	'fields' => array(
		array(
			'key' => 'field_5e84a3ed6ff0c',
			'label' => 'GCommerce Three By Slider',
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
            'key' => 'field_5e8ca3bd4ae1d',
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
            'message' => $screenshot . '<br>The Three By Slider shows three blocks at a time, each with an image and text that appear when hovered over. The entire cell has a URL it will go to when clicked. Support for a background pattern is included as well. Generally should not be full width.',
            'new_lines' => 'wpautop',
            'esc_html' => 0,
        ),
		array(
			'key' => 'field_5e45bd232c21a',
			'label' => 'Headline',
			'name' => 'headline',
			'type' => 'text',
			'instructions' => 'The large headline appearing over the slider.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5e45bd462c21b',
			'label' => 'Intro',
			'name' => 'intro',
			'type' => 'textarea',
			'instructions' => 'Short introduction to the sliders',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'maxlength' => '',
			'rows' => '',
			'new_lines' => '',
		),
		array(
			'key' => 'field_5e69059a417ad',
			'label' => 'Background Image',
			'name' => 'background_image',
			'type' => 'image',
			'instructions' => 'Optional background image to go behind the entire section. Design calls for a colored pattern of some sort. Note that the image will not be cropped, so please be aware of how large it is when uploading as excessively large images can impact page speed.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'url',
			'preview_size' => 'medium',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
		),
		array(
			'key' => 'field_5e45bd772c21c',
			'label' => 'Slides',
			'name' => 'slides',
			'type' => 'repeater',
			'instructions' => 'Slides, which will be shown three at a time.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'collapsed' => '',
			'min' => 0,
			'max' => 0,
			'layout' => 'block',
			'button_label' => '',
			'sub_fields' => array(
				array(
					'key' => 'field_5e45bd812c21d',
					'label' => 'Image (400x563)',
					'name' => 'image',
					'type' => 'image',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'return_format' => 'id',
					'preview_size' => 'medium',
					'library' => 'all',
					'min_width' => '',
					'min_height' => '',
					'min_size' => '',
					'max_width' => '',
					'max_height' => '',
					'max_size' => '',
					'mime_types' => '',
				),
				array(
					'key' => 'field_5e45bdad2c21f',
					'label' => 'Slide Text Block Headline',
					'name' => 'headline',
					'type' => 'text',
					'instructions' => 'Large headline at the top of the text block when the user hovers over the slide.',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array(
					'key' => 'field_5e45bdc12c220',
					'label' => 'Slide Text Block',
					'name' => 'text_block',
					'type' => 'textarea',
					'instructions' => 'Block of text below the headline.',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'maxlength' => '',
					'rows' => '',
					'new_lines' => '',
				),
				array(
					'key' => 'field_5e45bdd52c221',
					'label' => 'CTA',
					'name' => 'cta',
					'type' => 'link',
					'instructions' => 'Where the user will go when the slide is clicked.',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'return_format' => 'array',
				),
			),
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'block',
				'operator' => '==',
				'value' => 'acf/three-by-slider',
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
?>