<?php
// Create id attribute allowing for custom "anchor" value.
$id = 'testimonial-wrapper-id-' . $block['id'];
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
		<?php if ( get_field('headline') ) { echo '<h2 class="h3 border-bottom-c1 testimonial-headline section-title ' . get_field('text_color') . '">' . get_field('headline') . '</h2>'; } ?>
		<div class="testimonial-slider constrained-width">
			<?php while( have_rows('testimonials') ): the_row(); ?>
				<div class="testimonial-single-wrapper">
					<?php
					$photo = get_sub_field('photo');
					$quote = get_sub_field('quote');
					$attribution = get_sub_field('attribution');
					$client = get_sub_field('client');
					$text_color = get_field('text_color');

					if ( $photo ) :
						echo wp_get_attachment_image( $photo, "thumbnail", "", ["class" => "testimonial-photo"] );
					endif;
					
					if ( $quote || $attribution || $client ) :
						echo '<div class="testimonial-text-wrapper">';
							if ( $quote ) { echo '<div class="testimonial-single-quote ' . $text_color . '">' . $quote . '</div>'; }
							if ( $attribution ) { echo '<div class="testimonial-single-client ' . $text_color . '">' . $attribution . '</div>'; }
							if ( $client ) { echo '<div class="testimonial-single-attribution ' . $text_color . '">' . $client . '</div>'; }
						echo '</div>';
					endif;
					?>
				</div>
			<?php endwhile; ?>
		</div>
	</div>
</section>