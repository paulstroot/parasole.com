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
shuffle($gallery);
// $gallery = array_slice($gallery, 0, 1);

$imageMarkup = '<div class="carousel-group" aria-hidden="true" style="height:' . $height . ';animation-duration:' .$animation_duration . 's;">';
foreach ($gallery as $image) :
  $imageMarkup .=  '<div class="carousel-item overflow-hidden" style="aspect-ratio: '. esc_attr($aspect_ratio) . ';">';
  $imageMarkup .=   '<div class="carousel-item-inner absolute h-full">';
  $imageMarkup .=      '<img src="' . $image['sizes']['large'] . '" alt="'. $image['alt'] .'" style="">';
  $imageMarkup .=    '</div>';
  $imageMarkup .=  '</div>';
endforeach;
$imageMarkup .= '</div>';



?>
<section class="carousel-container mt-0">
    <?php echo $imageMarkup; ?>
    <?php echo $imageMarkup; ?>
</section>
