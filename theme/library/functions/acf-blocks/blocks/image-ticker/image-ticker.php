<?php
/**
 * image-ticker Block template.
 *
 * @param array $block The block settings and attributes.
 */


$animation_duration  = get_field( 'animation_duration' );
$aspect_ratio        = get_field( 'aspect_ratio' );
$height              = get_field( 'height' );
$object_position     = 'center center'; //get_field( 'object_position' );
$gallery             = get_field( 'gallery' );


$images = [
  "https://images.pexels.com/photos/262978/pexels-photo-262978.jpeg",
  "https://images.pexels.com/photos/696218/pexels-photo-696218.jpeg",
  "https://images.pexels.com/photos/1307698/pexels-photo-1307698.jpeg",
  "https://images.pexels.com/photos/239975/pexels-photo-239975.jpeg",
  "https://images.pexels.com/photos/761854/pexels-photo-761854.jpeg",
  "https://images.pexels.com/photos/541216/pexels-photo-541216.jpeg",
];

$imageMarkup = '<div class="carousel-group" aria-hidden="true" style="height:' . $height . ';animation-duration:' .$animation_duration . 's;">';
foreach ($gallery as $image) :
  $imageMarkup .=  '<div class="carousel-item" style="aspect-ratio: '. esc_attr($aspect_ratio) . ';">';
  $imageMarkup .=    '<img src="' . $image['sizes']['large'] . '" alt="'. $image['alt'] .'" style="object-position: ' . esc_attr($object_position) . ';">';
  $imageMarkup .=  '</div>';
endforeach;
$imageMarkup .= '</div>';



?>
<section class="carousel-container mt-0">
    <?php echo $imageMarkup; ?>
    <?php echo $imageMarkup; ?>
</section>
