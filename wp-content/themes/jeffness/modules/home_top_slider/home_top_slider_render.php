<?php   
$home_top_slider = get_field('home_top_slider_slides');

// Create id attribute allowing for custom "anchor" value.
$id = 'gcom-gallery-wrapper-id-' . $block['id'];
if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}

// Get any manually entered class name from the block
if( !empty($block['className']) ) {
	$className = $block['className'] . ' ';
}

if ( get_field('video_embed') ) : 
	$video_embed = get_field('video_embed');
	$video_type = get_field('video_type');
	$video_poster = get_field('video_poster');
	// =========================================
	//   ENQUEUE STYLES AND SCRIPTS
	// =========================================
	wp_register_style( 'home-top-slider-module-styles', get_template_directory_uri() . '/modules/home_top_slider/home_top_slider.css', array(), '', 'all' );
	wp_enqueue_style('home-top-slider-module-styles');
	wp_enqueue_script('home-top-slider-module-styles-script', get_template_directory_uri() . '/modules/home_top_slider/home_top_slider.min.js', array(), '', 'all' ) ;
	if ( $video_type == 'vimeo' ) :
		// Enqueue the Vimeo library
		wp_enqueue_script('vimeo-scripts', get_template_directory_uri() . '/assets/vendor/vimeo/player.min.js', array('jquery'), '1.0.0', true); ?>
		<section id="front-page-video-wrapper" class="<?php echo $className; ?>header-slider video-vimeo"<?php if ($video_poster ) { echo ' style="background-image:url(' . $video_poster . ');"'; } ?>>
			<div class="video-controls-wrapper">
				<button class="header-video-control header-play-button hidden" tabindex="0" aria-label="Play Video">
					<i class="fa fa-play" aria-hidden="true"></i>
				</button>
				<button class="header-video-control header-pause-button" tabindex="0" aria-label="Pause Video">
					<i class="fa fa-pause" aria-hidden="true"></i>
				</button>
				<button class="header-video-control header-mute-button hidden" tabindex="0" aria-label="Mute Video">
					<i class="fa fa-volume-up" aria-hidden="true"></i>
				</button>
				<button class="header-video-control header-volume-button" tabindex="0" aria-label="Unmute Video">
					<i class="fa fa-volume-off" aria-hidden="true"></i>
				</button>
			</div>
			<div id="header-video" class="video-wrapper" data-vimeo-id="<?php echo $video_embed; ?>">
			</div>
		</section>
	<?php else : ?>
		<section id="front-page-video-wrapper" class="<?php echo $className; ?>header-slider video-youtube">
			<div class="video-controls-wrapper">
				<button class="header-video-control header-play-button hidden" tabindex="0" aria-label="Play Video">
					<i class="fa fa-play" aria-hidden="true"></i>
				</button>
				<button class="header-video-control header-pause-button" tabindex="0" aria-label="Pause Video">
					<i class="fa fa-pause" aria-hidden="true"></i>
				</button>
				<button class="header-video-control header-mute-button hidden" tabindex="0" aria-label="Mute Video">
					<i class="fa fa-volume-up" aria-hidden="true"></i>
				</button>
				<button class="header-video-control header-volume-button" tabindex="0" aria-label="Unmute Video">
					<i class="fa fa-volume-off" aria-hidden="true"></i>
				</button>
			</div>
			<div class="video-wrapper">
				<iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $video_embed; ?>?playsinline=1&controls=1&autoplay=1&mute=1&enablejsapi=1&loop=1&playlist=<?php echo $video_embed; ?>&rel=0" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
			</div>
		</section>
	<?php endif; ?>
