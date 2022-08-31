<?php
// Make easy to reference variables.
$number_of_columns = get_field('number_of_columns');
$headline = get_field('headline');
$intro_copy = get_field('intro_copy');
$background_texture = get_field('background_texture');
$background_position = get_field('background_position');
$columns = get_field('columns');

// Create id attribute allowing for custom "anchor" value.
$id = 'columns-n-rows-wrapper-id-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

if( !empty($block['className']) ) {
	$className = $block['className'] . ' ';
}

echo '<style>';
    // Add theme color to active dot.
    echo '#' . $id . ' .cnr-slider-wrapper .slick-dots li button[aria-selected="true"]::before { color: ' . get_field('color_primary', 'option') . '; }';
    // Add theme option arrow images to nav buttons.
    echo '#' . $id . ' .cnr-slider-wrapper .slick-prev:before { content: url(' . (get_field( 'slideshow_previous', 'options')?get_field( 'slideshow_previous', 'options'):get_template_directory_uri() . '/assets/images/gallery-arrow-left.png') . '); }';
    echo '#' . $id . ' .cnr-slider-wrapper .slick-next:before { content: url(' . (get_field( 'slideshow_next', 'options')?get_field( 'slideshow_next', 'options'):get_template_directory_uri() . '/assets/images/gallery-arrow-right.png') . '); }';
echo '</style>';

echo '<section id="' . $id . '" class="' . $className . 'cnr-wrapper background-' . $background_position . '" style="background-image:url(' . $background_texture . ')">';
	echo '<div class="cnr-wrapper-inner constrained-width">';
		if ( $headline || $intro_copy ) :
			echo '<div class="cnr-intro-wrapper">';
				if ( $headline ) { echo '<div class="cnr-intro-headline h2">' . $headline . '</div>'; }
				if ( $intro_copy ) { echo '<div class="cnr-intro-text-wrapper">' . $intro_copy . '</div>'; }
			echo '</div>';
		endif;
		echo '<div class="cnr-columns-wrapper">';
			foreach ( $columns as $column ) :
				echo '<div class="cnr-single-column-wrapper ' . $number_of_columns . '">';
					$image = $column['image'];
					if ( $number_of_columns == 'columns-two' ) {
						$size = THEME_NAME . '-columns-n-rows-2';
					} else {
						$size = THEME_NAME . '-columns-n-rows-3';
					}
					echo wp_get_attachment_image( $image, $size );
					echo '<div class="cnr-single-text-wrapper">';
						if ( $column['subheadline'] ) :
							echo '<div class="cnr-single-subheadline font-heading">' . $column['subheadline'] . '</div>';
						endif;
						echo '<div class="h3 cnr-single-headline">' . $column['title'] . '</div>';
						if ( $column['copy'] ) { echo '<p class="cnr-single-intro-copy">' . $column['copy'] . '</p>'; }
						if ( $column['cta'] ) :
							$cta = $column['cta'];
							$cta_url = $cta['url'];
							$cta_title = $cta['title'];
							$cta_target = $cta['target'] ? $link['target'] : '_self';
							echo '<a href="' . $cta_url . '" class="cnr-cta btn btn-primary" target="' . $cta_target . '">' . $cta_title . '</a>';
						endif; 
					echo '</div><!-- /cnr-single-text-wrapper -->';
				echo '</div><!-- /cnr-single-column-wrapper -->';
			endforeach;
			// Now we need to deal with the ending gallery.
			if ( !(count($columns) % 2) ) {
				$thumb = THEME_NAME . '-columns-n-rows-full';
			} else if ( $number_of_columns == 'columns-two' ) {
				$thumb = THEME_NAME . '-columns-n-rows-2';
			} else {
				$thumb = THEME_NAME . '-columns-n-rows-3';
			}
			$images = get_field('gallery');
			if ( $images ) :
				echo '<div class="' . (count($columns)%2?' half-width ':'full-width ') . 'cnr-slider-wrapper ' . $number_of_columns . '">';
					foreach( $images as $image ):
						echo '<div class="cnr-slider-image"><img src="' . esc_url($image['sizes'][$thumb]) . '" alt="' . esc_attr($image['alt']) . '"></div>';
					endforeach;
				echo '</div>';
			endif;
		echo '</div><!-- /cnr-columns-wrapper';
	echo '</div><!-- /cnr-wrapper-inner -->';
echo '</section>';