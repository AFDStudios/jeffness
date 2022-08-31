<?php

// Checkerboard Block Template for ACF Gutenberg
// Create id attribute allowing for custom "anchor" value.
$id = 'checkerboard-wrapper-id-' . $block['id'];
if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}

if( !empty($block['className']) ) {
	$className = $block['className'] . ' ';
}

$layout = get_field('layout'); 
$style = get_field('checkerboard_style');
$text_color = get_field('text_color');
$background_color_text = get_field('background_color_text');
$background_color_text_custom = get_field('background_color_text_custom');
$background_color = get_field('background_color');
$background_color_custom = get_field('background_color_custom');
$background_image = get_field('background_image');
$gap = get_field('gap');
$animation_type = get_field('animation_type');
if ( $animation_type ) :
		$animation_speed = get_field('animation_speed');
else :
	$animation_speed = 400;
endif;
$cb_counter=1; 
echo '<style type="text/css">';
	echo '.row-checkered-slider .flexslider .flex-direction-nav .flex-prev:before { content: url(' . (get_field( 'slideshow_previous', 'options')?get_field( 'slideshow_previous', 'options'):get_template_directory_uri() . '/assets/images/gallery-arrow-left.png') . '); }';
	echo '.row-checkered-slider .flexslider .flex-direction-nav .flex-next:before { content: url(' . (get_field( 'slideshow_next', 'options')?get_field( 'slideshow_next', 'options'):get_template_directory_uri() . '/assets/images/gallery-arrow-right.png') . '); }';
echo '</style>';	
?>

<section id="<?php echo $id; ?>" class="<?php echo $className; ?>checkerboard-outer-wrapper <?php echo $layout . ' ' . $style; ?><?php if ( $background_color || $background_color_custom ) { echo ' has-background'; } ?><?php if ( $background_color ) { echo ' ' . $background_color; } ?>" style="<?php if ( $background_color_custom ) { echo 'background-color: ' . $background_color_custom . '; '; } ?><?php if ( $background_image ) { echo 'background-image: url(' . $background_image . ');'; } ?>">

<?php while( have_rows('checkerboard_row') ): the_row(); 
	// vars
	$images = get_sub_field('images');
	if ( $style == 'style-default' ) :
		$size = THEME_NAME . '-checkerboard-default';
	elseif ( $style == 'style-offset' ):
		$size = THEME_NAME . '-checkerboard-offset';
	elseif ( $style == 'style-tall-blocks' ):
		$size = THEME_NAME . '-checkerboard-tall-blocks';
	endif;
	$headline = get_sub_field('headline');
	$subheadline = get_sub_field('subheadline');
	$text = get_sub_field('text');
	if ( get_sub_field('cta') ) :
		$cta = get_sub_field('cta');
		$cta_type = get_sub_field('cta_type');
		$cta_target = $cta['target'] ? $cta['target'] : '_self';
	endif;
	if ( get_sub_field('cta_2') ) :
		$cta_2 = get_sub_field('cta_2');
		$cta_2_type = get_sub_field('cta_2_type');
		$cta_2_target = $cta_2['target'] ? $cta_2['target'] : '_self';
	endif;
	?>
	<section class="constrained-width checkered-row-wrapper<?php if ( !empty( $animation_type ) ) { echo ' ' . $animation_type; } ?>" id="checkerboard-<?php echo $block['id']; ?>-row-<?php echo $cb_counter; ?>"<?php if ( $gap ) { echo ' style="margin-bottom: ' . $gap . 'px;"'; } ?><?php if ( !empty( $animation_speed ) ) { echo ' data-speed="' . $animation_speed . '"' ; } ?>>
		<div class="checkered-row-image-wrapper">
			<?php if ( get_sub_field( 'row_type' ) == 'video' ) : ?>
				<section class="row-checkered-video-wrapper">
					<?php 
					// Output the anchor with the video play icon.
					echo '<a href="' . get_sub_field('video_url') . '" class="play-video" data-fancybox>';
					if ( get_field( 'video_play_icon', 'options') ) :
						$play_icon = get_field( 'video_play_icon', 'options');
						echo '<img src="' . $play_icon['url'] . '" alt="' . $play_icon['alt'] . '" class="play-video-icon">';
					else:
						echo '<img src="' . get_template_directory_uri() . '/modules/checkerboard/images/play-icon.png" alt="Play Video" class="play-video-icon">';
					endif;
						// Output the poster image.
						$image = get_sub_field('video_poster');
						echo '<img src="' . esc_url($image['sizes'][$size]) . '" alt="" class="checkerboard-video-poster">';
					echo '</a>';
					?>
				</section>
			<?php else: ?>
				<section class="row-checkered-slider">
					<div class="flexslider">
						<ul class="slides">
							<?php foreach( $images as $image ): ?>
								<li>
									<img src="<?php echo esc_url($image['sizes'][$size]); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
								</li>
							<?php endforeach; ?>
						</ul>
					</div>
				</section>
			<?php endif; ?>
		</div>
		<div class="checkered-row-text-wrapper <?php echo $layout . ' ' . $style; ?><?php if ( $background_color_text || $background_color_text_custom ) { echo ' has-background'; } ?><?php if ( $text_color ) { echo ' ' . $text_color; } ?><?php if ( $background_color_text ) { echo ' ' . $background_color_text; } else echo ' bg-white'; ?>"<?php if ( $background_color_text_custom ) { echo ' style="background-color: ' . $background_color_text_custom . '"'; } ?>">
			<?php 
			if ( $subheadline || $headline ) :
				echo '<div class="checkerboard-headlines-wrapper">';
				if ( $subheadline ) { echo '<div class="' . ($style == 'style-tall-blocks'?' ' . $text_color . ' ':'fg-body ') . 'checkerboard-sub-headline">' . $subheadline . '</div>'; } 
				if ( $headline ) { echo '<h2 class="' . ($style == 'style-tall-blocks'?$text_color:'fg-body ') . '">' . $headline . '</h2>'; } 
				echo '</div>';
			endif;
			if ( $text ) { echo '<div class="text-block' . ($style == 'style-tall-blocks'?' ' . $text_color . ' ':' fg-body ') . '">' . $text . '</div>'; } 
			if ( get_sub_field('cta') || get_sub_field('cta_2')  ) :
				echo '<div class="cta-wrapper">';
					if ( get_sub_field('cta') ) :
						echo '<a class="btn ' . $cta_type . '" href="' . $cta['url'] . '" target="' . esc_attr( $cta_target ) . '">' . $cta['title'] . '</a>';
					endif;
					if ( get_sub_field('cta_2') ) :
						echo '<a class="btn ' . $cta_2_type . '" href="' . $cta_2['url'] . '" target="' . esc_attr( $cta_2_target ) . '">' . $cta_2['title'] . '</a>';
					endif;
				echo '</div>';
			endif; ?>
		</div>
	</section>

<?php $cb_counter++; endwhile; ?>

</section><!-- /checkerboard-outer-wrapper -->