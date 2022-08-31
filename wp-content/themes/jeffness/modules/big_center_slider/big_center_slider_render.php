<?php 
$slides = get_field('slides');
$size = THEME_NAME . '-big-center-slider'; // (thumbnail, medium, large, full or custom size)

// Create id attribute allowing for custom "anchor" value.
$id = 'big-center-slider-wrapper-id-' . $block['id'];
if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}

$className = '';
if( !empty($block['className']) ) {
	$className = $block['className'] . ' ';
}
?>

<section id="<?php echo $id; ?>" class="<?php echo $className; ?>big-center-slider-wrapper">
	<div class="flexslider">
		<ul class="slides">
			<?php foreach ($slides as $image_id) : ?>
				<li>
					<?php echo wp_get_attachment_image( $image_id, $size ); ?>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>