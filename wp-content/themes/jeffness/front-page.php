<?php get_header(); ?>
			<?php 
			include_once('modules/home_top_slider/home_top_slider_render.php'); 
			?>
			<main id="site-content" class="cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/WebPageElement">

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