<?php 
// The social media accounts are kept in the Social Theme Option. Go get 'em'/.
$social_media_accounts = get_field('social_media_account', 'option');
?>
		<footer class="font-heading footer<?php if ( get_field('footer_bg_color', 'option') ) { echo ' ' . get_field('footer_bg_color', 'option'); } ?><?php if ( get_field('footer_icon_colors', 'option') ) { echo ' ' . get_field('footer_icon_colors', 'option'); } ?>">
			<?php 
			// Footer Rows
			if ( have_rows('footer_rows', 'option') ) :
				$footer_rows = get_field('footer_rows', 'option');
				foreach ( $footer_rows as $row ):
					echo '<section class="footer-row-wrapper">';
						// Each row can either be constrained width or full width.
						echo '<div class="footer-row ' . $row['width'] . '">';
							// Each row has a variable number of columns, and each column can have a number of different options.
							foreach ( $row['columns'] as $column ) :
								echo '<div class="footer-row-column ' . $column['alignment'] . ($column['text_color']?' ' . $column['text_color']:'') . '"' . ( $column['bg_image']?' style="background-image:url('.$column['bg_image'].');"':'' ) . '>';
									// Basic wysiwyg content
									echo '<div class="footer-row-column-content">' . do_shortcode($column['content']) . '</div>';
									// Social Media Icons. Must have the toggle set to "show" and there have to be social media accounts set up in Theme Options
									if( $column['show_social'] && $social_media_accounts ) : ?>
										<div class="footer-row-column-social-media">
											<?php foreach ( $social_media_accounts as $social_account ) : ?>
												<a class="footer-social-icon social-icon" style="color: inherit;" href="<?php echo $social_account['link']; ?>" target="_blank" aria-label="<?php echo $social_account['link'] ?>"><?php if ( $social_account['icon_custom'] ) { echo '<img src="' . $social_account['icon_custom']['url'] . '" alt="' . $social_account['icon_custom']['alt'] . '">'; } else { echo $social_account['icon']; } ?></a>
											<?php endforeach; ?>
										</div>
									<?php endif;
									// Gravity Form
									if ( $column['gravity_form_to_show'] ) :
										echo '<div class="footer-row-column-form">';
											$form_object = $column['gravity_form_to_show'];
											gravity_form_enqueue_scripts($form_object['id'], true);
											gravity_form($form_object['id'], false, false, false, '', true, 1); 
										echo '</div>';
									endif;
									// Footer Menu
									if ( $column['show_footer_menu'] ) :
										echo '<nav aria-label="Footer Navigation" class="' . $column['footer_menu_alignment'] . '">';
											wp_nav_menu(
												array(
													'theme_location' => 'footer-menu',
													'container' => false,
													'menu_class' => 'fg-c2 menu',
													'items_wrap' => '<ul class="%2$s ' . get_field('footer_icon_colors', 'option') . '" id="menu-footer">%3$s</ul>'
												)
											);
										echo '</nav>';
									endif;
								echo '</div><!-- /footer-row-column -->';
							endforeach;
						echo '</div>';
						// Whether the row is full width or constrained, any chosen overlay needs to go across the full width, so we put it outside the container for the row's contents.
						if ( $row['bg_color'] && $row['bg_color'] != 'none' ) :
							if ( !$row['bg_transparency'] ) { $row['bg_transparency'] = '1'; }
							switch ($row['bg_color']) {
								case 'bg-c1':
									$bg_color = hex2Rgb( get_field('color_primary', 'option'), $row['bg_transparency'] );
									break;
								case 'bg-c2':
									$bg_color = hex2Rgb( get_field('color_secondary', 'option'), $row['bg_transparency'] );
									break;
								case 'bg-white':
									$bg_color = hex2Rgb( get_field('color_white', 'option'), $row['bg_transparency'] );
									break;
								case 'bg-black':
									$bg_color = hex2Rgb( get_field('color_black', 'option'), $row['bg_transparency'] );
									break;
							}
							echo '<div class="footer-row-overlay" style="background-color: rgba(' . $bg_color['r'] . ", " . $bg_color['g'] . ", " . $bg_color['b'] . ", " . $bg_color['a'] .  ');"></div>';
						endif;
					echo '</section>';
				endforeach;
			endif;
			// Footer background image.
			$footer_bg_image = get_field('footer_bg_image', 'option');
			if ( $footer_bg_image ) :
				$size = THEME_NAME . '-footer-bg';
				echo '<div class="footer-bg-wrapper'. (get_field('blur_footer_image', 'option')?' blur-image':'') .'">';
					echo '<img src="' . $footer_bg_image['sizes'][$size] . '" alt="' . $footer_bg_image['url'] . '">';
				echo '</div>';			
			endif;
			?>
		</footer>

		<?php wp_footer(); ?>
	<?php
		echo "\n<!-- Theme Option Closing Body Scripts -->\n";
		if ( have_rows('global_scripts', 'option') ) :
			while( have_rows('global_scripts', 'option') ): the_row();
				$script = get_sub_field('script');
				$script_location = get_sub_field('script_location');
				if ( $script_location == 'body_end' && get_sub_field('enable_script') ) :
					echo $script . "\n";
				endif;
			endwhile;
		endif;
		?>
	</body>
<?php
echo "\n<!-- Theme Option Footer Scripts -->\n";
if ( have_rows('global_scripts', 'option') ) :
	while( have_rows('global_scripts', 'option') ): the_row();
		$script = get_sub_field('script');
		$script_location = get_sub_field('script_location');
		if ( $script_location == 'footer' && get_sub_field('enable_script') ) :
			echo $script . "\n";
		endif;
	endwhile;
endif;
?>
</html>
