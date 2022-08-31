<?php
/**
 * Template Name: Theme Modules
 */
get_header(); ?>
			<main id="site-content" class="cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/WebPageElement">

				<?php if (have_posts()) : while (have_posts()) : the_post();

					$the_content = apply_filters('the_content', get_the_content());

					if ( !empty($the_content) ) : ?>
					<article <?php echo post_class('constrained-width'); ?> id="post-<?php the_ID(); ?>">
						<?php echo $the_content; ?>
					</article>
					<?php endif;
				
				endwhile; endif; ?>

				<section class="constrained-width" style="padding-bottom: 150px;">
					<h1>HEADING 1</h1>
					<h2>Heading 2</h2>
					<h3>Heading 3</h3>
					<h4>Heading 4</h4>
					<h5>Heading 5</h5>
					<h6>Heading 6</h6>
					<h2>General Body Copy</h2>
					<p>Maecenas pulvinar ut velit vel tristique. Phasellus lacinia felis neque, sed bibendum felis lacinia nec. Suspendisse consequat lorem nisi, lacinia tincidunt eros efficitur eu. Etiam vel diam lectus. Nullam nec turpis in justo faucibus pellentesque in non sem. Pellentesque urna enim, hendrerit sed varius non, volutpat sed leo. Morbi aliquam velit at quam bibendum iaculis vel et purus. Nulla placerat nibh turpis, a maximus libero ullamcorper fermentum. Vivamus ut venenatis mauris. Nam lacinia eleifend dui vitae varius. Suspendisse gravida urna quis elit aliquet aliquam. Nulla pellentesque odio in urna egestas tempor. Donec ut semper lacus, a sagittis tellus.</p>
					<p>Nulla facilisi. Phasellus neque dui, finibus ac libero et, molestie suscipit urna. Vivamus auctor tristique risus, ut eleifend urna aliquet sit amet. Praesent ultricies vestibulum justo, pretium dictum mi mollis in. Sed lectus metus, mattis in ullamcorper sit amet, vehicula et sapien. Mauris id nunc ornare, sollicitudin felis ut, rhoncus lectus. Curabitur vulputate mi a arcu fermentum, vitae pulvinar risus elementum.</p>
					<p>Duis ut viverra nisl. Morbi sagittis tincidunt finibus. Vestibulum scelerisque luctus diam, eu dictum erat posuere nec. Vivamus non leo gravida, pharetra purus in, porta odio. Proin non dictum nulla, vitae finibus tortor. Maecenas ultricies eros sapien, dictum convallis quam consectetur sit amet. Pellentesque lacus velit, ullamcorper quis lectus eu, aliquam cursus purus. Donec pharetra sem lorem, ac luctus nulla eleifend non.</p>
					<h2>Color Classes</h2>
					<p>The site uses a number of classes that are useful for changing background colors, foreground colors, hover colors, etc. You can use these class names in the "Button" shortcode with the "class=xx" attribute, or anywhere you need to input custom HTML. The general format of all of these class names is as follows:</p>
					<p><em>[colorcode]</em>[hover (optional)]</p>
					<p>Color 1, Color 2, Black, White, and other colors are all controlled via Settings -&gt; Theme Options -&gt; Colors.</p>
					<p><strong>Foreground Colors</strong></p>
					<p><strong>fg-c1</strong>&nbsp;Change the foreground of the element to Color 1<br><strong>fg-c2</strong>&nbsp;Change the foreground of the element to Color 2<br><strong>fg-body</strong>&nbsp;Change the foreground of the element to the Body Color<br><strong>fg-white</strong>&nbsp;Change the foreground of the element to the theme White color<br><strong>fg-black</strong>&nbsp;Change the foreground of the element to the theme Black color</p>
					<p><strong>Foreground Colors - Hover</strong></p>
					<p><strong>fg-c1-hover</strong>&nbsp;Change the foreground of the element to Color 1 on hover<br><strong>fg-c2-hover</strong>&nbsp;Change the foreground of the element to Color 2 on hover<br><strong>fg-body-hover</strong>&nbsp;Change the foreground of the element to Theme Body Color on hover<br><strong>fg-white-hover</strong>&nbsp;Change the foreground of the element to Theme White Color on hover<br><strong>fg-black-hover</strong>&nbsp;Change the foreground of the element to Theme Black Color on hover</p>
					<p><strong>Background Colors</strong></p>
					<p><strong>bg-c1</strong>&nbsp;Change the background of the element to Color 1<br><strong>bg-c2</strong>&nbsp;Change the background of the element to Color 2<br><strong>bg-body</strong>&nbsp;Change the background of the element to Body Color<br><strong>bg-white</strong>&nbsp;Change the background of the element to Theme White<br><strong>bg-black</strong>&nbsp;Change the background of the element to Theme Black</p>
					<p><strong>Background Color and Opacities</strong></p>
					<p><strong>bg-c1-opacity</strong>&nbsp;Change the background of the element to Color 1, partially transparent<br><strong>bg-c2-opacity</strong>&nbsp;Change the background of the element to Color 2, partially transparent<br><strong>bg-white-opacity</strong>&nbsp;Change the background of the element to Theme White, partially transparent<br><strong>bg-black-opacity</strong>&nbsp;Change the background of the element to Theme Black, partially transparent</p>
					<p><strong>Background Color and Opacities - Hover</strong></p>
					<p><strong>bg-c1-opacity-hover</strong>&nbsp;Change the background of the element to Color 1, partially transparent on hover<br><strong>bg-c2-opacity-hover</strong>&nbsp;Change the background of the element to Color 2, partially transparent on hover<br><strong>bg-white-opacity-hover</strong>&nbsp;Change the background of the element to Theme White, partially transparent on hover<br><strong>bg-black-opacity-hover</strong>&nbsp;Change the background of the element to Theme Black, partially transparent on hover</p>
					<p><strong>Background Colors - Hover</strong></p>
					<p><strong>bg-c1-hover</strong>&nbsp;Change the background of the element to Color 1 on hover<br><strong>bg-c2-hover</strong>&nbsp;Change the background of the element to Color 2 on hover<br><strong>bg-white-hover</strong>&nbsp;Change the background of the element to Theme White on hover<br><strong>bg-black-hover</strong>&nbsp;Change the background of the element to Theme White on hover</p>
					<p><strong>Border Colors</strong></p>
					<p><strong>border-c1</strong>&nbsp;Add a border to the element with color set to Color 1<br><strong>border-c2</strong>&nbsp;Add a border to the element with color set to Color 2<br><strong>border-white</strong>&nbsp;Add a border to the element with color set to Theme White<br><strong>border-black</strong>&nbsp;Add a border to the element with color set to Theme Black</p>
					<p><strong>Single Borders</strong></p>
					<p><strong>border-top-c1</strong>&nbsp;Add a border to the element with color set to Color 1 at the top<br><strong>border-top-c2</strong>&nbsp;Add a border to the element with color set to Color 2 at the top<br><strong>border-top-white</strong>&nbsp;Add a border to the element with color set to Theme White at the top<br><strong>border-top-black</strong>&nbsp;Add a border to the element with color set to Theme Black at the top</p>
					<p><strong>border-left-c1</strong>&nbsp;Add a border to the element with color set to Color 1 at the left<br><strong>border-left-c2</strong>&nbsp;Add a border to the element with color set to Color 2 at the left<br><strong>border-left-white</strong>&nbsp;Add a border to the element with color set to Theme White at the left<br><strong>border-left-black</strong>&nbsp;Add a border to the element with color set to Theme Black at the left</p>
					<p><strong>border-right-c1</strong>&nbsp;Add a border to the element with color set to Color 1 at the right<br><strong>border-right-c2</strong>&nbsp;Add a border to the element with color set to Color 2 at the right<br><strong>border-right-white</strong>&nbsp;Add a border to the element with color set to Theme White at the right<br><strong>border-right-black</strong>&nbsp;Add a border to the element with color set to Theme Black at the right</p>
					<p><strong>border-bottom-c1</strong>&nbsp;Add a border to the element with color set to Color 1 at the bottom<br><strong>border-bottom-c2</strong>&nbsp;Add a border to the element with color set to Color 2 at the bottom<br><strong>border-bottom-white</strong>&nbsp;Add a border to the element with color set to Theme White at the bottom<br><strong>border-bottom-black</strong>&nbsp;Add a border to the element with color set to Theme Black at the bottom</p>
					<p><strong>Border Colors: hover</strong></p>
					<p><strong>border-c1-hover</strong>&nbsp;Add a border to the element with color set to Color 1 when hovered over<br><strong>border-c2-hover</strong>&nbsp;Add a border to the element with color set to Color 2 when hovered over<br><strong>border-white-hover</strong>&nbsp;Add a border to the element with color set to Theme White when hovered over<br><strong>border-black-hover</strong>&nbsp;Add a border to the element with color set to Theme Black when hovered over</p>
					<p>CTAs are now Gutenberg blocks, able to be added to any Gutenberg editor slot. Search for "CTA" or "GCom" and choose the relevant options.</p>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
					<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
					<p><strong>Bold&nbsp;</strong><em>Italics</em><strong>&nbsp;<em>Bold-Italics</em></strong></p>
					<ul><li>Bulleted list 1</li><li>Bulleted list 2</li><li>Bulleted list 3</li></ul>
					<ol><li>Numbered list 1</li><li>Numbered list 2</li><li>Numbered list 3</li></ol>
					<blockquote class="wp-block-quote"><p>This is a block quote.</p></blockquote>
					<h2>GCommerce Modules for this Theme</h2>
					<?php if (have_posts()) : while (have_posts()) : the_post();

					$the_content = apply_filters('the_content', get_the_content());

					if ( !empty($the_content) ) : ?>
					<article <?php echo post_class('constrained-width'); ?> id="post-<?php the_ID(); ?>">
						<?php echo $the_content; ?>
					</article>
					<?php endif;
				
				endwhile; endif;
				// =========================================
				//	INGEST MODULES
				// =========================================
				// This is the heart of the module system for Stile.
				// Get a list of all the subdirectories in the Modules directory.
				$dirs = array_filter(glob(get_template_directory() . '/modules/*'), 'is_dir');
				foreach ( $dirs as $dir ) :
					// Get the last directory name.
					$moduleName = substr($dir, strrpos($dir, '/') + 1);
					// Get the screenshot or return empty.
					$screenshot = stile_block_screenshot($moduleName);
					echo '<div>' . $moduleName . $screenshot . '</div>';
					echo '<hr>';
				endforeach;
				?>
				</section>
			</main>

<?php get_footer(); ?>