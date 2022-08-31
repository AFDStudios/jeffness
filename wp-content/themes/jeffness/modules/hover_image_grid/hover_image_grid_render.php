<?php
// Create id attribute allowing for custom "anchor" value.
$id = 'hover-image-grid-wrapper-id-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Get any manually entered class name from the block
if( !empty($block['className']) ) {
	$className = $block['className'] . ' ';
}

echo '<section class="' . $className . 'hover-image-grid-wrapper" id="' . $id . '">';
	echo '<div class="hover-image-grid-wrapper-inner constrained-width">';
		if ( have_rows('hover_blocks') ) :
			while( have_rows('hover_blocks') ): the_row(); 
				$image = get_sub_field('image');
				$size = THEME_NAME . '-hover-image-grid';
				$text = get_sub_field('text');
				if ( get_sub_field('link') ) :
					$cta = get_sub_field('link');
					$cta_url = $cta['url'];
					$cta_target = $cta['target'] ? $cta['target'] : '_self';
				endif;
				echo '<a href="' . $cta_url . '" class="hover-image-grid-link hover-image-grid-single-wrapper" target="' . $cta_target . '">';
					echo '<img src="' . $image['sizes'][$size] . '" alt="' . $image['alt'] . '" class="hover-image-grid-image">';
					echo '<div class="hover-image-grid-text-wrapper">';
						echo $text;
					echo '</div>';
				echo '</a>';
			endwhile;
		endif;
	echo '</div>';
echo '</section>';
?>