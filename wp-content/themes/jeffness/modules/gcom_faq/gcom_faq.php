<?php
// =========================================
//   REGISTER THE GUTENBERG BLOCK
// =========================================
function register_acf_block_gcom_faq() 
	{
	    acf_register_block_type(array(
			'supports' => array( 'anchor' => true ),
	    	'mode'				=> 'edit',
	        'name'              => 'gcom_faq',
	        'title'             => __('GCommerce FAQ'),
	        'description'       => __('Frequently Asked Questions block, including integrated schema, the option to make questions toggleable, etc.'),
	        'render_template'   => 'modules/gcom_faq/gcom_faq_render.php',
	        'category'          => 'formatting',
	        'keywords'			=> array('gcommerce', 'stile', 'layout', 'faq', 'frequently asked questions', 'schema' ),
	        'icon' 				=> 'editor-help',
	        'enqueue_assets'	=> function(){
				// Block styles and scripts
				wp_register_style( 'gcom-faq-module-styles', get_template_directory_uri() . '/modules/gcom_faq/gcom_faq.css', array(), '', 'all' );
				wp_enqueue_style('gcom-faq-module-styles');

				wp_enqueue_script('gcom-faq-module-script', get_template_directory_uri() . '/modules/gcom_faq/gcom_faq.min.js', array(), '', 'all' ) ;
			},

	    ));
	}

// Check if function exists and hook into setup.
if( function_exists('acf_register_block_type') ) 
	{
	    add_action('acf/init', 'register_acf_block_gcom_faq');
	}

// =========================================
//   ADD THE FIELD GROUP
// =========================================

