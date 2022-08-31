<?php
// =========================================
//   REGISTER THE GUTENBERG BLOCKS
// =========================================
function register_common_gcom_acf_blocks() 
	{

		acf_register_block_type(array(
	    	'mode'				=> 'edit',
			'supports' => array( 'anchor' => true ),
			'name'			  => 'gcom_responsive_video_embed',
			'title'			 => __('GCommerce Responsive Video Embed'),
			'description'	   => __('Embed a video that will dynamically change size based on browser width.'),
			'render_template'   => 'modules/gcom_blocks/gcom_responsive_video_embed_render.php',
			'category'		  => 'formatting',
			'keywords'			=> array('gcommerce', 'stile', 'layout', 'video'),
			'icon' 				=> 'video-alt3',
			'enqueue_assets'	=> function(){
				wp_enqueue_style( 'gcom-responsive-video-embed-style', get_template_directory_uri() . '/modules/gcom_blocks/gcom_responsive_video_embed.css' );
			},

		));

	}

// Check if function exists and hook into setup.
if( function_exists('acf_register_block_type') ) 
	{
		add_action('acf/init', 'register_common_gcom_acf_blocks');
	}

// =========================================
//   ADD THE FIELD GROUP
// =========================================

// Responsive Video
if( function_exists('acf_add_local_field_group') ):

	// Responsive Video Embed
	acf_add_local_field_group(array(
		'key' => 'group_5e320fbfdcaab',
		'title' => 'GCommerce Responsive Video',
		'fields' => array(
			array(
				'key' => 'field_5e321025a45f6',
				'label' => 'Video iframe Code',
				'name' => 'video_url',
				'type' => 'text',
				'instructions' => 'The iframe embed URL for this video. For example, for a YouTube video this would be like &lt;iframe width="560" height="315" src="https://www.youtube.com/embed/eDvQv1U53zg?controls=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen&gt;&lt;/iframe&gt;',
				'required' => 1,
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
		'location' => array(
			array(
				array(
					'param' => 'block',
					'operator' => '==',
					'value' => 'acf/gcom-responsive-video-embed',
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