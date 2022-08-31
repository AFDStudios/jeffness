<?php
// Ensure a value gets passed even though there is a default set.
if ( get_field('height') ) :
    $height = get_field('height');
else :
    $height = 'normal';
endif;
if (get_field('headline_style')) :
    $headline_style = get_field('headline_style');
else:
    $headline_style = 'h1';
endif;
$text_width = get_field('text_width');
$image = get_field('parallax_image');
$sub_headline = get_field('sub_headline');
$headline = get_field('headline');
$text = get_field('parallax_text');
$top_border_image = get_field('top_border_image');
$bottom_border_image = get_field('bottom_border_image');
$text_color = get_field('text_color');
$text_position = get_field('text_position');
$link = get_field('cta');
$link2 = get_field('cta2');
$cta_style = get_field('cta_style');
$background_position = get_field('background_position');
$overlay = get_field('overlay');
if ( $link ) :
	$cta_url = $link['url'];
	$cta_title = $link['title'];
	$cta_target = $link['target'] ? $link['target'] : '_self';
endif;
if ( $link2 ) :
    $cta2_url = $link2['url'];
    $cta2_title = $link2['title'];
    $cta2_target = $link2['target'] ? $link2['target'] : '_self';
endif;

// Create id attribute allowing for custom "anchor" value.
$id = 'parallax-wrapper-id-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}
?>

<section id="<?php echo $id; ?>" class="parallax-wrapper parallax-height-<?php echo $height; ?><?php if ( !empty( $text_position ) ) { echo ' ' . $text_position; }?>" style="background-image: url('<?php echo $image ?>');">
    <?php if ( $background_position ) : ?>
    <style>
        @media only screen and (max-width: 768px) {
            #<?php echo $id; ?> {
                background-position: <?php echo $background_position; ?>;
            }
        }
    </style>
    <?php endif; ?>
    <?php if( $top_border_image ) { echo wp_get_attachment_image( $top_border_image, "full", "", ["class" => "gcom-parallax-border-top"] ); } ?>
    <div class="parallax-text-wrapper<?php if ( !empty($text_color) ) { echo ' ' . $text_color; } ?>">
        <?php if ( !empty( $sub_headline ) ) { echo '<div class="parallax-sub-headline h3">' . $sub_headline . '</div>'; } ?>
        <?php if ( !empty( $headline ) ) { echo '<div class="parallax-headline fade-in' . (!empty($headline_style)?' '.$headline_style:'') . '" data-speed="1400">' . $headline . '</div>'; } ?>
        <?php if ( !empty( $text ) ) { echo '<div class="parallax-text fade-in' . (!empty($text_width)?' '.$text_width:'') . '" data-speed="1000">' . do_shortcode($text) . '</div>'; } ?>
        <?php if ( !empty( $link ) || !empty( $link2 ) ) : ?>
            <div class="cta-wrapper">
                <?php if ( !empty( $link ) ) : ?>
                    <a class="btn <?php echo $cta_style; ?>" href="<?php echo esc_url( $cta_url ); ?>" target="<?php echo esc_attr( $cta_target ); ?>"><?php echo esc_html( $cta_title ); ?></a>
                <?php endif; ?>
                <?php if ( !empty( $link2 ) ) : ?>
                    <a class="btn <?php echo $cta_style; ?>" href="<?php echo esc_url( $cta2_url ); ?>" target="<?php echo esc_attr( $cta2_target ); ?>"><?php echo esc_html( $cta2_title ); ?></a>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
    <?php if ( !empty( $overlay ) && $overlay != 'none'  ) { echo '<div class="parallax-overlay ' . $overlay  . '"></div>'; } ?>
    <?php if( $bottom_border_image ) { echo wp_get_attachment_image( $bottom_border_image, "full", "", ["class" => "gcom-parallax-border-bottom"] ); } ?>
</section>
