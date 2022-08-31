<?php
// =========================================
//   REGISTER THE GUTENBERG BLOCK
// =========================================
function register_acf_block_two_column_image_text() 
	{

		acf_register_block_type(array(
			'name'			  => 'two_column_image_text',
			'title'			 => __('GCommerce Two Column (Image & Text)'),
			'description'	   => __('Background image behind two columns, one for an image and one for a text block'),
			'render_template'   => 'modules/two_column_image_text/two_column_image_text_render.php',
			'category'		  => 'formatting',
			'keywords'		  => array('gcommerce', 'stile', 'layout', 'two column', 'columns'),
			'icon'			  => 'align-pull-right',
			'enqueue_assets'	=> function(){
				// Block styles and scripts
				wp_register_style( 'gcom-two-column-image-text-module-styles', get_template_directory_uri() . '/modules/two_column_image_text/two_column_image_text.css', array(), '', 'all' );
				wp_enqueue_style('gcom-two-column-image-text-module-styles');
			},

		));
	}

// Check if function exists and hook into setup.
if( function_exists('acf_register_block_type') ) 
	{
		add_action('acf/init', 'register_acf_block_two_column_image_text');
	}

// =========================================
//   ADD THE FIELD GROUP
// =========================================

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_61731cd781d6b',
	'title' => 'Two Column Image & Text',
	'fields' => array(
		array(
			'key' => 'field_617326c735866',
			'label' => 'GCommerce Two Column (Text & Image)',
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
			'key' => 'field_61731ceb2f577',
			'label' => 'Background Image',
			'name' => 'background_image',
			'type' => 'image',
			'instructions' => '',
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
			'key' => 'field_61731da82f57d',
			'label' => 'Background Image Position',
			'name' => 'image_position',
			'type' => 'select',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_61731d282f579',
						'operator' => '==',
						'value' => 'image',
					),
				),
			),
			'wrapper' => array(
				'width' => '50',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'top' => 'Top',
				'middle' => 'Middle',
				'bottom' => 'bottom',
			),
			'default_value' => false,
			'allow_null' => 0,
			'multiple' => 0,
			'ui' => 0,
			'return_format' => 'value',
			'ajax' => 0,
			'placeholder' => '',
		),
		array(
			'key' => 'field_61731d282f321',
			'label' => 'Stacked Order',
			'name' => 'columns_order',
			'type' => 'radio',
			'instructions' => 'Order the columns should be in when on smaller screens they stack on top of each other instead of laying out in a row.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'default' => 'Default (left column over right column)',
				'reverse' => 'Reverse (right column over left column)',
			),
			'allow_null' => 0,
			'other_choice' => 0,
			'default_value' => 'default',
			'layout' => 'horizontal',
			'return_format' => 'value',
			'save_other_choice' => 0,
		),
		array(
			'key' => 'field_61731d082f578',
			'label' => 'Columns',
			'name' => 'columns',
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
			'min' => 2,
			'max' => 2,
			'layout' => 'block',
			'button_label' => '',
			'sub_fields' => array(
				array(
					'key' => 'field_61731d282f579',
					'label' => 'Column Type',
					'name' => 'column_type',
					'type' => 'radio',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'choices' => array(
						'text' => 'Text',
						'image' => 'Image',
					),
					'allow_null' => 0,
					'other_choice' => 0,
					'default_value' => '',
					'layout' => 'horizontal',
					'return_format' => 'value',
					'save_other_choice' => 0,
				),
				array(
					'key' => 'field_61731d432f57a',
					'label' => 'Headline',
					'name' => 'headline',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_61731d282f579',
								'operator' => '==',
								'value' => 'text',
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
					'key' => 'field_61731d572f57b',
					'label' => 'Text Block',
					'name' => 'text_block',
					'type' => 'wysiwyg',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_61731d282f579',
								'operator' => '==',
								'value' => 'text',
							),
						),
					),
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
					'key' => 'field_61731d6d2f57c',
					'label' => 'Image',
					'name' => 'image',
					'type' => 'image',
					'instructions' => 'The image will output at its actual size so please upload responsibly.',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_61731d282f579',
								'operator' => '==',
								'value' => 'image',
							),
						),
					),
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
			),
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'block',
				'operator' => '==',
				'value' => 'acf/two-column-image-text',
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