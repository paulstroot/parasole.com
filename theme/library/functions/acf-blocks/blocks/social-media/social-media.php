<?php
/**
 * Testimonial Block template.
 *
 * @param array $block The block settings and attributes.
 */

// Load values and assign defaults.
$headline           = get_field('headline');
$text_color         = get_field('text_color'); // ACF's color picker.
$background_image   = get_field('background_image');
$background_overlay = get_field('background_overlay');
$icon_color         = get_field('icon_color');
$icon_hover_color   = get_field('icon_hover_color');
$links   = get_field('links');


// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'social-media bg-cover bg-center';

// Build a valid style attribute for background and text colors.
$styles = array( 'color: ' . $text_color , 'background-image: url(' . $background_image['sizes']['hero']  . ')');
$style  = implode('; ', $styles);


?>

<div class="relative <?php echo esc_attr($class_name); ?>" style="<?php echo esc_attr($style); ?>">
  <div class="absolute inset-0 z-[1] mix-blend-multiply" style="background-color: <?php echo esc_attr($background_overlay); ?>"></div>
  <div class="container text-center relative z-2 pt-20 pb-18">
    <h2 class="mb-2!"><?php echo esc_html($headline); ?></h2>

    <div class="w-[clamp(14rem,25rem)] mx-auto text-[clamp(3.5rem,5.25rem)] text-secondary ">
      <?php pstroot_show_social_icons(); ?>
    </div>

  </div>


</div>