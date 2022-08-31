<?php
// =========================================
//   CUSTOM IMAGE SIZES
// =========================================
// If you need to add custom image sizes for this module, do so here.
add_image_size( THEME_NAME . '-checkerboard-default', 600, 800, true );
add_image_size( THEME_NAME . '-checkerboard-offset', 523, 360, true );
add_image_size( THEME_NAME . '-checkerboard-tall-blocks', 845, 640, true );

// Add image sizes to drop down list when adding an image in the CMS
function checkerboard_custom_image_sizes( $sizes ) {
    return array_merge( $sizes, array(
        THEME_NAME . '-checkerboard-default' => __('600px by 800px (Checkerboard Default)'),
        THEME_NAME . '-checkerboard-offset' => __('523px by 360px (Checkerboard Offset)'),
        THEME_NAME . '-checkerboard-tall-blocks' => __('845px by 640px (Checkerboard Tall Block)'),
    ) );
}

add_filter( 'image_size_names_choose', 'checkerboard_custom_image_sizes' );

// =========================================
//   REGISTER THE GUTENBERG BLOCK
// =========================================
function register_acf_block_checkerboard() 
	{

	    acf_register_block_type(array(
	    	'mode'				=> 'edit',
			'supports' => array( 'anchor' => true ),
	        'name'              => 'checkerboard',
	        'title'             => __('GCommerce Checkerboard'),
	        'description'       => __('A custom checkerboard block.'),
	        'render_template'   => 'modules/checkerboard/checkerboard_render.php',
	        'category'          => 'formatting',
	        'keywords'			=> array('gcommerce', 'stile', 'layout', 'checkerboard'),
	        'icon' 				=> 'forms',
	        'enqueue_assets'	=> function(){
	        	// Lightbox for videos
	        	wp_enqueue_style( 'fancybox-style', get_template_directory_uri() . '/assets/vendor/fancybox3/jquery.fancybox.min.css' );
				wp_enqueue_script('fancybox-scripts', get_template_directory_uri() . '/assets/vendor/fancybox3/jquery.fancybox.min.js', array('jquery'), '1.0.0', true);
	        	// Flexslider for slideshows
				wp_enqueue_style( 'flexslider-style', get_template_directory_uri() . '/assets/vendor/flexslider/flexslider.css' );
				wp_enqueue_script('flexslider-scripts', get_template_directory_uri() . '/assets/vendor/flexslider/jquery.flexslider-min.js', array('jquery'), '1.0.0', true);
				// Module-specific
				wp_enqueue_script('checkerboard-js', get_template_directory_uri() . '/modules/checkerboard/checkerboard.min.js', array( 'jquery' ), null, true );
				wp_enqueue_style( 'checkerboard-style', get_template_directory_uri() . '/modules/checkerboard/checkerboard.css' );
			},

	    ));
	}

// Check if function exists and hook into setup.
if( function_exists('acf_register_block_type') ) 
	{
	    add_action('acf/init', 'register_acf_block_checkerboard');
	}

// =========================================
//   ADD THE FIELD GROUP
// =========================================
if( function_exists('acf_add_local_field_group') ):

	// Use the function from functions.php to get HTML showing the block screenshot or a message indicating it's unavailable.
	// First make sure the function exists, for backwards compatibility if adding a module to an older build.
	if( function_exists('stile_block_screenshot') ) {
		$screenshot = stile_block_screenshot('checkerboard');
	} else {
		$screenshot = 'GCom block screenshots not enabled.';
	}

