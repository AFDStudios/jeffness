<?php
// =========================================
//   CUSTOM IMAGE SIZES
// =========================================
// If you need to add custom image sizes for this module, do so here.
add_image_size( THEME_NAME . '-header-static', 1440, 765, true );
add_image_size( THEME_NAME . '-header-static-tablet', 1024, 630, true );
add_image_size( THEME_NAME . '-header-static-mobile', 600, 630, true );

// Add image sizes to drop down list when adding an image in the CMS
function header_block_custom_image_sizes( $sizes ) {
    return array_merge( $sizes, array(
        THEME_NAME . '-header-static' => __('1440px by 765px (Header Block)'),
        THEME_NAME . '-header-static-tablet' => __('1024px by 630px (Header Block: Tablet)'),
       THEME_NAME . '-header-static-mobile' => __('500px by 630px (Header Block: Mobile)'),
    ) );
}

add_filter( 'image_size_names_choose', 'header_block_custom_image_sizes' );

// =========================================
//   ADD THE FIELD GROUP
// =========================================

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_5e348a36bd743',
	'title' => 'GCommerce Header Block',
	'fields' => array(
		array(
			'key' => 'field_5fa70a3f24bc1',
			'label' => 'Static Content',
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
			'key' => 'field_5e348a5d29324',
			'label' => 'Background Image (Desktop)',
			'name' => 'header_block_background_image',
			'type' => 'image',
			'instructions' => 'Big image that fills the background (1440x765) on desktop. Works best with darker photos with minimal white highlights and fewer intricate details.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '33',
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
			'key' => 'field_5e348a5d29329',
			'label' => 'Background Image (Tablet)',
			'name' => 'header_block_background_image_tablet',
			'type' => 'image',
			'instructions' => 'Optional dedicated tablet-sized image (1024x630) to take over when the screen size is 1024px wide or less.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '33',
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
			'key' => 'field_5e348a5d29330',
			'label' => 'Background Image (Mobile)',
			'name' => 'header_block_background_image_mobile',
			'type' => 'image',
			'instructions' => 'Optional dedicated tablet-sized image (600x630) to take over when the screen size is 600px wide or less.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '33',
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
			'key' => 'field_5e348a9e29325',
			'label' => 'Headline',
			'name' => 'header_block_headline',
			'type' => 'text',
			'instructions' => '',
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
			'key' => 'field_5e348abf29326',
			'label' => 'Sub-Headline',
			'name' => 'header_block_subheadline',
			'type' => 'text',
			'instructions' => '',
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
			'key' => 'field_5e348ae729327',
			'label' => 'Text Block',
			'name' => 'header_block_text',
			'type' => 'textarea',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '25',
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
			'key' => 'field_5e348afd29328',
			'label' => 'CTA',
			'name' => 'header_block_cta',
			'type' => 'link',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '25',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'array',
		),


		array(
			'key' => 'field_5fa70a3f24bc2',
			'label' => 'Video Content',
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
			'key' => 'field_5e348a5d29331',
			'label' => 'Video Embed Code',
			'name' => 'video_embed',
			'type' => 'text',
			'instructions' => 'If an auto-play, auto-looping, auto-muted background video is desired, enter its code here. This field requires the code portion of the video, NOT the full URL or iframe embed. For YouTube, if the URL is https://www.youtube.com/watch?v=vY0Ewx3WfFg or https://youtu.be/vY0Ewx3WfFg, the code to enter here is vY0Ewx3WfFg. For Vimeo, this is the number after the last slash in the URL. For instance, if the video URL is https://vimeo.com/212290387 then the ID you would enter here is 212290387.

If this field is filled out, none of the static slides will be shown; the user will see only the video.',
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
			'maxlength' => '',
		),
		array(
			'key' => 'field_5e348a5d29332',
			'label' => 'Video Type',
			'name' => 'video_type',
			'type' => 'radio',
			'instructions' => 'Select which type of video is being embedded.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '33',
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
			'key' => 'field_5e348a5d29333',
			'label' => 'Video Poster Image (1440x765)',
			'name' => 'video_poster',
			'type' => 'image',
			'instructions' => 'Big image that fills the background (1440x765) before the video loads.',
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
			'key' => 'field_5fa70a3f24bc3',
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
			'key' => 'field_5e348a5d29336',
			'label' => 'CTA Type',
			'name' => 'cta_type',
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
				'btn-primary' => 'Primary Button (Solid)',
				'btn-secondary' => 'Secondary Button (Solid)',
				'btn-white' => 'White Button (Solid)',
				'btn-black' => 'Black Button (Solid)',
				'btn-primary btn-transparent' => 'Primary Button (Transparent)',
				'btn-secondary btn-transparent' => 'Secondary Button (Transparent)',
				'btn-white btn-transparent' => 'White Button (Transparent)',
				'btn-black btn-transparent' => 'Black Button (Transparent)',
			),
			'allow_null' => 0,
			'other_choice' => 0,
			'default_value' => 'btn-white btn-transparent',
			'multiple' => 0,
			'ui' => 0,
			'return_format' => 'value',
			'ajax' => 0,
			'placeholder' => '',
		),
		array(
			'key' => 'field_5e348a5d29334',
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
				'fg-body' => 'Theme Body Color',
				'fg-white' => 'White Theme Color',
				'fg-black' => 'Black Theme Color',
			),
			'allow_null' => 0,
			'default_value' => 'fg-white',
			'multiple' => 0,
			'ui' => 0,
			'return_format' => 'value',
			'ajax' => 0,
			'placeholder' => '',
		),
		array(
			'key' => 'field_5e348a5d29335',
			'label' => 'Overlay Color',
			'name' => 'overlay',
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
				'none' => 'No overlay',
				'bg-c1-opacity' => 'Transparent Theme Color 1',
				'bg-c2-opacity' => 'Transparent Theme Color 2',
				'bg-white-opacity' => 'Transparent White Theme Color',
				'bg-black-opacity' => 'Transparent Black Theme Color',
			),
			'allow_null' => 0,
			'other_choice' => 0,
			'default_value' => 'none',
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
				'param' => 'page_type',
				'operator' => '!=',
				'value' => 'front_page',
			),
			array(
				'param' => 'post_type',
				'operator' => '!=',
				'value' => 'post',
			),
			array(
				'param' => 'post_type',
				'operator' => '!=',
				'value' => 'service',
			),
			array(
				'param' => 'post_type',
				'operator' => '!=',
				'value' => 'team',
			),
			array(
				'param' => 'post_type',
				'operator' => '!=',
				'value' => 'job',
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