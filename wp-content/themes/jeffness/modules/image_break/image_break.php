<?php
// =========================================
//   CUSTOM IMAGE SIZES
// =========================================
// If you need to add custom image sizes for this module, do so here.
add_image_size( THEME_NAME . '-image-break-tall', 1440, 933, true );
add_image_size( THEME_NAME . '-image-break-short', 1440, 525, true );

// =========================================
//   REGISTER THE GUTENBERG BLOCK
// =========================================
function register_acf_block_image_break() 
	{
	    acf_register_block_type(array(
	    	'mode'				=> 'edit',
			'supports' => array( 'anchor' => true ),
	        'name'              => 'image_break',
	        'title'             => __('GCommerce Image Break'),
	        'description'       => __('Background image with content divided in two halfs'),
	        'render_template'   => 'modules/image_break/image_break_render.php',
	        'category'          => 'formatting',
	        'keywords'			=> array('gcommerce', 'stile', 'layout', 'image break'),
	        'icon' 				=> 'feedback',
	        'enqueue_assets'	=> function(){
				// Block styles and scripts
				wp_register_style( 'image-break-module-styles', get_template_directory_uri() . '/modules/image_break/image_break.css', array(), '', 'all' );
				wp_enqueue_style('image-break-module-styles');

				wp_enqueue_script('image-break-module-script', get_template_directory_uri() . '/modules/image_break/image_break.min.js', array(), '', 'all' ) ;
			},

	    ));
	}

// Check if function exists and hook into setup.
if( function_exists('acf_register_block_type') ) 
	{
	    add_action('acf/init', 'register_acf_block_image_break');
	}

// =========================================
//   ADD THE FIELD GROUP
// =========================================
if( function_exists('acf_add_local_field_group') ):

	// Use the function from functions.php to get HTML showing the block screenshot or a message indicating it's unavailable.
    // First make sure the function exists, for backwards compatibility if adding a module to an older build.
    if( function_exists('stile_block_screenshot') ) {
        $screenshot = stile_block_screenshot('image_break');
    } else {
        $screenshot = 'GCom block screenshots not enabled.';
    }

acf_add_local_field_group(array(
	'key' => 'group_5e78fef8d82fb',
	'title' => 'GCommerce Image break',
	'fields' => array(
		array(
			'key' => 'field_5e798b645b09a',
			'label' => 'Gcommerce Image Break',
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
			'key' => 'field_5e7f8b6354ba1',
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
			'key' => 'field_5e790007ebf9e',
			'label' => 'Background Image',
			'name' => 'background_image',
			'type' => 'image',
			'instructions' => 'Big image that fills the background (1440x933 for "tall" and 1440x525 for "short")',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'array',
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
			'key' => 'field_5e790160ebfa1',
			'label' => 'First CTA',
			'name' => 'first_cta',
			'type' => 'link',
			'instructions' => 'Where the call to action button will take the user when clicked. If blank, the block will not be rendered',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'array',
		),
		array(
			'key' => 'field_5e790179ebfa2',
			'label' => 'Second CTA',
			'name' => 'second_cta',
			'type' => 'link',
			'instructions' => 'Where the call to action button will take the user when clicked. If blank, the section will not be rendered',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'array',
		),
		array(
			'key' => 'field_5e7f8b6354ba2',
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
            'key' => 'field_5e798b73ef14c',
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
            'message' => $screenshot . '<br>A background image with two different CTA columns that can be clicked on. The overlay color is variable and the block can be one of two different heights. Typically full width.',
            'new_lines' => 'wpautop',
            'esc_html' => 0,
        ),
		array(
			'key' => 'field_5e790021ebf9f',
			'label' => 'Short or tall height for the image break.',
			'name' => 'image_height',
			'type' => 'radio',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'image-break-height-short' => 'Short (1440x525)',
				'image-break-height-tall' => 'Tall (1440x933)',
			),
			'allow_null' => 0,
			'other_choice' => 0,
			'default_value' => '',
			'layout' => 'vertical',
			'return_format' => 'value',
			'save_other_choice' => 0,
		),
		array(
			'key' => 'field_5e79009eebfa0',
			'label' => 'Image Break Overlay',
			'name' => 'image_break_overlay',
			'type' => 'radio',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'bg-c1-opacity' => 'Partially Transparent Primary Theme Color',
				'bg-c2-opacity' => 'Partially Transparent Secondary Theme Color',
				'bg-white-opacity' => 'Partially Transparent "White" Theme Color',
				'bg-black-opacity' => 'Partially Transparent "Black" Theme Color',
				'none' => 'No overlay',
			),
			'allow_null' => 0,
			'other_choice' => 0,
			'default_value' => 'none',
			'layout' => 'vertical',
			'return_format' => 'value',
			'save_other_choice' => 0,
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'block',
				'operator' => '==',
				'value' => 'acf/image-break',
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