<?php
// =========================================
//   REGISTER THE GUTENBERG BLOCK
// =========================================
function register_acf_block_gcom_spot_image() 
	{

		acf_register_block_type(array(
	    	'mode'				=> 'edit',
			'name'			  => 'gcom_spot_image',
			'mode'			=> 'edit',
			'title'			 => __('GCommerce Spot Image'),
			'description'	   => __('Absolutely position an image to the edge of the screen. '),
			'render_template'   => 'modules/spot_image/spot_image_render.php',
			'category'		  => 'formatting',
			'keywords'		  => array('gcommerce', 'stile', 'layout', 'spot image', 'offset image', 'overlap image'),
			'icon'			  => 'welcome-view-site',
			'enqueue_assets'	=> function(){
				wp_enqueue_style( 'spot-image-style', get_template_directory_uri() . '/modules/spot_image/spot_image.css' );
			},

		));
	}

// Check if function exists and hook into setup.
if( function_exists('acf_register_block_type') ) 
	{
		add_action('acf/init', 'register_acf_block_gcom_spot_image');
	}

// =========================================
//   ADD THE FIELD GROUP
// =========================================

if( function_exists('acf_add_local_field_group') ):

	// Use the function from functions.php to get HTML showing the block screenshot or a message indicating it's unavailable.
	// First make sure the function exists, for backwards compatibility if adding a module to an older build.
	if( function_exists('stile_block_screenshot') ) {
		$screenshot = stile_block_screenshot('spot_image');
	} else {
		$screenshot = 'GCom block screenshots not enabled.';
	}

acf_add_local_field_group(array(
	'key' => 'group_62713108843b8',
	'title' => 'GCommerce Spot Image',
	'fields' => array(
		array(
			'key' => 'field_627131ac5375d',
			'label' => 'GCommerce Spot Image',
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
			'key' => 'field_627131c15375e',
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
			'key' => 'field_6271312a5375a',
			'label' => 'Image',
			'name' => 'image',
			'type' => 'image',
			'instructions' => 'This image will not be given a custom thumbnail size so please be sensitive to the overall file size as large images can dramatically slow page load speed.',
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
			'key' => 'field_627131525375b',
			'label' => 'Horizontal Location',
			'name' => 'horizontal_location',
			'type' => 'select',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'left' => 'Left',
				'middle' => 'Middle',
				'right' => 'Right',
			),
			'default_value' => 'left',
			'allow_null' => 0,
			'multiple' => 0,
			'ui' => 0,
			'return_format' => 'value',
			'ajax' => 0,
			'placeholder' => '',
		),
		array(
			'key' => 'field_627131e053760',
			'label' => 'Horizontal Offset',
			'name' => 'horizontal_offset',
			'type' => 'number',
			'instructions' => 'Number of pixels (for left & right) or a % to translateX (middle) to offset the image on the x axis.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50',
				'class' => '',
				'id' => '',
			),
			'default_value' => 0,
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'min' => '',
			'max' => '',
			'step' => '',
		),
		array(
			'key' => 'field_627131775375c',
			'label' => 'Vertical Location',
			'name' => 'vertical_location',
			'type' => 'select',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'top' => 'Top',
				'middle' => 'Middle',
				'bottom' => 'Bottom',
			),
			'default_value' => 'top',
			'allow_null' => 0,
			'multiple' => 0,
			'ui' => 0,
			'return_format' => 'value',
			'ajax' => 0,
			'placeholder' => '',
		),
		array(
			'key' => 'field_6271320953761',
			'label' => 'Vertical Offset',
			'name' => 'vertical_offset',
			'type' => 'number',
			'instructions' => 'Number of pixels (for top & bottom) or a % to translateXY (middle) to offset the image on the y axis.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50',
				'class' => '',
				'id' => '',
			),
			'default_value' => 0,
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'min' => '',
			'max' => '',
			'step' => '',
		),
		array(
			'key' => 'field_6271322b53762',
			'label' => 'Overlap?',
			'name' => 'overlap',
			'type' => 'true_false',
			'instructions' => 'Choose whether the image should overlap the sections around it or be cut off by the top of the container.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => '',
			'default_value' => 0,
			'ui' => 1,
			'ui_on_text' => 'Show Overlap',
			'ui_off_text' => 'Hide Overlap',
		),
		array(
			'key' => 'field_627131cf5375f',
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
			'key' => 'field_627131bfa3730',
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
			'message' => $screenshot . '<br>The spot image can be used to place a decorative element at the edges of the container.',
			'new_lines' => 'wpautop',
			'esc_html' => 0,
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'block',
				'operator' => '==',
				'value' => 'acf/gcom-spot-image',
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
	'show_in_rest' => 0,
));

endif;