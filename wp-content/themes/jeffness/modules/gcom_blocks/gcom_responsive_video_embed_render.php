<?php
// Responsive Video Embed Block Template for ACF Gutenberg
if( get_field('video_url') ) : $video_url = get_field('video_url');	?>

	<div class="gcom-responsive-video-container">
		<?php echo $video_url; ?>
	</div>

<?php endif; ?>