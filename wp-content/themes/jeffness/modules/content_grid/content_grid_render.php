<?php
// Create id attribute allowing for custom "anchor" value.
$id = 'content-grid-wrapper-id-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

if( !empty($block['className']) ) {
	$className = $block['className'] . ' ';
}

echo '<section class="' . $className . 'content-grid-wrapper" id="' . $id . '"' . (get_field('background_color')?' style="background-color: '.get_field('background_color').'"':'') . '>';
	if ( get_field('headline') ) { echo '<h2 class="h3 content-grid-headline border-bottom-c1"' . ( !empty( get_field('headline_color') )?' style="color:' . get_field('headline_color').';"':'') . '>' . get_field('headline') . '</h2>'; }
	if ( get_field('intro_text') ) { echo '<div class="content-grid-intro">' . get_field('intro_text') . '</div>'; }
	if ( have_rows( 'grid_items' ) ) :
		echo '<div class="content-grid-items-wrapper constrained-width content-grid-columns-' . get_field('columns') . '">';
		while ( have_rows( 'grid_items' ) ) : the_row();
			echo '<div class="content-grid-single-item-wrapper">';
				if ( get_sub_field('url') ) { echo '<a href="' . get_sub_field('url') . '">'; }
					if ( get_sub_field('image') ) :
						$image = get_sub_field('image');
						echo '<img src="' . $image['url'] . '" alt="' . $image['alt'] . '">';
					endif;
					if ( get_sub_field('headline') || get_sub_field('text') ) : 
						echo '<div class="content-grid-text-content-wrapper">';
							if ( get_sub_field('headline') ) : 
								echo '<h3 class="h4 fg-black">' . get_sub_field('headline') . '</h3>';
							endif;
							if ( get_sub_field('text') ) : 
								echo '<div class="content-grid-single-text-wrapper">' . get_sub_field('text') . '</div>';
							endif;
						echo '</div>';
					endif;
				if ( get_sub_field('url') ) { echo '</a>'; }
			echo '</div>';
		endwhile;
	endif;
echo '</section>';
?>