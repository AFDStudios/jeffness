<?php get_header(); ?>
			<?php include_once('modules/header_block/header_block_render.php'); 
			// Each page can have image and background colors chosen. We need to capture those into a variable to output in the main container.
			$page_style = '';
			if ( get_field('page_background_image', get_the_ID() ) ) :
				$page_style = ' style="background-image:url(' . get_field('page_background_image', get_the_ID() ) . ');'; 
				if ( get_field('page_background_image_type', get_the_ID() ) ) :
					switch (get_field('page_background_image_type', get_the_ID() )) {
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
			if ( get_field('page_background_color_custom', get_the_ID() ) ) :
				if ( $page_style == '' ) :
					// Nothing has yet been added to the style so let's initialize it.
					$page_style = ' style="background-color:' . get_field('page_background_color_custom', get_the_ID() );
				else :
					// There's already something in the style tag so let's just add to it.
					$page_style .= ' background-color:' . get_field('page_background_color_custom', get_the_ID() ) . ';';
				endif;
			endif;
			// If any of the variables have added a style tag, close it.
			if ( $page_style != '' ) { $page_style .= '"';  }
			?>

			<main id="site-content" class="cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/WebPageElement"<?php echo $page_style; ?>>

				<?php if (have_posts()) : while (have_posts()) : the_post();

					$the_content = apply_filters('the_content', get_the_content());

					if ( !empty($the_content) ) : ?>
					<article <?php echo post_class('constrained-width'); ?> id="post-<?php the_ID(); ?>">
						<?php echo $the_content; ?>
					</article>
					<?php endif;
				
				endwhile; endif; ?>

			</main>

<?php get_footer(); ?>