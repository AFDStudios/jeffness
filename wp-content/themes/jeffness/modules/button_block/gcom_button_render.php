<?php
// GCom Button Block Template for ACF Gutenberg
if( get_field('cta_link') ) : 

	$link = get_field('cta_link');
	$link_url = $link['url'];
	$link_title = $link['title'];
	$link_target = $link['target'] ? $link['target'] : '_self';
	$link_type = get_field('cta_type');
	$link_style = get_field('cta_style');
	$link_position = get_field('cta_position');
	$className = '';
	if( !empty($block['className']) ) {
		$className = $block['className'] . ' ';
	}

	echo '<div class="' . $className . (!empty($link_position)? $link_position . ' ':'') . 'gcom-cta-wrapper"><a href="' . $link_url . '" target="' . $link_target . '" class="btn ' . $link_type . ' ' . $link_style . '">' . $link_title . '</a></div>';

endif; ?>