<?php
// =========================================
//   CUSTOM IMAGE SIZES
// =========================================
// If you need to add custom image sizes for this module, do so here.
add_image_size( THEME_NAME . '-horizontal-gallery', 845, 500, true );

// Add image sizes to drop down list when adding an image in the CMS
function horizontal_gallery_custom_image_sizes( $sizes ) {
	return array_merge( $sizes, array(
		THEME_NAME . '-horizontal-gallery' => __('845px by 500px (Horizontal Gallery)'),
	) );
}

add_filter( 'image_size_names_choose', 'horizontal_gallery_custom_image_sizes' );

// =========================================
//   REGISTER THE GUTENBERG BLOCK
// =========================================
function register_acf_block_gcom_horizontal_gallery() 
	{

		acf_register_block_type(array(
	    	'mode'				=> 'edit',
			'supports' => array( 'anchor' => true ),
			'name'			  => 'gcom_horizontal_gallery',
			'title'			 => __('GCommerce Horizontal Gallery'),
			'description'	   => __('An alternate gallery block with one large image in the middle and an additional slider image to either side, with an overlay.'),
			'render_template'   => 'modules/horizontal_gallery/horizontal_gallery_render.php',
			'category'		  => 'formatting',
			'keywords'		  => array('gcommerce', 'stile', 'layout', 'horizontal gallery'),
			'icon'			  => 'tide',
			'enqueue_assets'	=> function(){
				// Flexslider
				wp_enqueue_style( 'flexslider-style', get_template_directory_uri() . '/assets/vendor/flexslider/flexslider.css' );
				wp_enqueue_script('flexslider-scripts', get_template_directory_uri() . '/assets/vendor/flexslider/jquery.flexslider-min.js', array('jquery'), '1.0.0', true);
				// Block assets
				wp_enqueue_script('horizontal-gallery-js', get_template_directory_uri() . '/modules/horizontal_gallery/horizontal_gallery.min.js', array( 'jquery' ), null, true );
				wp_enqueue_style( 'horizontal-gallery-style', get_template_directory_uri() . '/modules/horizontal_gallery/horizontal_gallery.css' );
			},

		));
	}

// Check if function exists and hook into setup.
if( function_exists('acf_register_block_type') ) 
	{
		add_action('acf/init', 'register_acf_block_gcom_horizontal_gallery');
	}

// =========================================
//   ADD THE FIELD GROUP
// =========================================

if( function_exists('acf_add_local_field_group') ):

	// Use the function from functions.php to get HTML showing the block screenshot or a message indicating it's unavailable.
	// First make sure the function exists, for backwards compatibility if adding a module to an older build.
	if( function_exists('stile_block_screenshot') ) {
		$screenshot = stile_block_screenshot('horizontal_gallery');
	} else {
		$screenshot = 'GCom block screenshots not enabled.';
	}

acf_add_local_field_group(array(
	'key' => 'group_5e4aea4d4d650',
	'title' => 'GCommerce Horizontal Gallery',
	'fields' => array(
		array(
			'key' => 'field_5e84a2959e072',
			'label' => 'GCommerce Horizontal Gallery',
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
			'key' => 'field_5e84ab9f90231',
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
			'key' => 'field_5e4aec9022d3d',
			'label' => 'Gallery Filter Title',
			'name' => 'filter_title',
			'type' => 'text',
			'instructions' => 'The words that should appear on the filter, like "Filter Gallery" or "Choose a Gallery". If blank, no label will appear.',
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
			'key' => 'field_5e4aea6f6808d',
			'label' => 'Gallery List',
			'name' => 'galleries',
			'type' => 'repeater',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'collapsed' => 'field_5e4aeab16808e',
			'min' => 0,
			'max' => 0,
			'layout' => 'row',
			'button_label' => 'Add Gallery',
			'sub_fields' => array(
				array(
					'key' => 'field_5e4aeab16808e',
					'label' => 'Gallery Title',
					'name' => 'gallery_title',
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
					'key' => 'field_5e4aead26808f',
					'label' => 'Gallery Images (845x500)',
					'name' => 'gallery_images',
					'type' => 'gallery',
					'instructions' => '',
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
			),
		),
		array(
			'key' => 'field_5e84ab9f90232',
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
			'key' => 'field_5e82a235fa016',
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
			'message' => $screenshot . '<br>Originally used in the Hotel Thu DRA, this block provides an alternate way to show galleries that does not use RoboGallery. Generally should be full-width.',
			'new_lines' => 'wpautop',
			'esc_html' => 0,
		),
		array(
			'key' => 'field_5e4aea6f6808e',
			'label' => 'Overlay Color',
			'name' => 'overlay',
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
				'bg-c1-opacity' => 'Transparent Theme Color 1',
				'bg-c2-opacity' => 'Transparent Theme Color 2',
				'bg-white-opacity' => 'Transparent White Theme Color',
				'bg-black-opacity' => 'Transparent Black Theme Color',
				'none' => 'No overlay',
			),
			'allow_null' => 0,
			'other_choice' => 0,
			'default_value' => 'bg-c1-opacity',
			'layout' => 'vertical',
			'return_format' => 'value',
			'save_other_choice' => 0,
		),
		array(
			'key' => 'field_5e4aea6f6808f',
			'label' => 'Text Color',
			'name' => 'text_color',
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
				'fg-c1' => 'Theme Color 1',
				'fg-c2' => 'Theme Color 2',
				'fg-white' => 'White Theme Color',
				'fg-black' => 'Black Theme Color',
				'fg-body' => 'Body Theme Color',
			),
			'allow_null' => 0,
			'other_choice' => 0,
			'default_value' => 'fg-body',
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
				'value' => 'acf/gcom-horizontal-gallery',
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