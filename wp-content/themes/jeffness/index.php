<?php get_header(); ?>

			<div id="content">

				<div id="inner-content">

					<main id="main" class="cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/WebPageElement">

						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						
						<section>
							<h1><?php the_title(); ?></h1>
							<article>
								
								<?php the_content(); ?>

							</article>
						</section>

						<?php 
						// Krypton Core provides a number of default modules available for you to put in your layout templates. The syntax to call them is generally echo [module_name]_layout( get_the_ID() );
						?>

						<?php // echo checkerboard_layout( get_the_ID() ); ?>
						<?php // echo parallax_layout( get_the_ID() ); ?>

						<?php endwhile; endif; ?>

					</main>

				</div><!-- /#inner-content -->

			</div><!-- /#content -->

<?php get_footer(); ?>
