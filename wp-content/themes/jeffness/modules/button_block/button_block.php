<?php
// =========================================
//   REGISTER THE GUTENBERG BLOCKS
// =========================================
function register_acf_block_button_block() 
	{

		acf_register_block_type(array(
	    	'mode'				=> 'edit',
			'supports' => array( 'anchor' => true ),
			'name'			  => 'gcom_button',
			'title'			 => __('GCommerce CTA Button'),
			'description'	   => __('The standard GCom button'),
			'render_template'   => 'modules/button_block/gcom_button_render.php',
			'category'		  => 'formatting',
			'keywords'			=> array('gcommerce', 'stile', 'layout', 'button'),
			'icon' 				=> 'share-alt2',

		));
	}

function my_button_styes_head(){ 
	// Primary CTA color options
		$btn_primary = get_field('btn_primary_colors', 'option');

		if ( !empty( $btn_primary['background_color'] ) ) :
			$btn_primary_bg = $btn_primary['background_color'];
		else:
			$btn_primary_bg = get_field('color_primary', 'option');
		endif;

		if ( !empty( $btn_primary['background_color_hover'] ) ) :
			$btn_primary_bg_hover = $btn_primary['background_color_hover'];
		else:
			$btn_primary_bg_hover = get_field('color_secondary', 'option');
		endif;

		if ( !empty( $btn_primary['text_color'] ) ) :
			$btn_primary_text = $btn_primary['text_color'];
		else:
			$btn_primary_text = get_field('color_white', 'option');
		endif;

		if ( !empty( $btn_primary['text_color_hover'] ) ) :
			$btn_primary_text_hover = $btn_primary['text_color_hover'];
		else:
			$btn_primary_text_hover = get_field('color_white', 'option');
		endif;

		// Secondary CTA color options
		$btn_secondary = get_field('btn_secondary_colors', 'option');
		if ( !empty( $btn_secondary['background_color'] ) ) :
			$btn_secondary_bg = $btn_secondary['background_color'];
		else:
			$btn_secondary_bg = get_field('color_secondary', 'option');
		endif;

		if ( !empty( $btn_secondary['background_color_hover'] ) ) :
			$btn_secondary_bg_hover = $btn_secondary['background_color_hover'];
		else:
			$btn_secondary_bg_hover = get_field('color_primary', 'option');
		endif;

		if ( !empty( $btn_secondary['text_color'] ) ) :
			$btn_secondary_text = $btn_secondary['text_color'];
		else:
			$btn_secondary_text = get_field('color_white', 'option');
		endif;

		if ( !empty( $btn_secondary['text_color_hover'] ) ) :
			$btn_secondary_text_hover = $btn_secondary['text_color_hover'];
		else:
			$btn_secondary_text_hover = get_field('color_white', 'option');
		endif; 

		// White CTA color options
		$btn_white = get_field('btn_white_colors', 'option');
		if ( !empty( $btn_white['background_color'] ) ) :
			$btn_white_bg = $btn_white['background_color'];
		else:
			$btn_white_bg = get_field('color_white', 'option');
		endif;

		if ( !empty( $btn_white['background_color_hover'] ) ) :
			$btn_white_bg_hover = $btn_white['background_color_hover'];
		else:
			$btn_white_bg_hover = get_field('color_primary', 'option');
		endif;

		if ( !empty( $btn_white['text_color'] ) ) :
			$btn_white_text = $btn_white['text_color'];
		else:
			$btn_white_text = get_field('color_white', 'option');
		endif;

		if ( !empty( $btn_white['text_color_hover'] ) ) :
			$btn_white_text_hover = $btn_white['text_color_hover'];
		else:
			$btn_white_text_hover = get_field('color_white', 'option');
		endif;

		// Black CTA color options
		$btn_black = get_field('btn_black_colors', 'option');
		if ( !empty( $btn_black['background_color'] ) ) :
			$btn_black_bg = $btn_black['background_color'];
		else:
			$btn_black_bg = get_field('color_white', 'option');
		endif;

		if ( !empty( $btn_black['background_color_hover'] ) ) :
			$btn_black_bg_hover = $btn_black['background_color_hover'];
		else:
			$btn_black_bg_hover = get_field('color_primary', 'option');
		endif;

		if ( !empty( $btn_black['text_color'] ) ) :
			$btn_black_text = $btn_black['text_color'];
		else:
			$btn_black_text = get_field('color_white', 'option');
		endif;

		if ( !empty( $btn_black['text_color_hover'] ) ) :
			$btn_black_text_hover = $btn_black['text_color_hover'];
		else:
			$btn_black_text_hover = get_field('color_white', 'option');
		endif; ?>



		<style type="text/css">
			/* Solid CTA Button Colors */
			.btn,
			.btn-primary,
			.btn span,
			.footer .footer-top-row-wrapper .footer-column .footer-signup .gform_wrapper form .gform_footer input[type="submit"] { color: <?php echo $btn_primary_text; ?>; background-color: <?php echo $btn_primary_bg; ?>; }

			.btn:hover span,
			.btn:hover,
			.btn-primary:hover,
			.footer .footer-top-row-wrapper .footer-column .footer-signup .gform_wrapper form .gform_footer input[type="submit"]:hover { color: <?php echo $btn_primary_text_hover; ?>; background-color: <?php echo $btn_primary_bg_hover; ?>; }

			.btn-secondary,
			.btn-secondary span { color: <?php echo $btn_secondary_text; ?>; background-color: <?php echo $btn_secondary_bg; ?>;  }

			.btn-secondary:hover,
			.btn-secondary:hover span { color: <?php echo $btn_secondary_text_hover; ?>; background-color: <?php echo $btn_secondary_bg_hover; ?>;  }

			/* Transparent CTA Button Colors */
			.btn.btn-transparent,
			.btn-primary.btn-transparent,
			.btn.btn-transparent span { color: <?php echo $btn_primary_bg; ?>; background-color: transparent; border-color: <?php echo $btn_primary_bg; ?>;border-style: solid; border-width: 2px; }

			.btn.btn-transparent:hover span,
			.btn.btn-transparent:hover,
			.btn-primary.btn-transparent:hover { color: <?php echo $btn_primary_text_hover; ?>; background-color: <?php echo $btn_primary_bg; ?>; }

			.btn-secondary.btn-transparent,
			.btn-secondary.btn-transparent span { color: <?php echo $btn_secondary_bg; ?>; background-color: transparent; border-color: <?php echo $btn_secondary_bg; ?>;border-style: solid; border-width: 2px; }

			.btn-secondary.btn-transparent:hover,
			.btn-secondary.btn-transparent:hover span { background-color: <?php echo $btn_secondary_bg; ?>;  }
			

			/* White CTA Button Colors */

			.btn-white,
			.btn-white span { color: <?php echo $btn_white_text; ?>; background-color: <?php echo $btn_white_bg; ?>; }

			.btn-white:hover,
			.btn-white:hover span { color: <?php echo $btn_white_text_hover; ?>; background-color: <?php echo $btn_white_bg_hover; ?>; }

			.btn-white.btn-transparent,
			.btn-white.btn-transparent span { color: <?php echo $btn_white_bg; ?>; background-color: transparent; border-color: <?php echo $btn_white_bg; ?>;border-style: solid; border-width: 2px; }

			.btn-white.btn-transparent:hover,
			.btn-white.btn-transparent:hover span { color: <?php echo $btn_white_text; ?>; background-color: <?php echo $btn_white_bg; ?>; }

			/* Black CTA Button Colors */

			.btn-black,
			.btn-black span { color: <?php echo $btn_black_text; ?>; background-color: <?php echo $btn_black_bg; ?>; }

			.btn-black:hover,
			.btn-black:hover span { color: <?php echo $btn_black_text_hover; ?>; background-color: <?php echo $btn_black_bg_hover; ?>; }

			 .btn-black.btn-transparent,
			.btn-black.btn-transparent span { color: <?php echo $btn_black_bg; ?>; background-color: transparent; border-color: <?php echo $btn_black_bg; ?>; border-style: solid; border-width: 2px; }

			.btn-black.btn-transparent:hover,
			.btn-black.btn-transparent:hover span { color: <?php echo $btn_black_text; ?>; background-color: <?php echo $btn_black_bg; ?>; }

			/* Taylor's special underline buttons */
			.btn-underline { border: none; border-bottom: 1px solid; background: transparent; padding-right: 0; padding-left: 0; color: inherit; 
			}
			.btn-underline:hover {
				opacity: 0.5;
				background-color: transparent;
				color: initial;
			}

			/*Button typography*/

			<?php $cta_primary = get_field('btn_primary_typography', 'option');
			if ( $cta_primary['font'] || $cta_primary['size'] || $cta_primary['font_weight'] || $cta_primary['line_height'] || $cta_primary['letter_spacing'] || $cta_primary['text_transform'] ) :
				echo '.btn-primary, .btn-primary span {
					'; 
				if ( $cta_primary['font'] ) { echo 'font-family: ' . $cta_primary['font'] . ';
					'; }
				if ( $cta_primary['size'] ) { echo 'font-size: ' . $cta_primary['size'] . ';
				'; }
				if ( $cta_primary['font_weight'] ) { echo 'font-weight: ' . $cta_primary['font_weight'] . ';
				'; }
				if ( $cta_primary['line_height'] ) { echo 'line-height: ' . $cta_primary['line_height'] . ';
				'; }
				if ( $cta_primary['letter_spacing'] ) { echo 'letter-spacing: ' . $cta_primary['letter_spacing'] . ';
				'; }
				if ( $cta_primary['text_transform'] ) { echo 'text-transform: ' . $cta_primary['text_transform'] . ';
				'; }
			echo '}
			';
			endif;

			$cta_secondary = get_field('btn_secondary_typography', 'option');
			if ( $cta_secondary['font'] || $cta_secondary['size'] || $cta_secondary['font_weight'] || $cta_secondary['line_height'] || $cta_secondary['letter_spacing'] || $cta_secondary['text_transform'] ) :
				echo '.btn-secondary, .btn-secondary span {
					'; 
				if ( $cta_secondary['font'] ) { echo 'font-family: ' . $cta_secondary['font'] . ';
					'; }
				if ( $cta_secondary['size'] ) { echo 'font-size: ' . $cta_secondary['size'] . ';
				'; }
				if ( $cta_secondary['font_weight'] ) { echo 'font-weight: ' . $cta_secondary['font_weight'] . ';
				'; }
				if ( $cta_secondary['line_height'] ) { echo 'line-height: ' . $cta_secondary['line_height'] . ';
				'; }
				if ( $cta_secondary['letter_spacing'] ) { echo 'letter-spacing: ' . $cta_secondary['letter_spacing'] . ';
				'; }
				if ( $cta_secondary['text_transform'] ) { echo 'text-transform: ' . $cta_secondary['text_transform'] . ';
				'; }
			echo '}
			';
			endif; 
			$cta_white = get_field('btn_white_typography', 'option');
			if ( $cta_white['font'] || $cta_white['size'] || $cta_white['font_weight'] || $cta_white['line_height'] || $cta_white['letter_spacing'] || $cta_white['text_transform'] ) :
				echo '.btn-white, .btn-white span {
					'; 
				if ( $cta_white['font'] ) { echo 'font-family: ' . $cta_white['font'] . ';
					'; }
				if ( $cta_white['size'] ) { echo 'font-size: ' . $cta_white['size'] . ';
				'; }
				if ( $cta_white['font_weight'] ) { echo 'font-weight: ' . $cta_white['font_weight'] . ';
				'; }
				if ( $cta_white['line_height'] ) { echo 'line-height: ' . $cta_white['line_height'] . ';
				'; }
				if ( $cta_white['letter_spacing'] ) { echo 'letter-spacing: ' . $cta_white['letter_spacing'] . ';
				'; }
				if ( $cta_white['text_transform'] ) { echo 'text-transform: ' . $cta_white['text_transform'] . ';
				'; }
			echo '}
			';
			endif;

			$cta_black = get_field('btn_black_typography', 'option');
			if ( $cta_black['font'] || $cta_black['size'] || $cta_black['font_weight'] || $cta_black['line_height'] || $cta_black['letter_spacing'] || $cta_black['text_transform'] ) :
				echo '.btn-black, .btn-black span {
					'; 
				if ( $cta_black['font'] ) { echo 'font-family: ' . $cta_black['font'] . ';
					'; }
				if ( $cta_black['size'] ) { echo 'font-size: ' . $cta_black['size'] . ';
				'; }
				if ( $cta_black['font_weight'] ) { echo 'font-weight: ' . $cta_black['font_weight'] . ';
				'; }
				if ( $cta_black['line_height'] ) { echo 'line-height: ' . $cta_black['line_height'] . ';
				'; }
				if ( $cta_black['letter_spacing'] ) { echo 'letter-spacing: ' . $cta_black['letter_spacing'] . ';
				'; }
				if ( $cta_black['text_transform'] ) { echo 'text-transform: ' . $cta_black['text_transform'] . ';
				'; }
			echo '}
			';
			endif; ?>

		</style>
<?php }	

add_action('wp_head', 'my_button_styes_head');

function load_gcom_button_styles() {
	wp_register_style( 'gcom-button-style', get_template_directory_uri() . '/modules/button_block/gcom_button.css', array(), '', 'all' );
	wp_enqueue_style('gcom-button-style');
}

add_action( 'wp_enqueue_scripts', 'load_gcom_button_styles' );

// Check if function exists and hook into setup.
if( function_exists('acf_register_block_type') ) 
	{
		add_action('acf/init', 'register_acf_block_button_block');
	}

// =========================================
//   ADD THE FIELD GROUP
// =========================================

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_5e34a8c0b477e',
	'title' => 'Theme Options: CTAs',
	'fields' => array(
		array(
			'key' => 'field_5e38460eb6a90',
			'label' => 'Primary CTAs',
			'name' => '',
			'type' => 'tab',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'placement' => 'top',
			'endpoint' => 0,
		),
		array(
			'key' => 'field_5e26030f0f148',
			'label' => 'Primary CTA Typography',
			'name' => 'btn_primary_typography',
			'type' => 'group',
			'instructions' => 'Set the typography for default Call To Action buttons.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'layout' => 'block',
			'sub_fields' => array(
				array(
					'key' => 'field_5e2617d9e9a59',
					'label' => 'Font Identifier',
					'name' => 'font',
					'type' => 'text',
					'instructions' => 'Enter the font stack here (like "Oswald", sans-serif).',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '33',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array(
					'key' => 'field_5e261839e9a5a',
					'label' => 'Font Size',
					'name' => 'size',
					'type' => 'text',
					'instructions' => 'Enter the size and measurement for the font here (i.e. 18px, 1.5em, etc.)',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '33',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array(
					'key' => 'field_5e261857e9a5b',
					'label' => 'Font Weight',
					'name' => 'font_weight',
					'type' => 'text',
					'instructions' => 'Enter the font weight here (i.e. bold, 100, etc.)',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '33',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array(
					'key' => 'field_5e26186ae9a5c',
					'label' => 'Line Height',
					'name' => 'line_height',
					'type' => 'text',
					'instructions' => 'Enter the letter spacing for the font here (i.e. 1px, 1rem, initial, etc.)',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '33',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array(
					'key' => 'field_5e26189ae9a5d',
					'label' => 'Letter Spacing',
					'name' => 'letter_spacing',
					'type' => 'text',
					'instructions' => 'Enter the letter spacing for the font here (i.e. 1px, 1rem, initial, etc.)',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '33',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array(
					'key' => 'field_5e2618b0e9a5e',
					'label' => 'Text Transform',
					'name' => 'text_transform',
					'type' => 'select',
					'instructions' => 'Select the type of text transformation this font style should have (uppercase, lowercase, etc.)',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '33',
						'class' => '',
						'id' => '',
					),
					'choices' => array(
						'none' => 'none (text remains exactly as typed',
						'lowercase' => 'Lowercase (makes all of the letters in the selected text lowercase',
						'uppercase' => 'Uppercase (makes all of the letters in the selected text uppercase',
						'capitalize' => 'Capitalize (capitalizes the first letter of each word in the selected text',
						'inherit' => 'Inherit (gives the text the case and capitalization of its parent',
					),
					'default_value' => array(
					),
					'allow_null' => 1,
					'multiple' => 0,
					'ui' => 0,
					'return_format' => 'value',
					'ajax' => 0,
					'placeholder' => '',
				),
			),
		),
		array(
			'key' => 'field_5e3844f861af5',
			'label' => 'Primary CTA Colors',
			'name' => 'btn_primary_colors',
			'type' => 'group',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'layout' => 'table',
			'sub_fields' => array(
				array(
					'key' => 'field_5e38451c61af6',
					'label' => 'Background Color',
					'name' => 'background_color',
					'type' => 'color_picker',
					'instructions' => 'By default, primary CTAs will inherit the primary theme color. That can be overridden here.',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
				),
				array(
					'key' => 'field_5e38454661af7',
					'label' => 'Background Hover Color',
					'name' => 'background_color_hover',
					'type' => 'color_picker',
					'instructions' => 'If unset, primary CTAs will use the theme secondary color as the hover color. That can be overridden here.',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
				),
				array(
					'key' => 'field_5e38458961af8',
					'label' => 'Text Color',
					'name' => 'text_color',
					'type' => 'color_picker',
					'instructions' => 'By default, the text color for CTAs will be theme white. That can be overridden here.',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
				),
				array(
					'key' => 'field_5e3845b361af9',
					'label' => 'Text Hover Color',
					'name' => 'text_color_hover',
					'type' => 'color_picker',
					'instructions' => 'By default, the CTA text color remains theme white on hover. That can be overridden here.',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
				),
			),
		),
		array(
			'key' => 'field_5e384635b6a92',
			'label' => 'Secondary CTAs',
			'name' => '',
			'type' => 'tab',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'placement' => 'top',
			'endpoint' => 0,
		),
		array(
			'key' => 'field_5e38464fb6a94',
			'label' => 'Secondary CTA Typography',
			'name' => 'btn_secondary_typography',
			'type' => 'group',
			'instructions' => 'Set the typography for default Call To Action buttons.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'layout' => 'block',
			'sub_fields' => array(
				array(
					'key' => 'field_5e38464fb6a95',
					'label' => 'Font Identifier',
					'name' => 'font',
					'type' => 'text',
					'instructions' => 'Enter the font stack here (like "Oswald", sans-serif).',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '33',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array(
					'key' => 'field_5e38464fb6a96',
					'label' => 'Font Size',
					'name' => 'size',
					'type' => 'text',
					'instructions' => 'Enter the size and measurement for the font here (i.e. 18px, 1.5em, etc.)',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '33',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array(
					'key' => 'field_5e38464fb6a97',
					'label' => 'Font Weight',
					'name' => 'font_weight',
					'type' => 'text',
					'instructions' => 'Enter the font weight here (i.e. bold, 100, etc.)',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '33',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array(
					'key' => 'field_5e38464fb6a98',
					'label' => 'Line Height',
					'name' => 'line_height',
					'type' => 'text',
					'instructions' => 'Enter the letter spacing for the font here (i.e. 1px, 1rem, initial, etc.)',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '33',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array(
					'key' => 'field_5e38464fb6a99',
					'label' => 'Letter Spacing',
					'name' => 'letter_spacing',
					'type' => 'text',
					'instructions' => 'Enter the letter spacing for the font here (i.e. 1px, 1rem, initial, etc.)',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '33',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array(
					'key' => 'field_5e38464fb6a9a',
					'label' => 'Text Transform',
					'name' => 'text_transform',
					'type' => 'select',
					'instructions' => 'Select the type of text transformation this font style should have (uppercase, lowercase, etc.)',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '33',
						'class' => '',
						'id' => '',
					),
					'choices' => array(
						'none' => 'none (text remains exactly as typed',
						'lowercase' => 'Lowercase (makes all of the letters in the selected text lowercase',
						'uppercase' => 'Uppercase (makes all of the letters in the selected text uppercase',
						'capitalize' => 'Capitalize (capitalizes the first letter of each word in the selected text',
						'inherit' => 'Inherit (gives the text the case and capitalization of its parent',
					),
					'default_value' => array(
					),
					'allow_null' => 1,
					'multiple' => 0,
					'ui' => 0,
					'ajax' => 0,
					'return_format' => 'value',
					'placeholder' => '',
				),
			),
		),
		array(
			'key' => 'field_5e384660b6a9b',
			'label' => 'Secondary CTA Colors',
			'name' => 'btn_secondary_colors',
			'type' => 'group',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'layout' => 'table',
			'sub_fields' => array(
				array(
					'key' => 'field_5e384660b6a9c',
					'label' => 'Background Color',
					'name' => 'background_color',
					'type' => 'color_picker',
					'instructions' => 'By default, primary CTAs will inherit the primary theme color. That can be overridden here.',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
				),
				array(
					'key' => 'field_5e384660b6a9d',
					'label' => 'Background Hover Color',
					'name' => 'background_color_hover',
					'type' => 'color_picker',
					'instructions' => 'If unset, primary CTAs will use the theme secondary color as the hover color. That can be overridden here.',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
				),
				array(
					'key' => 'field_5e384660b6a9e',
					'label' => 'Text Color',
					'name' => 'text_color',
					'type' => 'color_picker',
					'instructions' => 'By default, the text color for CTAs will be theme white. That can be overridden here.',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
				),
				array(
					'key' => 'field_5e384660b6a9f',
					'label' => 'Text Hover Color',
					'name' => 'text_color_hover',
					'type' => 'color_picker',
					'instructions' => 'By default, the CTA text color remains theme white on hover. That can be overridden here.',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
				),
			),
		),
		array(
			'key' => 'field_5e73fd4df18cb',
			'label' => 'White CTA',
			'name' => '',
			'type' => 'tab',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'placement' => 'top',
			'endpoint' => 0,
		),
		array(
			'key' => 'field_5e73fd99f18cc',
			'label' => 'White CTA Typography',
			'name' => 'btn_white_typography',
			'type' => 'group',
			'instructions' => 'Set the typography for default Call To Action buttons.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'layout' => 'block',
			'sub_fields' => array(
				array(
					'key' => 'field_5e73fd99f18cd',
					'label' => 'Font Identifier',
					'name' => 'font',
					'type' => 'text',
					'instructions' => 'Enter the font stack here (like "Oswald", sans-serif).',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '33',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array(
					'key' => 'field_5e73fd99f18ce',
					'label' => 'Font Size',
					'name' => 'size',
					'type' => 'text',
					'instructions' => 'Enter the size and measurement for the font here (i.e. 18px, 1.5em, etc.)',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '33',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array(
					'key' => 'field_5e73fd99f18cf',
					'label' => 'Font Weight',
					'name' => 'font_weight',
					'type' => 'text',
					'instructions' => 'Enter the font weight here (i.e. bold, 100, etc.)',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '33',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array(
					'key' => 'field_5e73fd99f18d0',
					'label' => 'Line Height',
					'name' => 'line_height',
					'type' => 'text',
					'instructions' => 'Enter the letter spacing for the font here (i.e. 1px, 1rem, initial, etc.)',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '33',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array(
					'key' => 'field_5e73fd99f18d1',
					'label' => 'Letter Spacing',
					'name' => 'letter_spacing',
					'type' => 'text',
					'instructions' => 'Enter the letter spacing for the font here (i.e. 1px, 1rem, initial, etc.)',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '33',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array(
					'key' => 'field_5e73fd99f18d2',
					'label' => 'Text Transform',
					'name' => 'text_transform',
					'type' => 'select',
					'instructions' => 'Select the type of text transformation this font style should have (uppercase, lowercase, etc.)',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '33',
						'class' => '',
						'id' => '',
					),
					'choices' => array(
						'none' => 'none (text remains exactly as typed',
						'lowercase' => 'Lowercase (makes all of the letters in the selected text lowercase',
						'uppercase' => 'Uppercase (makes all of the letters in the selected text uppercase',
						'capitalize' => 'Capitalize (capitalizes the first letter of each word in the selected text',
						'inherit' => 'Inherit (gives the text the case and capitalization of its parent',
					),
					'default_value' => array(
					),
					'allow_null' => 1,
					'multiple' => 0,
					'ui' => 0,
					'ajax' => 0,
					'return_format' => 'value',
					'placeholder' => '',
				),
			),
		),
		array(
			'key' => 'field_5e73fdc5f18d3',
			'label' => 'White CTA Colors',
			'name' => 'btn_white_colors',
			'type' => 'group',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'layout' => 'table',
			'sub_fields' => array(
				array(
					'key' => 'field_5e73fdc5f18d4',
					'label' => 'Background Color',
					'name' => 'background_color',
					'type' => 'color_picker',
					'instructions' => 'By default, primary CTAs will inherit the primary theme color. That can be overridden here.',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
				),
				array(
					'key' => 'field_5e73fdc5f18d5',
					'label' => 'Background Hover Color',
					'name' => 'background_color_hover',
					'type' => 'color_picker',
					'instructions' => 'If unset, primary CTAs will use the theme secondary color as the hover color. That can be overridden here.',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
				),
				array(
					'key' => 'field_5e73fdc5f18d6',
					'label' => 'Text Color',
					'name' => 'text_color',
					'type' => 'color_picker',
					'instructions' => 'By default, the text color for CTAs will be theme white. That can be overridden here.',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
				),
				array(
					'key' => 'field_5e73fdc5f18d7',
					'label' => 'Text Hover Color',
					'name' => 'text_color_hover',
					'type' => 'color_picker',
					'instructions' => 'By default, the CTA text color remains theme white on hover. That can be overridden here.',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
				),
			),
		),
		array(
			'key' => 'field_5e74066af203a',
			'label' => 'Black CTA',
			'name' => '',
			'type' => 'tab',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'placement' => 'top',
			'endpoint' => 0,
		),
		array(
			'key' => 'field_5e740675f203b',
			'label' => 'Black CTA Typography',
			'name' => 'btn_black_typography',
			'type' => 'group',
			'instructions' => 'Set the typography for default Call To Action buttons.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'layout' => 'block',
			'sub_fields' => array(
				array(
					'key' => 'field_5e740675f203c',
					'label' => 'Font Identifier',
					'name' => 'font',
					'type' => 'text',
					'instructions' => 'Enter the font stack here (like "Oswald", sans-serif).',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '33',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array(
					'key' => 'field_5e740675f203d',
					'label' => 'Font Size',
					'name' => 'size',
					'type' => 'text',
					'instructions' => 'Enter the size and measurement for the font here (i.e. 18px, 1.5em, etc.)',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '33',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array(
					'key' => 'field_5e740675f203e',
					'label' => 'Font Weight',
					'name' => 'font_weight',
					'type' => 'text',
					'instructions' => 'Enter the font weight here (i.e. bold, 100, etc.)',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '33',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array(
					'key' => 'field_5e740675f203f',
					'label' => 'Line Height',
					'name' => 'line_height',
					'type' => 'text',
					'instructions' => 'Enter the letter spacing for the font here (i.e. 1px, 1rem, initial, etc.)',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '33',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array(
					'key' => 'field_5e740675f2040',
					'label' => 'Letter Spacing',
					'name' => 'letter_spacing',
					'type' => 'text',
					'instructions' => 'Enter the letter spacing for the font here (i.e. 1px, 1rem, initial, etc.)',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '33',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array(
					'key' => 'field_5e740675f2041',
					'label' => 'Text Transform',
					'name' => 'text_transform',
					'type' => 'select',
					'instructions' => 'Select the type of text transformation this font style should have (uppercase, lowercase, etc.)',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '33',
						'class' => '',
						'id' => '',
					),
					'choices' => array(
						'none' => 'none (text remains exactly as typed',
						'lowercase' => 'Lowercase (makes all of the letters in the selected text lowercase',
						'uppercase' => 'Uppercase (makes all of the letters in the selected text uppercase',
						'capitalize' => 'Capitalize (capitalizes the first letter of each word in the selected text',
						'inherit' => 'Inherit (gives the text the case and capitalization of its parent',
					),
					'default_value' => array(
					),
					'allow_null' => 1,
					'multiple' => 0,
					'ui' => 0,
					'ajax' => 0,
					'return_format' => 'value',
					'placeholder' => '',
				),
			),
		),
		array(
			'key' => 'field_5e740680f2042',
			'label' => 'Black CTA Colors',
			'name' => 'btn_black_colors',
			'type' => 'group',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'layout' => 'table',
			'sub_fields' => array(
				array(
					'key' => 'field_5e740680f2043',
					'label' => 'Background Color',
					'name' => 'background_color',
					'type' => 'color_picker',
					'instructions' => 'By default, primary CTAs will inherit the primary theme color. That can be overridden here.',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
				),
				array(
					'key' => 'field_5e740680f2044',
					'label' => 'Background Hover Color',
					'name' => 'background_color_hover',
					'type' => 'color_picker',
					'instructions' => 'If unset, primary CTAs will use the theme secondary color as the hover color. That can be overridden here.',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
				),
				array(
					'key' => 'field_5e740680f2045',
					'label' => 'Text Color',
					'name' => 'text_color',
					'type' => 'color_picker',
					'instructions' => 'By default, the text color for CTAs will be theme white. That can be overridden here.',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
				),
				array(
					'key' => 'field_5e740680f2046',
					'label' => 'Text Hover Color',
					'name' => 'text_color_hover',
					'type' => 'color_picker',
					'instructions' => 'By default, the CTA text color remains theme white on hover. That can be overridden here.',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
				),
			),
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'acf-options-ctas',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
));

endif;

// Add the button fields

if( function_exists('acf_add_local_field_group') ):

	// Use the function from functions.php to get HTML showing the block screenshot or a message indicating it's unavailable.
	// First make sure the function exists, for backwards compatibility if adding a module to an older build.
	if( function_exists('stile_block_screenshot') ) {
		$screenshot = stile_block_screenshot('button_block');
	} else {
		$screenshot = 'GCom block screenshots not enabled.';
	}

acf_add_local_field_group(array(
	'key' => 'group_5e3363e41034b',
	'title' => 'Gcommerce Button',
	'fields' => array(
		array(
			'key' => 'field_5e3363f906431',
			'label' => 'Gcommerce Button',
			'name' => '',
			'type' => 'accordion',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'open' => 0,
			'multi_expand' => 0,
			'endpoint' => 0,
		),
		array(
			'key' => 'field_5e3343fbf6512',
			'label' => 'Content Description',
			'name' => '',
			'type' => 'message',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => $screenshot . '<br>Styled call to action buttons that inherit theme colors and typography.',
			'new_lines' => 'wpautop',
			'esc_html' => 0,
		),
		array(
			'key' => 'field_5e3363e906540',
			'label' => 'Button Link',
			'name' => 'cta_link',
			'type' => 'link',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'array',
		),
		array(
			'key' => 'field_5e33641506541',
			'label' => 'Button Type',
			'name' => 'cta_type',
			'type' => 'radio',
			'instructions' => 'Choose the kind of button to load. If you do not make a choice here, the "Button" color settings in Theme Options will be applied.',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'btn-primary' => 'Primary',
				'btn-secondary' => 'Secondary',
				'btn-white' => 'White',
				'btn-black' => 'Black',
			),
			'allow_null' => 1,
			'other_choice' => 0,
			'default_value' => 'btn-primary',
			'layout' => 'horizontal',
			'return_format' => 'value',
			'save_other_choice' => 0,
		),
		array(
			'key' => 'field_5e3854fcec214',
			'label' => 'Button Style',
			'name' => 'cta_style',
			'type' => 'radio',
			'instructions' => 'Should this button be solid or transparent? Transparent buttons will have text and a 2px border in the selected color (primary, secondary, white, or black), and a transparent background. On hover, the background becomes the selected color (primary, secondary, white, or black).',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'btn-solid' => 'Solid',
				'btn-transparent' => 'Transparent',
			),
			'allow_null' => 0,
			'other_choice' => 0,
			'default_value' => 'solid',
			'layout' => 'horizontal',
			'return_format' => 'value',
			'save_other_choice' => 0,
		),
		array(
			'key' => 'field_5f3a54fc3fa3c',
			'label' => 'Button Position',
			'name' => 'cta_position',
			'type' => 'radio',
			'instructions' => 'Where the button should line up.',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'gcom-cta-left' => 'Left',
				'gcom-cta-center' => 'Center',
				'gcom-cta-right' => 'Right',
			),
			'allow_null' => 0,
			'other_choice' => 0,
			'default_value' => 'gcom-cta-center',
			'layout' => 'horizontal',
			'return_format' => 'value',
			'save_other_choice' => 0,
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'block',
				'operator' => '==',
				'value' => 'acf/gcom-button',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
	'modified' => 1580750431,
));

endif;