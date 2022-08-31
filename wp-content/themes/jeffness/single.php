<?php get_header(); ?>

		<?php include_once( get_template_directory() . '/modules/header_block/header_block_render.php'); ?>

			<main id="main" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/WebPageElement">

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article" itemscope itemprop="blogPost" itemtype="http://schema.org/BlogPosting">

	                <section class="entry-content constrained-width" itemprop="articleBody">

						<?php
						// the content (pretty self explanatory huh)
						the_content();
						?>

	                </section> <?php // end article section ?>

	            </article> <?php // end article ?>
				<?php endwhile; ?>

				<?php else : ?>

					<article id="post-not-found" class="hentry cf">
							<header class="article-header">
								<h1><?php _e( 'Oops, Post Not Found!', THEME_NAME ); ?></h1>
							</header>
							<section class="entry-content">
								<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', THEME_NAME ); ?></p>
							</section>
							<footer class="article-footer">
									<p><?php _e( 'This is the error message in the single.php template.', THEME_NAME ); ?></p>
							</footer>
					</article>

				<?php endif; ?>

			</main>

<?php get_footer(); ?>
