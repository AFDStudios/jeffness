<?php
// =========================================
//   CUSTOM IMAGE SIZE
// =========================================
// For use in the shortcode, for including just one post with an id. 
add_image_size( THEME_NAME . '-blog-post-shortcode-thumbnail', 163, 119, true );
add_image_size( THEME_NAME . '-blog-recent-thumbnail', 414, 452, true );
add_image_size( THEME_NAME . '-blog-archive-thumbnail', 522, 569, true );

// Add image sizes to drop down list when adding an image in the CMS
function gcom_blog_custom_image_sizes( $sizes ) {
    return array_merge( $sizes, array(
        THEME_NAME . '-big-center-slider' => __('847px by 582px (Big Center Slider)'),

        THEME_NAME . '-blog-post-shortcode-thumbnail' => __('163x119 (Blog Shortcode Thumbnail)'),
		THEME_NAME . '-blog-recent-thumbnail' => __('414x452 (Blog Recent Posts Thumbnail)'),
		THEME_NAME . '-blog-archive-thumbnail' => __('522x569 (Blog Archive Page Thumbnail)'),
    ) );
}

add_filter( 'image_size_names_choose', 'gcom_blog_custom_image_sizes' );

// =========================================
//   REGISTER THE GUTENBERG BLOCKS
// =========================================
function register_acf_block_gcom_blog_blocks() 
	{
	    acf_register_block_type(array(
	    	'mode'				=> 'edit',
	        'name'              => 'single_post_excerpt',
	        'title'             => __('Post Excerpt(s)'),
	        'description'       => __('Show an excerpt of a single post.'),
	        'render_template'   => 'modules/blog/blog_single_post_excerpt_render.php',
	        'category'          => 'formatting',
	        'keywords'			=> array('gcommerce', 'stile', 'layout', 'blog', 'single post excerpt'),
	        'icon' 				=> 'excerpt-view',
	        'enqueue_assets'	=> function(){
				wp_register_style( 'blog-module-styles', get_template_directory_uri() . '/modules/blog/blog.css', array(), '', 'all' );
				wp_enqueue_style('blog-module-styles');
			},

	    ));

	    acf_register_block_type(array(
	    	'mode'				=> 'edit',
	        'name'              => 'most_recent_posts',
	        'title'             => __('Most Recent Posts'),
	        'description'       => __('Show a number of other posts.'),
	        'render_template'   => 'modules/blog/blog_most_recent_render.php',
	        'category'          => 'formatting',
	        'keywords'			=> array('gcommerce', 'stile', 'layout', 'blog', 'most recent posts'),
	        'icon' 				=> 'editor-table',
	        'enqueue_assets'	=> function(){
				wp_register_style( 'blog-module-styles', get_template_directory_uri() . '/modules/blog/blog.css', array(), '', 'all' );
				wp_enqueue_style('blog-module-styles');
			},

	    ));
	}

// Check if function exists and hook into setup.
if( function_exists('acf_register_block_type') ) 
	{
	    add_action('acf/init', 'register_acf_block_gcom_blog_blocks');
	}

// =========================================
//  BLOG TYPE CUSTOM TAXONOMY
// =========================================
function gcom_blog_type_taxonomy() {
	register_taxonomy(  
        'blog_types',  //The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces). 
        'post', //post type name
        array(  
            'labels' => array(
	        	'singular_name'     => __('Blog Type', 'taxonomy singular name'),
				'search_items'      => __('Search Blog Types'),
				'all_items'         => __('All Blog Types'),
				'parent_item'       => __('Parent Blog Type'),
				'parent_item_colon' => __('Parent Blog Type:'),
				'edit_item'         => __('Edit Blog Type'),
				'update_item'       => __('Update Blog Type'),
				'add_new_item'      => __('Add New Blog Type'),
				'new_item_name'     => __('New Blog Type Name'),
				'menu_name'         => __('Blog Types'),
			),
			'hierarchical' => true,
            'query_var' => true,
            'show_in_rest' => true, // Needed for tax to appear in Gutenberg editor.
            'rewrite' => array(
                'slug' => 'blog_types', // This controls the base slug that will display before each term
                'with_front' => false // Don't display the category base before 
            )
        )  
    );
	
}  
add_action( 'init', 'gcom_blog_type_taxonomy');

// =========================================
//  AJAX LOAD MORE ON ARCHIVE PAGE
// =========================================

