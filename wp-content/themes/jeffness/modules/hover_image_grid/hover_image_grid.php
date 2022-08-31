<?php
// =========================================
//   CUSTOM IMAGE SIZES
// =========================================
// If you need to add custom image sizes for this module, do so here.
add_image_size( THEME_NAME . '-hover-image-grid', 414, 452, true );

// Add image sizes to drop down list when adding an image in the CMS
function hover_image_grid_custom_image_sizes( $sizes ) {
    return array_merge( $sizes, array(
        THEME_NAME . '-hover-image-grid' => __('414px by 452px (Hover Image Grid)'),
    ) );
}

add_filter( 'image_size_names_choose', 'hover_image_grid_custom_image_sizes' );

// =========================================
//   REGISTER THE GUTENBERG BLOCK
// =========================================
function register_acf_block_gcom_hover_image_grid() 
    {

        acf_register_block_type(array(
	    	'mode'				=> 'edit',
			'supports' => array( 'anchor' => true ),
            'name'              => 'gcom_hover_image_grid',
            'title'             => __('GCommerce Hover Image Grid'),
            'description'       => __('Three-row repeatable blocks with titles and images that can be clicked to go to a URL'),
            'render_template'   => 'modules/hover_image_grid/hover_image_grid_render.php',
            'category'          => 'formatting',
            'keywords'          => array('gcommerce', 'stile', 'layout', 'hover image grid'),
            'icon'              => 'cover-image',
            'enqueue_assets'    => function(){
                // Block assets
                wp_enqueue_style( 'hover-image-grid-style', get_template_directory_uri() . '/modules/hover_image_grid/hover_image_grid.css' );
            },

        ));
    }

// Check if function exists and hook into setup.
if( function_exists('acf_register_block_type') ) 
    {
        add_action('acf/init', 'register_acf_block_gcom_hover_image_grid');
    }

// =========================================
//   ADD THE FIELD GROUP
// =========================================
if( function_exists('acf_add_local_field_group') ):

    // Use the function from functions.php to get HTML showing the block screenshot or a message indicating it's unavailable.
    // First make sure the function exists, for backwards compatibility if adding a module to an older build.
    if( function_exists('stile_block_screenshot') ) {
        $screenshot = stile_block_screenshot('hover_image_grid');
    } else {
        $screenshot = 'GCom block screenshots not enabled.';
    }

acf_add_local_field_group(array(
    'key' => 'group_5f341b4edb0e3',
    'title' => 'GCommerce Hover Image Grid',
    'fields' => array(
        array(
            'key' => 'field_5f341b6c173b9',
            'label' => 'GCommerce Hover Image Grid',
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
            'key' => 'field_5f342b4cd24aa',
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
            'message' => $screenshot . '<br>3x grid with a large image and text below it, where the entire cell is clickable to go to a specified URL.',
            'new_lines' => 'wpautop',
            'esc_html' => 0,
        ),
        array(
            'key' => 'field_5f341b79173ba',
            'label' => 'Hover Blocks',
            'name' => 'hover_blocks',
            'type' => 'repeater',
            'instructions' => 'Each individual image / link block to be laid out in rows.',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'collapsed' => 'field_5f341bb3173bc',
            'min' => 0,
            'max' => 0,
            'layout' => 'block',
            'button_label' => '',
            'sub_fields' => array(
                array(
                    'key' => 'field_5f341bac173bb',
                    'label' => 'Image (414x452)',
                    'name' => 'image',
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
                    'preview_size' => 'Stile-hover-image-grid',
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
                    'key' => 'field_5f341bb3173bc',
                    'label' => 'Text',
                    'name' => 'text',
                    'type' => 'text',
                    'instructions' => 'Text to go below the image, by design this should be short, like one line.',
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
                    'key' => 'field_5f341bdd173bd',
                    'label' => 'Link',
                    'name' => 'link',
                    'type' => 'link',
                    'instructions' => 'Link where the user should go when the block is clicked.',
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
    ),
    'location' => array(
        array(
            array(
                'param' => 'block',
                'operator' => '==',
                'value' => 'acf/gcom-hover-image-grid',
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