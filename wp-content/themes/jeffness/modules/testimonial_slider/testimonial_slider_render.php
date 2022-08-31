<?php
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
<section id="<?php echo $id; ?>" class="<?php echo $className; ?>testimonial-wrapper" style="background-image:url(<?php echo get_field('background_image'); ?>);background-color:<?php echo get_field('background_color_custom'); ?>;">
	<div class="testimonial-content-wrapper constrained-width">
		<?php if ( get_field('headline') ) { echo '<h2 class="testimonial-headline section-title ' . get_field('text_color') . '">' . get_field('headline') . '</h2>'; } ?>
		<div class="testimonial-slider flexslider">
			<ul class="slides">
				<?php while( have_rows('testimonials') ): the_row(); ?>
					<li class="testimonial-single-wrapper">
						<div class="testimonial-single-client <?php echo get_field('text_color'); ?>"><?php echo get_sub_field('client'); ?></div>
						<div class="testimonial-single-middle <?php echo get_field('text_color'); ?>"><?php echo get_sub_field('quote'); ?></div>
						<div class="testimonial-single-top <?php echo get_field('text_color'); ?>"><?php echo get_sub_field('attribution'); ?></div>
					</li>
				<?php endwhile; ?>
			</ul>
		</div>
	</div>
</section>