<?php elseif ( !empty( $home_top_slider ) ) : 
	// =========================================
	//   ENQUEUE STYLES AND SCRIPTS
	// =========================================
	// Enqueue flexslider if it isn't already
	wp_enqueue_style( 'flexslider-style', get_template_directory_uri() . '/assets/vendor/flexslider/flexslider.css' );
	wp_enqueue_script('flexslider-scripts', get_template_directory_uri() . '/assets/vendor/flexslider/jquery.flexslider-min.js#deferload', array('jquery'), '1.0.0', true);
	// Lightbox for videos
	wp_enqueue_style( 'fancybox-style', get_template_directory_uri() . '/assets/vendor/fancybox3/jquery.fancybox.min.css' );
	wp_enqueue_script('fancybox-scripts', get_template_directory_uri() . '/assets/vendor/fancybox3/jquery.fancybox.min.js', array('jquery'), '1.0.0', true);
	// Now enqueue the module-specific styles and scripts
	wp_register_style( 'home-top-slider-module-styles', get_template_directory_uri() . '/modules/home_top_slider/home_top_slider.css', array(), '', 'all' );
	wp_enqueue_style('home-top-slider-module-styles');
	wp_enqueue_script('home-top-slider-module-styles-script', get_template_directory_uri() . '/modules/home_top_slider/home_top_slider.min.js#deferload', array(), '', 'all' ) ;
	?>
	<section id="front-page-slider-wrapper" class="<?php echo $className; ?>header-slider<?php if (count($home_top_slider) == 1) { echo ' one-slide'; } ?>">
		<?php
		// We have a slider so let's output our arrows.
		echo '<style>';
			echo '#front-page-slider-wrapper .flexslider .flex-direction-nav .flex-prev:before { content: url(' . (get_field( 'slideshow_previous', 'options')?get_field( 'slideshow_previous', 'options'):get_template_directory_uri() . '/assets/images/gallery-arrow-left.png') . '); }';
			echo '#front-page-slider-wrapper .flexslider .flex-direction-nav .flex-next:before { content: url(' . (get_field( 'slideshow_next', 'options')?get_field( 'slideshow_next', 'options'):get_template_directory_uri() . '/assets/images/gallery-arrow-right.png') . '); }';
		echo '</style>';
		?>
		<div class="flexslider">
			<ul class="slides">
				<?php 
				foreach ( $home_top_slider as $slide ) : ?>
					<li>
						<?php if ( !empty( $slide['sub-headline'] ) || !empty( $slide['headline'] ) || !empty( $slide['content'] ) ) : ?>
						<div class="text-block fg-white">
							<?php if ( !empty( $slide['sub-headline'] ) ) { ?><div class="sub-headline"><?php echo $slide['sub-headline']; ?></div><?php } ?>
							<?php if ( !empty( $slide['headline'] ) ) { ?><div class="h1 home-slider-headline fg-white"><?php echo $slide['headline']; ?></div><?php } ?>
							<?php if ( !empty( $slide['content'] ) ) { ?><div class="home-slider-content fg-white"><?php echo $slide['content']; ?></div><?php } ?>
						</div>
						<?php endif; ?>
						<?php
						if ( !empty($slide['video_url']) ) :
							if ( get_field('video_play_icon', 'option') ) :
								$play_icon = get_field('video_play_icon', 'option');
							else :
								$play_icon = array();
								$play_icon['alt'] = 'Play Video';
								$play_icon['url'] = get_template_directory_uri() . '/assets/images/PlayButtonPNG.png';
							endif;
							echo '<a data-fancybox href="' . $slide['video_url'] . '" class="video-play-wrapper"><img src="' . $play_icon['url'] . '" alt="' . $play_icon['alt'] . '"></a>';
						endif;
						?>
						<div class="overlay"></div>
						<?php
						// Check to see if we have an image. 
						if ( $slide['image'] ) :
							// We have an image, so use that to set all our variables.
							$image = $slide['image']; 
							// Image variables.
							$url = $image['url'];
							$alt = $image['alt'];
							// Thumbnail size attributes.
							$size = THEME_NAME . '-home-top-slider';
							$thumb = $image['sizes'][ $size ];
						else:
							// We do NOT have an image so use the placeholder one.
							$url = '//via.placeholder.com/1440x900';
							$alt = 'Placeholder Image for Header slider';
							// Thumbnail size attributes.
							$thumb = '//via.placeholder.com/1440x900';
						endif;
						// See if a mobile-specific image has been selected.
						if ( $slide['image_mobile'] ) :
							// They did pick a mobile-specific image so use that.
							// Image variables.
							$url_mobile = $slide['image_mobile']['url'];
							$alt_mobile = $slide['image_mobile']['alt'];
							// Thumbnail size attributes.
							$size_mobile = THEME_NAME . '-home-top-slider-mobile';
							$thumb_mobile = $slide['image_mobile']['sizes'][ $size_mobile ];
						// No mobile specific image was chosen, so see if a big image was selected.
						elseif ( $slide['image'] ):
							// There is a big desktop image so use that for mobile.
							// Image variables.
							$url_mobile = $image['url'];
							$alt_mobile = $image['alt'];
							// Thumbnail size attributes.
							$size_mobile = THEME_NAME . '-home-top-slider-mobile';
							$thumb_mobile = $image['sizes'][ $size_mobile ];
						else:
							// Neither a desktop nor a mobile image was selected, so fall back to Placeholder.
							$url_mobile = '//via.placeholder.com/500x630';
							$alt_mobile = 'Mobile Placeholder Image for Header slider';
							// Thumbnail size attributes.
							$thumb_mobile = '//via.placeholder.com/500x630';
						endif;
						?>
						<picture>

							<source media="(min-width: 501px)" srcset="<?php echo esc_url($thumb); ?> 1920w">

							<source media="(max-width: 500px)" srcset="<?php echo esc_url($thumb_mobile); ?>, 100vw">

							<img loading="lazy" src="<?php echo esc_url($thumb); ?>" alt="<?php echo $alt; ?>" class="header-slider-image">

						</picture>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
		<div class="home-top-slider-counter-wrapper gallery-progress fg-white">
			<span class="home-top-slider-current fg-white">1</span> / <span class="home-top-slider-total fg-white"><?php echo count($home_top_slider); ?></span>
		</div>
	</section>
<?php endif; ?>