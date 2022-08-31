<?php
// =========================================
//   CUSTOM IMAGE SIZES
// =========================================
// If you need to add custom image sizes for this module, do so here.
add_image_size( THEME_NAME . '-parallax-short', 1920, 587, true );
add_image_size( THEME_NAME . '-parallax-normal', 1920, 762, true );
add_image_size( THEME_NAME . '-parallax-tall', 1920, 1071, true );

// Add image sizes to drop down list when adding an image in the CMS
function parallax_custom_image_sizes( $sizes ) {
	return array_merge( $sizes, array(
		THEME_NAME . '-parallax-short' => __('1920x587 (parallax-short)'),
		THEME_NAME . '-parallax-normal' => __('1920x762 (parallax-normal)'),
		THEME_NAME . '-parallax-tall' => __('1920x1071 (parallax-tall)'),
	) );
}

add_filter( 'image_size_names_choose', 'parallax_custom_image_sizes' );

// =========================================
//   REGISTER THE GUTENBERG BLOCK
// =========================================
function register_acf_block_gcom_parallax() 
	{

		acf_register_block_type(array(
			'supports' => array( 'anchor' => true ),
			'name'			  => 'gcom_parallax',
			'mode'			=> 'edit',
			'title'			 => __('GCommerce Parallax'),
			'description'	   => __('Sections with a background image that moves at a different rate than the rest of the page when scrolled.'),
			'render_template'   => 'modules/parallax/parallax_render.php',
			'category'		  => 'formatting',
			'keywords'		  => array('gcommerce', 'stile', 'layout', 'parallax'),
			'icon'			  => 'tide',
			'enqueue_assets'	=> function(){
				wp_enqueue_script('parallax-js', get_template_directory_uri() . '/modules/parallax/parallax.min.js', array( 'jquery' ), null, true );
				wp_enqueue_style( 'parallax-style', get_template_directory_uri() . '/modules/parallax/parallax.css' );
			},

		));
	}

// Check if function exists and hook into setup.
if( function_exists('acf_register_block_type') ) 
	{
		add_action('acf/init', 'register_acf_block_gcom_parallax');
	}

// =========================================
//   ADD THE FIELD GROUP
// =========================================

if( function_exists('acf_add_local_field_group') ):

	// Use the function from functions.php to get HTML showing the block screenshot or a message indicating it's unavailable.
	// First make sure the function exists, for backwards compatibility if adding a module to an older build.
	if( function_exists('stile_block_screenshot') ) {
		$screenshot = stile_block_screenshot('parallax');
	} else {
		$screenshot = 'GCom block screenshots not enabled.';
	}

