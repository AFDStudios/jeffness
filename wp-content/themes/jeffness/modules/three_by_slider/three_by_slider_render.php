<?php
$tbs_headline = get_field('headline');
$tbs_intro = get_field('intro');
$tbs_slides = get_field('slides');
// Create id attribute allowing for custom "anchor" value.
$id = 'three-by-slider-id-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}
// Get any manually entered class name from the block
if( !empty($block['className']) ) {
	$className = $block['className'] . ' ';
}
?>
<section id="<?php echo $id; ?>" class="<?php echo $className; ?>three-by-slider-wrapper">
	<div class="three-by-slider-content-wrapper constrained-width">
		<div class="three-by-slider-content-slider">
			<?php if ( !empty( $tbs_headline ) ) { echo '<h2 class="slide-right" data-speed="600">' . $tbs_headline . '</h2>'; } ?>
			<?php if ( !empty( $tbs_intro ) ) { echo '<div class="tbs-intro slide-right" data-speed="600">' . $tbs_intro . '</div>'; } ?>
			<?php
			echo '<style type="text/css">';
				echo '.three-by-slider-content-slider .flexslider .flex-direction-nav .flex-prev:before { content: url(' . (get_field( 'slideshow_previous', 'options')?get_field( 'slideshow_previous', 'options'):get_template_directory_uri() . '/assets/images/gallery-arrow-left.png') . '); }';
				echo '.three-by-slider-content-slider .flexslider .flex-direction-nav .flex-next:before { content: url(' . (get_field( 'slideshow_next', 'options')?get_field( 'slideshow_next', 'options'):get_template_directory_uri() . '/assets/images/gallery-arrow-right.png') . '); }';
			echo '</style>';
			?>
			<div class="flexslider<?php if ( count($tbs_slides) <= 3 ) { echo ' oneslide'; } ?>">
				<ul class="slides">
					<?php foreach ($tbs_slides as $slide) :
						$image = wp_get_attachment( $slide['image'], THEME_NAME . '-three-by-slider' ); ?>
						<li>
							<?php if ( !empty( $slide['cta'] ) ) { echo '<a href="' . $slide['cta']['url'] . '"' . (!empty($slide['cta']['target'])?' " target="_blank"':"") .'>'; } ?>
								<?php if ( !empty( $slide['teaser'] ) ) { echo '<h3 class="single-slide-teaser fg-white font_nav">' . $slide['teaser'] . '</h3>'; } ?>
								<img src="<?php echo $image['src']; ?>" alt="<?php echo $image['alt']; ?>">
								<div class="single-slide-text-wrapper">
									<h2 class="single-slide-text-headline font-heading fg-white">
										<?php echo $slide['headline']; ?>
									</h2>
									<div class="single-slide-text-text-block fg-white">
										<?php echo $slide['text_block']; ?>
									</div>
								</div>
								<div class="three-by-slider-overlay"></div>
							<?php if ( !empty( $slide['cta'] ) ) { echo '</a>'; } ?>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>
	</div><!-- /three-by-slider-content-wrapper -->
</section>