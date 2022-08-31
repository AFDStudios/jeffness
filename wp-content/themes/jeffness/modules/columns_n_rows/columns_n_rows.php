<?php
// =========================================
//   CUSTOM IMAGE SIZES
// =========================================
// If you need to add custom image sizes for this module, do so here.
add_image_size( THEME_NAME . '-columns-n-rows-2', 877, 911, true );
add_image_size( THEME_NAME . '-columns-n-rows-3', 562, 911, true );
add_image_size( THEME_NAME . '-columns-n-rows-full', 1827, 911, true );

// Add image sizes to drop down list when adding an image in the CMS
function columns_n_rows_custom_image_sizes( $sizes ) {
    return array_merge( $sizes, array(
        THEME_NAME . '-columns-n-rows-2' => __('877px by 911px (Columns & Rows 2)'),
        THEME_NAME . '-columns-n-rows-2' => __('562px by 911px (Columns & Rows 3)'),
        THEME_NAME . '-columns-n-rows-full' => __('1827px by 911px (Columns & Rows Full)'),
    ) );
}

add_filter( 'image_size_names_choose', 'columns_n_rows_custom_image_sizes' );

// =========================================
//   REGISTER THE GUTENBERG BLOCK
// =========================================
function register_acf_block_columns_n_rows() 
	{

	    acf_register_block_type(array(
	    	'mode'				=> 'edit',
	        'name'              => 'columns_n_rows',
	        'title'             => __('GCommerce Stacked Columns & Rows'),
	        'description'       => __('Columns of stacked images, headlines, and CTAs arranged in rows of 2 or 3 columns.'),
	        'render_template'   => 'modules/columns_n_rows/columns_n_rows_render.php',
	        'category'          => 'formatting',
	        'keywords'			=> array('gcommerce', 'stile', 'layout', 'columns and rows'),
	        'icon' 				=> 'table-row-after',
	        'enqueue_assets'	=> function(){
	        	// Slick Slider
                wp_enqueue_script('slick-js', get_template_directory_uri() . '/assets/vendor/slick/slick.min.js', array( 'jquery' ), null, true );
                wp_enqueue_style( 'slick-style', get_template_directory_uri() . '/assets/vendor/slick/slick.css' );
                // Block Style
				wp_enqueue_style( 'columns-n-rows-style', get_template_directory_uri() . '/modules/columns_n_rows/columns_n_rows.css' );
				// Block JS
                wp_enqueue_script('columns-n-rows-js', get_template_directory_uri() . '/modules/columns_n_rows/columns_n_rows.min.js', array( 'jquery' ), null, true );
			},

	    ));
	}

// Check if function exists and hook into setup.
if( function_exists('acf_register_block_type') ) 
	{
	    add_action('acf/init', 'register_acf_block_columns_n_rows');
	}

// =========================================
//   ADD THE FIELD GROUP
// =========================================

if( function_exists('acf_add_local_field_group') ):

	// Use the function from functions.php to get HTML showing the block screenshot or a message indicating it's unavailable.
	// First make sure the function exists, for backwards compatibility if adding a module to an older build.
	if( function_exists('stile_block_screenshot') ) {
		$screenshot = stile_block_screenshot('columns_n_rows');
	} else {
		$screenshot = 'GCom block screenshots not enabled.';
	}

acf_add_local_field_group(array(
	'key' => 'group_604fb75eea553',
	'title' => 'Stacked Columns-n-Rows',
	'fields' => array(
		array(
			'key' => 'field_604fbed128bc7',
			'label' => 'GCommerce Stacked Columns & Rows',
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
            'key' => 'field_5e4a67e7ba2a06',
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
			'key' => 'field_604fba053bf00',
			'label' => 'Headline',
			'name' => 'headline',
			'type' => 'text',
			'instructions' => 'Large headline at the top of the row(s) of content.',
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
			'key' => 'field_604fba313bf01',
			'label' => 'Intro Copy',
			'name' => 'intro_copy',
			'type' => 'textarea',
			'instructions' => 'Optional paragraph content to go between the row(s) of content and the headline.',
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
			'key' => 'field_604fba4b3bf02',
			'label' => 'Background Texture',
			'name' => 'background_texture',
			'type' => 'image',
			'instructions' => 'Background texture to cover part of the area behind all of the content.',
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
            'key' => 'field_60eb2253f41ac',
            'label' => 'Ending Gallery',
            'name' => 'gallery',
            'type' => 'gallery',
            'instructions' => 'Choose images to go in the slider that appears after the rest of the items. If there is an odd number of blocks, the gallery will appear in a block. If there is an even number of blocks, the gallery will appear across the entire section.',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'return_format' => 'array',
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
			'key' => 'field_604fbaae3bf04',
			'label' => 'Columns',
			'name' => 'columns',
			'type' => 'repeater',
			'instructions' => 'Columns of content, consisting of an image, title, copy, and CTA.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'collapsed' => 'field_604fbac83bf05',
			'min' => 0,
			'max' => 0,
			'layout' => 'block',
			'button_label' => 'Add Column',
			'sub_fields' => array(
				array(
					'key' => 'field_604fbac83bf05',
					'label' => 'Image',
					'name' => 'image',
					'type' => 'image',
					'instructions' => 'Image to go at the top of the column, will be 877x911 for 2 column rows, and 562x911 for 3 column rows.',
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
					'key' => 'field_604fbbef1ce1a',
					'label' => 'Sub-Headline',
					'name' => 'subheadline',
					'type' => 'text',
					'instructions' => 'Optional smaller italics text above the main title.',
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
					'key' => 'field_604fbb023bf06',
					'label' => 'Title',
					'name' => 'title',
					'type' => 'text',
					'instructions' => 'Larger text to go below the image.',
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
					'key' => 'field_604fbb123bf07',
					'label' => 'Copy',
					'name' => 'copy',
					'type' => 'textarea',
					'instructions' => 'Short text to go below the headline.',
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
					'key' => 'field_604fbb233bf08',
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
            'key' => 'field_6e4a67e7ba2a06',
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
            'key' => 'field_6158d5b35be25',
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
            'message' => $screenshot . '<br>Lay out cells of images and text in a varying number of columns and rows.',
            'new_lines' => 'wpautop',
            'esc_html' => 0,
        ),
		array(
			'key' => 'field_604fb7e06ba63',
			'label' => 'Number of Columns',
			'name' => 'number_of_columns',
			'type' => 'radio',
			'instructions' => 'Choose how many columns the block should have. Content will automatically wrap to a new row when the limit is reached.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'columns-two' => 'Two columns',
				'columns-three' => 'Three columns',
			),
			'allow_null' => 0,
			'other_choice' => 0,
			'default_value' => '',
			'layout' => 'horizontal',
			'return_format' => 'value',
			'save_other_choice' => 0,
		),
		array(
			'key' => 'field_604fba653bf03',
			'label' => 'Background Position',
			'name' => 'background_position',
			'type' => 'radio',
			'instructions' => 'Where the background texture (if any) should go.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'top' => 'Top',
				'bottom' => 'Bottom',
			),
			'allow_null' => 0,
			'other_choice' => 0,
			'default_value' => 'top',
			'layout' => 'horizontal',
			'return_format' => 'value',
			'save_other_choice' => 0,
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'block',
				'operator' => '==',
				'value' => 'acf/columns-n-rows',
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