<?php
/**
 * Template Name: Blog Archive Template
 */
get_header(); 
// Enqueue styles
wp_register_style( 'blog-module-styles', get_template_directory_uri() . '/modules/blog/blog.css', array(), '', 'all' );
wp_enqueue_style('blog-module-styles');
// Font Awesome 5
wp_enqueue_style( 'font-awesome-5-style', get_template_directory_uri() . '/assets/vendor/fontawesome5/css/all.min.css' );
// Selectric Select Box Replacement Library: http://selectric.js.org/
wp_register_style( 'selectriccss', get_template_directory_uri() . '/assets/vendor/selectric/selectric.css', array(), '', 'all' );
wp_register_script( 'selectricjs', get_template_directory_uri() . '/assets/vendor/selectric/jquery.selectric.min.js', array(), 'jquery', true );
wp_enqueue_style( 'selectriccss' );
wp_enqueue_script( 'selectricjs' );
// Enqueue scripts
wp_enqueue_script('blog-module-script', get_template_directory_uri() . '/modules/blog/blog.min.js', array(), '', 'all' ) ;
wp_enqueue_script('blog-module-script', get_template_directory_uri() . '/modules/blog/blog.min.js', array(), '', 'all' ) ;
wp_localize_script( 'blog-module-script', 'ajaxloadmore', array(
	'ajaxurl' => admin_url( 'admin-ajax.php' ),
));
wp_localize_script( 'blog-module-script', 'ajaxloadcat', array(
	'ajaxurl' => admin_url( 'admin-ajax.php' ),
));

	include_once( get_template_directory() . '/modules/header_block/header_block_render.php'); 
	// Each page can have image and background colors chosen. We need to capture those into a variable to output in the main container.
	$page_style = '';
	if ( get_field('page_background_image') ) :
		$page_style = ' style="background-image:url(' . get_field('page_background_image') . ');'; 
		if ( get_field('page_background_image_type') ) :
			switch (get_field('page_background_image_type')) {
				case "tiled":
					$page_style .= ' background-repeat: repeat;';
					break;
				case "cover":
					$page_style .= ' background-size: cover;';
					break;
				case "contain":
					$page_style .= ' background-size: contain;';
					break;
			}
		endif;
	endif;
	// The user can either pick a pre-set theme color, in which case we'll output the class later, or they can override that with a custom color. If they pick a custom color, we put that in the style tag so it overrides the class.
	if ( get_field('page_background_color_custom') ) :
		if ( $page_style == '' ) :
			// Nothing has yet been added to the style so let's initialize it.
			$page_style = ' style="background-color:' . get_field('page_background_color_custom');
		else :
			// There's already something in the style tag so let's just add to it.
			$page_style .= ' background-color:' . get_field('page_background_color_custom') . ';';
		endif;
	endif;
	// If any of the variables have added a style tag, close it.
	if ( $page_style != '' ) { $page_style .= '"';  }
?>
			<main id="site-content" class="cf<?php if ( get_field('page_background_color') ) { echo ' ' . get_field('page_background_color'); } ?>" role="main"<?php echo $page_style; ?>>

				<?php if (have_posts()) : while (have_posts()) : the_post();

					$the_content = apply_filters('the_content', get_the_content());

					if ( !empty($the_content) ) : ?>
					<article <?php echo post_class('constrained-width-narrow'); ?> id="post-<?php the_ID(); ?>">
						<?php echo $the_content; ?>
					</article>
					<?php endif;
				
				endwhile; endif;

				$blog_prefix = THEME_TD . '_blog_';
				$load_more_text = get_field('blog_load_more');
				$read_more_text = get_field('read_more');

				$args = array(
					'posts_per_page' => get_option( 'posts_per_page' ),
					'post_type'      => 'post',
					'offset'         => 0,
					'orderby'        => 'date',
					'order'          => 'DESC',
					'post_status'    => 'publish',
					'suppress_filters' => true, 
				); 

				$posts_array = new WP_Query($args);

				// now start your loop
				if ( $posts_array->have_posts() ) : 
					if ( get_field('show_categories_selection_box', get_the_ID()) ) : ?>
					<section class="blog-archive-category-wrapper constrained-width-narrow">
						<?php
						// Blog Types taxonomy
						$blog_types = get_categories( array(
							'taxonomy' => 'blog_types',
						    'orderby' => 'name',
						    'order'   => 'ASC'
						) );
						echo '<div class="blog-archive-category-row"><a href="#" data-cat="all" class="active">All</a>';
							foreach( $blog_types as $blog_type ) :
								echo '<a href="#" data-cat="' . $blog_type->term_id . '">' . $blog_type->name . '</a>';
							endforeach;
						echo '</div>';

						// Regular categories which used to be services
						$categories = get_categories( array(
						    'orderby' => 'name',
						    'order'   => 'ASC'
						) );
						echo '<div class="blog-archive-services-wrapper">';
							echo '<span class="filter-label">Filter by topic:</span> <select><option value="all">All Topics</option>';
								foreach( $categories as $category ) :
									echo '<option value="' . $category->term_id . '">' . $category->name . '</option>';
								endforeach;
							echo '</select>';
						echo '</div>';
						?>
					</section>

					<?php endif; ?>

					<section class="blog-archive-wrapper constrained-width-narrow">
						<?php while ( $posts_array->have_posts() ) :
							$posts_array->the_post(); 
							include('blog-archive-excerpts-include.php');
						endwhile;
						// wp_reset_query();
						$ppp     = (isset($_GET['ppp'])) ? $_GET['ppp'] : get_option( 'posts_per_page' );
						$offset  = (isset($_GET['offset'])) ? $_GET['offset'] : 0;
						// We know the total number of posts in the query via $posts_array->found_posts. Offset (how many posts were already on the page) + ppp (how many new posts can potentially be added to the page now that we've run the query) should give the maximum number of posts the page can currently show. So if the total number of posts found is greater than the maximum number of total posts the page could currently be showing, then show the button.
						// ** Helpful for debugging, commented out for production. **
						// echo 'blog-archive.php: found posts = ' . $posts_array->found_posts . '<br>';
						// echo 'blog-archive.php: offset = ' . $offset . '<br>';
						// echo 'blog-archive.php: ppp = ' . $ppp . '<br>';
						if ( $posts_array->found_posts > $offset + $ppp ) : ?>
						<div class="blog-load-more constrained-width">
						  <a href="#" class="btn btn-black btn-transparent"><?php if ( !empty( $load_more_text ) ) { echo $load_more_text; } else { echo 'Load More'; } ?></a>
						</div>
						<?php endif;
					echo '</section>';
				endif; 
				?>

			</main>

<?php get_footer(); ?>
