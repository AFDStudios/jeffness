<?php
// =====================================================
//   Gutenberg block for showing "most recent" posts
// =====================================================

// RECENT POSTS DATA
$args = [
    'post_type' => 'page',
    'fields' => 'ids',
    'nopaging' => true,
    'meta_key' => '_wp_page_template',
    'meta_value' => 'blog-archive.php'
];
// We need to get some meta data from the page that has the blog archive template set to it.
$blog_archive_page_id = get_posts( $args );
wp_reset_query();

// Fields can be overridden by putting content in the block itself.
// Blog Archive Page Link URL
if ( get_field('go_to_link') ) :
	$read_more_link = get_field('go_to_link');
else:
	$read_more_link = get_the_permalink($blog_archive_page_id[0]);
endif;

// Blog Archive Page Link Text
if ( get_field('go_to_text') ) :
	$read_more = get_field('go_to_text');
elseif ( get_field('blog_read_more', $blog_archive_page_id[0] ) ) : 
	$read_more = get_field('blog_read_more', $blog_archive_page_id[0] );
else:
	$read_more = 'More From Our Blog';
endif;

// Headline
if ( get_field('headline') ) :
	$recent_headline = get_field('headline');
elseif ( get_field( 'blog_recent_headline', $blog_archive_page_id[0] ) ) : 
	$recent_headline = get_field( 'blog_recent_headline', $blog_archive_page_id[0] );
else:
	$recent_headline = '';
endif;

$excerpt_length = get_field('excerpt_length');
// GET THE POSTS
$categories = get_field('category');

if ( $categories ) :
	if (!is_array($categories)) {
	    $categories = array($categories);
	}
	$args = array(
		'posts_per_page' => 3,
		'post_type'	  => 'post',
		'offset'		 => 0,
		'orderby' => 'date',
		'order' => 'DESC',
		'post_status'	=> 'publish',
		'suppress_filters' => true, 
		'post__not_in' => array(get_the_ID()),
		'tax_query' => array (
			'relation' => 'OR',
			array(
				'taxonomy' => 'category',
				'terms' => $categories,
			),
		),
	);
else: // Don't need to filter by categories because they didn't pick any.
	$args = array(
		'posts_per_page' => 3,
		'post_type'	  => 'post',
		'offset'		 => 0,
		'orderby' => 'date',
		'order' => 'DESC',
		'post_status'	=> 'publish',
		'suppress_filters' => true, 
		'post__not_in' => array(get_the_ID()),
	); 
endif;

$posts_array = new WP_Query($args);

// now start your loop
if ( $posts_array->have_posts() ) : 
	echo '<section class="recent-blogs-outer-wrapper"' . ( get_field('background_color')?'style="background-color:'.get_field('background_color').';"':'' ) . '>';
	if ( !empty( $recent_headline ) ) {	echo '<h2>' . $recent_headline . '</h2>'; }
		echo '<div class="recent-blogs-inner-wrapper">';
		while ( $posts_array->have_posts() ) :
			$posts_array->the_post(); 
			echo '<a class="bd-tile recent-blogs-single-wrapper" href="' . get_permalink(get_the_ID()) . '">';
				$thumbnail = wp_get_attachment( get_post_meta( get_the_ID(), '_thumbnail_id', true ), THEME_NAME . '-blog-recent-thumbnail');
				echo '<img src="' . $thumbnail['src'] . '" alt="' . $thumbnail['alt'] . '" class="recent-blogs-thumbnail" lazyload>';
				echo '<h3 class="recent-blogs-title fg-white">' . get_the_title() . '</h3>';
			echo '</a>';
		endwhile;
		echo '</div>';
		echo '<div class="recent-blogs-go-to-blog-wrapper"><a href="' . $read_more_link . '" class="btn btn-primary">' . $read_more . '</a></div>';
	echo '</section>';
endif;

wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly
?>