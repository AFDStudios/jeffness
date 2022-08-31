<?php 
$images = get_field('images');
$size = THEME_NAME . '-big-image-slider';

// Create id attribute allowing for custom "anchor" value.
$id = 'big-image-slider-wrapper-id-' . $block['id'];
if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}

$className = '';
if( !empty($block['className']) ) {
	$className = $block['className'] . ' ';
}
// This style section is to set either the slider controls from theme options or, if empty,
// to use the default ones in the assets folder. This area can also be used for dot styling
// if the design calls for it.
echo '<style type="text/css">';
	echo '.gcom-big-image-slider-wrapper .flexslider .flex-direction-nav .flex-prev:before { content: url(' . (get_field( 'slideshow_previous', 'options')?get_field( 'slideshow_previous', 'options'):get_template_directory_uri() . '/assets/images/gallery-arrow-left.png') . '); }';
	
	echo '.gcom-big-image-slider-wrapper .flexslider .flex-direction-nav .flex-next:before { content: url(' . (get_field( 'slideshow_next', 'options')?get_field( 'slideshow_next', 'options'):get_template_directory_uri() . '/assets/images/gallery-arrow-right.png') . '); }';
echo '</style>';	
?>

<section id="<?php echo $id; ?>" class="<?php echo $className; ?>gcom-big-image-slider-wrapper">
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