<?php
// Create id attribute allowing for custom "anchor" value.
$id = 'gcom-gallery-wrapper-id-' . $block['id'];
if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}

// Get any manually entered class name from the block
if( !empty($block['className']) ) {
	$className = $block['className'] . ' ';
}
?>
<section id="<?php echo $id; ?>" class="<?php echo $className; ?>gcom-gallery-wrapper">
	<div class="gcom-gallery-nav-wrapper">
		<?php 
		// Check rows exists.
		if( have_rows('galleries') ):
			$link_type = get_field('cta_type');
    		$link_style = get_field('cta_style');
			$gcounter = 0;
		    // Loop through rows.
		    while( have_rows('galleries') ) : the_row();
		        echo '<button class="' . ( $gcounter == 0 ? 'active ' : '' ) . 'btn '. $link_type . ' ' . $link_style . ' gcom-gallery-nav-btn' . ($gcounter == 0 ? ' cta ' : '') . '" data-gallery-id="' . $gcounter . '">' . get_sub_field('button_label') . '</button>';
		        $gcounter++;
		    // End loop.
		    endwhile;
		endif;
		?>
	</div>
	<div class="gcom-gallery-all-wrapper">
		<?php 
		// Check rows exists.
		if( have_rows('galleries') ):
			$gcounter = 0;
		    // Loop through rows.
		    while( have_rows('galleries') ) : the_row();
		        // Load sub field value.
		        $shortcode = get_sub_field('shortcode');
		        echo '<div class="gcom-gallery-single-wrapper' . ( $gcounter == 0 ? ' active' : '' ) . '" id="gcom-gallery-' . $gcounter . '">';
		        	echo do_shortcode( $shortcode );
		        echo '</div>';
		        $gcounter++;
		    // End loop.
		    endwhile;
		endif;
		?>
	</div>
</section>