function blog_ajax_loadmore() {
	$ppp     = (isset($_GET['ppp'])) ? $_GET['ppp'] : get_option( 'posts_per_page' );
	$offset  = (isset($_GET['offset'])) ? $_GET['offset'] : 0;
	$cat 	 = (isset($_GET['cat'])) ? $_GET['cat'] : 'all';
	$service = (isset($_GET['service'])) ? $_GET['service'] : 'all';

	// echo 'From blog_ajax_loadmore(), $service = ' . $service . '<br>';
	// echo 'From blog_ajax_loadmore(), $cat = ' . $cat . '<br>';
	// echo 'From blog_ajax_loadmore(), $ppp = ' . $ppp . ' and $offset = ' . $offset . '<br>';

	$response = $_GET; // The ajax call uses GET, so that's where the variables are.

	// The logic here is, we have to combine two different taxonomy requests. If they're set to "all" then we need to get all the terms. If they're not, we can just use the passed variable.

	// To make this more confusing, there was a completely different set of requirements when this was built. After it was done, those requirements changed. So now categories are called services and services are actually the blog_type taxonomy. Sorry future me.

	if ( $cat == 'all' ) :
		// get all terms in the taxonomy
		$cat_terms = get_terms( 'blog_types' ); 
		// convert array of term objects to array of term IDs
		$cat_term_ids = wp_list_pluck( $cat_terms, 'term_id' );
	else:
		$cat_term_ids = array($cat);
	endif;

	// echo 'cat_terms: '; print_r($cat_term_ids); echo '<br>';

	if ( $service == 'all' ) :
		// get all terms in the taxonomy
		$service_terms = get_terms( 'category' ); 
		// convert array of term objects to array of term IDs
		$service_term_ids = wp_list_pluck( $service_terms, 'term_id' );
	else:
		$service_term_ids = array($service);
	endif;

	// echo 'service_terms: '; print_r($service_term_ids); echo '<br>';

	$args = array(
		'posts_per_page' => $ppp,
		'post_type'      => 'post',
		'offset'         => $offset,
		'orderby'        => 'date',
		'order'          => 'DESC',
		'post_status'    => 'publish',
		'suppress_filters' => true, 
		'tax_query' => array (
			'relation' => 'AND',
			array(
				// Remember, category is actually pulled from the services drop down
				'taxonomy' => 'category',
				'terms' => $service_term_ids,
			),
			array(
				// And blog_types taxonomy is the row-list
				'taxonomy' => 'blog_types',
				'terms' => $cat_term_ids,
			)
		),
	); 

	$posts_array = new WP_Query( $args );

	// echo 'Top of loop in blog_ajax_loadmore: offset=' . $offset . '<br>';
	// echo 'Top of loop in blog_ajax_loadmore: ppp=' . $ppp . '<br>';
	if ( $posts_array->have_posts() ) : 
		while ( $posts_array->have_posts() ) : $posts_array->the_post(); 
			include('blog-archive-excerpts-include.php');
		endwhile; 
		// We know the total number of posts in the query via $posts_array->found_posts. Offset (how many posts were already on the page) + ppp (how many new posts can potentially be added to the page now that we've run the query) should give the maximum number of posts the page can currently show. So if the total number of posts found is greater than the maximum number of total posts the page could currently be showing, then show the button.
		// ** Helpful for debugging, commented out for production. **
		// echo 'blog_ajax_loadmore: found posts = ' . $posts_array->found_posts . '<br>';
		// echo 'blog_ajax_loadmore: offset = ' . $offset . '<br>';
		// echo 'blog_ajax_loadmore: ppp = ' . $ppp . '<br>';
		
		if ( $posts_array->found_posts > $offset + $ppp ) : ?>
		<div class="blog-load-more constrained-width">
		  <a href="#" class="btn btn-black btn-transparent"><?php if ( !empty( $load_more_text ) ) { echo $load_more_text; } else { echo 'Load More'; } ?></a>
		</div>
		<?php endif;
	endif; ?>
	<!-- /home-page-posts -->

	<?php die; // We include die so the default '0' doesn't show up at the end of the output.
}

add_action( 'wp_ajax_blog_ajax_loadmore', 'blog_ajax_loadmore'); // For logged-in users
add_action('wp_ajax_nopriv_blog_ajax_loadmore', 'blog_ajax_loadmore'); // For not-logged-in users

// =========================================
//   BLOG ARCHIVE PAGE TEMPLATE FUNCTIONS 
// =========================================

// We have a custom page template to use for displaying blog posts. Add that template to the dropdown list.
function ps_blog_add_page_template ($templates) {
    $templates['blog-archive.php'] = 'Blog Archive Page Template';
    return $templates;
    }
add_filter ('theme_page_templates', 'ps_blog_add_page_template');

// WP will be searching for our template in the theme directory, so we have to redirect it
function ps_blog_redirect_archive_page_template ($template) {
	$post = get_post(); 
	$page_template = get_post_meta( $post->ID, '_wp_page_template', true );
    if ('blog-archive.php' == basename ($page_template))
        $template = get_template_directory() . '/modules/blog/blog-archive.php';

    return $template;
    }
add_filter ('page_template', 'ps_blog_redirect_archive_page_template');
 
// =========================================
//   SINGLE POST TEMPLATE
// =========================================

add_filter( 'template_include', 'stile_custom_post_type_template_blog' );

function stile_custom_post_type_template_blog($original_template) {
     global $post;

     if ($post->post_type == 'post' && !is_404() ) {
          return get_template_directory() . '/modules/blog/blog-single.php';
     } else {
     	return $original_template;
     }
}

// =========================================
//   AUTHOR SINGLE PAGE
// =========================================

function author_archive_gcom_blog($original_template) {

	global $post;

	if ( is_author() ) {
	  return get_template_directory() . '/modules/blog/blog-author.php';
	} else {
		return $original_template;
	}

}
add_filter('template_include','author_archive_gcom_blog');

