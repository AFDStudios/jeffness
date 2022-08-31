<?php
// =====================================================
//   Gutenberg block for showing a single post excerpt
// =====================================================

$posts = get_field('posts');
$keep_reading = get_field('keep_reading');
$excerpt_length = get_field('excerpt_length');

if ( get_field('excerpt_block_headline') ) { echo '<h3>' . get_field('excerpt_block_headline') . '</h3>'; }
foreach ( $posts as $post ) : // variable must be called $post (IMPORTANT)
	setup_postdata($post);
	$thumbnail = wp_get_attachment( get_post_meta( $post->ID, '_thumbnail_id', true ), THEME_NAME . '-blog-post-shortcode-thumbnail' );
	$thumbnail_mobile = wp_get_attachment( get_post_meta( $post->ID, '_thumbnail_id', true ), THEME_NAME . '-blog-recent-thumbnail' );
	echo '<div class="single-blog-post-shortcode-outer-wrapper">';
		echo '<div class="single-blog-post-shortcode-inner-wrapper constrained-width">';
			echo '<div class="single-blog-post-shortcode-image">';
				echo '<picture>';
					echo '<source media="(min-width: 381px)" srcset="' . $thumbnail['src'] . '" 615w">';
					echo '<source media="(max-width: 380px)" srcset="'. $thumbnail_mobile['src'] . '" 100vw">';
					echo '<img loading="lazy" src="' . $thumbnail['src'] . '" alt="' . $thumbnail['alt'] . '">';
				echo '</picture>';
			echo '</div>';

			echo '<div class="single-blog-post-shortcode-text-wrapper">';
				echo '<div class="single-blog-post-shortcode-text-headline">' . get_the_title($post->ID) . '</div>';
				echo '<div class="single-blog-post-shortcode-text-excerpt">' . (!empty($excerpt_length)?excerpt($excerpt_length, $post->ID):get_the_excerpt($post->ID)) . '</div>';
			echo '</div>';
			echo '<div class="single-blog-post-shortcode-cta-wrapper">';
				echo '<a href="' . get_the_permalink($post->ID) . '" class="btn btn-primary">' . $keep_reading . '</a>';
			echo '</div>';
		echo '</div>';
	echo '</div>';

endforeach;

wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly
?>