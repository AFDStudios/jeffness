<?php
$image = get_field('image');
$horizontal_location = get_field('horizontal_location');
$horizontal_offset = get_field('horizontal_offset');
$vertical_location = get_field('vertical_location');
$vertical_offset = get_field('vertical_offset');
$overlap = get_field('overlap');

// Create id attribute allowing for custom "anchor" value.
$id = 'spot-image-wrapper-id-' . $block['id'];
if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}

// Get any manually entered class name from the block
if( !empty($block['className']) ) {
	$className = $block['className'] . ' ';
}
?>

<section id="<?php echo $id; ?>" class="<?php echo $className; ?>spot-image-wrapper horizontal-location-<?php echo $horizontal_location; ?> vertical-location-<?php echo $vertical_location; ?><?php if ( $overlap ) { echo ' overlap'; } ?>">
	<?php
	$style="";
	// We have to do some logic here as to get both X and Y transforms they have to be in the same declaration.
	// If both are middle, put them on one line.
	if ( $horizontal_location == 'middle' && $vertical_location == 'middle' ) {
		$style = 'transform:translateX(' . $horizontal_offset . '%) ' . 'translateY(' . $vertical_offset . '%);';
	} else if ( $horizontal_location == 'middle' ) {
		// Just the horizontal one is in the middle.
		$style = 'transform:translateX(' . $horizontal_offset . '%); ';
	} else if ( $vertical_location == 'middle' ) {
		// Just the vertical one is in the middle.
		$style = 'transform:translateY(' . $vertical_offset . '%); ';
	} else {
		$style = $horizontal_location . ': ' . $horizontal_offset . 'px; ' . $vertical_location . ': ' . $vertical_offset . 'px;';
	}
	echo '<img src="' . $image['url'] . '" alt="' . $image['alt'] . '" class="gcom-spot-image" style="' . $style . '">';
	?>
</section>