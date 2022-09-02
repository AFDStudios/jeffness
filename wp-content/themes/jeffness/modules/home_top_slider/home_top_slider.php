<?php
// =========================================
//   CUSTOM IMAGE SIZES
// =========================================
// If you need to add custom image sizes for this module, do so here.
add_image_size( THEME_NAME . '-home-top-slider', 1600, 770, true );
add_image_size( THEME_NAME . '-home-top-slider-mobile', 500, 630, true );

// Add image sizes to drop down list when adding an image in the CMS
function home_top_slider_custom_image_sizes( $sizes ) {
    return array_merge( $sizes, array(
        THEME_NAME . '-home-top-slider' => __('1600px by 770px (Home Top Slider)'),
        THEME_NAME . '-home-top-slider-mobile' => __('500px by 630px (Home Top Slider: Mobile)'),
    ) );
}

add_filter( 'image_size_names_choose', 'home_top_slider_custom_image_sizes' );

// =========================================
//   ADD THE FIELD GROUP
// =========================================

if( function_exists('acf_add_local_field_group') ):

	// Use the function from functions.php to get HTML showing the block screenshot or a message indicating it's unavailable.
	// First make sure the function exists, for backwards compatibility if adding a module to an older build.
	if( function_exists('stile_block_screenshot') ) {
		$screenshot = stile_block_screenshot('home_top_slider');
	} else {
		$screenshot = 'GCom block screenshots not enabled.';
	}

acf_add_local_field_group(array(
	'key' => 'group_5e2f460d2f841',
	'title' => 'GCommerce Header Block',
	'fields' => array(
		array(
			'key' => 'field_5f64c3036ee69',
			'label' => 'Video Embed Code',
			'name' => 'video_embed',
			'type' => 'text',
			'instructions' => 'If an auto-play, auto-looping, auto-muted background video is desired, enter its code here. This field requires the code portion of the video, NOT the full URL or iframe embed. For YouTube, if the URL is https://www.youtube.com/watch?v=vY0Ewx3WfFg or https://youtu.be/vY0Ewx3WfFg, the code to enter here is vY0Ewx3WfFg. For Vimeo, this is the number after the last slash in the URL. For instance, if the video URL is https://vimeo.com/212290387 then the ID you would enter here is 212290387.

If this field is filled out, none of the static slides will be shown; the user will see only the video.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '25',
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
			'key' => 'field_5f64c36a6ee6a',
			'label' => 'Video Type',
			'name' => 'video_type',
			'type' => 'radio',
			'instructions' => 'Select which type of video is being embedded.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '25',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'youtube' => 'YouTube',
				'vimeo' => 'Vimeo',
			),
			'allow_null' => 0,
			'other_choice' => 0,
			'default_value' => 'youtube',
			'layout' => 'horizontal',
			'return_format' => 'value',
			'save_other_choice' => 0,
		),
		array(
			'key' => 'field_5f64c36a6ee6b',
			'label' => 'Video Poster Image (1440x765)',
			'name' => 'video_poster',
			'type' => 'image',
			'instructions' => 'Big image that fills the background (1440x765) before the video loads.',
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
		array(
			'key' => 'field_5e2f4612b17c1',
			'label' => 'Overlay Color',
			'name' => 'overlay',
			'type' => 'radio',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '25',
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
			'default_value' => 'none',
			'layout' => 'vertical',
			'return_format' => 'value',
			'save_other_choice' => 0,
		),
		array(
			'key' => 'field_6f11f06dfe957',
			'label' => 'Bottom Border',
			'name' => 'bottom_border',
			'type' => 'image',
			'instructions' => '',
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
			'key' => 'field_5e2f4612018b0',
			'label' => 'Slides',
			'name' => 'home_top_slider_slides',
			'type' => 'repeater',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'collapsed' => 'field_5e2f466c018b1',
			'min' => 1,
			'max' => 0,
			'layout' => 'block',
			'button_label' => 'Add Slide',
			'sub_fields' => array(
				array(
					'key' => 'field_5e2f466c018b1',
					'label' => 'Slide Image (1600x770)',
					'name' => 'image',
					'type' => 'image',
					'instructions' => 'The large image.',
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
					'key' => 'field_5e56978e56ee0',
					'label' => 'Mobile Slide Image (500×630)',
					'name' => 'image_mobile',
					'type' => 'image',
					'instructions' => 'Optional mobile override image. If an image is selected here, it will show on devices that are 500px wide and below. If no image is selected here, the auto-cropped version of the larger one will be shown instead. This option is provided for a more tailored, purposeful image on mobile since sometimes auto-crops leave out the most important parts of the image, or are framed oddly, etc.',
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
					'key' => 'field_5e2f469d018b2',
					'label' => 'Sub-headline (Small)',
					'name' => 'sub-headline',
					'type' => 'text',
					'instructions' => 'The small-font headline appearing above the larger one.',
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
					'key' => 'field_5e2f46b9018b3',
					'label' => 'Headline (Big)',
					'name' => 'headline',
					'type' => 'text',
					'instructions' => 'The large-font headline between the small sub-headline and slide navigation (if any).',
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
					'key' => 'field_5e2f46d3018b4',
					'label' => 'Content',
					'name' => 'content',
					'type' => 'textarea',
					'instructions' => 'Longer-form text to go below the big headline.',
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
					'key' => 'field_5e2f46d3018b7',
					'label' => 'Video URL',
					'name' => 'video_url',
					'type' => 'text',
					'instructions' => 'If the slide should link to a video, add the URL here. Like https://youtu.be/yVBil2Z3C2c',
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
	),
	'location' => array(
		array(
			array(
				'param' => 'page_template',
				'operator' => '==',
				'value' => 'default',
			),
		),
		array(
			array(
				'param' => 'page_template',
				'operator' => '==',
				'value' => 'theme-modules.php',
			),
		),
		array(
			array(
				'param' => 'page_template',
				'operator' => '==',
				'value' => 'blog-archive.php',
			),
		),
		array(
			array(
				'param' => 'page_type',
				'operator' => '==',
				'value' => 'front_page',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'acf_after_title',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
));

endif;

?>