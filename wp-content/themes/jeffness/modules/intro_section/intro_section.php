<?php
// =========================================
//   REGISTER THE GUTENBERG BLOCK
// =========================================
function register_acf_block_intro_section() 
	{
	    acf_register_block_type(array(
	    	'mode'				=> 'edit',
			'supports' => array( 'anchor' => true ),
	        'name'              => 'intro_section',
	        'title'             => __('GCommerce Intro Section'),
	        'description'       => __('Intended to go at the top of a page, featuring a smaller sub-headline, large headline, intro copy, and optional CTAs.'),
	        'render_template'   => 'modules/intro_section/intro_section_render.php',
	        'category'          => 'formatting',
	        'mode' 				=> 'edit',
	        'keywords'			=> array('gcommerce', 'stile', 'layout', 'intro section', 'introduction' ),
	        'icon' 				=> 'align-full-width',
	        'enqueue_assets'	=> function(){
				// Block styles and scripts
				wp_register_style( 'gcom-intro-section-module-styles', get_template_directory_uri() . '/modules/intro_section/intro_section.css', array(), '', 'all' );
				wp_enqueue_style('gcom-intro-section-module-styles');
			},

	    ));
	}

// Check if function exists and hook into setup.
if( function_exists('acf_register_block_type') ) 
	{
	    add_action('acf/init', 'register_acf_block_intro_section');
	}

// =========================================
//   ADD THE FIELD GROUP
// =========================================

if( function_exists('acf_add_local_field_group') ):

	// Use the function from functions.php to get HTML showing the block screenshot or a message indicating it's unavailable.
	// First make sure the function exists, for backwards compatibility if adding a module to an older build.
	if( function_exists('stile_block_screenshot') ) {
		$screenshot = stile_block_screenshot('intro_section');
	} else {
		$screenshot = 'GCom block screenshots not enabled.';
	}	

acf_add_local_field_group(array(
	'key' => 'group_6160b50487850',
	'title' => 'GCommerce Intro Section',
	'fields' => array(
		array(
			'key' => 'field_6160b5ca631ab',
			'label' => 'GCommerce Intro Section',
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
			'key' => 'field_6160b5c2e2a4c',
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
			'message' => $screenshot . '<br>Intended to go at the top of a page, featuring a smaller sub-headline, large headline, intro copy, and optional CTAs.',
			'new_lines' => 'wpautop',
			'esc_html' => 0,
		),
		array(
			'key' => 'field_6160b52a0159e',
			'label' => 'Background Image',
			'name' => 'bg_image',
			'type' => 'image',
			'instructions' => '',
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
			'key' => 'field_6160b53b0159f',
			'label' => 'Sub-Headline',
			'name' => 'sub_headline',
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
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_6160b54a015a0',
			'label' => 'Headline',
			'name' => 'headline',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50',
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
			'key' => 'field_6185a5e25261c',
			'label' => 'Headline Type',
			'name' => 'headline_type',
			'type' => 'select',
			'instructions' => 'Choose the output for the headline, either as an actual heading tag or just with the heading style (output as a div with the heading class).',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'h1' => 'H1 Tag',
				'h2' => 'H2 Tag',
				'h3' => 'H3 Tag',
				'h4' => 'H4 Tag',
				'h1-class' => 'H1 Class',
				'h2-class' => 'H2 Class',
				'h3-class' => 'H3 Class',
				'h4-class' => 'H4 Class',
			),
			'default_value' => 'h1-class',
			'allow_null' => 0,
			'multiple' => 0,
			'ui' => 0,
			'return_format' => 'value',
			'ajax' => 0,
			'placeholder' => '',
		),
		array(
			'key' => 'field_6160b54e015a1',
			'label' => 'Text Block',
			'name' => 'text_block',
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
		array(
			'key' => 'field_618d7f8fdd1f0',
			'label' => 'Callouts',
			'name' => 'callouts',
			'type' => 'repeater',
			'instructions' => 'Intended for the Single Room page, icon/text pairs pointing out individual amenities or features for each room consisting of an icon and description text.',
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
			'button_label' => '',
			'sub_fields' => array(
				array(
					'key' => 'field_618d7faddd1f1',
					'label' => 'Font Awesome 5 Icon',
					'name' => 'icon_fa5',
					'type' => 'text',
					'instructions' => 'Insert the entire <i> tag for this icon from https://fontawesome.com/v5.15/icons',
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
					'key' => 'field_618d7fd9dd1f2',
					'label' => 'Custom Icon',
					'name' => 'icon_custom',
					'type' => 'image',
					'instructions' => 'Upload a custom icon here. If this field has an image in it, it will be used even if the Font Awesome 5 field has content in it.',
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
					'key' => 'field_618d7ff8dd1f3',
					'label' => 'Description',
					'name' => 'description',
					'type' => 'text',
					'instructions' => 'Short description of the amenity or room feature.',
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
		array(
			'key' => 'field_6160b555015a2',
			'label' => 'CTAs',
			'name' => 'ctas',
			'type' => 'repeater',
			'instructions' => '',
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
			'button_label' => '',
			'sub_fields' => array(
				array(
					'key' => 'field_6160b562015a3',
					'label' => 'CTA',
					'name' => 'cta',
					'type' => 'link',
					'instructions' => '',
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
		array(
			'key' => 'field_6160b555015a3',
			'label' => 'CTA Type',
			'name' => 'cta_type',
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
				'btn-underline-primary' => 'Primary color underline',
				'btn-underline-secondary' => 'Secondary color underline',
				'btn-underline-black' => 'Black color underline',
				'btn-underline-white' => 'White color underline',
			),
			'default_value' => 'btn-underline-primary',
			'allow_null' => 0,
			'multiple' => 0,
			'ui' => 0,
			'return_format' => 'value',
			'ajax' => 0,
			'placeholder' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'block',
				'operator' => '==',
				'value' => 'acf/intro-section',
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