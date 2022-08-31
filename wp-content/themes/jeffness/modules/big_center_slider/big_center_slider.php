<?php
// =========================================
//   CUSTOM IMAGE SIZE
// =========================================
add_image_size( THEME_NAME . '-big-center-slider', 847, 582, true );

// Add image sizes to drop down list when adding an image in the CMS
function big_center_slider_custom_image_sizes( $sizes ) {
    return array_merge( $sizes, array(
        THEME_NAME . '-big-center-slider' => __('847px by 582px (Big Center Slider)'),
    ) );
}

add_filter( 'image_size_names_choose', 'big_center_slider_custom_image_sizes' );

// =========================================
//   REGISTER THE GUTENBERG BLOCK
// =========================================
function register_acf_block_big_center_slider() 
	{

	    acf_register_block_type(array(
	    	'mode'				=> 'edit',
			'supports' => array( 'anchor' => true ),
	        'name'              => 'big_center_slider',
	        'title'             => __('GCommerce Big Center Slider'),
	        'description'       => __('Slider where the center image is big, with smaller previous and next slides to the side.'),
	        'render_template'   => 'modules/big_center_slider/big_center_slider_render.php',
	        'category'          => 'formatting',
	        'keywords'			=> array('gcommerce', 'stile', 'layout', 'slider', 'big center slider'),
	        'icon' 				=> 'schedule',
	        'enqueue_assets'	=> function(){
				wp_enqueue_style( 'flexslider-style', get_template_directory_uri() . '/assets/vendor/flexslider/flexslider.css' );
				wp_enqueue_script('flexslider-scripts', get_template_directory_uri() . '/assets/vendor/flexslider/jquery.flexslider-min.js', array('jquery'), '1.0.0', true);
				wp_enqueue_script('big-center-slider-js', get_template_directory_uri() . '/modules/big_center_slider/big_center_slider.min.js', array( 'jquery' ), null, true );
				wp_enqueue_style( 'big-center-slider-style', get_template_directory_uri() . '/modules/big_center_slider/big_center_slider.css' );
			},

	    ));
	}

// Check if function exists and hook into setup.
if( function_exists('acf_register_block_type') ) 
	{
	    add_action('acf/init', 'register_acf_block_big_center_slider');
	}

// =========================================
//   ADD THE FIELD GROUP
// =========================================

if( function_exists('acf_add_local_field_group') ):

	// Use the function from functions.php to get HTML showing the block screenshot or a message indicating it's unavailable.
    // First make sure the function exists, for backwards compatibility if adding a module to an older build.
    if( function_exists('stile_block_screenshot') ) {
        $screenshot = stile_block_screenshot('big_center_slider');
    } else {
        $screenshot = 'GCom block screenshots not enabled.';
    }

acf_add_local_field_group(array(
	'key' => 'group_5ef0ec3c4000c',
	'title' => 'GCommerce Big Center Slider',
	'fields' => array(
		array(
			'key' => 'field_5f087561a798c',
			'label' => 'Gcommerce Big Center Slider',
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
			'key' => 'field_5f087123fcba1',
			'label' => 'Content',
			'name' => '',
			'type' => 'tab',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'placement' => 'top',
			'endpoint' => 0,
		),
		array(
			'key' => 'field_5ef0ed8f21a25',
			'label' => 'Slides',
			'name' => 'slides',
			'type' => 'gallery',
			'instructions' => 'Slides; current slide is full width in the center, next and previous slides will be visible as a preview to the left and right.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'id',
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
		array(
			'key' => 'field_5f087123fcba2',
			'label' => 'Settings',
			'name' => '',
			'type' => 'tab',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'placement' => 'top',
			'endpoint' => 0,
		),
		array(
            'key' => 'field_5f084542c967d',
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
            'message' => $screenshot . '<br>Slider where the center image is big, with smaller previous and next slides to the side. Generally should be set to full width.',
            'new_lines' => 'wpautop',
            'esc_html' => 0,
        ),
		array(
			'key' => 'field_5ef0ecc321a20',
			'label' => 'Background Image',
			'name' => 'bg_image',
			'type' => 'image',
			'instructions' => 'The image to be used as the main background for the overlapped text/image. This image will automatically be scaled by the browser to fit the available space. Ideally this should be an abstract pattern with transparency. If empty, the background will be a solid color.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50',
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
			'key' => 'field_5ef0ecf621a21',
			'label' => 'Background Color',
			'name' => 'background_color',
			'type' => 'color_picker',
			'instructions' => 'A background color to fill the bottom 2/3 of the container. If blank, the default Color 1 for the site will be used. Any color entered here will be behind the pattern or image used in the previous field.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'block',
				'operator' => '==',
				'value' => 'acf/big-center-slider',
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