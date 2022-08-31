<?php 
// Create id attribute allowing for custom "anchor" value.
$id = 'intro-section-wrapper-id-' . $block['id'];
if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}

// Get any manually entered class name from the block
if( !empty($block['className']) ) {
	$className = $block['className'] . ' ';
}
?>

<section id="<?php echo $id; ?>" class="<?php echo $className; ?>gcom-intro-section-wrapper" style="background-image:url(<?php echo get_field('bg_image'); ?>);">
	<div class="intro-section-content-wrapper constrained-width">
		<?php 
		$sub_headline = get_field('sub_headline');
		$headline = get_field('headline');
		$text_block = get_field('text_block');
		$ctas = get_field('ctas');
		$cta_type = get_field('cta_type');

		if ( $sub_headline ) { echo '<div class="intro-section-sub-headline">' . $sub_headline . '</div>'; }
		if ( $headline ) : 
			$headline_type = get_field('headline_type');
			switch ( $headline_type ) {
				case 'h1':
					echo '<h1 class="intro-section-headline">' . $headline . '</h1><hr>'; 
					break;
				case 'h2':
					echo '<h2 class="intro-section-headline">' . $headline . '</h2><hr>'; 
					break;
				case 'h3':
					echo '<h3 class="intro-section-headline">' . $headline . '</h3><hr>'; 
					break;
				case 'h4':
					echo '<h4 class="intro-section-headline">' . $headline . '</h4><hr>'; 
					break;
				case 'h1-class':
					echo '<div class="h1 intro-section-headline">' . $headline . '</div><hr>'; 
					break;
				case 'h2-class':
					echo '<div class="h2 intro-section-headline">' . $headline . '</div><hr>'; 
					break;
				case 'h3-class':
					echo '<div class="h3 intro-section-headline">' . $headline . '</div><hr>'; 
					break;
				case 'h4-class':
					echo '<div class="h4 intro-section-headline">' . $headline . '</div><hr>'; 
					break;
				default:
					echo '<div class="h1 intro-section-headline">' . $headline . '</div><hr>'; 
					break;
			}
		endif;
		if ( $text_block ) { echo '<div class="intro-section-text-block constrained-width-narrow">' . $text_block . '</div>'; }
		// Callouts (mostly for rooms but it can be used anywhere)
		$callouts = get_field('callouts');
		if ( $callouts ) :
			echo '<div class="intro-callouts-wrapper">';
			foreach ( $callouts as $callout ) :
				$description = $callout['description'];
				$icon_img = $callout['icon_custom'];
				$icon_fa5 = $callout['icon_fa5'];
				echo '<div class="intro-callouts-single-wrapper">';
					if ( $icon_img ) :
						echo '<img src="' . $icon_img['url'] . '" alt="' . $icon_img['url'] . '">';
					elseif ( $icon_fa5 ):
						echo $icon_fa5;
					endif;
					echo '<div class="intro-callouts-description-wrapper">';
						echo $description;
					echo '</div>';
				echo '</div>';
			endforeach;
			echo '</div>';
		endif;
		 // Now do the CTAs
		if ( $ctas ) : 
			echo '<div class="cta-wrapper">';
			foreach ($ctas as $cta) {
				$cta_url = $cta['cta']['url'];
				$cta_title = $cta['cta']['title'];
				$cta_target = $cta['cta']['target'] ? $cta['cta']['target'] : '_self';
				echo '<a class="btn-intro btn-underline btn-underline-primary ' . $cta_type . '" href="' . esc_url( $cta_url ) . '" target="' . esc_attr( $cta_target ) . '">' . esc_html( $cta_title ) . '</a>';
			}
			echo '</div>';
		endif;
		?>
	</div>
</section>
	