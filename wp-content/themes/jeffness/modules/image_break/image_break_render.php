<?php
// Make easy to reference variables.
$bgImage = get_field('background_image');
$image_height = get_field('image_height');
$image_break_overlay = get_field('image_break_overlay');
$first_cta = get_field('first_cta');
$second_cta = get_field('second_cta');

// Create id attribute allowing for custom "anchor" value.
$id = 'image-break-wrapper-id-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Get any manually entered class name from the block
if( !empty($block['className']) ) {
	$className = $block['className'] . ' ';
}

// Get thumbnail size based on which type of break the user picked.
if ( $image_height == 'image-break-height-tall' ) :
	$thumb = $bgImage['sizes'][THEME_NAME . '-image-break-tall'];
else:
	$thumb = $bgImage['sizes'][THEME_NAME . '-image-break-short'];
endif;
?>
<section id="<?php echo $id;?>" class="<?php echo $className; ?>image-break-wrapper <?php echo $image_height; ?>" style="background-image: url(<?php echo esc_url($thumb); ?>);">
	<a href="<?php echo $first_cta['url'] ; ?>" class="image-break-link image-break-overlay <?php echo $image_break_overlay; ?>"<?php if ( !empty($first_cta['target']) ) { echo ' target="_blank"'; } ?>>
		<h2 class="image-break-column fg-white">
			<?php echo $first_cta['title']; ?>
		</h2>
	</a>
	<a href="<?php echo $second_cta['url']; ?>" class="image-break-link image-break-overlay <?php echo $image_break_overlay; ?>"<?php if ( !empty($second_cta['target']) ) { echo ' target="_blank"'; } ?>>
		<h2 class="image-break-column fg-white">
			<?php echo $second_cta['title']; ?>
		</h2>
	</a>
</section>