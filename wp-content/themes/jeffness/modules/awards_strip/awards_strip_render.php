<?php 
$color = get_field('text_color');
$awards = get_field('awards');
$headline = get_field('headline');
$alignment = get_field('alignment');

$bg_color = get_field('bg_color');
$bg_color_custom = get_field('bg_color_custom');

// Create id attribute allowing for custom "anchor" value.
$id = 'awards-strip-wrapper-id-' . $block['id'];
if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}

$className = '';
if( !empty($block['className']) ) {
	$className = $block['className'] . ' ';
}
?>

<section id="<?php echo $id; ?>" class="<?php echo $className; ?>gcom-awards-strip-wrapper<?php if ( $bg_color ) { echo ' ' . $bg_color; } ?>"<?php if ( $bg_color_custom ) { echo ' style="background-color: ' . $bg_color_custom . ';"'; } ?>>
	<?php if ( $headline ) { echo '<h2 class="h3 fg-black border-bottom-c1 gcom-awards-strip-headline">' . $headline . '</h3>'; } ?>
	<div class="gcom-awards-strip-wrapper-inner constrained-width <?php echo 'awards-align-' . $alignment; ?>">
		<?php 
		foreach ( $awards as $award ) :
			echo '<div class="gcom-award-single-wrapper">';
				if ( $award['icon'] ) :
					echo '<img src="' . esc_url($award['icon']['url']) . '" alt="' . esc_attr($award['icon']['alt']) . '" />';
				endif;
				if ( $award['headline'] || $award['description'] ) :
					echo '<div class="gcom-award-text-wrapper" style="color: ' . $color . ';">';
						if ( $award['headline'] ) { echo '<div class="gcom-award-text-headline h4 fg-black">' . $award['headline'] . '</div>'; }
						if ( $award['description'] ) { echo '<div class="gcom-award-text-description">' . $award['description'] . '</div>'; }
					echo '</div>';
				endif;
			echo '</div>';
		endforeach;
		?>
	</div>
</section>