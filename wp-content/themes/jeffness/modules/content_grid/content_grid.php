<?php
// =========================================
//   REGISTER THE GUTENBERG BLOCK
// =========================================
function register_acf_block_gcom_content_grid() 
	{

		acf_register_block_type(array(
	    	'mode'				=> 'edit',
			'supports' => array( 'anchor' => true ),
			'name'			  => 'gcom_content_grid',
			'title'			 => __('GCommerce Content Grid'),
			'description'	   => __('Header, intro copy, and a grid of variable numbers of images and/or text.'),
			'render_template'   => 'modules/content_grid/content_grid_render.php',
			'category'		  => 'formatting',
			'keywords'		  => array('gcommerce', 'stile', 'layout', 'content grid'),
			'icon'			  => 'media-spreadsheet',
			'enqueue_assets'	=> function(){
				// Block assets
				wp_enqueue_style( 'content-grid-style', get_template_directory_uri() . '/modules/content_grid/content_grid.css' );
			},

		));
	}

// Check if function exists and hook into setup.
if( function_exists('acf_register_block_type') ) 
	{
		add_action('acf/init', 'register_acf_block_gcom_content_grid');
	}

// =========================================
//   ADD THE FIELD GROUP
// =========================================
if( function_exists('acf_add_local_field_group') ):

	// Use the function from functions.php to get HTML showing the block screenshot or a message indicating it's unavailable.
	// First make sure the function exists, for backwards compatibility if adding a module to an older build.
	if( function_exists('stile_block_screenshot') ) {
		$screenshot = stile_block_screenshot('content_grid');
	} else {
		$screenshot = 'GCom block screenshots not enabled.';
	}

acf_add_local_field_group(array(
	'key' => 'group_5eb9bda696c33',
	'title' => 'GCommerce Content Grid',
	'fields' => array(
		array(
			'key' => 'field_5ecbdc0cc1da4',
			'label' => 'Gcommerce Content Grid',
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
			'key' => 'field_5ecb4c0cf3cb1',
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
			'key' => 'field_5eb9bdb83562b',
			'label' => 'Headline',
			'name' => 'headline',
			'type' => 'text',
			'instructions' => 'Large headline at the top of the block.',
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
			'key' => 'field_5eb9bdcd3562c',
			'label' => 'Intro Text',
			'name' => 'intro_text',
			'type' => 'textarea',
			'instructions' => 'Introductory text below the headline but above the grid.',
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
			'key' => 'field_5eb9bde63562d',
			'label' => 'Grid Items',
			'name' => 'grid_items',
			'type' => 'repeater',
			'instructions' => 'Blocks of images, text, or both to appear in the grid.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'collapsed' => 'field_5eb9be353562f',
			'min' => 0,
			'max' => 0,
			'layout' => 'block',
			'button_label' => 'Add Grid Item',
			'sub_fields' => array(
				array(
					'key' => 'field_5eb9be353562f',
					'label' => 'Image / Logo',
					'name' => 'image',
					'type' => 'file',
					'instructions' => 'Image to go in the grid block. Ideally this should be a transparent PNG.',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'preview_size' => 'small',
					'return_format' => 'array',
					'library' => 'all',
					'min_size' => '',
					'max_size' => '',
					'mime_types' => '',
				),
				array(
					'key' => 'field_5eb9be5835630',
					'label' => 'Headline',
					'name' => 'headline',
					'type' => 'text',
					'instructions' => 'Optional headline to go at the top of the text block.',
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
					'key' => 'field_5eb9be6635631',
					'label' => 'Text',
					'name' => 'text',
					'type' => 'textarea',
					'instructions' => 'Optional text block.',
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
					'key' => 'field_5eb9be7935632',
					'label' => 'URL',
					'name' => 'url',
					'type' => 'url',
					'instructions' => 'Optional url where the user should go when the block is clicked.',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
				),
			),
		),
		array(
			'key' => 'field_5ecb4c0cf3cb2',
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
			'key' => 'field_5e1bad0c76ac2',
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
			'message' => $screenshot . '<br>The Content Grid is intended to arrange short content content – either text or images – into rows and columns. Each cell in the grid can have a URL associated with it where the user will go if the cell is clicked.',
			'new_lines' => 'wpautop',
			'esc_html' => 0,
		),
		array(
			'key' => 'field_5f063704505df',
			'label' => 'Headline Color',
			'name' => 'headline_color',
			'type' => 'color_picker',
			'instructions' => 'Override the default body text color with a custom one.',
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
			'key' => 'field_5eb9bea035633',
			'label' => 'Background Color',
			'name' => 'background_color',
			'type' => 'color_picker',
			'instructions' => 'Optional background color for this block, will go full width.',
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
			'key' => 'field_5eb9bdfb3562e',
			'label' => 'Number of Columns',
			'name' => 'columns',
			'type' => 'range',
			'instructions' => 'Number of columns the grid should have before wrapping to a new row.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => 3,
			'min' => 2,
			'max' => 5,
			'step' => '',
			'prepend' => '',
			'append' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'block',
				'operator' => '==',
				'value' => 'acf/gcom-content-grid',
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