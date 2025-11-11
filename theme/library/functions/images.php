<?php
/**
 * Get allowed SVG arguments for image sanitization.
 *
 * @return array Allowed SVG arguments.
 */
function pstroot_get_allowed_svg_args() {
  return array(
    'svg' => array(
      'xmlns' => true,
      'width' => true,
      'height' => true,
      'viewbox' => true,
      'aria-hidden' => true,
      'aria-labelledby' => true,
      'role' => true,
      'class' => true,
      'style' => true,
      'id' => true,
    ),
    'style' => array(
    ),
    'g' => array(
      'fill' => true,
      'stroke' => true,
      'stroke-width' => true,
      'transform' => true,
      'class' => true,
      'style' => true,
      'id' => true,
      'd' => true,
    ),
    'path' => array(
        'd' => true,
        'fill' => true,
        'stroke' => true,
        'stroke-width' => true,
        'class' => true,
        'style' => true,
        'id' => true,
    ),
    'circle' => array(
        'cx' => true,
        'cy' => true,
        'r' => true,
        'fill' => true,
        'stroke' => true,
        'stroke-width' => true,
        'class' => true,
        'style' => true,
        'id' => true,
    ),
    'rect' => array(
        'x' => true,
        'y' => true,
        'width' => true,
        'height' => true,
        'class' => true,
        'style' => true,
        'id' => true,
    ),
    'polygon' => array(
        'points' => true,
        'fill' => true,
        'stroke' => true,
        'stroke-width' => true,
        'class' => true,
        'style' => true,
        'id' => true,
    ),
    'polyline' => array(
        'points' => true,
        'fill' => true,
        'stroke' => true,
        'stroke-width' => true,
        'class' => true,
        'style' => true,
        'id' => true,
    ),
  );
}

/**
 * Allow SVG uploads.
 *
 * @param array $mimes Mime types keyed by the file extension.
 * @return array Filtered $mimes.
 */
function pstroot_allow_svg_uploads( $mimes ) {
    $mimes['svg'] = 'image/svg+xml'; // Allow SVG uploads.
    return $mimes;
}
add_filter( 'upload_mimes', 'pstroot_allow_svg_uploads' );

/**
 * Adjust the maximum size of full-size images.
 *
 * @param int    $threshold     The threshold in pixels.
 * @param array  $imagesize     The image dimensions.
 * @param string $file          The file path.
 * @param int    $attachment_id The attachment ID.
 * @return int   New threshold value.
 */
function pstroot_increase_big_image_threshold( $threshold, $imagesize, $file, $attachment_id ){
    return 1920; // Default 2560.
}
add_filter('big_image_size_threshold', 'pstroot_increase_big_image_threshold', 10, 4);




/*
Image Guidelines
These are the image areas that should be kept in mind when editing.
The rest of the images live in image galleries or the page in a reduced
size that is taken care of in the backend!
*/


add_image_size('hero', 1920, 9999);
add_image_size('medium_large', 700, 1000);

if (function_exists('add_theme_support')) {
    add_theme_support('post-thumbnails');
}




/**
 * Add custom image sizes to the image size dropdown in the media manager.
 *
 * The function below adds the ability to use the dropdown menu to select
 * the new image sizes you have just created from within the media manager
 * when you add media to your content blocks. If you add more image sizes,
 * duplicate one of the lines in the array and name it accordingly.
 *
 * @param array $sizes Existing image sizes.
 * @return array Modified image sizes.
 */
function pstroot_display_custom_image_sizes($sizes)
{
    global $_wp_additional_image_sizes;
    if (empty($_wp_additional_image_sizes)) {
        return false;
    }
    foreach ($_wp_additional_image_sizes as $id => $data) {
        if (!isset($sizes[$id])) {
            $sizes[$id] = ucfirst(str_replace('-', ' ', $id));
        }
    }
    return $sizes;
}
add_filter('image_size_names_choose', 'pstroot_display_custom_image_sizes');


