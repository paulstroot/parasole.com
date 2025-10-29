<?php

if (! defined('THEME_VERSION') ) {
    // Replace the version number of the theme on each release.
    define('THEME_VERSION', '0.1.2');
}

function pstroot_scripts()
{
    /**
 * Our main stylesheet
*/
    wp_enqueue_style('main', get_stylesheet_directory_uri() . '/library/css/style.css', array(), THEME_VERSION);
    wp_enqueue_style('main-override', get_stylesheet_directory_uri() . '/library/css/override.css', array(), THEME_VERSION);

    /**
 * Our main javascript ('wp-localize-script' only needed if you need to pass javascript variables to scripts. Commmen when passing a nonce into a form script)
*/
    wp_register_script('main', get_stylesheet_directory_uri() . '/library/js/script.min.js', array(), THEME_VERSION, true);
    // wp_localize_script( 'main', 'myAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ), 'formsNonce' => wp_create_nonce("pstroot_forms_nonce")));
    wp_enqueue_script('main');

    /**
 * ICONS
*/
    wp_enqueue_style('remixicon', 'https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.min.css', array(), THEME_VERSION);

    /**
 * SWIPER CAROUSEL - adds about 160k (but hopefully cached from jsdelivr)
*/
    // wp_enqueue_script('swiper', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), THEME_VERSION, true);
    // wp_enqueue_style('swiper', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', array(), THEME_VERSION);
    /**
 * IMPORTANT! If you activate Swiper add 'swiper' as a requirement for the 'main' (script.min.js) javascript include on line 15
*/

    /**
 * TINY SLIDER - adds about 32k (but hopefully cached from jsdelivr)
*/
    // wp_enqueue_script('tiny-slider', 'https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.2/min/tiny-slider.js', array(), THEME_VERSION, true);
    /**
 * IMPORTANT! If you activate Swiper add 'tiny-slider' as a requirement for the 'main' (script.min.js) javascript include on line 15
*/

    /**
 * COMMENTS - I doubt you'll want this, but just in case, include it here.
*/
    // if (is_singular() && comments_open() && get_option('thread_comments') ) {
    //     wp_enqueue_script('comment-reply');
    // }

}
add_action('wp_enqueue_scripts', 'pstroot_scripts', 9); // set priority lower than 10 so that theme.json variables can override the css resets




/**
 * Inline important javascript in the HEAD.
 */
add_action('wp_head', 'add_top_inline_scripts');
function add_top_inline_scripts()
{
    echo "<script>";
    include get_stylesheet_directory() . '/library/js/top-script.min.js'; // phpcs:ignore WordPressVIPMinimum.Files.IncludingNonPHPFile.IncludingNonPHPFile
    echo "</script>";
};



/**
 * Enqueue a styles and script in the WordPress admin.
 *
 * @param int $hook Hook suffix for the current admin page.
 */
function pstroot_enqueue_admin_script()
{
    wp_enqueue_script('main-admin', get_template_directory_uri() . '/library/js/admin-scripts.js', array(), THEME_VERSION, true);
    wp_enqueue_style('main-admin', get_template_directory_uri() . '/library/css/admin-styles.css', array(), THEME_VERSION);
    wp_enqueue_style('main-admin-override', get_template_directory_uri() . '/library/css/admin-override.css', array(), THEME_VERSION);
}
add_action('admin_init', 'pstroot_enqueue_admin_script');


