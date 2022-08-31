<?php get_header(); 
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
			include_once( get_template_directory() . '/modules/header_block/header_block_render.php'); ?>

			<main id="main" class="cf blog-single-main" role="main" style="background-color: #e7e3d6;">
				<section class="blog-author-wrapper constrained-width-narrow">
					<?php 
					$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
					echo '<h1>Content by<br>' . $curauth->first_name . ' ' . $curauth->last_name . '</h1>';
					echo '<div class="blog-all-authors-wrapper">';
					$authors = get_users('orderby=display_name&order=ASC');;
					echo 'Filter by Author <select onchange="javascript:location.href = this.value;">';
							foreach( $authors as $author ) :
								if (count_user_posts($author->ID) > 0) {
									echo '<option value="' . get_author_posts_url($author->ID) . '"' . ($author->ID == $curauth->ID?' selected':'') . '>' . $author->first_name . ' ' . $author->last_name . '</option>';
								}
							endforeach;
						echo '</select>';
					echo '</div>';
					?>
				</section>
				<section class="blog-archive-wrapper blog-author-posts-wrapper constrained-width-narrow">
					<?php 
					if ( have_posts() ) : while ( have_posts() ) : the_post(); 
						include('blog-archive-excerpts-include.php');
					endwhile; 
					 
					// Previous/next page navigation.
					the_posts_pagination();
					 
					 
					else: ?>
					<p><?php _e('No posts by this author.'); ?></p>
					 
					<?php endif; ?>
				</section>
			</main>

<?php get_footer(); ?>