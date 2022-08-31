<!doctype html>
<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

	<head>
		<?php
		echo "\n<!-- Theme Option Header Scripts -->\n";
		if ( have_rows('global_scripts', 'option') ) :
			while( have_rows('global_scripts', 'option') ): the_row();
				$script = get_sub_field('script');
				$script_location = get_sub_field('script_location');
				if ( $script_location == 'header_start' && get_sub_field('enable_script') ) :
					echo $script . "\n";
				endif;
			endwhile;
		endif;
		?>
		<meta charset="utf-8">
		<?php // force Internet Explorer to use the latest rendering engine available ?>
		
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<title><?php wp_title(''); ?></title>

		<meta name="viewport" content="width=device-width, initial-scale=1"/>

		<link rel="icon" href="<?php echo get_field('favicon', 'option'); ?>">
		<!--[if IE]>
			<link rel="shortcut icon" href="<?php echo get_field('favicon', 'option'); ?>/favicon.ico">
		<![endif]-->

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<?php wp_head(); ?>

		<?php
		// Main Color Variables
		// Overall transparency variable
		if ( get_field('global_color_opacity', 'option') ) :
			$overlay_transparency = get_field('global_color_opacity', 'option');
		else:
			$overlay_transparency = 0.75;
		endif;
		// Primary theme color
		if ( get_field('color_primary', 'option') ) :
			$color_primary = get_field('color_primary', 'option');
		else:
			$color_primary = '#F8766D';
		endif;
		// Secondary theme color
		if ( get_field('color_secondary', 'option') ) :
			$color_secondary = get_field('color_secondary', 'option');
		else:
			$color_secondary = '#00BFC4';
		endif;
		// Default white color
		if ( get_field('color_white', 'option') ) :
			$color_white = get_field('color_white', 'option');
		else:
			$color_white = "#ffffff";
		endif;
		// Default black color
		if ( get_field('color_black', 'option') ) :
			$color_black = get_field('color_black', 'option');
		else:
			$color_black = '#000000';
		endif;
		// Default body color
		if ( get_field('color_body', 'option') ) :
			$color_body = get_field('color_body', 'option');
		else:
			$color_body = '#232323';
		endif;		
		// Text Link Colors
		if ( get_field('color_link', 'option') ) :
			$color_link = get_field('color_link', 'option');
		else:
			$color_link = '#7CAE00';
		endif;
		// Text Link Hover Color
		if ( get_field('color_link_hover', 'option') ) :
			$color_link_hover = get_field('color_link_hover', 'option');
		else:
			$color_link_hover = '#c77cff';
		endif;		
		// Nav colors
		if ( get_field('nav_color', 'option') ) :
			$nav_color = get_field('nav_color', 'option');
		else:
			$nav_color = '#7CAE00';
		endif;
		// Nav hover color
		if ( get_field('nav_color_hover', 'option') ) :
			$nav_color_hover = get_field('nav_color_hover', 'option');
		else:
			$nav_color_hover = '#C77CFF';
		endif;

		// Set variables for the RGBA values for each of the pre-set colors.
		$color_primary_rgba = hex2Rgb($color_primary, $overlay_transparency);
		$color_secondary_rgba = hex2Rgb($color_secondary, $overlay_transparency);
		$color_white_rgba = hex2Rgb($color_white, $overlay_transparency);
		$color_black_rgba = hex2Rgb($color_black, $overlay_transparency);
		?>
		
		<!-- Pre-defined Styles from Theme Options -->
		<?php 
		if ( get_field('typography_scripts', 'option') ) :
			$typograpy_scripts = get_field('typography_scripts', 'option');
			echo '	<!-- Typography Scripts -->
			' . $typograpy_scripts . '
			<!-- End Typography Scripts -->
			
			';
		endif;
		?>
