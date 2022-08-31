<?php
// Create id attribute allowing for custom "anchor" value.
$id = 'horizontal-gallery-wrapper-id-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

$className = '';
if( !empty($block['className']) ) {
	$className = $block['className'] . ' ';
}

echo '<section class="' . $className . 'horizontal-gallery-wrapper" id="' . $id . '">';
	echo '<div class="gallery-filter constrained-width">';
		if ( get_field('filter_title') ) { echo '<h2 class="horizontal-gallery-filter-title ' . get_field('text_color') . '">' . get_field('filter_title') . '</h2>'; }
		if ( have_rows( 'galleries' ) ) :
			$gallery_counter = 1;
			while ( have_rows( 'galleries' ) ) : the_row();
				echo '<a href="#" class="gallery-title' . ($gallery_counter==1?' gal-active':'') . '" data-gallery-id="gallery-' . $gallery_counter . '">' . get_sub_field('gallery_title') . '</a>';
				$gallery_counter++;
			endwhile;
		endif;
	echo '</div>';
	echo '<div class="galleries-list">';
		if ( have_rows( 'galleries' ) ) :
			$gallery_counter = 1;
			while ( have_rows( 'galleries' ) ) : the_row();
				echo '<div class="slideshow-container" id="gallery-' . $gallery_counter . '">';
					echo '<div class="flexslider">';
				        echo '<ul class="slides">';
				        	$images = get_sub_field('gallery_images');
				        	$size = THEME_NAME . '-horizontal-gallery';
				            foreach( $images as $image ):
				                echo '<li>';
				                	echo '<div class="overlay ' . get_field('overlay') . '"></div>';
				                    echo '<img src="' . $image['sizes'][$size] . '" alt="' . $image['alt'] . '">';
				                echo '</li>';
				            endforeach;
				        echo '</ul>';
				    echo '</div>';
				    echo '<div class="custom-navigation">';
				    	echo '<a href="#" class="flex-prev" arial-label="Previous Slide"></a>';
				    	echo '<a href="#" class="flex-next" arial-label="Next Slide"></a>';
				    echo '</div>';
				echo '</div>';
				$gallery_counter++;
			endwhile;
		endif;
	echo '</div>';
echo '</section>';
?>