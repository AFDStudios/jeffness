<?php
$headline = get_field('headline');
$text_area = get_field('text_area');
$background_color = get_field('background_color');
$background_color_custom = get_field('background_color_custom');
$background_image = get_field('background_image');
if ( get_field('closed_icon') ) { $closed_icon = get_field('closed_icon'); } else { $closed_icon = '<i class="fal fa-plus"></i>';	}
if ( get_field('open_icon') ) { $open_icon = get_field('open_icon'); } else { $open_icon = '<i class="fal fa-minus"></i>';	}
$faqs = get_field('faqs');

// Create id attribute allowing for custom "anchor" value.
$id = 'gcom-faq-wrapper-id-' . $block['id'];
if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}

if ( get_field('output_schema') ) : $lastElement = end($faqs)?>

<script type="application/ld+json">
{
	"@context": "https://schema.org",
	"@type": "FAQPage",
	"mainEntity": [<?php foreach ( $faqs as $faq ): ?>{
        "@type": "Question",
        "name": "<?php echo addslashes($faq['question']); ?>",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "<?php echo addslashes($faq['answer']); ?>"
        }
      }<?php if($faq != $lastElement) { echo ', '; } endforeach; ?>]
  }
</script>

<?php endif; ?>

<section id="<?php echo $id; ?>" class="gcom-faq-wrapper<?php if ( !empty($block['className']) ) {
	echo ' ' . $block['className']; } ?><?php if ( get_field('faq_style') ) { echo ' ' . get_field('faq_style'); } ?><?php if ( get_field('background_color') ) { echo ' ' . get_field('background_color'); } ?><?php if ( get_field('background_color') || get_field('background_color_custom') ) { echo ' gcom-faq-padded'; } ?>" style="background-image:url(<?php echo $background_image; ?>);<?php if ( get_field('background_color_custom') ) { echo ' background-color: ' . get_field('background_color_custom') . ';'; } ?>">
	<article>
		<?php 
		// Overall header stuff
		if ( !empty( $headline ) ) { echo '<h2>' . $headline . '</h2>'; }
		if ( !empty( $text_area ) ) { echo '<div class="gcom-faq-text-block">' . $text_area . '</div>'; }
		// Output the questions & answers
		foreach ( $faqs as $faq ):
			$faq_id = str_replace('"', '', $faq['question']);
			$faq_id = str_replace('/', '', $faq_id);
			$faq_id = str_replace(" ", "-", $faq_id);
			echo '<div class="gcom-faq-single-wrapper">';
				echo '<div class="gcom-faq-question" id="' . $faq_id . '">';
					if ( get_field('faq_style') && get_field('faq_style') != 'standard' ) :
						if ( get_field('open_icon') ) :
							echo '<span class="gcom-faq-toggle gcom-faq-toggle-open">' . get_field('open_icon') . '</span>';
						else:
							echo '<span class="gcom-faq-toggle gcom-faq-toggle-open" aria-label="Open Question"><i class="fal fa-plus"></i></span>';
						endif;
						if ( get_field('close_icon') ) :
							echo '<span class="gcom-faq-toggle gcom-faq-toggle-close">' . get_field('close_icon') . '</span>';
						else:
							echo '<span class="gcom-faq-toggle gcom-faq-toggle-close" aria-label="Close Question"><i class="fal fa-minus"></i></span>';
						endif;
					endif;
					echo $faq['question'];
				echo '</div>';
				echo '<div class="gcom-faq-answer' . ( get_field('faq_style') == 'accordion-closed'?' content-hidden':'') . '">' . $faq['answer'] . '</div>';
			echo '</div>';
		endforeach;
		?>
	</article>
</section>