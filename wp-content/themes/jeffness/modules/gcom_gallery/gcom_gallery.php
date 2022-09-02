<?php
// =========================================
//   REGISTER THE GUTENBERG BLOCK
// =========================================

function register_acf_block_gcom_gallery() 
	{
	    acf_register_block_type(array(
	    	'mode'				=> 'edit',
			'supports' => array( 'anchor' => true ),
	        'name'              => 'gcom_gallery',
	        'title'             => __('GCommerce Gallery Browser'),
	        'description'       => __('Showing multiple shortcode Galleries with dedicated buttons across the top.'),
	        'render_template'   => 'modules/gcom_gallery/gcom_gallery_render.php',
	        'category'          => 'formatting',
	        'keywords'			=> array('gcommerce', 'stile', 'layout', 'gallery', 'lightbox', 'photos' ),
	        'icon' 				=> 'editor-help',
	        'enqueue_assets'	=> function(){
				// Block styles and scripts
				wp_register_style( 'gcom-gallery-module-styles', get_template_directory_uri() . '/modules/gcom_gallery/gcom_gallery.css', array(), '', 'all' );
				wp_enqueue_style('gcom-gallery-module-styles');

				wp_enqueue_script('gcom-gallery-module-script', get_template_directory_uri() . '/modules/gcom_gallery/gcom_gallery.min.js', array(), '', 'all' ) ;
			},

	    ));
	}

// Check if function exists and hook into setup.
if( function_exists('acf_register_block_type') ) 
	{
	    add_action('acf/init', 'register_acf_block_gcom_gallery');
	}

// =========================================
//   ADD THE FIELD GROUP
// =========================================
if( function_exists('acf_add_local_field_group') ):

	// Use the function from functions.php to get HTML showing the block screenshot or a message indicating it's unavailable.
    // First make sure the function exists, for backwards compatibility if adding a module to an older build.
    if( function_exists('stile_block_screenshot') ) {
        $screenshot = stile_block_screenshot('gcom_gallery');
    } else {
        $screenshot = 'GCom block screenshots not enabled.';
    }

acf_add_local_field_group(array(
	'key' => 'group_60429a3d7ba39',
	'title' => 'GCommerce Gallery',
	'fields' => array(
		array(
			'key' => 'field_60425a48b4120',
			'label' => 'GCommerce Gallery Browser',
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
            'key' => 'field_60425a48b4121',
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
            'message' => $screenshot . '<br>Originally used in the Hotel Thu DRA, this block shows multiple shortcode galleries with dedicated buttons across the top.',
            'new_lines' => 'wpautop',
            'esc_html' => 0,
        ),
        array(
			'key' => 'field_60425a48b4122',
			'label' => 'Button Type',
			'name' => 'cta_type',
			'type' => 'radio',
			'instructions' => 'Choose the kind of button to load. If you do not make a choice here, the "Button" color settings in Theme Options will be applied.',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'btn-primary' => 'Primary',
				'btn-secondary' => 'Secondary',
				'btn-white' => 'White',
				'btn-black' => 'Black',
			),
			'allow_null' => 1,
			'other_choice' => 0,
			'default_value' => 'btn-primary',
			'layout' => 'horizontal',
			'return_format' => 'value',
			'save_other_choice' => 0,
		),
		array(
			'key' => 'field_60425a48b4123',
			'label' => 'Button Style',
			'name' => 'cta_style',
			'type' => 'radio',
			'instructions' => 'Should this button be solid or transparent? Transparent buttons will have text and a 2px border in the selected color (primary, secondary, white, or black), and a transparent background. On hover, the background becomes the selected color (primary, secondary, white, or black).',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'btn-solid' => 'Solid',
				'btn-transparent' => 'Transparent',
			),
			'allow_null' => 0,
			'other_choice' => 0,
			'default_value' => 'solid',
			'layout' => 'horizontal',
			'return_format' => 'value',
			'save_other_choice' => 0,
		),
		array(
			'key' => 'field_60425a48b4124',
			'label' => 'Galleries',
			'name' => 'galleries',
			'type' => 'repeater',
			'instructions' => 'Galleries to show in the block.',
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
			'layout' => 'table',
			'button_label' => 'Add Gallery',
			'sub_fields' => array(
				array(
					'key' => 'field_60425a48b4125',
					'label' => 'Shortcode',
					'name' => 'shortcode',
					'type' => 'text',
					'instructions' => 'Shortcode for the gallery, typically from RoboGallery.',
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
					'key' => 'field_60425a48b4126',
					'label' => 'Button Label',
					'name' => 'button_label',
					'type' => 'text',
					'instructions' => 'Label to go on the button at the top for this gallery.',
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
			),
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'block',
				'operator' => '==',
				'value' => 'acf/gcom-gallery',
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