// =========================================
//   ADD THE FIELD GROUP
// =========================================

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_5e39b8b92ebb7',
	'title' => 'Gcom Blog Archive Page Options',
	'fields' => array(
		array(
			'key' => 'field_5e7a4edeb9207',
			'label' => 'Show Categories Selection Box?',
			'name' => 'show_categories_selection_box',
			'type' => 'true_false',
			'instructions' => 'When checked, the "Select a Category" dropdown box will be shown.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => '',
			'default_value' => 1,
			'ui' => 0,
			'ui_on_text' => '',
			'ui_off_text' => '',
		),
		array(
			'key' => 'field_5e39b8d11e845',
			'label' => 'Read More text',
			'name' => 'blog_read_more',
			'type' => 'text',
			'instructions' => 'Text to go on the button for each blog excerpt. Will default to "Keep Reading" if this is left blank.',
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
			'key' => 'field_5e39b9031e846',
			'label' => 'Load More text',
			'name' => 'blog_load_more',
			'type' => 'text',
			'instructions' => 'Text to go on the button for the "Load More" button. Will default to "Load More" if this is left blank.',
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
			'key' => 'field_5e39b9221e847',
			'label' => 'Recent News & Articles Headline',
			'name' => 'blog_recent_headline',
			'type' => 'text',
			'instructions' => 'Headline for the "Most Recent News & Articles" section showing the next 3 blog articles at the bottom of the blog-single.php page.',
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
	),
	'location' => array(
		array(
			array(
				'param' => 'page_template',
				'operator' => '==',
				'value' => 'blog-archive.php',
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

acf_add_local_field_group(array(
	'key' => 'group_5e39daacbf08b',
	'title' => 'Gcom Most Recent Posts',
	'fields' => array(
		array(
			'key' => 'field_5e84a318d3d55',
			'label' => 'Gcommerce Most Recent Posts',
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
			'key' => 'field_5e39db56284f0',
			'label' => 'Headline',
			'name' => 'headline',
			'type' => 'text',
			'instructions' => 'Optional headline to show above the set of posts.',
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
			'key' => 'field_5e39dae215182',
			'label' => 'Posts Category',
			'name' => 'category',
			'type' => 'taxonomy',
			'instructions' => 'Choose a category or categories to draw posts from. Posts will be listed in publication date order. If no category is selected, posts from all categories will be shown.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'taxonomy' => 'category',
			'field_type' => 'checkbox',
			'add_term' => 0,
			'save_terms' => 0,
			'load_terms' => 0,
			'return_format' => 'id',
			'multiple' => 0,
			'allow_null' => 0,
		),
		array(
			'key' => 'field_5e39db7b284f2',
			'label' => 'Go To Blog Text',
			'name' => 'go_to_text',
			'type' => 'text',
			'instructions' => 'Text to appear on the "More from our blog" button. If blank, the value from the options on the page using the "Blog Archive" template will be used. If that is blank, a default value will be used.',
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
			'key' => 'field_5e39db7b284f3',
			'label' => 'Go To Blog Link',
			'name' => 'go_to_link',
			'type' => 'text',
			'instructions' => 'Where the user should go when the button is clicked. If blank, the URL for the page using the "Blog Archive" template will be used.',
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
			'key' => 'field_5e39f3d1a8ab8',
			'label' => 'Background Color',
			'name' => 'background_color',
			'type' => 'color_picker',
			'instructions' => 'Choose an optional background color for this section.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'block',
				'operator' => '==',
				'value' => 'acf/most-recent-posts',
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

acf_add_local_field_group(array(
	'key' => 'group_5e39d04f3a0e0',
	'title' => 'Gcom Post Excerpts',
	'fields' => array(
		array(
			'key' => 'field_5e84a349363bd',
			'label' => 'Gcommerce Post Excerpts',
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
			'key' => 'field_5e39d0b2f3d51',
			'label' => 'Excerpt Block Headline',
			'name' => 'excerpt_block_headline',
			'type' => 'text',
			'instructions' => 'Optional headline to go above the list of post excerpts.',
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
			'key' => 'field_5e39d063003ee',
			'label' => 'Post(s) to Show',
			'name' => 'posts',
			'type' => 'post_object',
			'instructions' => 'Choose a post to show in this excerpt.',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'post_type' => array(
				0 => 'post',
			),
			'taxonomy' => '',
			'allow_null' => 0,
			'multiple' => 1,
			'return_format' => 'object',
			'ui' => 1,
		),
		array(
			'key' => 'field_5e39d36b27582',
			'label' => 'Keep Reading button text',
			'name' => 'keep_reading',
			'type' => 'text',
			'instructions' => 'Text to go on the "read more" style button after each excerpt. Default is "Keep Reading".',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => 'Keep Reading',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5e39d60c33e7b',
			'label' => 'Excerpt Length',
			'name' => 'excerpt_length',
			'type' => 'number',
			'instructions' => 'If you want to limit the number of words, enter the number here. Otherwise the default excerpt length will be used.',
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
				'value' => 'acf/single-post-excerpt',
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