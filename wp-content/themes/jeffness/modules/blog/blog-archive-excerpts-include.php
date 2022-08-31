<?php // This include file contains the layout for listing posts on the archive page. It is used by blog.php and blog-archive.php via ajax calls. ?>
<article onclick="location.href='<?php echo get_the_permalink(); ?>';" id="post-<?php echo get_the_ID(); ?>" <?php post_class('blog-single-wrapper fg-body'); ?>>
	<!-- outer wrapper for initial state -->
	<?php 
	if ( has_post_thumbnail( get_the_ID() ) ) :
        $thumbnail = get_the_post_thumbnail_url( get_the_ID(), THEME_NAME . '-blog-archive-thumbnail' );
    else :
    	$thumbnail = '//via.placeholder.com/522x569.png?text=Placeholder+Image+For+BD+Blog';
    endif;
	?>
	<div class="bd-tile blog-archive-wrapper-initial" style="background-image: url(<?php echo $thumbnail; ?>); ">
		<?php
		// echo '<span class="fg-white">ID = '.get_the_ID().'</span>';
		$post_categories = get_post_primary_category(get_the_ID(), 'category'); 
		$primary_category = $post_categories['primary_category'];
		if ( ! empty( $categories ) ) :
		    echo '<div class="blog-archive-category-wrapper fg-white font-nav">' . $primary_category->name . '</div>';   
		endif;
		?>
		<h2 class="blog-archive-single-title fg-white"><?php echo get_the_title(); ?></h2>
	</div>
	<!-- outer wrapper for hover state -->
	<div class="blog-archive-wrapper-hover">
		<div class="blog-archive-single-date"><?php echo get_the_date(); ?></div>
		<h2 class="blog-archive-single-title"><?php echo get_the_title(); ?></h2>
		<div class="blog-archive-single-excerpt">
			<?php echo excerpt(30, get_the_ID() ); ?>
		</div>
		<?php
		if ( is_plugin_active('add-to-any/add-to-any.php') ) :
		  echo '<div class="a2a-blog-archive-single-wrapper">SHARE: ' . do_shortcode("[addtoany url=" . get_the_permalink() . "]") . '</div>'; 
		endif;
		?>
	</div>
</article>