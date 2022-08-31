<?php
$bg_image = get_field('background_image');
$columns = get_field('columns');
$columns_order = get_field('columns_order');
$image_position = get_field('image_position');
// Create id attribute allowing for custom "anchor" value.
$id = 'two-column-image-text-id-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
} 
?>

<section class="tcit-wrapper" id="<?php echo $id;?>" style="background-image:url('<?php echo $bg_image; ?>');">
	<div class="tcit-inner-wrapper constrained-width tcit-image-align-<?php echo $image_position; ?> column-order-<?php echo $columns_order; ?>">
		<?php
		foreach ( $columns as $column ) :
			echo '<div class="tcit-column tcit-column-' . $column['column_type'] . '">';
				if ( $column['column_type'] == 'image' ) :
					echo '<img src="' . $column['image']['url'] . '" alt="' . $column['image']['alt'] . '" class="tcit-image">';
				else:
					if ( $column['headline'] ) { echo '<div class="tcit-headline">' . $column['headline'] . '</div>'; }
					if ( $column['text_block'] ) { echo '<div class="tcit-text-block">' . $column['text_block'] . '</div>'; }
				endif;
			echo '</div>';
		endforeach;
		?>
	</div>
</section>