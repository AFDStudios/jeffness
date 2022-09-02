<?php
// =========================================
//   REGISTER THE GUTENBERG BLOCK
// =========================================
function register_acf_block_awards_strip() 
	{
	    acf_register_block_type(array(
	    	'mode'				=> 'edit',
			'supports' => array( 'anchor' => true ),
	        'name'              => 'awards_strip',
	        'title'             => __('GCommerce Awards Strip'),
	        'description'       => __('A row of icons showing various awards or affiliations.'),
	        'render_template'   => 'modules/awards_strip/awards_strip_render.php',
	        'category'          => 'formatting',
	        'keywords'			=> array('gcommerce', 'stile', 'layout', 'awards', 'strip' ),
	        'icon' 				=> 'editor-video',
	        'enqueue_assets'	=> function(){
				// Block styles and scripts
				wp_register_style( 'awards-strip-module-styles', get_template_directory_uri() . '/modules/awards_strip/awards_strip.css', array(), '', 'all' );
				wp_enqueue_style('awards-strip-module-styles');

				wp_enqueue_script('awards-strip-module-script', get_template_directory_uri() . '/modules/awards_strip/awards_strip.min.js', array(), '', 'all' ) ;
			},

	    ));
	}

// Check if function exists and hook into setup.
if( function_exists('acf_register_block_type') ) 
	{
	    add_action('acf/init', 'register_acf_block_awards_strip');
	}

// =========================================
//   ADD THE FIELD GROUP
// =========================================
if( function_exists('acf_add_local_field_group') ):

	// Use the function from functions.php to get HTML showing the block screenshot or a message indicating it's unavailable.
    // First make sure the function exists, for backwards compatibility if adding a module to an older build.
    if( function_exists('stile_block_screenshot') ) {
        $screenshot = stile_block_screenshot('awards_strip');
    } else {
        $screenshot = 'GCom block screenshots not enabled.';
    }

acf_add_local_field_group(array(
	'key' => 'group_5efccc81c944b',
	'title' => 'Gcommerce Awards Strip',
	'fields' => array(
		array(
			'key' => 'field_5efccd58afd5a',
			'label' => 'Gcommerce Awards Strip',
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
			'key' => 'field_5efccd564ec31',
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
			'key' => 'field_5efccd69afd58',
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
			'key' => 'field_5efccd69afd5b',
			'label' => 'Awards',
			'name' => 'awards',
			'type' => 'repeater',
			'instructions' => 'Icon / Text pairs for each award.',
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
					'key' => 'field_5efccd7cafd5c',
					'label' => 'Icon',
					'name' => 'icon',
					'type' => 'image',
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
					'key' => 'field_5efccd85afd5d',
					'label' => 'Headline',
					'name' => 'headline',
					'type' => 'text',
					'instructions' => 'Top row (bolded)',
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
					'key' => 'field_5efccef4ae3b0',
					'label' => 'Description',
					'name' => 'description',
					'type' => 'text',
					'instructions' => 'Short identifier for the specific kind of award.',
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
			'key' => 'field_5efccd564ec32',
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
            'key' => 'field_5efaad551e3af',
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
            'message' => $screenshot . '<br>A strip of icons or logos showing awards, affiliations, etc. Generally intended to be full width. Text is all optional.',
            'new_lines' => 'wpautop',
            'esc_html' => 0,
        ),
		array(
			'key' => 'field_5efccc92afd58',
			'label' => 'Text Color',
			'name' => 'text_color',
			'type' => 'color_picker',
			'instructions' => 'Choose a color for the text. By default this will be #afafaf.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '25',
				'class' => '',
				'id' => '',
			),
			'default_value' => '#afafaf',
		),
		array(
			'key' => 'field_5efccdcbdc32e',
			'label' => 'Background Color (Theme Options)',
			'name' => 'bg_color',
			'type' => 'select',
			'instructions' => 'Choose a background color if desired.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '25',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'bg-c1' => 'Primary Theme Color',
				'bg-c2' => 'Secondary Theme Color',
				'bg-white' => 'White Theme Color',
				'bg-black' => 'Black Theme Color',
			),
			'default_value' => array(
				0 => 'bg-c2',
			),
			'allow_null' => 1,
			'multiple' => 0,
			'ui' => 0,
			'return_format' => 'value',
			'ajax' => 0,
			'placeholder' => '',
		),
		array(
			'key' => 'field_5efccdd4dc32f',
			'label' => 'Background Color (custom)',
			'name' => 'bg_color_custom',
			'type' => 'color_picker',
			'instructions' => 'Choose an optional custom background color if one of the Theme Option Colors is not appropriate.',
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
			'key' => 'field_5efcccdcafd59',
			'label' => 'Alignment',
			'name' => 'alignment',
			'type' => 'select',
			'instructions' => 'Choose where in the row the awards and text should be aligned to.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '25',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'left' => 'Left Aligned',
				'right' => 'Right Aligned',
				'center' => 'Center Aligned',
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
	),
	'location' => array(
		array(
			array(
				'param' => 'block',
				'operator' => '==',
				'value' => 'acf/awards-strip',
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