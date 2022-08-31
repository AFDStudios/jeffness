<?php
// =========================================
//   CUSTOM IMAGE SIZES
// =========================================
// If you need to add custom image sizes for this module, do so here.
add_image_size( THEME_NAME . '-testimonial-bg', 1440, 300, true );

// Add image sizes to drop down list when adding an image in the CMS
function testimonial_slider_custom_image_sizes( $sizes ) {
    return array_merge( $sizes, array(
        THEME_NAME . '-testimonial-bg' => __('1440px by 300px (Testimonial BG)'),
    ) );
}

add_filter( 'image_size_names_choose', 'testimonial_slider_custom_image_sizes' );
// =========================================
//   REGISTER THE GUTENBERG BLOCK
// =========================================
function register_acf_block_testimonial_slider() 
	{

	    acf_register_block_type(array(
	    	'mode'				=> 'edit',
			'supports' => array( 'anchor' => true ),
	    	'mode'				=> 'edit',
	        'name'              => 'testimonial',
	        'title'             => __('GCommerce Testimonial Slider'),
	        'description'       => __('A background image and a quote over the top; will turn into a slider automatically if more than one quote is added.'),
	        'render_template'   => 'modules/testimonial_slider/testimonial_slider_render.php',
	        'category'          => 'formatting',
	        'keywords'			=> array('gcommerce', 'stile', 'layout', 'testimonial_slider'),
	        'icon' 				=> 'forms',
	        'enqueue_assets'	=> function(){
				wp_enqueue_style( 'flexslider-style', get_template_directory_uri() . '/assets/vendor/flexslider/flexslider.css' );
				wp_enqueue_script('flexslider-scripts', get_template_directory_uri() . '/assets/vendor/flexslider/jquery.flexslider-min.js', array('jquery'), '1.0.0', true);
				wp_enqueue_script('testimonial_slider-js', get_template_directory_uri() . '/modules/testimonial_slider/testimonial_slider.min.js', array( 'jquery' ), null, true );
				wp_enqueue_style( 'testimonial_slider-style', get_template_directory_uri() . '/modules/testimonial_slider/testimonial_slider.css' );
			},

	    ));
	}

// Check if function exists and hook into setup.
if( function_exists('acf_register_block_type') ) 
	{
	    add_action('acf/init', 'register_acf_block_testimonial_slider');
	}

// =========================================
//   ADD THE FIELD GROUP
// =========================================

if( function_exists('acf_add_local_field_group') ):

	// Use the function from functions.php to get HTML showing the block screenshot or a message indicating it's unavailable.
    // First make sure the function exists, for backwards compatibility if adding a module to an older build.
    if( function_exists('stile_block_screenshot') ) {
        $screenshot = stile_block_screenshot('testimonial_slider');
    } else {
        $screenshot = 'GCom block screenshots not enabled.';
    }

acf_add_local_field_group(array(
	'key' => 'group_5e3c797e9475d',
	'title' => 'GCommerce Testimonial Slider',
	'fields' => array(
		array(
			'key' => 'field_5e84a3d5a3dff',
			'label' => 'GCommerce Testimonial Slider',
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
			'key' => 'field_5c84b3d4a32f1',
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
			'key' => 'field_5e3c798740785',
			'label' => 'Headline',
			'name' => 'headline',
			'type' => 'text',
			'instructions' => 'Optional big headline that stays the same for all testimonials / quotes.',
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
			'key' => 'field_5e3c79a640786',
			'label' => 'Testimonials / Quotes',
			'name' => 'testimonials',
			'type' => 'repeater',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'collapsed' => 'field_5e3c79c640788',
			'min' => 0,
			'max' => 0,
			'layout' => 'block',
			'button_label' => 'Add Testimonial',
			'sub_fields' => array(
				array(
					'key' => 'field_5e3c79c640788',
					'label' => 'Client/Property Name',
					'name' => 'client',
					'type' => 'text',
					'instructions' => 'Top Row',
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
					'key' => 'field_5e3c79c640787',
					'label' => 'Text',
					'name' => 'quote',
					'type' => 'textarea',
					'instructions' => 'A single testimonial.',
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
					'key' => 'field_5e3c7f3ffc891',
					'label' => 'Attribution',
					'name' => 'attribution',
					'type' => 'text',
					'instructions' => 'Who said the quote.',
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
			'key' => 'field_5c84b3d4a32f2',
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
            'key' => 'field_5e84ad12a4eaa',
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
            'message' => $screenshot . '<br>A slider showing testimonials.',
            'new_lines' => 'wpautop',
            'esc_html' => 0,
        ),
		array(
			'key' => 'field_5e3c81e09f436',
			'label' => 'Text Color',
			'name' => 'text_color',
			'type' => 'select',
			'instructions' => 'Choose the color of the headline, quotes, and attributions.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '25',
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
				0 => 'fg-white',
			),
			'allow_null' => 0,
			'multiple' => 0,
			'ui' => 0,
			'return_format' => 'value',
			'ajax' => 0,
			'placeholder' => '',
		),
		array(
			'key' => 'field_5e8e32cc43bb9',
			'label' => 'Background Color',
			'name' => 'background_color',
			'type' => 'select',
			'instructions' => 'Choose a pre-set theme color for the background of this section.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '25',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'none' => 'No Background Color',
				'bg-c1' => 'Primary Theme Color',
				'bg-c2' => 'Secondary Theme Color',
				'bg-white' => 'White Theme Color',
				'bg-black' => 'Black Theme Color',
			),
			'default_value' => array(
				0 => 'none',
			),
			'allow_null' => 0,
			'multiple' => 0,
			'ui' => 0,
			'return_format' => 'value',
			'ajax' => 0,
			'placeholder' => '',
		),
		array(
			'key' => 'field_5e3c7d18ae24f',
			'label' => 'Background Color (Custom)',
			'name' => 'background_color_custom',
			'type' => 'color_picker',
			'instructions' => 'Optional custom background color. If selected, it will override a pre-set color option if any.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '25',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
		),
		array(
			'key' => 'field_5e3c7cee2146d',
			'label' => 'Background Image',
			'name' => 'background_image',
			'type' => 'image',
			'instructions' => 'Optional image to go behind the slider. If selected, it will layer on top of any selected background color. You can use a transparent PNG to get a textured effect.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '25',
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
	),
	'location' => array(
		array(
			array(
				'param' => 'block',
				'operator' => '==',
				'value' => 'acf/testimonial',
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