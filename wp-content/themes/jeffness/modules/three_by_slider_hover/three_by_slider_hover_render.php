<?php
$tbsh_headline = get_field('headline');
$tbsh_intro = get_field('intro');
$tbsh_slides = get_field('slides');
$tbsh_bg_image = get_field('background_image');
// Create id attribute allowing for custom "anchor" value.
$id = 'three-by-slider-hover-id-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}
// Get any manually entered class name from the block
if( !empty($block['className']) ) {
	$className = $block['className'] . ' ';
}

// Style our dots and arrows
echo '<style>';
	echo '.three-by-slider-hover-content-slider .flexslider .flex-direction-nav .flex-prev:before { content: url(' . (get_field( 'slideshow_previous', 'options')?get_field( 'slideshow_previous', 'options'):get_template_directory_uri() . '/assets/images/gallery-arrow-left.png') . '); }';
	echo '.three-by-slider-hover-content-slider .flexslider .flex-direction-nav .flex-next:before { content: url(' . (get_field( 'slideshow_next', 'options')?get_field( 'slideshow_next', 'options'):get_template_directory_uri() . '/assets/images/gallery-arrow-right.png') . '); }';
echo '</style>';
?>

<section id="<?php echo $id; ?>" class="<?php if( !empty($block['className']) ) {
	echo $block['className'] . ' '; } ?>three-by-slider-hover-wrapper"<?php if ( $tbsh_bg_image ) { echo ' style="background-image:url(' . $tbsh_bg_image . ');"'; } ?>>
	<div class="three-by-slider-hover-content-wrapper constrained-width">
		<div class="three-by-slider-hover-content-slider">
			<?php if ( !empty( $tbsh_headline ) ) { echo '<h2 class="slide-right fg-c1" data-speed="600">' . $tbsh_headline . '</h2>'; } ?>
			<?php if ( !empty( $tbsh_intro ) ) { echo '<div class="tbsh-intro slide-right fg-c1" data-speed="600">' . $tbsh_intro . '</div>'; } ?>
			<div class="flexslider<?php if ( count($tbsh_slides) <= 3 ) { echo ' oneslide'; } ?>">
				<ul class="slides">
					<?php foreach ($tbsh_slides as $slide) :
						$image = wp_get_attachment( $slide['image'], THEME_NAME . '-three-by-slider-hover' ); ?>
						<li>
							<div>
								<img src="<?php echo $image['src']; ?>" alt="<?php echo $image['alt']; ?>">
								<div class="single-slide-text-wrapper">
									<div class="h3 single-slide-text-headline font-heading fg-white">
										<?php echo $slide['headline']; ?>
									</div>
									<div class="single-slide-text-text-block fg-white">
										<?php echo $slide['text_block']; ?>
									</div>
									<?php if ( !empty( $slide['cta'] ) ) { echo '<a class="btn btn-primary" href="' . $slide['cta']['url'] . '"' . (!empty($slide['cta']['target'])?' " target="_blank"':"") .'>' . $slide['cta']['title'] . '</a>'; } ?>
								</div>
								<div class="three-by-slider-hover-overlay"></div>
							</div>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>
	</div><!-- /three-by-slider-hover-content-wrapper -->
</section>