<?php
// =========================================
//   REGISTER THE GUTENBERG BLOCK
// =========================================
function register_acf_block_gcom_spacer() 
	{
	    acf_register_block_type(array(
			'supports' => array( 'anchor' => true ),
	    	'mode'				=> 'edit',
	        'name'              => 'gcom_spacer',
	        'title'             => __('GCommerce Spacer'),
	        'description'       => __('Spacer block with options for various screen widths'),
	        'render_template'   => 'modules/gcom_spacer/gcom_spacer_render.php',
	        'category'          => 'formatting',
	        'keywords'			=> array('gcommerce', 'stile', 'layout'),
	        'icon' 				=> 'image-flip-vertical',
	        'enqueue_assets'	=> function(){
				// Block styles and scripts
				wp_register_style( 'gcom-faq-module-styles', get_template_directory_uri() . '/modules/gcom_spacer/gcom_spacer.css', array(), '', 'all' );
				wp_enqueue_style('gcom-faq-module-styles');
			},

	    ));
	}

// Check if function exists and hook into setup.
if( function_exists('acf_register_block_type') ) 
	{
	    add_action('acf/init', 'register_acf_block_gcom_spacer');
	}

// =========================================
//   ADD THE FIELD GROUP
// =========================================

if( function_exists('acf_add_local_field_group') ):

	// Use the function from functions.php to get HTML showing the block screenshot or a message indicating it's unavailable.
    // First make sure the function exists, for backwards compatibility if adding a module to an older build.
    if( function_exists('stile_block_screenshot') ) {
        $screenshot = stile_block_screenshot('gcom_spacer');
    } else {
        $screenshot = 'GCom block screenshots not enabled.';
    }

	acf_add_local_field_group(array(
		'key' => 'group_62b1df417af1c',
		'title' => 'GCommerce Spacer',
		'fields' => array(
			array(
				'key' => 'field_62b1df6cf3de6',
				'label' => 'GCommerce Spacer',
				'name' => '',
				'type' => 'accordion',
				'instructions' => 'A spacer block with options for what to do at various breakpoints.',
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
				'key' => 'field_62b1df82f3de7',
				'label' => 'Large and Up',
				'name' => 'large_and_up',
				'type' => 'number',
				'instructions' => 'Height in pixels for screens 1601px wide and up.',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '20',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'min' => '',
				'max' => '',
				'step' => '',
			),
			array(
				'key' => 'field_62b1dfbbf3de8',
				'label' => 'Medium and Up',
				'name' => 'medium_and_up',
				'type' => 'number',
				'instructions' => 'Height in pixels for screens between 1201px-1600px.',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '20',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'min' => '',
				'max' => '',
				'step' => '',
			),
			array(
				'key' => 'field_62b1dfeff3de9',
				'label' => 'iPad and Up',
				'name' => 'ipad_and_up',
				'type' => 'number',
				'instructions' => 'Height in pixels for screens between 769px-1200px.',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '20',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'min' => '',
				'max' => '',
				'step' => '',
			),
			array(
				'key' => 'field_62b1e016f3dea',
				'label' => 'Small and Up',
				'name' => 'small_and_up',
				'type' => 'number',
				'instructions' => 'Height in pixels for screens between 601px-768px.',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '20',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'min' => '',
				'max' => '',
				'step' => '',
			),
			array(
				'key' => 'field_62b1e030f3deb',
				'label' => 'Mobile',
				'name' => 'mobile',
				'type' => 'number',
				'instructions' => 'Height in pixels for screens below 600px (i.e. phones).',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '20',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'min' => '',
				'max' => '',
				'step' => '',
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'block',
					'operator' => '==',
					'value' => 'acf/gcom-spacer',
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
?>