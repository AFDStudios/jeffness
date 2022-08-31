<?php   

$image = get_field('header_block_background_image');
$image_tablet = get_field('header_block_background_image_tablet');
$image_mobile = get_field('header_block_background_image_mobile');

if ( $image ) :
	// Image variables.
	$url = $image['url'];
	$alt = $image['alt'];
	// Thumbnail size attributes.
	$size = THEME_NAME . '-header-static';
	$thumb = $image['sizes'][ $size ];
endif;
// Tablet image handling
if ( $image_tablet ) :
	// Image variables.
	$url_tablet = $image_tablet['url'];
	$alt_tablet = $image_tablet['alt'];
	// Thumbnail size attributes.
	$size_tablet = THEME_NAME . '-header-static-tablet';
	$thumb_tablet = $image_tablet['sizes'][ $size_tablet ];
else:
	// Image variables.
	$url_tablet = $image['url'];
	$alt_tablet = $image['alt'];
	// Thumbnail size attributes.
	$size_tablet = THEME_NAME . '-header-static-tablet';
	$thumb_tablet = $image['sizes'][ $size_tablet ];
endif;
// Mobile image handling
if ( $image_mobile ) :
	// Image variables.
	$url_mobile = $image_mobile['url'];
	$alt_mobile = $image_mobile['alt'];
	// Thumbnail size attributes.
	$size_mobile = THEME_NAME . '-header-static-mobile';
	$thumb_mobile = $image_mobile['sizes'][ $size_mobile ];
else:
	// Image variables.
	$url_mobile = $image['url'];
	$alt_mobile = $image['alt'];
	// Thumbnail size attributes.
	$size_mobile = THEME_NAME . '-header-static-mobile';
	$thumb_mobile = $image['sizes'][ $size_mobile ];
endif;

$headline = get_field('header_block_headline');
$subheadline = get_field('header_block_subheadline');
$text = get_field('header_block_text');
$cta = get_field('header_block_cta');
$bg_color =  get_field('header_block_background_color'); 
$text_color =  get_field('text_color');
$overlay =  get_field('overlay'); 
$cta_type =  get_field('cta_type'); 

if ( $cta ) :
	$cta_url = $cta['url'];
	$cta_title = $cta['title'];
	$cta_target = $cta['target'] ? $cta['target'] : '_self';
endif;

// Create id attribute allowing for custom "anchor" value.
$id = 'gcom-header-block-wrapper-id-' . $block['id'];
if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}

// Get any manually entered class name from the block
if( !empty($block['className']) ) {
	$className = $block['className'] . ' ';
}

// =========================================
//   ENQUEUE STYLES AND SCRIPTS
// =========================================
wp_register_style( 'header-block-module-styles', get_template_directory_uri() . '/modules/header_block/header_block.css', array(), '', 'all' );
wp_enqueue_style('header-block-module-styles');
wp_enqueue_script('header-block-module-script', get_template_directory_uri() . '/modules/header_block/header_block.min.js', array(), '', 'all' ) ;

if ( get_field('video_embed') ) : 
	// We have a video embed to show
	$video_embed = get_field('video_embed');
	$video_type = get_field('video_type');
	$video_poster = get_field('video_poster');
	// If it's a Vimeo video, load that library and do the things.
	if ( $video_type == 'vimeo' ) :
		// Enqueue the Vimeo library
		wp_enqueue_script('vimeo-scripts', get_template_directory_uri() . '/assets/vendor/vimeo/player.min.js', array('jquery'), '1.0.0', true); ?>
		<section id="header-page-video-wrapper" class="<?php echo $className; ?>header-slider video-vimeo"<?php if ($video_poster ) { echo ' style="background-image:url(' . $video_poster . ');"'; } ?>>
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
	<?php else : // It's a YouTube video, it doesn't have a library so just do the things.?>
		<section id="header-page-video-wrapper" class="<?php echo $className; ?>header-slider video-youtube">
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
				<iframe width="560" height="315" src="//www.youtube.com/embed/<?php echo $video_embed; ?>?playsinline=1&controls=1&autoplay=1&mute=1&enablejsapi=1&loop=1&playlist=<?php echo $video_embed; ?>&rel=0" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
			</div>
		</section>
<?php endif; elseif ( $image || $headline ) : ?>
	<section id="<?php echo $id; ?>" class="<?php echo $className; ?>header-block-wrapper">
		<?php 
		if ( !empty( $subheadline ) || !empty( $headline ) || !empty( $cta ) || 'post' == get_post_type() ) :
			echo '<div class="header-block-text-wrapper constrained-width">';

			if(is_single() && 'post' == get_post_type()){
				echo '<div class="h2 header-date ' . $text_color . '">' . get_the_date( 'F j, Y' ) . '</div>';
			}
			if ( !empty( $subheadline ) ) { 
				echo '<div class="h2 header-subheadline ' . $text_color . '">' . $subheadline . '</div>'; 
			}

			if ( !empty( $headline ) ) :
				echo '<h1 class="' . $text_color . '">' . $headline . '</h1>'; 
			elseif(is_single() && 'post' == get_post_type()): //to check if it is post and display the post title
				echo '<h1 class="' . $text_color . '">' . get_the_title() . '</h1>'; 
			endif; 

			if ( !empty( $text ) ) : 
				echo '<div class="header-block-text ' . $text_color . '">' . $text . '</div>'; 
			endif; 
			if ( !empty( $cta_title ) && !empty( $cta_url ) ) :
				echo '<a class="btn ' . $cta_type . '" href="' . esc_url( $cta_url ) . '" target="' . esc_attr( $cta_target ) . '">' . esc_html( $cta_title ) . '</a>';
			endif; 
			echo '</div>';
		endif; 
		if ( !empty( $headline ) || !empty( $text ) || get_field('header_block_cta') || is_single() ) { echo '<div class="overlay ' . $overlay . '"></div>'; }
		if ( $image ) :
		?>
		<picture>
			<source media="(min-width: 1025px)" srcset="<?php echo esc_url($thumb); ?> 1920w">

			<source media="(min-width: 601px)" srcset="<?php echo esc_url($thumb_tablet); ?> 1024w">

			<source media="(min-width: 0px)" srcset="<?php echo esc_url($thumb_mobile); ?>, 100vw">

			<img loading="lazy" src="<?php echo esc_url($thumb); ?>" alt="<?php echo $alt; ?>" class="header-static-image">
		</picture>
		<?php endif; ?>
	</section>
<?php 
else:
	echo '<div class="header-spacer"></div>';
endif; ?>