acf_add_local_field_group(array(
	'key' => 'group_5e541a50a37e2',
	'title' => 'GCommerce Checkerboard',
	'fields' => array(
		array(
			'key' => 'field_5f37033ffeaa8',
			'label' => 'GCommerce Checkerboard',
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
			'key' => 'field_5f37033fedcb9',
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
			'key' => 'field_5e541c5d27a1e',
			'label' => 'Checkerboard Rows',
			'name' => 'checkerboard_row',
			'type' => 'repeater',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => 'checkerboard-row-wrapper',
				'id' => '',
			),
			'collapsed' => 'field_5e541cd127a20',
			'min' => 1,
			'max' => 0,
			'layout' => 'block',
			'button_label' => 'Add Row',
			'sub_fields' => array(
				array(
					'key' => 'field_5e541d980ad5f',
					'label' => 'Row Type',
					'name' => 'row_type',
					'type' => 'radio',
					'instructions' => '',
					'required' => 1,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'choices' => array(
						'static' => 'Static Images',
						'video' => 'Video',
					),
					'allow_null' => 0,
					'other_choice' => 0,
					'default_value' => 'static',
					'layout' => 'vertical',
					'return_format' => 'value',
					'save_other_choice' => 0,
				),
				array(
					'key' => 'field_5e541dd70ad60',
					'label' => 'Video URL',
					'name' => 'video_url',
					'type' => 'text',
					'instructions' => 'URL for the video on YouTube, Vimeo, etc. like https://www.youtube.com/watch?v=DGIXT7ce3vQ',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5e541d980ad5f',
								'operator' => '==',
								'value' => 'video',
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
					'key' => 'field_5e541e070ad61',
					'label' => 'Video Poster',
					'name' => 'video_poster',
					'type' => 'image',
					'instructions' => 'Image to serve as the placeholder poster image beneath the play icon.',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5e541d980ad5f',
								'operator' => '==',
								'value' => 'video',
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
				array(
					'key' => 'field_5e541c8227a1f',
					'label' => 'Image(s)',
					'name' => 'images',
					'type' => 'gallery',
					'instructions' => 'Big image(s). If more than one is entered, it will automatically render as a slideshow.',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5e541d980ad5f',
								'operator' => '==',
								'value' => 'static',
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
					'key' => 'field_5e541cd127a20',
					'label' => 'Headline',
					'name' => 'headline',
					'type' => 'text',
					'instructions' => 'Big headline at the top of the text block.',
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
					'key' => 'field_5e541ce627a21',
					'label' => 'Sub-Headline',
					'name' => 'subheadline',
					'type' => 'text',
					'instructions' => 'Smaller headline below the main, underlined headline.',
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
					'key' => 'field_5e541cf227a22',
					'label' => 'Text',
					'name' => 'text',
					'type' => 'wysiwyg',
					'instructions' => 'Block of text below the headline.',
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
					'key' => 'field_5e541d0e27a23',
					'label' => 'CTA 1',
					'name' => 'cta',
					'type' => 'link',
					'instructions' => 'Primary Call to Action button.',
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
					'key' => 'field_5e541d5e23cf4',
					'label' => 'CTA 1 Type',
					'name' => 'cta_type',
					'type' => 'select',
					'instructions' => 'Choose the style of button for the first CTA.',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '50',
						'class' => '',
						'id' => '',
					),
					'choices' => array(
						'btn-primary' => 'Primary Theme CTA',
						'btn-secondary' => 'Secondary Theme CTA',
						'btn-black' => 'Black Theme CTA',
						'btn-white' => 'White Theme CTA',
						'btn-primary btn-transparent' => 'Transparent Primary Theme CTA',
						'btn-secondary btn-transparent' => 'Transparent Secondary Theme CTA',
						'btn-black btn-transparent' => 'Transparent Black Theme CTA',
						'btn-white btn-transparent' => 'Transparent White Theme CTA',
					),
					'default_value' => array(
						0 => 'btn-primary',
					),
					'allow_null' => 0,
					'multiple' => 0,
					'ui' => 0,
					'return_format' => 'value',
					'ajax' => 0,
					'placeholder' => '',
				),
				array(
					'key' => 'field_5e541d0e27a24',
					'label' => 'CTA 2',
					'name' => 'cta_2',
					'type' => 'link',
					'instructions' => 'Secondary Call to Action button.',
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
					'key' => 'field_5e541d5e23cf5',
					'label' => 'CTA 2 Type',
					'name' => 'cta_2_type',
					'type' => 'select',
					'instructions' => 'Choose the style of button for the second CTA.',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '50',
						'class' => '',
						'id' => '',
					),
					'choices' => array(
						'btn-primary' => 'Primary Theme CTA',
						'btn-secondary' => 'Secondary Theme CTA',
						'btn-black' => 'Black Theme CTA',
						'btn-white' => 'White Theme CTA',
						'btn-primary btn-transparent' => 'Transparent Primary Theme CTA',
						'btn-secondary btn-transparent' => 'Transparent Secondary Theme CTA',
						'btn-black btn-transparent' => 'Transparent Black Theme CTA',
						'btn-white btn-transparent' => 'Transparent White Theme CTA',
					),
					'default_value' => array(
						0 => 'btn-primary btn-transparent',
					),
					'allow_null' => 0,
					'multiple' => 0,
					'ui' => 0,
					'return_format' => 'value',
					'ajax' => 0,
					'placeholder' => '',
				),
			),
		),
		array(
			'key' => 'field_5f37033fedcba',
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
			'key' => 'field_5f3703a4aebc9',
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
			'message' => $screenshot . '<br>Repeated rows where the image column and the text column alternate between left and right. There are several different styles to choose from. Selecting full width will keep the rows to a constrained width, but are good for if you want a background image or color to go all the way across the screen.',
			'new_lines' => 'wpautop',
			'esc_html' => 0,
		),
		array(
			'key' => 'field_5e541bde27a1c',
			'label' => 'Row Layout',
			'name' => 'layout',
			'type' => 'radio',
			'instructions' => 'Choose the layout. Default is for the first row to lay out with the image on the left and the text on the right, with every other row the opposite. Choosing "Reverse" will swap that order.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'layout-default' => 'Default (image then text, then swapping)',
				'layout-reverse' => 'Reversed (text then image, then swapping)',
			),
			'allow_null' => 0,
			'other_choice' => 0,
			'default_value' => 'layout-default',
			'layout' => 'vertical',
			'return_format' => 'value',
			'save_other_choice' => 0,
		),
		array(
			'key' => 'field_5e541c1b27a1d',
			'label' => 'Checkerboard Style',
			'name' => 'checkerboard_style',
			'type' => 'radio',
			'instructions' => 'Choose the kind of checkerboard layout you want.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'style-default' => 'Equal Columns (Text and image columns are equal widths, image height is 800px.)',
				'style-offset' => 'Wider Text Column (Text column is wider than the image column, images are 360px tall by default. Text length should be very short. Image is always stuck to the top of the image column.)',
				'style-tall-blocks' => 'Wider Image Column (Text column is narrower than the image column, all rows are at least 640px tall.)',
			),
			'allow_null' => 0,
			'other_choice' => 0,
			'default_value' => 'style-offset',
			'layout' => 'vertical',
			'return_format' => 'value',
			'save_other_choice' => 0,
		),
		array(
			'key' => 'field_5e8ad0a6daf33',
			'label' => 'Whole Section Background Image',
			'name' => 'background_image',
			'type' => 'image',
			'instructions' => 'Image to go in the background of the entire section. Will be tiled if it does not fit.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '33',
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
			'key' => 'field_5e8cd0d6d5f57',
			'label' => 'Whole Section Background Color',
			'name' => 'background_color',
			'type' => 'select',
			'instructions' => 'Choose a color for the entire set of rows.',
			'required' => 0,
			'conditional_logic' => '',
			'wrapper' => array(
				'width' => '33',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'bg-white' => 'Theme White',
				'bg-black' => 'Theme Black',
				'bg-c1' => 'Primary Theme Color',
				'bg-c2' => 'Secondary Theme Color',
			),
			'default_value' => array(
				0 => '',
			),
			'allow_null' => 1,
			'multiple' => 0,
			'ui' => 0,
			'return_format' => 'value',
			'ajax' => 0,
			'placeholder' => '',
		),
		array(
			'key' => 'field_5e8cd0c724faf',
			'label' => 'Whole Section Background Color (custom)',
			'name' => 'background_color_custom',
			'type' => 'color_picker',
			'instructions' => 'Choose an optional custom background color if one of the Theme Option Colors is not appropriate.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '33',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
		),
		array(
			'key' => 'field_5e8c20364caf9',
			'label' => 'Text Column Background Color',
			'name' => 'background_color_text',
			'type' => 'select',
			'instructions' => 'Choose a color for the entire set of rows.',
			'required' => 0,
			'conditional_logic' => '',
			'wrapper' => array(
				'width' => '50',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'bg-white' => 'Theme White',
				'bg-black' => 'Theme Black',
				'bg-c1' => 'Primary Theme Color',
				'bg-c2' => 'Secondary Theme Color',
			),
			'default_value' => array(
				0 => '',
			),
			'allow_null' => 1,
			'multiple' => 0,
			'ui' => 0,
			'return_format' => 'value',
			'ajax' => 0,
			'placeholder' => '',
		),
		array(
			'key' => 'field_5e8c20364cafa',
			'label' => 'Text Column Background Color (custom)',
			'name' => 'background_color_text_custom',
			'type' => 'color_picker',
			'instructions' => 'Choose an optional custom background color if one of the Theme Option Colors is not appropriate.',
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
			'key' => 'field_5e8cd077d5f56',
			'label' => 'Text Color',
			'name' => 'text_color',
			'type' => 'select',
			'instructions' => 'Choose a color for the text.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'fg-c1' => 'Primary Theme Color',
				'fg-c2' => 'Secondary Theme Color',
				'fg-white' => 'White Theme Color',
				'fg-black' => 'Black Theme Color',
				'fg-body' => 'Body Theme Color',
			),
			'default_value' => array(
				0 => 'fg-body',
			),
			'allow_null' => 0,
			'multiple' => 0,
			'ui' => 0,
			'return_format' => 'value',
			'ajax' => 0,
			'placeholder' => '',
		),

		array(
			'key' => 'field_53a912a1g123b1',
			'label' => 'Animation Type',
			'name' => 'animation_type',
			'type' => 'select',
			'instructions' => 'Choose an animation style for this block.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '33',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'fade-in' => 'Fade In',
				'slide-up' => 'Slide Up',
				'slide-right' => 'Slide Right',
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
			'key' => 'field_53a912a1g123b2',
			'label' => 'Animation Speed',
			'name' => 'animation_speed',
			'type' => 'number',
			'instructions' => 'Choose a speed in milliseconds for the animation. If blank, the default speed will be applied.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '33',
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
			'key' => 'field_6197e517827fa',
			'label' => 'Gap Between Rows (in pixels)',
			'name' => 'gap',
			'type' => 'number',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '33',
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
				'value' => 'acf/checkerboard',
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