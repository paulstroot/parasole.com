<?php
/**
 * Image-ticker Block template.
 *
 * @package Parasole *
 * @param array $block The block settings and attributes.
 */

add_filter( 'safe_style_css', function( $styles ) {
  $styles[] = 'animation-duration';
  return $styles;
} );

$animation_duration  = get_field( 'animation_duration' ) ? get_field( 'animation_duration' ) : '100';
$aspect_ratio        = get_field( 'aspect_ratio' ) ? get_field( 'aspect_ratio' ) : '4 / 5';
$width               = get_field( 'width' ) ? get_field( 'width' ) : '30vw';
$gallery             = get_field( 'gallery' );
$object_position     = 'center center';
// shuffle($gallery);

$carouselStyle = 'animation-duration:'.$animation_duration.'s;';

$imageMarkup = '<div class="carousel-group" aria-hidden="true" style="'.($carouselStyle).'">';
foreach ($gallery as $image) :
  $verticalFocus = get_field('vertical_focus',$image['ID']) ? get_field('vertical_focus',$image['ID']) . "%" :  'center';
  $imageMarkup .=  '<div class="carousel-item overflow-hidden" style="width:'.$width.';aspect-ratio: '. esc_attr($aspect_ratio) . '">';
  $imageMarkup .=   '<div class="carousel-item-inner absolute h-full">';

  $imageMarkup .=     wp_get_attachment_image($image['ID'], 'carousel', false, array('alt' => esc_attr($image['alt']),'loading'=>'lazy','style'=>'object-position:center '.$verticalFocus.';'));
  $imageMarkup .=    '</div>';
  $imageMarkup .=  '</div>';
endforeach;
$imageMarkup .= '</div>';


?>
<section class="carousel-container mt-0">
    <?php echo wp_kses_post( $imageMarkup ); ?>
    <?php echo wp_kses_post( $imageMarkup ); ?>
</section>