if( function_exists('acf_add_local_field_group') ):

	// Use the function from functions.php to get HTML showing the block screenshot or a message indicating it's unavailable.
    // First make sure the function exists, for backwards compatibility if adding a module to an older build.
    if( function_exists('stile_block_screenshot') ) {
        $screenshot = stile_block_screenshot('gcom_faq');
    } else {
        $screenshot = 'GCom block screenshots not enabled.';
    }

	acf_add_local_field_group(array(
		'key' => 'group_5e6a96fc3df7a',
		'title' => 'GCommerce FAQ',
		'fields' => array(
			array(
				'key' => 'field_5e84a227cb13c',
				'label' => 'GCommerce FAQ',
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
				'key' => 'field_5e84a227bf42d',
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
				'key' => 'field_5e6a97093ed22',
				'label' => 'Headline',
				'name' => 'headline',
				'type' => 'text',
				'instructions' => 'Overall headline for the section.',
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
				'key' => 'field_5e6a98083329f',
				'label' => 'Text Area',
				'name' => 'text_area',
				'type' => 'wysiwyg',
				'instructions' => 'Optional text area for introductory copy.',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'tabs' => 'all',
				'toolbar' => 'full',
				'media_upload' => 1,
				'delay' => 0,
			),
			array(
				'key' => 'field_5e6a990b332a4',
				'label' => 'Questions & Answers',
				'name' => 'faqs',
				'type' => 'repeater',
				'instructions' => '',
				'required' => 1,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'collapsed' => 'field_5e6a991d332a5',
				'min' => 0,
				'max' => 0,
				'layout' => 'block',
				'button_label' => 'Add Another Question & Answer',
				'sub_fields' => array(
					array(
						'key' => 'field_5e6a991d332a5',
						'label' => 'Question',
						'name' => 'question',
						'type' => 'text',
						'instructions' => '',
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
						'key' => 'field_5e6a9949332a6',
						'label' => 'Answer',
						'name' => 'answer',
						'type' => 'wysiwyg',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'tabs' => 'all',
						'toolbar' => 'full',
						'media_upload' => 1,
						'delay' => 0,
					),
				),
			),
			array(
				'key' => 'field_5e84a227bf42e',
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
	            'key' => 'field_5e84a2314f12a',
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
	            'message' => $screenshot . '<br>Frequently Asked Questions block, including integrated schema, the option to make questions toggleable, etc.',
	            'new_lines' => 'wpautop',
	            'esc_html' => 0,
	        ),
			array(
				'key' => 'field_5e6a97547f7fe',
				'label' => 'Themed Background Color (optional)',
				'name' => 'background_color',
				'type' => 'select',
				'instructions' => 'Choose a background color for the entire page.',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '50',
					'class' => '',
					'id' => '',
				),
				'choices' => array(
					'bg-c1' => 'Primary Theme Color from Theme Options',
					'bg-c2' => 'Secondary Theme Color from Theme Options',
					'bg-white' => 'White Theme Color from Theme Options',
					'bg-black' => 'Black Theme Color from Theme Options',
				),
				'default_value' => array(
				),
				'allow_null' => 1,
				'multiple' => 0,
				'ui' => 0,
				'return_format' => 'value',
				'ajax' => 0,
				'placeholder' => '',
			),
			array(
				'key' => 'field_5e6a975d7f7ff',
				'label' => 'Custom Background Color (optional)',
				'name' => 'background_color_custom',
				'type' => 'color_picker',
				'instructions' => 'If a custom background color is required instead of one of the pre-set theme colors, enter it here.',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '50',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
			),
			array(
				'key' => 'field_5e6a97687f800',
				'label' => 'Background Image (optional)',
				'name' => 'background_image',
				'type' => 'image',
				'instructions' => 'Choose a pattern or image to use as a background image for the entire page.',
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
				'key' => 'field_5e6a982f332a0',
				'label' => 'Output Schema?',
				'name' => 'output_schema',
				'type' => 'true_false',
				'instructions' => 'Choose whether to add schema output for the FAQ.',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'message' => '',
				'default_value' => 1,
				'ui' => 0,
				'ui_on_text' => '',
				'ui_off_text' => '',
			),
			array(
				'key' => 'field_5e6a9855332a1',
				'label' => 'FAQ Style',
				'name' => 'faq_style',
				'type' => 'radio',
				'instructions' => 'Choose what kind of FAQ list to output.',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'choices' => array(
					'standard' => 'Standard - All questions and answers are exposed at all times',
					'accordion-open' => 'Accordion All Open - Questions can be expanded or collapsed to show and hide their answers, all questions are open on initial page load',
					'accordion-closed' => 'Accordion All Closed - Questions can be expanded or collapsed to show and hide their answers, all questions are closed on initial page load',
				),
				'allow_null' => 0,
				'other_choice' => 0,
				'default_value' => '',
				'layout' => 'vertical',
				'return_format' => 'value',
				'save_other_choice' => 0,
			),
			array(
				'key' => 'field_5e6a98b2332a2',
				'label' => 'Closed Icon',
				'name' => 'closed_icon',
				'type' => 'text',
				'instructions' => 'Enter the Font Awesome 5 icon string to use as an icon when the question is collapsed (the answer is hidden). If this is left blank, the default is <i class="fas fa-plus"></i>',
				'required' => 0,
				'conditional_logic' => array(
					array(
						array(
							'field' => 'field_5e6a9855332a1',
							'operator' => '!=',
							'value' => 'standard',
						),
					),
				),
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
				'key' => 'field_5e6a98e6332a3',
				'label' => 'Open Icon',
				'name' => 'open_icon',
				'type' => 'text',
				'instructions' => 'Enter the Font Awesome 5 icon string to use as an icon when the question is expanded (the answer is visible). If blank, the icon will be <i class="fas fa-minus"></i>',
				'required' => 0,
				'conditional_logic' => array(
					array(
						array(
							'field' => 'field_5e6a9855332a1',
							'operator' => '!=',
							'value' => 'standard',
						),
					),
				),
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
		'location' => array(
			array(
				array(
					'param' => 'block',
					'operator' => '==',
					'value' => 'acf/gcom-faq',
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