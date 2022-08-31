<?php
/* Custom Post Types */
// Flush rewrite rules for custom post types
add_action( 'init', 'bluesteel_flush_rewrite_rules' );
add_action( 'admin_init', 'bluesteel_flush_rewrite_rules' );

// Flush your rewrite rules
function bluesteel_flush_rewrite_rules() {
	flush_rewrite_rules();
}
// CUSTOM POST TYPES
// Press Clippings
function bluesteel_cpt_init() {

}
// Hooking up our function to theme setup
add_action( 'init', 'bluesteel_cpt_init', 0 );

?>