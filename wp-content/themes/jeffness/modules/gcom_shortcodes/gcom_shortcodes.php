<?php
// ADD THEME SHORTCODES HERE

function iframe_shortcode_cb( $atts ) {
	$defaults = array(
		'src' => 'http://www.youtube.com/embed/OjPgeXHjM9k',
		'width' => '100%',
		'height' => '500',
		'scrolling' => 'yes',
		'class' => 'iframe-class',
		'frameborder' => '0'
	);

	foreach ( $defaults as $default => $value ) { // add defaults
		if ( ! @array_key_exists( $default, $atts ) ) { // mute warning with "@" when no params at all
			$atts[$default] = $value;
		}
	}

	$html = '<iframe';
	foreach( $atts as $attr => $value ) {
		if ( strtolower($attr) != 'same_height_as' AND strtolower($attr) != 'onload'
			AND strtolower($attr) != 'onpageshow' AND strtolower($attr) != 'onclick') { // remove some attributes
			if ( $value != '' ) { // adding all attributes
				$html .= ' ' . esc_attr( $attr ) . '="' . esc_attr( $value ) . '"';
			} else { // adding empty attributes
				$html .= ' ' . esc_attr( $attr );
			}
		}
	}
	$html .= '></iframe>'."\n";

	if ( isset( $atts["same_height_as"] ) ) {
		$html .= '
			<script>
			document.addEventListener("DOMContentLoaded", function(){
				var target_element, iframe_element;
				iframe_element = document.querySelector("iframe.' . esc_attr( $atts["class"] ) . '");
				target_element = document.querySelector("' . esc_attr( $atts["same_height_as"] ) . '");
				iframe_element.style.height = target_element.offsetHeight + "px";
			});
			</script>
		';
	}

	return $html;
}

function tabbed_content( $atts, $content = '' ) {
	$args = shortcode_atts([
		'title' => ''
	], $atts);

	$tab;

	$tab = '<div data-id="' . ( ( !empty($args['title']) ) ? $args['title'] : '') . '" class="gcom-tab">' . do_shortcode($content) . '</div>';

	return $tab;
}

function link_button( $atts, $content = '' ) {
	$args = shortcode_atts([
		'link' => '',
		'tab' => '',
		'class' => ''
	], $atts);

	// Ternary operator has to be enclosed in parentheses. Syntax is: (condition) ? (true return value) : (false return value)
	// This statement basically evaluates inline if the class parameter has been set, returning the extra class(es) along with a leading space if true and just closing out the class attribute if empty.
	// The same is done with the "tab" parameter, returning "target='_blank'"
	// We use this syntax to avoid multiple nested if queries to format the end result.
	$button = '<a class="btn' . ( ( !empty($args['class']) ) ? ' ' . $args['class'] . '"' : '"') . ' href="' . $args['link'] . ( ( $args['tab'] == 'yes' ) ? '" target="_blank">' : '">' ) . do_shortcode($content) . '</a>';

	return $button;
}

function columns( $atts, $content = '' ) {
	$args = shortcode_atts([
		'large' => '',
		'medium' => '',
		'small' => ''
	], $atts);

	$column;

	$column = '<div class="' . ( ( !empty($args['large']) ) ? 'col-lg-' . $args['large'] . ' ' : '') . ( ( !empty($args['medium']) ) ? 'col-md-' . $args['medium'] . ' ' : '') . ( ( !empty($args['small']) ) ? 'col-sm-' . $args['small'] . ' ' : '') . '">' . do_shortcode($content) . '</div>';

	return $column;
}

function row( $atts, $content = '' ) {
	$row = "<div class='row'>" . do_shortcode($content) . "</div>";

	return $row;
}


//Collapsable Content Shortcode JC
function collapsable_content( $atts , $content = null ) {
	$args = shortcode_atts([
		'title' => '',
	], $atts);

	$identifier = preg_replace('/\s+/', '', $args['title']);

	$nl = "\n";
	$content = do_shortcode($content);
	$return_data = '<div class="expander jsExpander">'
		. $nl . '<div href="#" class="js-expander-trigger expander-trigger expander-hidden ' . 'expander-' . $identifier . '">' . $args['title']
		. $nl . '<div class="js-expander-content expander-content content-hidden" style="display: none; width: 100%;">'
		. $nl . '<p>' . $content . '</p>'
		. $nl . '</div>'
		. $nl . '</div>'
		. $nl . '</div>';

	return $return_data;
}

add_shortcode( 'accordion', 'collapsable_content' );
add_shortcode( 'button', 'link_button' );
add_shortcode( 'column', 'columns' );
add_shortcode( 'row', 'row' );
add_shortcode( 'tab', 'tabbed_content' );
add_shortcode( 'iframe', 'iframe_shortcode_cb' );

function enqueue_gcom_shortcodes_script() {

	wp_enqueue_script('gcom-shortcodes-js', get_template_directory_uri() . '/modules/gcom_shortcodes/gcom_shortcodes.min.js', array( 'jquery' ), null, true );
	wp_enqueue_style( 'gcom-shortcodes-style', get_template_directory_uri() . '/modules/gcom_shortcodes/gcom_shortcodes.css' );
}

add_action( 'wp_enqueue_scripts', 'enqueue_gcom_shortcodes_script' );