<style type="text/css">
			/* -------------------------------------------------*/
			/*  PRE-SET COLOR CLASSES                           */
			/* [what to change]_[colorcode]_[hover (optional)]  */
			/* -------------------------------------------------*/

			/* General Text Link Colors */
			a { color: <?php echo $color_link; ?>; }
			a:hover { color: <?php echo $color_link_hover; ?>; }

			/* Foreground Colors */
			.fg-c1, .gform_wrapper input { color:<?php echo $color_primary; ?>; } /* Change the foreground of the element to Color 1*/
			.fg-c2 { color:<?php echo $color_secondary; ?>; } /* Change the foreground of the element to Color 2*/
			.fg-body { color: <?php echo $color_body; ?> }
			.fg-white, 
			.checkered-row-image-wrapper .flexslider .flex-direction-nav a:before, 
			.image-break-wrapper a, 
			.flex-direction-nav a:before, 
			.rbs_gallery_button a.button.button-border-caution.active, 
			#front-page-slider-wrapper .flexslider .flex-direction-nav a:before  { color:<?php echo $color_white; ?>; }
			.fg-black { 
				color:<?php echo $color_black; ?>; 
			}
			.header .header-wrapper .header-menu-wrapper > div .menu .menu-item a{
				color:<?php echo $nav_color; ?>;
			}
			.header .header-wrapper .header-menu-wrapper > div .menu .menu-item a:hover {
				color:<?php echo $nav_color_hover; ?>;
			}

			/* Foreground Colors - Hover */
			.fg-c1-hover:hover { color:<?php echo $color_primary; ?>; } 
			.fg-c2-hover:hover { color:<?php echo $color_secondary; ?>; } 
			.fg-body-hover:hover { color:<?php echo $color_body; ?>; }
			.fg-white-hover:hover { color:<?php echo $color_white; ?>; }
			.fg-black-hover:hover { color:<?php echo $color_black; ?>; }

			/* Background Colors */
			.bg-c1 { background-color:<?php echo $color_primary;?>;} 
			.bg-c2 { background-color:<?php echo $color_secondary; ?>; } 
			.bg_body { background-color:<?php echo $color_body; ?>; } 
			.bg-white { background-color:<?php echo $color_white; ?>; } 
			.bg-black { background-color:<?php echo $color_black; ?>; } 

			/* Background Color and Opacities */
			.bg-c1-opacity { background-color: rgba(<?php echo $color_primary_rgba['r'] . ", " . $color_primary_rgba['g'] . ", " . $color_primary_rgba['b'] . ", " . $color_primary_rgba['a'] ?>); } /* Change the background of the element to Color 1 */
			.bg-c2-opacity { background-color: rgba(<?php echo $color_secondary_rgba['r'] . ", " . $color_secondary_rgba['g'] . ", " . $color_secondary_rgba['b'] . ", " . $color_secondary_rgba['a'] ?>); } /* Change the background of the element to Color 2 */
			.bg-white-opacity { background-color: rgba(<?php echo $color_white_rgba['r'] . ", " . $color_white_rgba['g'] . ", " . $color_white_rgba['b'] . ", " . $color_white_rgba['a'] ?>); }
			.bg-black-opacity { background-color: rgba(<?php echo $color_black_rgba['r'] . ", " . $color_black_rgba['g'] . ", " . $color_black_rgba['b'] . ", " . $color_black_rgba['a'] ?>); }

			@media screen and (max-width: 1050px) {
			    .bg-c1-opacity.no-opacity-mobile {
			        background-color: rgba(<?php echo $color_primary_rgba['r'] . ", " . $color_primary_rgba['g'] . ", " . $color_primary_rgba['b'] . ", 1" ?>);
			    }
			    .bg-c2-opacity.no-opacity-mobile {
			        background-color: rgba(<?php echo $color_secondary_rgba['r'] . ", " . $color_secondary_rgba['g'] . ", " . $color_secondary_rgba['b'] . ", 1" ?>);
			    }
			    .bg-white-opacity.no-opacity-mobile {
			        background-color: rgba(<?php echo $color_white_rgba['r'] . ", " . $color_white_rgba['g'] . ", " . $color_white_rgba['b'] . ", 1" ?>);
			    }
			    .bg-black-opacity.no-opacity-mobile {
			        background-color: rgba(<?php echo $color_black_rgba['r'] . ", " . $color_black_rgba['g'] . ", " . $color_black_rgba['b'] . ", 1" ?>);
			    }
			}
			/* Background Color and Opacities - Hover */
			.bg-c1-opacity-hover:hover { background-color: rgba(<?php echo $color_primary_rgba['r'] . ", " . $color_primary_rgba['g'] . ", " . $color_primary_rgba['b'] . ", " . $color_primary_rgba['a'] ?>); } /* Change the background of the element to Color 1 */
			.bg-c2-opacity-hover:hover { background-color: rgba(<?php echo $color_secondary_rgba['r'] . ", " . $color_secondary_rgba['g'] . ", " . $color_secondary_rgba['b'] . ", " . $color_secondary_rgba['a'] ?>); } /* Change the background of the element to Color 2 */
			.bg-white-opacity-hover:hover { background-color: rgba(<?php echo $color_white_rgba['r'] . ", " . $color_white_rgba['g'] . ", " . $color_white_rgba['b'] . ", " . $color_white_rgba['a'] ?>); }
			.bg-black-opacity-hover:hover { background-color: rgba(<?php echo $color_black_rgba['r'] . ", " . $color_black_rgba['g'] . ", " . $color_black_rgba['b'] . ", " . $color_black_rgba['a'] ?>); }

			/* Background Colors - Hover */
			.bg-c1-hover:hover { background-color:<?php echo $color_primary; ?>; }/*// Change the background of the element to Color 1 on hover*/
			.bg-c2-hover:hover { background-color:<?php echo $color_secondary; ?>; }/*// Change the background of the element to Color 2 on hover*/
			.bg-white-hover:hover { background-color:<?php echo $color_white; ?>; }
			.bg-black-hover:hover { background-color:<?php echo $color_black; ?>; }

			/* Border Colors */
			.border-c1 { border-color:<?php echo $color_primary; ?>; }
			.border-c2 { border-color:<?php echo $color_secondary; ?>; }
			.border-white { border-color:<?php echo $color_white; ?>; }
			.border-black { border-color:<?php echo $color_black; ?>; }			

			/* Border Colors */
			.border-top-c1--before:before { border-top-color:<?php echo $color_primary; ?>; }
			.border-top-c2--before:before { border-top-color:<?php echo $color_secondary; ?>; }
			.border-top-white--before:before { border-top-color:<?php echo $color_white; ?>; }
			.border-top-black--before:before { border-top-color:<?php echo $color_black; ?>; }

			/* Border Colors */
			.border-left-c1--before:before { border-left-color:<?php echo $color_primary; ?>; }
			.border-left-c2--before:before { border-left-color:<?php echo $color_secondary; ?>; }
			.border-left-white--before:before { border-left-color:<?php echo $color_white; ?>; }
			.border-left-black--before:before { border-left-color:<?php echo $color_black; ?>; }

			/* Border Colors */
			.border-right-c1--before:before { border-right-color:<?php echo $color_primary; ?>; }
			.border-right-c2--before:before { border-right-color:<?php echo $color_secondary; ?>; }
			.border-right-white--before:before { border-right-color:<?php echo $color_white; ?>; }
			.border-right-black--before:before { border-right-color:<?php echo $color_black; ?>; }

			/* Border Colors */
			.border-bottom-c1--before:before { border-bottom-color:<?php echo $color_primary; ?>; }
			.border-bottom-c2--before:before { border-bottom-color:<?php echo $color_secondary; ?>; }
			.border-bottom-white--before:before, .image-break-link:hover .image-break-column { border-bottom-color:<?php echo $color_white; ?>; }
			.border-bottom-black--before:before { border-bottom-color:<?php echo $color_black; ?>; }
			
			.border-top-c1 { border-top-color:<?php echo $color_primary; ?>; }
			.border-top-c2 { border-top-color:<?php echo $color_secondary; ?>; }
			.border-top-white { border-top-color:<?php echo $color_white; ?>; }
			.border-top-black { border-top-color:<?php echo $color_black ?>; }
			
			.border-left-c1 { border-left-color:<?php echo $color_primary; ?>; }
			.border-left-c2 { border-left-color:<?php echo $color_secondary; ?>; }
			.border-left-white { border-left-color:<?php echo $color_white; ?>; }
			.border-left-black { border-left-color:<?php echo $color_black; ?>; }
			
			.border-right-c1 { border-right-color:<?php echo $color_primary; ?>; }
			.border-right-c2 { border-right-color:<?php echo $color_secondary; ?>; }
			.border-right-white { border-right-color:<?php echo $color_white; ?>; }
			.border-right-black { border-right-color:<?php echo $color_black; ?>; }
			
			.border-bottom-c1 { border-bottom-color:<?php echo $color_primary; ?>; }
			.border-bottom-c2 { border-bottom-color:<?php echo $color_secondary; ?>; }
			.border-bottom-white { border-bottom-color:<?php echo $color_white; ?>; }
			.border-bottom-black { border-bottom-color:<?php echo $color_black; ?>; }

			/* Border Colors: hover */
			.border-c1-hover:hover { border-color:<?php echo $color_primary; ?>; }
			.border-c2-hover:hover { border-color:<?php echo $color_secondary; ?>; }
			.border-white-hover:hover { border-color:<?php echo $color_white; ?>; }
			.border-black-hover:hover { border-color:<?php echo $color_black; ?>; }	

			/* Button classes are handled in the button_block module */

			/* Mobile Menu colors */
			<?php 
			$nav_link_color_mobile = get_field('nav_color_mobile', 'option'); 
			if ( $nav_link_color_mobile ) :
				echo '.header .header-wrapper .mobile-menu-wrapper .sliding-menu-content .menu ul li a,
				.js-menu-trigger,
				.header .header-wrapper .mobile-header-wrapper .mobile-menu-wrapper .sliding-menu-content .mobile-menu-content-social-media-wrapper .header-social-icon i { color: ' . $nav_link_color_mobile . '; }';
			endif;
			
			// Custom Colors
			$custom_colors = get_field('custom_color', 'option');
			if ( $custom_colors ) :
				$counter = 1;
				foreach ( $custom_colors as $color ) :
					// First, output the color-[hex] variations.
					echo '.color-'. $counter . ' { color: ' . $color['hex'] . '; }
			.color-'. $counter . '-bg { background-color: ' . $color['hex'] . '; }
			.color-'. $counter . '-border { border-color: ' . $color['hex'] . '; }
			.color-'. $counter . '-hover:hover { color: ' . $color['hex'] . '; }
			.color-'. $counter . '-hover-bg:hover { background-color: ' . $color['hex'] . '; }
			.color-'. $counter . '-hover-border:hover { border-color: ' . $color['hex'] . '; }';

					$color_classes = explode(',', $color['class']);
						if ( !empty( $color_classes ) ) :
							// Now cycle through the classes, if any, and output those.
							foreach ( $color_classes as $color_class ) :
								echo "\n
			" . $color_class . ' { color: ' . $color['hex'] . '; }';
								echo "\r
			" . $color_class . '-bg { background-color: ' . $color['hex'] . '; }';
								echo "\r
			" . $color_class . '-border { border-color: ' . $color['hex'] . '; }';
								echo "\r`
			" . $color_class . '-hover:hover { color: ' . $color['hex'] . '; }';
								echo "\r
			" . $color_class . '-hover-bg:hover { background-color: ' . $color['hex'] . '; }';
								echo "\r
			" . $color_class . '-hover-border:hover { border-color: ' . $color['hex'] . '; }';
							endforeach;
						endif;   
					$counter++;
				endforeach;
			endif;
			echo "\r\n";
			?>

			<?php // Custom typography
			$typography_overrides = get_field('typography_overrides', 'option');
			if ( $typography_overrides ) :
				$counter = 1;
				foreach ( $typography_overrides as $typography ) :
					// First, output the color-[hex] variations.
					echo $typography['class']  . ' { font-family:  ' . $typography['name'] . '; 
					font-size:  ' . $typography['size'] . ';
					line-height: ' . $typography['line_height'] . ';
					letter-spacing: ' . $typography['letter_spacing'] . ';
					text-transform: ' . $typography['text_transform'] . ';
					font-style: ' . $typography['font_style'] . '; 
					font-weight: ' . $typography['font_weight'] . ';}' ;
					$counter++;
				endforeach;
			endif;
			echo "\r\n";
			?>

			/* ------------------------------------*/
			/*             FONT CLASSES            */
			/* ------------------------------------*/

			<?php
			if ( get_field('default_headline_font', 'option') ) :
				echo '.font-heading { 
					font-family: ' . get_field('default_headline_font', 'option') . ';  
			}
				';
			endif;
			$hcounter = 1;
			while ( $hcounter < 5 ) :
				$h = get_field('h'.$hcounter.'_typography', 'option');
				if ( $h['font'] || $h['size'] || $h['font_weight'] || $h['line_height'] || $h['letter_spacing'] || $h['text_transform'] ) :
					echo '
			h' . $hcounter . ', .h' . $hcounter . ' {
			';
				if ( $h['font'] ) { echo 'font-family: ' . $h['font'] . ';
				'; }
				if ( $h['size'] ) { echo 'font-size: ' . $h['size'] . ';
				'; }
				if ( $h['font_weight'] ) { echo 'font-weight: ' . $h['font_weight'] . ';
				'; }
				if ( $h['line_height'] ) { echo 'line-height: ' . $h['line_height'] . ';
				'; }
				if ( $h['letter_spacing'] ) { echo 'letter-spacing: ' . $h['letter_spacing'] . ';
				'; }
				if ( $h['text_transform'] ) { echo 'text-transform: ' . $h['text_transform'] . ';
				'; }
			echo '
			}
			';
				// This is for auto-scaling headers down by x% from whatever they're set to in theme options.
				echo '@media only screen and (max-width: 600px) {'; 
					echo 'h' . $hcounter . ', .h' . $hcounter . ' {';
						if ( $h['size'] ) { 
							$h_mobile = preg_replace("/[^0-9]/", "", $h['size'] );
							echo 'font-size: ' . $h_mobile*0.8 . 'px;
						'; }
					echo '}'; // ends the heading style
				echo '}'; // ends the media query
				endif;
				$hcounter++;
			endwhile;
		
		$body = get_field('body_typography', 'option');
		if ( $body['font'] || $body['size'] || $body['font_weight'] || $body['line_height'] || $body['letter_spacing'] || $body['text_transform'] ) :
			echo 'body, p {
				'; 
			if ( $body['font'] ) { echo 'font-family: ' . $body['font'] . ';
				'; }
			if ( $body['size'] ) { echo 'font-size: ' . $body['size'] . ';
			'; }
			if ( $body['font_weight'] ) { echo 'font-weight: ' . $body['font_weight'] . ';
			'; }
			if ( $body['line_height'] ) { echo 'line-height: ' . $body['line_height'] . ';
			'; }
			if ( $body['letter_spacing'] ) { echo 'letter-spacing: ' . $body['letter_spacing'] . ';
			'; }
			if ( $body['text_transform'] ) { echo 'text-transform: ' . $body['text_transform'] . ';
			'; }
		echo '}
		';
		endif;

		$inline_link = get_field('inline_link_typography', 'option');
		if ( $inline_link['font'] || $inline_link['size'] || $inline_link['font_weight'] || $inline_link['line_height'] || $inline_link['letter_spacing'] || $inline_link['text_transform'] ) :
			echo 'p > a {
				'; 
			if ( $inline_link['font'] ) { echo 'font-family: ' . $inline_link['font'] . ';
				'; }
			if ( $inline_link['size'] ) { echo 'font-size: ' . $inline_link['size'] . ';
			'; }
			if ( $inline_link['font_weight'] ) { echo 'font-weight: ' . $inline_link['font_weight'] . ';
			'; }
			if ( $inline_link['line_height'] ) { echo 'line-height: ' . $inline_link['line_height'] . ';
			'; }
			if ( $inline_link['letter_spacing'] ) { echo 'letter-spacing: ' . $inline_link['letter_spacing'] . ';
			'; }
			if ( $inline_link['text_transform'] ) { echo 'text-transform: ' . $inline_link['text_transform'] . ';
			'; }
		echo '}
		';
		endif;

		// MOBILE MENU TYPOGRAPHY

		$nav_typography_mobile = get_field('nav_typography_mobile', 'option');
		if ( $nav_typography_mobile['font'] || $nav_typography_mobile['size'] || $nav_typography_mobile['font_weight'] || $nav_typography_mobile['line_height'] || $nav_typography_mobile['letter_spacing'] || $nav_typography_mobile['text_transform'] ) :
			echo '.header .header-wrapper .constrained-width .mobile-menu-wrapper .sliding-menu-content .menu ul li a,
			.header .header-wrapper .constrained-width .mobile-header-wrapper .mobile-menu-wrapper .sliding-menu-content .mobile-menu-bottom-row .btn {
				'; 
			if ( $nav_typography_mobile['font'] ) { echo 'font-family: ' . $nav_typography_mobile['font'] . ';
				'; }
			if ( $nav_typography_mobile['size'] ) { echo 'font-size: ' . $nav_typography_mobile['size'] . ';
			'; }
			if ( $nav_typography_mobile['font_weight'] ) { echo 'font-weight: ' . $nav_typography_mobile['font_weight'] . ';
			'; }
			if ( $nav_typography_mobile['line_height'] ) { echo 'line-height: ' . $nav_typography_mobile['line_height'] . ';
			'; }
			if ( $nav_typography_mobile['letter_spacing'] ) { echo 'letter-spacing: ' . $nav_typography_mobile['letter_spacing'] . ';
			'; }
			if ( $nav_typography_mobile['text_transform'] ) { echo 'text-transform: ' . $nav_typography_mobile['text_transform'] . ';
			'; }
		echo '}
		';
		endif;

		$nav = get_field('nav_typography', 'option');
		if ( $nav['font'] ) :
				echo '	.font-nav { 
					font-family: ' . $nav['font'] . ';  
			}
			';
		endif;
		if ( $nav['font'] || $nav['size'] || $nav['font_weight'] || $nav['line_height'] || $nav['letter_spacing'] || $nav['text_transform'] ) :
			echo 'header .header-wrapper .header-menu-wrapper > div .menu .menu-item a {
				'; 
			if ( $nav['font'] ) { echo 'font-family: ' . $nav['font'] . ';
				'; }
			if ( $nav['size'] ) { echo 'font-size: ' . $nav['size'] . ';
			'; }
			if ( $nav['font_weight'] ) { echo 'font-weight: ' . $nav['font_weight'] . ';
			'; }
			if ( $nav['line_height'] ) { echo 'line-height: ' . $nav['line_height'] . ';
			'; }
			if ( $nav['letter_spacing'] ) { echo 'letter-spacing: ' . $nav['letter_spacing'] . ';
			'; }
			if ( $nav['text_transform'] ) { echo 'text-transform: ' . $nav['text_transform'] . ';
			'; }
		echo '}
		';
		endif;

			?>

			/* HOME PAGE SLIDER CONTROLS */

			.header-slider .flexslider .flex-control-paging li a.flex-active {
				background: <?php echo $btn_primary_bg; ?>;
			}

			.header-slider .flexslider .flex-control-paging li a {
				background: <?php echo $color_white; ?>;
			}

			.testimonial-wrapper .testimonial-content-wrapper .flexslider .flex-control-nav li a {
				<?php if ( !empty( $color_secondary) ) { echo 'border: 1px solid ' . $color_secondary . ' !important;'; } ?>
			}

			.testimonial-wrapper .testimonial-content-wrapper .flexslider .flex-control-nav li a.flex-active {
				<?php if ( !empty( $color_secondary) ) { echo 'border: 1px solid ' . $color_secondary . ' !important; background: ' . $color_secondary . ' !important;'; } ?>
			}

			/* FOOTER */

			.footer-signup .gform_wrapper input[type="submit"] { border-color: inherit !important; }
			.footer-signup .gform_wrapper input[type="text"] { border-bottom-color: inherit !important;; }
			.footer-signup .gform_wrapper input[type="text"]::placeholder { color: inherit !important;; }
			.footer-signup .gform_wrapper input[type="text"]:-ms-input-placeholder { color: inherit !important;; }
			.footer-signup .gform_wrapper input[type="text"]::-ms-input-placeholder { color: inherit !important;; }
			footer .footer-row-wrapper .footer-row .footer-row-column .footer-row-column-social-media a {
				<?php if ( !empty( $color_white ) ) { echo 'color: ' . $color_white . ';'; } ?>
			}
			footer .footer-row-wrapper .footer-row .footer-row-column .footer-row-column-social-media a:hover {
				color: <?php echo $btn_primary_bg; ?>;
			}

			<?php
			/* HEADER STUFF */
			// Background color of the snapped main top nav
			if ( get_field( 'header_bg_color_snapped', 'option' ) && !get_field( 'header_bg_color_snapped_custom', 'option' ) ) : 
				switch ( get_field( 'header_bg_color_snapped', 'option' ) ) {
					case 'bg-c1':
						echo '.header.snapped, .header.snapped .header-wrapper { background-color:' . $color_primary . ' !important ;}';
						break;
					case 'bg-c2':
						echo '.header.snapped, .header.snapped .header-wrapper { background-color:' . $color_secondary . ' !important ;}';
						break;
					case 'bg-white':
						echo '.header.snapped, .header.snapped .header-wrapper { background-color:' . $color_white . ' !important ;}';
						break;
					case 'bg-black':
						echo '.header.snapped, .header.snapped .header-wrapper { background-color:' . $color_black . ' !important ;}';
						break;
					case 'bg-c1-opacity':
						echo '.header.snapped, .header.snapped .header-wrapper { background-color: rgba(' . $color_primary_rgba['r'] . ", " . $color_primary_rgba['g'] . ", " . $color_primary_rgba['b'] . ", " . $color_primary_rgba['a'] . ') !important ;}';
						break;
					case 'bg-c2-opacity':
						echo '.header.snapped, .header.snapped .header-wrapper { background-color: rgba(' . $color_secondary_rgba['r'] . ", " . $color_secondary_rgba['g'] . ", " . $color_secondary_rgba['b'] . ", " . $color_secondary_rgba['a'] . ') !important;}';
						break;
					case 'bg-white-opacity':
						echo '.header.snapped, .header.snapped .header-wrapper { background-color: rgba(' . $color_white_rgba['r'] . ", " . $color_white_rgba['g'] . ", " . $color_white_rgba['b'] . ", " . $color_white_rgba['a'] . ') !important;}';
						break;
					case 'bg-black-opacity':
						echo '.header.snapped, .header.snapped .header-wrapper { background-color: rgba(' . $color_black_rgba['r'] . ", " . $color_black_rgba['g'] . ", " . $color_black_rgba['b'] . ", " . $color_black_rgba['a'] . ') !important;}';
						break;
					case 'no-header-bg':
						echo '.header.snapped, .header.snapped .header-wrapper { background-color: transparent !important;}';
						break;
				}
			else:
				echo '.header.snapped { background-color:' . $color_primary . ';}';
			endif;

			// CUSTOM Background color of the snapped main top nav
			if ( get_field( 'header_bg_color_snapped_custom', 'option' ) ) : 
				echo '.header.snapped { background-color:' . get_field( 'header_bg_color_snapped_custom', 'option' ) . ';}';
			endif;
			?>

			.header-booking-wrapper .booking-widget-container .row-reservation-bar-datepicker .picker.picker--opened .picker__day--highlighted, 
			.header-booking-wrapper .booking-widget-container .row-reservation-bar-datepicker .picker.picker--opened .picker__day--highlighted:hover, 
			.header-booking-wrapper .booking-widget-container .row-reservation-bar-datepicker .picker.picker--opened .picker__day--infocus:hover, 
			.header-booking-wrapper .booking-widget-container .row-reservation-bar-datepicker .picker.picker--opened .picker__day--outfocus:hover,
			.header-booking-wrapper .booking-widget-container .row-reservation-bar-datepicker .picker.picker--opened .picker__holder .picker__frame .picker__wrap .picker__box .picker__date-display {
				<?php if ( !empty( $color_primary ) ) { echo 'background-color: ' . $color_primary . ';'; } ?>
			}

			.accommodations-nav-wrapper #menu-accommodations-menu ul li a:hover,
			.menu-nav-wrapper .btn:hover {
				<?php if ( !empty( $color_primary ) ) { echo 'background-color: ' . $color_primary . '; border-color: ' . $color_primary. ';'; } ?>
			}

			.accommodations-nav-wrapper #menu-accommodations-menu ul li a:hover span,
			.menu-nav-wrapper .btn:hover span {
				<?php if ( !empty( $color_white ) ) { echo 'color: ' . $color_white . ';'; } ?>
			}

			/* ROBO GALLERY: The majority of these style overrides are in assets/styles/vendor-override/_robogallery.scss, this is for theme option styles only. */

			.rbs_gallery_button .button {
				<?php if ( !empty( $color_primary ) ) { echo 'color: ' . $color_primary . '; border-color: ' . $color_primary . ';'; } ?>
			}
			.rbs_gallery_button .active {
				<?php if ( !empty( $color_primary ) ) { echo 'background-color: ' . $color_primary . '; color: ' . $color_white . ';'; } ?>
			}
			.rbsZoomIcon {
				<?php if ( !empty( $color_secondary ) ) { echo 'background: ' . hex2rgb($color_secondary, 1) . '; color: ' . $color_primary . '; border: 2px solid ' . hex2rgb( $color_primary ) . ';'; } ?>
			}

			/* INSTAGRAM PRO OVERRIDES: The majority of these style overrides are in assets/styles/vendor-override/_instagram_pro.scss, this is for theme option styles only. */

			#sb_instagram .sbi_link {
				background: <?php echo $color_secondary; ?>; /* fallback for IE8 */
				background-color: <?php echo hex2Rgb($color_secondary, $alpha = 0.9); ?>;
			}

			/* ADD TO ANY */
			<?php if ( !empty( $color_primary) ) : ?>
			.addtoany_content_bottom a span svg path { fill: <?php echo $color_primary ?> }
			<?php endif; ?>
		</style>
		<?php
		echo "\n<!-- Theme Option Header Scripts -->\n";
		if ( have_rows('global_scripts', 'option') ) :
			while( have_rows('global_scripts', 'option') ): the_row();
				$script = get_sub_field('script');
				$script_location = get_sub_field('script_location');
				if ( $script_location == 'header_end' && get_sub_field('enable_script') ) :
					echo $script . "\n";
				endif;
			endwhile;
		endif;

		// STRUCTURED DATA / SCHEMA
		if (get_field('output_structured_data', 'option')) :
		$social_media_accounts = get_field('social_media_account', 'option'); ?>
			
			<script type="application/ld+json">
				{
					"@context": "http://schema.org",
					"@type": "WebPage",
					"sourceOrganization": {
						"@type": "Hotel",
						"name": "<?php echo get_field('schema_name', 'option'); ?>",
						"url": "<?php echo get_home_url(); ?>",
						"email": "<?php echo get_field('schema_email_general', 'option'); ?>",
						<?php if ($social_media_accounts) : $last_social = end($social_media_accounts); 
							echo '"sameAs": ['; 
							foreach ( $social_media_accounts as $social_account ) :
								echo '"' . $social_account['link'] . '"' . ($social_account != $last_social?', ':'');
							endforeach;
							echo '],';
						endif; ?>

						"logo": "<?php echo get_field('schema_logo', 'option'); ?>",
						"areaServed": "https://en.wikipedia.org/wiki/<?php echo get_field('schema_area', 'option'); ?>",
						"@id": "<?php echo get_home_url() . '/'; ?>",
						"address": {
							"@type": "PostalAddress",
							"addressRegion": "<?php echo get_field('schema_state', 'option'); ?>",
							"addressLocality": "<?php echo get_field('schema_city', 'option'); ?>",
							"addressCountry": "<?php echo get_field('schema_country', 'option'); ?>",
							"postalCode": "<?php echo get_field('schema_zip', 'option'); ?>",
							"streetAddress": "<?php echo get_field('schema_street_address', 'option'); ?>"
						},
						"priceRange": "<?php echo get_field('schema_price_range', 'option'); ?>",
						"telephone": "+1-<?php echo get_field('schema_phone_local', 'option'); ?>",
						"image": "<?php echo get_field('schema_image', 'option'); ?>"
					},
					"author": {
						"@id": "<?php echo get_home_url() . '/'; ?>",
						"name": "<?php echo get_field('schema_name', 'option'); ?>",
						"image": "<?php echo get_field('schema_image', 'option'); ?>"
					},
					"keywords": "<?php echo get_field('schema_keywords', 'option'); ?>",
					"url": "<?php echo get_permalink(); ?>",
					"description": "<?php echo get_field('schema_description', 'option'); ?>",
					"publisher": {
						"@id": "<?php echo get_home_url() . '/'; ?>",
						"image": "<?php echo get_field('schema_image', 'option'); ?>"
					},
					"name": "<?php get_the_title(); ?>",
					"@id": "<?php echo get_permalink(); ?>",
					"image": "<?php echo get_field('schema_image', 'option'); ?>"
				}
			</script>

			<script type="application/ld+json">
			{
				"@context": "http://schema.org",
				"@graph": [
					{
					"@context": "http://schema.org",
					"@type": "Hotel",
					"petsAllowed": "<?php if ( get_field('schema_pets', 'option') ) {echo 'True';} else { echo 'False'; } ?>",
					"telephone": "+1-<?php echo get_field('schema_phone_local', 'option'); ?>",
					"logo": "<?php echo get_field('schema_logo', 'option'); ?>",
					"priceRange": "<?php echo get_field('schema_price_range', 'option'); ?>",
					"areaServed": "https://en.wikipedia.org/wiki/<?php echo get_field('schema_area', 'option'); ?>",
					<?php if ($social_media_accounts) : $last_social = end($social_media_accounts); 
						echo '"sameAs": ['; 
						foreach ( $social_media_accounts as $social_account ) :
							echo '"' . $social_account['link'] . '"' . ($social_account != $last_social?', ':'');
						endforeach;
						echo '],';
					endif; ?>

					"checkoutTime": "<?php echo get_field('schema_checkout', 'option'); ?>",
					"checkinTime": "<?php echo get_field('schema_checkin', 'option'); ?>",
					"openingHours": "<?php echo get_field('schema_operating_hours', 'option'); ?>",
					"geo": {
							"@type": "GeoCoordinates",
							"name": "<?php echo get_field('schema_name', 'option'); ?>",
							"latitude": <?php echo get_field('schema_latitude', 'option'); ?>,
							"longitude": <?php echo get_field('schema_longitude', 'option'); ?>,
							"@id": "<?php echo get_home_url(); ?>/#GeoShapeOrGeoCoordinates"
					},
					"additionalType": "https://en.wikipedia.org/wiki/Boutique_hotel",
					<?php 
					if ( get_field('schema_amenities', 'option') ) :
						$amenities = get_field('schema_amenities', 'option');
						$last_amenity = end($amenities); 
						echo '"amenityFeature": ['; 
						foreach ( $amenities as $amenity ) : ?>
							{
								"@type": "LocationFeatureSpecification",
								"value": "<?php if ($amenity['true_or_false']) { echo 'True'; } else { echo 'False'; } ?>",
								"name": "<?php echo $amenity['name']; ?>",
								"@id": "<?php echo get_home_url() . '/#' . str_replace(' ', '', $amenity['name']); ?>"
							}<?php if ($amenity != $last_amenity) echo ', '; ?>
						<?php endforeach;
						echo '],';
					endif; ?>

					"description": "<?php echo addslashes(get_field('schema_description', 'option')); ?>",
					"email": "<?php echo get_field('schema_email_general', 'option'); ?>",
					"url": "<?php echo get_home_url(); ?>",
					"address": {
							"@type": "PostalAddress",
							"addressRegion": "<?php echo get_field('schema_state', 'option'); ?>",
							"addressLocality": "<?php echo get_field('schema_city', 'option'); ?>",
							"addressCountry": "<?php echo get_field('schema_country', 'option'); ?>",
							"postalCode": "<?php echo get_field('schema_zip', 'option'); ?>",
							"streetAddress": "<?php echo get_field('schema_street_address', 'option'); ?>"
					},
					"aggregateRating": {
							"@type": "AggregateRating",
							"worstRating": <?php echo get_field('schema_review_low', 'option'); ?>,
							"url": "<?php echo get_field('schema_review_url', 'option'); ?>",
							"ratingValue": <?php echo get_field('schema_review_average', 'option'); ?>,
							"reviewCount": <?php echo get_field('schema_total_reviews', 'option'); ?>,
							"bestRating": <?php echo get_field('schema_review_high', 'option'); ?>

					},
					"name": "<?php echo get_field('schema_name', 'option'); ?>",
					"image": "<?php echo get_field('schema_image', 'option'); ?>",
					"@id": "<?php echo get_home_url() . '/#hotel'; ?>",
					"contactPoint": [
							{	
									"@type": "ContactPoint",
									"contactType": "customer support",
									"email": "<?php echo get_field('schema_email_general', 'option'); ?>",
									"telephone": "+1-<?php echo get_field('schema_phone_local', 'option'); ?>",
									"url": "<?php echo get_home_url() . '/'; ?>",
									"availableLanguage": "https://en.wikipedia.org/wiki/English_language",
									"areaServed": "https://en.wikipedia.org/wiki/<?php echo get_field('schema_area', 'option'); ?>",
									"name": "Customer Services",
									"@id": "<?php echo get_home_url() . '/#CustomerService'; ?>"
							},
							{	
									"@type": "ContactPoint",
									"contactType": "reservations",
									"email": "<?php echo get_field('schema_email_reservations', 'option'); ?>",
									"telephone": "+1-<?php echo get_field('schema_phone_local', 'option'); ?>",
									"url": "<?php echo get_home_url() . '/'; ?>",
									"availableLanguage": "https://en.wikipedia.org/wiki/English_language",
									"areaServed": "https://en.wikipedia.org/wiki/<?php echo get_field('schema_area', 'option'); ?>",
									"name": "Customer Services",
									"@id": "<?php echo get_home_url() . '/#CustomerService'; ?>"
							}
					]
			 	}
			 ]}
			</script>
		<?php endif;?>
	</head>

	<body <?php body_class( 'fg-body' ); ?> itemscope itemtype="http://schema.org/WebPage">
		<div id="skip"><a href="#site-content">Skip to Main Content</a></div>
		<?php
		echo "\n<!-- Theme Option Body Open Scripts -->\n";
		if ( have_rows('global_scripts', 'option') ) :
			while( have_rows('global_scripts', 'option') ): the_row();
				$script = get_sub_field('script');
				$script_location = get_sub_field('script_location');
				if ( $script_location == 'body_start' && get_sub_field('enable_script') ) :
					echo $script . "\n";
				endif;
			endwhile;
		endif;
		?>
		<header class="header" role="banner" itemscope itemtype="http://schema.org/WPHeader">
			<?php // ALERT BANNER
			if ( get_field( 'alert_message' ,'option' ) ) :
				$message = get_field( 'alert_message' ,'option' );
				$bg_color_theme = get_field( 'background_color' ,'option' );
				// $bg_color_custom = get_field( 'background_color_custom' ,'option' );
				$text_color = get_field( 'text_color' ,'option' );
				$close_icon = get_field( 'close_icon' ,'option' );
				echo '<section class="alert-banner-wrapper ' . $text_color . ' ' . $bg_color_theme  . '"' . ( get_field( 'background_color_custom' ,'option' )?' style="' . get_field( 'background_color_custom' ,'option' ) . '"':'' ) . '>';
					echo '<div class="alert-banner-wrapper-inner constrained-width">';
						echo '<div class="alert-banner-message">' . $message . '</div>';
						echo '<button class="alert-banner-close" aria-label="Close the Alert Banner" onclick="this.parentElement.style.display=\'none\';">' . $close_icon . '</button>';
					echo '</div>';
				echo '</section>';
			endif;
			?>
			
			<div class="header-wrapper<?php if ( get_field('header_bg_color', 'option') ) { echo ' ' . get_field('header_bg_color', 'option'); } ?>">
				<div class="constrained-width">
					<?php 
					// =========================================
					//   DESKTOP HEADER NAV BAR
					// ========================================= ?>
					<div class="desktop-header-wrapper hide-on-med-and-down">
						<?php 
						if ( get_field('header_logo', 'option') ) : 
							$logo = get_field('header_logo', 'option'); 
							echo '<div class="header-logo-wrapper">';
								echo '<a href="' . get_home_url() . '"><img src="' . $logo['url'] . '" alt="' . $logo['alt'] . '"></a>';
							echo '</div>';
						endif;
						if ( get_field('header_logo_snapped', 'option') ) : 
							$logo_snapped = get_field('header_logo_snapped', 'option'); 
							echo '<div class="header-logo-wrapper-snapped">';
								echo '<a href="' . get_home_url() . '"><img src="' . $logo_snapped['url'] . '" alt="' . $logo_snapped['alt'] . '"></a>';
							echo '</div>';
						else:
							$logo = get_field('header_logo', 'option'); 
							echo '<div class="header-logo-wrapper-snapped">';
								echo '<a href="' . get_home_url() . '"><img src="' . $logo['url'] . '" alt="' . $logo['alt'] . '"></a>';
							echo '</div>';
						endif;
						?>
						<nav class="<?php echo get_field('header_text_color', 'option'); ?>">
							<div class="header-menu-wrapper">
								<div class="menu-primary-header-nav-container">
								<?php
									if ( has_nav_menu( 'primary-header-menu' ) ) {
								    	wp_nav_menu( array(
								    	'theme_location' => 'primary-header-menu',
								    	'container'      => true,
								    	// 'menu_class'     => 'main-navigation',
								    	'walker'         => new Aria_Walker_Nav_Menu(),
								    	'items_wrap'     => '<ul id="%1$s" class="%2$s" role="menubar">%3$s</ul>',
								    	));
									}
									?>
								</div>
								<?php 
								// BOOKING WIDGET CHECK
								$widget_type = get_field('booking_widget_type', 'option');
								if ( $widget_type != 'booking-bar' && $widget_type != 'none' && get_field( 'booking_engine_url', 'option' ) && !in_array($post->ID, get_field('widget_hide_on', 'option')) ) :
									// In all cases that match, we need a button. So we'll add it and put in a data attribute for what action to take. Those actions will be caught in booking_widget.js.
									$booking_cta = get_field('booking_engine_url', 'option');
									$booking_target = $booking_cta['target'] ? $booking_cta['target'] : '_self';
									echo '<a href="' . $booking_cta['url'] . '" class="booking-btn btn ' . get_field('cta_type', 'option') . ' booking-widget-type-' . $widget_type . '" target="' . $booking_target . '">' . $booking_cta['title'] . '</a>';
								endif;
								?>
							</div>
						</nav>
					</div><!-- /desktop-header-wrapper -->
					<?php 
					// =========================================
					//   MOBILE HEADER NAV BAR
					// ========================================= ?>
					<div class="mobile-header-wrapper hide-on-large-only">
						<?php 
						// Check to see if a menu has been assigned as the mobile menu. If not, do not output the container for it, as otherwise it fills the menu with every page.
						if ( has_nav_menu( 'mobile-menu' ) ) : 
							// Let's get all the variables for mobile.
							// Typography is set earlier in this file to group it with the rest.
							$nav_bg_color_mobile = get_field('nav_bg_color_mobile','option');
							$mobile_logo = get_field('mobile_logo', 'option');
							$mobile_logo_bg_color = get_field('mobile_logo_bg_color', 'option');
							$mobile_background_image = get_field('mobile_background_image', 'option');
							// Top row stuff
							$mobile_hamburger_icon = get_field('mobile_hamburger_icon', 'option');
							$mobile_top_right_icon = get_field('mobile_top_right_icon', 'option');
							$mobile_top_right_link = get_field('mobile_top_right_link', 'option');
							$mobile_close_icon = get_field('mobile_close_icon', 'option');
							$mobile_close_text = get_field('mobile_close_text', 'option');
							// Bottom button(s) and icon(s)
							$mobile_left_icon = get_field('mobile_left_icon', 'option');
							$mobile_left_button = get_field('mobile_left_button', 'option');
							$mobile_right_icon = get_field('mobile_right_icon', 'option');
							$mobile_right_button = get_field('mobile_right_button', 'option');
							?>
							<div class="mobile-header-top-row">
								<?php // OPEN AND CLOSE MOBILE MENU BUTTONS ?>
								<button type="button" class="js-menu-trigger sliding-menu-button sliding-menu-button-open font-nav" role="button" aria-label="Open Menu">
									<?php echo $mobile_hamburger_icon; ?>
								</button>
								<button type="button" class="js-menu-trigger sliding-menu-button sliding-menu-button-close font-nav" role="button" aria-label="Close Menu">
									<?php echo $mobile_close_icon; ?>
								</button>
								<?php // MOBILE LOGO ?>
								<?php 
								if ( $mobile_logo ) : 
									echo '<div class="mobile-header-logo-wrapper' . ($mobile_logo_bg_color?' ' . $mobile_logo_bg_color:'') . '">';
										echo '<a href="' . get_home_url() . '"><img src="' . $mobile_logo['url'] . '" alt="' . $mobile_logo['alt'] . '"></a>';
									echo '</div>';
								endif;
								// Optional mobile top right button (like for click to call)
								if ( $mobile_top_right_icon && $mobile_top_right_link ) : ?>
									<div class="mobile-top-right">
										<a href="<?php echo $mobile_top_right_link; ?>" aria-role="Click to Call"><?php echo $mobile_top_right_icon; ?></a>
									</div>
								<?php endif; ?>
							</div><!-- /mobile-menu-top-row -->
							<div class="mobile-menu-wrapper">
								<nav class="js-menu sliding-menu-content" style="background-image: url(<?php echo $mobile_background_image; ?>);<?php if ( $nav_bg_color_mobile ) { echo ' background-color:' . $nav_bg_color_mobile . ';'; } ?>">
									<?php // The social media accounts are kept in the Social Theme Option. Go get 'em'/.
									if ( get_field('social_media_account', 'option') ) :
										$social_media_accounts = get_field('social_media_account', 'option'); ?>
										<div class="mobile-menu-content-social-media-wrapper">
											<?php foreach ( $social_media_accounts as $social_account ) : ?>
												<a class="header-social-icon social-icon" style="color: inherit;" href="<?php echo $social_account['link']; ?>" target="_blank" aria-label="<?php echo $social_account['link'] ?>"><?php if ( $social_account['icon_custom'] ) { echo '<img src="' . $social_account['icon_custom']['url'] . '" alt="' . $social_account['icon_custom']['alt'] . '">'; } else { echo $social_account['icon']; } ?></a>
											<?php endforeach; ?>
										</div>
									<?php endif; ?>
									<div class="menu">
										<?php wp_nav_menu(array(
											'container' => false,
											'container_class' => 'menu cf',
											'menu' => __( 'The Main Menu', THEME_TD ),
											'menu_class' => 'nav top-nav cf',
											'theme_location' => 'mobile-menu',
											'before' => '',
											'after' => '',
											'link_before' => '',
											'link_after' => '',
											'depth' => 0,
											'fallback_cb' => '' 
										)); ?>
									</div>
									<?php if ( $mobile_right_button || $mobile_left_button ) : ?>
									<div class="mobile-menu-bottom-row">
										<?php if ( $mobile_left_button ) : 
											echo '<a class="btn btn-primary" href="' . $mobile_left_button['url'] . '" >' . ($mobile_left_icon?$mobile_left_icon:'') . ' ' . $mobile_left_button['title'] . '</a>'; 
										endif; 
										if ( $mobile_right_button ) : ?>
											<?php echo '<a class="btn btn-primary" href="' . $mobile_right_button['url'] . '" >' . ($mobile_right_icon?$mobile_right_icon:'') . ' ' . $mobile_right_button['title'] . '</a>'; ?>
										<?php endif; ?>
									</div>
									<?php endif; ?>
								</nav>
								<div class="js-menu-screen sliding-menu-fade-screen"></div>
							</div>
						<?php endif; // Mobile menu check ?>
					</div><!-- /mobile-header-wrapper -->
				</div><!-- /constrained-width -->
			</div><!-- /header-wrapper -->
			<?php echo booking_widget_layout(); ?>
		</header>