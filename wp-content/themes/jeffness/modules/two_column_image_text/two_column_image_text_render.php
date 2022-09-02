<?php
$bg_image = get_field('background_image');
$columns = get_field('columns');
$columns_order = get_field('columns_order');
$image_position = get_field('image_position');
$image_style = get_field('image_style');
// Create id attribute allowing for custom "anchor" value.
$id = 'two-column-image-text-id-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
} 

$className = '';
if( !empty($block['className']) ) {
	$className = $block['className'] . ' ';
}
?>

<section class="<?php echo $className; ?>tcit-wrapper" id="<?php echo $id;?>" style="background-image:url('<?php echo $bg_image; ?>');">
	<div class="tcit-inner-wrapper constrained-width tcit-image-align-<?php echo $image_position; ?> column-order-<?php echo $columns_order; ?>">
		<?php
		foreach ( $columns as $column ) :
			echo '<div class="tcit-column tcit-column-' . $column['column_type'] . '">';
				if ( $column['column_type'] == 'image' ) :
					echo '<img src="' . $column['image']['url'] . '" alt="' . $column['image']['alt'] . '" class="tcit-image image-style-' . $image_style . '">';
				else:
					if ( $column['sub_headline'] ) { echo '<div class="tcit-sub-headline">' . $column['sub_headline'] . '</div>'; }
					if ( $column['headline'] ) { echo '<div class="tcit-headline h1">' . $column['headline'] . '</div>'; }
					if ( $column['text_block'] ) { echo '<div class="tcit-text-block">' . $column['text_block'] . '</div>'; }
					if ( $column['cta'] || $column['cta_2']  ) :
						if ( $column['cta'] ) :
							$cta = $column['cta'];
							$cta_type = $column['cta_type'];
							$cta_target = $cta['target'] ? $cta['target'] : '_self';
						endif;
						if ( $column['cta_2'] ) :
							$cta_2 = $column['cta_2'];
							$cta_2_type = $column['cta_2_type'];
							$cta_2_target = $cta_2['target'] ? $cta_2['target'] : '_self';
						endif;
						echo '<div class="cta-wrapper">';
							if ( $column['cta'] ) :
								echo '<a class="btn btn-primary btn-transparent" href="' . $cta['url'] . '" target="' . esc_attr( $cta_target ) . '">' . $cta['title'] . ' <i class="fa-light fa-arrow-right-long"></i></a>';
							endif;
							if ( $column['cta_2'] ) :
								echo '<a class="btn btn-black btn-transparent" href="' . $cta_2['url'] . '" target="' . esc_attr( $cta_2_target ) . '">' . $cta_2['title'] . ' <i class="fa-light fa-arrow-right-long"></i></a>';
							endif;
						echo '</div>';
					endif;
				endif;
			echo '</div>';
		endforeach;
		?>
	</div>
</section>