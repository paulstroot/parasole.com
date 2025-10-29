<?php


// Adjust the maximum size of full-size images (to save space on hosting server and reduce size of migrations)
add_filter('big_image_size_threshold', 'increase_big_image_threshold', 10, 4);
function increase_big_image_threshold($threshold, $imagesize, $file, $attachment_id)
{
    return 1920; // Default 2560.
}




/*
Image Guidelines
These are the image areas that should be kept in mind when editing.
The rest of the images live in image galleries or the page in a reduced
size that is taken care of in the backend!
*/


add_image_size('hero', 1920, 9999);
// add_image_size('large', 1000, 1000); // set in the admin section
add_image_size('medium_large', 700, 1000);
// add_image_size('medium', 500, 500); // set in the admin section
// add_image_size('thumbnail', 200, 200); // set in the admin section

if (function_exists('add_theme_support')) {
    add_theme_support('post-thumbnails');
}



/*
The function below adds the ability to use the dropdown menu to select
the new images sizes you have just created from within the media manager
when you add media to your content blocks. If you add more image sizes,
duplicate one of the lines in the array and name it according to your
new image size.
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



// This will remove a image sizes tht we do not need
// function wpdocs_remove_plugin_image_sizes()
// {
//     remove_image_size('ppec_logo_image_size');
//     remove_image_size('variation_swatches_image_size'); // 50x50 (crop: 1)
//     remove_image_size('variation_swatches_tooltip_size'); // 100x100 (crop: 1)
// }
// add_action('init', 'wpdocs_remove_plugin_image_sizes', 998);
