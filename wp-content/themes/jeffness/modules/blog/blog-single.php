<?php get_header(); 
// Enqueue styles
wp_register_style( 'blog-module-styles', get_template_directory_uri() . '/modules/blog/blog.css', array(), '', 'all' );
wp_enqueue_style('blog-module-styles');
// Selectric Select Box Replacement Library: http://selectric.js.org/
wp_register_style( 'selectriccss', get_template_directory_uri() . '/assets/vendor/selectric/selectric.css', array(), '', 'all' );
wp_register_script( 'selectricjs', get_template_directory_uri() . '/assets/vendor/selectric/jquery.selectric.min.js', array(), 'jquery', true );
wp_enqueue_style( 'selectriccss' );
wp_enqueue_script( 'selectricjs' );
// Enqueue scripts
wp_enqueue_script('blog-module-script', get_template_directory_uri() . '/modules/blog/blog.min.js', array(), '', 'all' ) ;
wp_localize_script( 'blog-module-script', 'ajaxloadmore', array(
	'ajaxurl' => admin_url( 'admin-ajax.php' ),
));
wp_localize_script( 'blog-module-script', 'ajaxloadcat', array(
	'ajaxurl' => admin_url( 'admin-ajax.php' ),
));

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
?>

		<?php include_once( get_template_directory() . '/modules/header_block/header_block_render.php'); ?>

			<main id="main" class="cf blog-single-main" role="main" style="background-color: #e7e3d6;">

				<?php
				if (have_posts()) : while (have_posts()) : the_post(); 
					$the_content = apply_filters('the_content', get_the_content());

					if ( !empty($the_content) ) : ?>
					<section id="post-<?php echo get_the_ID(); ?>" <?php post_class('blog-single-wrapper constrained-width-narrow'); ?>>
						<article>
							<?php 
							echo '<h1>' . get_the_title() . '</h1>';
							echo '<div class="author-date-wrapper">' . get_the_date('F j, Y') . ' by ' . get_the_author_posts_link() . '</div>';
							if ( is_plugin_active('add-to-any/add-to-any.php') ) :
							  echo ' | <div class="blog-single-post-share-wrapper">SHARE: ' . do_shortcode("[addtoany url=" . get_the_permalink() . "]") . '</div>'; 
							endif;
							echo $the_content;
							?>

						</article>
					</section>						

				<?php endif; endwhile; endif;

				// RECENT POSTS SECTION
				// Pull posts from the same category.
				$categories = get_the_category(get_the_ID());
				$cat_array = [];
				foreach ( $categories as $category ) :
					array_push($cat_array, $category->term_id);
				endforeach;

				$args = array(
					'posts_per_page' => 3,
					'post_type'	  => 'post',
					'offset'		 => 0,
					'orderby' => 'date',
					'order' => 'DESC',
					'post_status'	=> 'publish',
					'suppress_filters' => true, 
					'post__not_in' => array(get_the_ID()),
					'category__in' => $cat_array,
				); 

				$posts_array = new WP_Query($args);

				// now start your loop
				if ( $posts_array->have_posts() ) : 
					echo '<section class="recent-blogs-outer-wrapper"' . ( get_field('background_color')?'style="background-color:'.get_field('background_color').';"':'' ) . '>';
					if ( !empty($recent_headline) ) { echo '<h2 class="constrained-width">' . $recent_headline . '</h2>'; }
					echo '<div class="recent-blogs-inner-wrapper constrained-width">';
					while ( $posts_array->have_posts() ) :
						$posts_array->the_post(); 
						echo '<a class="bd-tile recent-blogs-single-wrapper" href="' . get_permalink(get_the_ID()) . '">';
							$thumbnail = wp_get_attachment( get_post_meta( get_the_ID(), '_thumbnail_id', true ), THEME_NAME . '-blog-recent-thumbnail');
							echo '<img src="' . $thumbnail['src'] . '" alt="' . $thumbnail['alt'] . '" class="recent-blogs-thumbnail" lazyload>';
							echo '<h3 class="recent-blogs-title fg-white">' . get_the_title() . '</h3>';
						echo '</a>';
					endwhile;
					echo '</div>';
					echo '<div class="recent-blogs-go-to-blog-wrapper"><a href="' . $read_more_link . '" class="btn btn-primary">' . (!empty($read_more)?$read_more:'Get More Insights') . '</a></div>';
					echo '</section>';
				endif;

				wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly
				?>

			</main>

<?php get_footer(); ?>
