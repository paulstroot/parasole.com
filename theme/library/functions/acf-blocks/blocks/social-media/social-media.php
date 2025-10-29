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
$class_name = 'social-media';

// Build a valid style attribute for background and text colors.
$styles = array( 'color: ' . $text_color , 'background-image: url(' . $background_image['sizes']['medium_large']  . ')');
$style  = implode('; ', $styles);


?>

<div class="relative <?php echo esc_attr($class_name); ?>" style="<?php echo esc_attr($style); ?>">
  <div class="absolute inset-0 z-[1]" style="background-color: <?php echo esc_attr($background_overlay); ?>"></div>
  <div class="relative z-[2] p-3">
    <h1 class=""><?php echo esc_html($headline); ?></h1>

    <?php foreach ( $links as $l ) : ?>
      <a href="<?php echo esc_url($l['link_url']); ?>" target="_blank" class="text-xxl">
        <span class="dashicons <?php echo esc_attr($l['link_icon']); ?>"></span>
        <span class="sr-only visually-hidden"><?php echo esc_html($l['link_name']); ?></span>
      </a>
    <?php endforeach; ?>
  </div>


</div>