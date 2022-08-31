<?php
$large_and_up = get_field('large_and_up');
$medium_and_up = get_field('medium_and_up');
$ipad_and_up = get_field('ipad_and_up');
$small_and_up = get_field('small_and_up');
$mobile = get_field('mobile');

// Create id attribute allowing for custom "anchor" value.
$id = 'gcom-spacer-wrapper-id-' . $block['id'];
if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}
?>

<div id="<?php echo $id; ?>" class="<?php if( !empty($block['className']) ) { echo $block['className'] . ' '; } ?>gcom-spacer-wrapper">
	<style>
		@media only screen and (max-width: 768px) {
			#<?php echo $id; ?> {
				height: <?php echo $small_and_up; ?>px;
			}
		}
		@media only screen and (max-width: 600px) {
			#<?php echo $id; ?> {
				height: <?php echo $mobile ?>px;
			}
		}
		@media only screen and (min-width: 769px) {
			#<?php echo $id; ?> {
				height: <?php echo $ipad_and_up ?>px;
			}
		}
		@media only screen and (min-width: 1201px) {
			#<?php echo $id; ?> {
				height: <?php echo $medium_and_up ?>px;
			}
		}
		@media only screen and (min-width: 1601px) {
			#<?php echo $id; ?> {
				height: <?php echo $large_and_up ?>px;
			}
		}
	</style>
</div>