acf_add_local_field_group(array(
	'key' => 'group_5e39c7922dbe5',
	'title' => 'GCom Parallax',
	'fields' => array(
		array(
			'key' => 'field_5ef0daa2a5103',
			'label' => 'Gcommerce Parallax',
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
			'open' => 1,
			'multi_expand' => 1,
			'endpoint' => 0,
		),
		array(
			'key' => 'field_5e39c7f7aa2f53',
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
			'key' => 'field_5e39c7f7aa2f52',
			'label' => 'Top Border',
			'name' => 'top_border_image',
			'type' => 'image',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50',
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
			'key' => 'field_5e39c7f7aa2f51',
			'label' => 'Bottom Border',
			'name' => 'bottom_border_image',
			'type' => 'image',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50',
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
			'key' => 'field_5e39c7ad24c14',
			'label' => 'Parallax Image',
			'name' => 'parallax_image',
			'type' => 'image',
			'instructions' => 'Large image to go in the background behind the text. Should be around 1500x880',
			'required' => 1,
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
			'key' => 'field_5ef10340253f8',
			'label' => 'Sub-Headline',
			'name' => 'sub_headline',
			'type' => 'text',
			'instructions' => 'Smaller headline to go above the main headline in gold.',
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
			'key' => 'field_5ef0de4fb8049',
			'label' => 'Headline',
			'name' => 'headline',
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
			'key' => 'field_5e39c7f024c15',
			'label' => 'Text',
			'name' => 'parallax_text',
			'type' => 'wysiwyg',
			'instructions' => 'Text to go over the parallax image',
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
			'key' => 'field_5e39c80924c16',
			'label' => 'CTA',
			'name' => 'cta',
			'type' => 'link',
			'instructions' => 'Optional Call To Action button.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '33',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'array',
		),
		array(
			'key' => 'field_5e3fc8b914d37',
			'label' => 'CTA 2',
			'name' => 'cta2',
			'type' => 'link',
			'instructions' => 'Optional Second Call To Action button.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '33',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'array',
		),
		array(
			'key' => 'field_5e39c7f7aa2f54',
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
			'key' => 'field_5ef0da5bf3214',
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
			'message' => $screenshot . '<br>Parallax sections scroll the background image at a speed different from the rest of the page to create movement. They should generally be set to full width.

Text color can be set from any of the theme options, and the text block can be placed in 6 different places. An optional overlay for the image can be set as well if the image is too dark or light. The headline can also be set to be any of four heading levels.',
			'new_lines' => 'wpautop',
			'esc_html' => 0,
		),
		array(
			'key' => 'field_5efca02fe104b',
			'label' => 'Height',
			'name' => 'height',
			'type' => 'select',
			'instructions' => 'Choose the minimum height of the overall section.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '33',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'short' => 'Short (587px)',
				'normal' => 'Normal (762px)',
				'tall' => 'Tall (1071px)',
			),
			'default_value' => 'tall',
			'allow_null' => 0,
			'multiple' => 0,
			'ui' => 0,
			'return_format' => 'value',
			'ajax' => 0,
			'placeholder' => '',
		),
		array(
			'key' => 'field_5efca02fe205c',
			'label' => 'Headline Style',
			'name' => 'headline_style',
			'type' => 'select',
			'instructions' => 'Choose the style of the headline. The headline will remain just a div but will have the selected class added to it.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '33',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'h1' => 'H1',
				'h2' => 'H2',
				'h3' => 'H3',
				'h4' => 'H4',
			),
			'default_value' => 'h1',
			'allow_null' => 0,
			'multiple' => 0,
			'ui' => 0,
			'return_format' => 'value',
			'ajax' => 0,
			'placeholder' => '',
		),
		array(
			'key' => 'field_6e29e21a47cbd',
			'label' => 'CTA Style',
			'name' => 'cta_style',
			'type' => 'select',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '33',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'btn-primary' => 'Primary Theme Color (Solid)',
				'btn-secondary' => 'Secondary Theme Color (Solid)',
				'btn-white' => 'White Theme Color (Solid)',
				'btn-black' => 'Black Theme Color (Solid)',
				'btn-primary btn-transparent' => 'Primary Theme Color (Transparent)',
				'btn-secondary btn-transparent' => 'Secondary Theme Color (Transparent)',
				'btn-white btn-transparent' => 'White Theme Color (Transparent)',
				'btn-black btn-transparent' => 'Black Theme Color (Transparent)',
			),
			'default_value' => array(
				'btn-black btn-transparent',
			),
			'allow_null' => 0,
			'multiple' => 0,
			'ui' => 0,
			'return_format' => 'value',
			'ajax' => 0,
			'placeholder' => '',
		),
		array(
			'key' => 'field_5efca02f6a23c',
			'label' => 'Text Box Width',
			'name' => 'text_width',
			'type' => 'select',
			'instructions' => 'Choose the maximum width of the text section.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '33',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'unconstrained' => '100% (unconstrained)',
				'constrained-width' => 'Constrained Width (1440px)',
				'constrained-width-narrow' => 'Constrained Width Narrow (1200px)',
				'constrained-width-ultra-narrow' => 'Constrained Width Ultra Narrow (758px)',
			),
			'default_value' => 'unconstrained',
			'allow_null' => 0,
			'multiple' => 0,
			'ui' => 0,
			'return_format' => 'value',
			'ajax' => 0,
			'placeholder' => '',
		),
		array(
			'key' => 'field_5ef0de77b804b',
			'label' => 'Text Color',
			'name' => 'text_color',
			'type' => 'select',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '33',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'fg-c1' => 'Theme Color 1',
				'fg-c2' => 'Theme Color 2',
				'fg-white' => 'White Theme Color',
				'fg-black' => 'Black Theme Color',
				'fg-body' => 'Body Theme Color',
				'fg-bd-sand-light' => 'Bandon Dunes Light Sand (#f0ecde)',
				'fg-bd-sand-dark' => 'Bandon Dunes Dark Sand (#e7e3d6)',
				'fg-bd-orange' => 'Bandon Dunes Orange-Brown (#cf8018)',
				'fg-bd-dark-green' => 'Bandon Dunes Dark Green (#1a322b)',
				'fg-bd-off-white' => 'Bandon Dunes Off-White (#fffcef)',
				'fg-bd-charcoal' => 'Bandon Dunes Charcoal (#434949)',
				'fg-bd-brown' => 'Bandon Dunes Brown (#88766b)',
			),
			'default_value' => 'fg-white',
			'allow_null' => 0,
			'multiple' => 0,
			'ui' => 0,
			'return_format' => 'value',
			'ajax' => 0,
			'placeholder' => '',
		),
		array(
			'key' => 'field_5ef0deb2b804c',
			'label' => 'Text Position',
			'name' => 'text_position',
			'type' => 'select',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '33',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'left-half' => 'Left Side, Half Width',
				'left-full' => 'Left Side, Full Width',
				'center-half' => 'Center, Half Width',
				'center-full' => 'Center, Full Width',
				'right-half' => 'Right Side, Half Width',
				'right-full' => 'Right Side, Full Width',
			),
			'default_value' => array(
			),
			'allow_null' => 0,
			'multiple' => 0,
			'ui' => 0,
			'return_format' => 'value',
			'ajax' => 0,
			'placeholder' => '',
		),
		array(
			'key' => 'field_5e39c21e55ab0',
			'label' => 'Background Position for Tablet & Mobile',
			'name' => 'background_position',
			'type' => 'text',
			'instructions' => 'Set the "background-position" attribute for the image on tablet and mobile (<768px) like "-500px center" or "right center".',
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
			'key' => 'field_5e39f21d58ba9',
			'label' => 'Overlay',
			'name' => 'overlay',
			'type' => 'select',
			'instructions' => 'Choose what kind of semi-transparent overlay (if any) should go between the text and the image. The opacity of the overlay is set in Theme Options -> Color.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'none' => 'None',
				'bg-c1-opacity' => 'Primary Theme Color',
				'bg-c2-opacity' => 'Secondary Theme Color',
				'bg-white-opacity' => 'Theme White',
				'bg-black-opacity' => 'Theme Black',
				'bg-bd-sand-light' => 'Bandon Dunes Light Sand (#f0ecde)',
				'bg-bd-sand-dark' => 'Bandon Dunes Dark Sand (#e7e3d6)',
				'bg-bd-orange' => 'Bandon Dunes Orange-Brown (#cf8018)',
				'bg-bd-dark-green' => 'Bandon Dunes Dark Green (#1a322b)',
				'bg-bd-off-white' => 'Bandon Dunes Off-White (#fffcef)',
				'bg-bd-charcoal' => 'Bandon Dunes Charcoal (#434949)',
				'bg-bd-brown' => 'Bandon Dunes Brown (#88766b)',
			),
			'default_value' => 'none',
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
				'value' => 'acf/gcom-parallax',
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
