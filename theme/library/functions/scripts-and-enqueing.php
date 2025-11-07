<?php

if (! defined('PSTROOT_THEME_VERSION') ) {
    // Replace the version number of the theme on each release.
    define('PSTROOT_THEME_VERSION', '0.1.5');
}

/**
 * Enqueue theme scripts and styles.
 */
function pstroot_scripts() {
  /**
   * Our main stylesheet
   */

    wp_enqueue_style('main', get_stylesheet_directory_uri() . '/library/css/style.css', array(), filemtime( get_template_directory() . '/library/css/style.css' ));
    wp_enqueue_style('main-override', get_stylesheet_directory_uri() . '/library/css/override.css', array(), filemtime( get_template_directory() . '/library/css/override.css' ));

    /**
     * Our main javascript ('wp-localize-script' only needed if you need to pass javascript variables to scripts. Commmen when passing a nonce into a form script)
    */
    wp_register_script('main', get_stylesheet_directory_uri() . '/library/js/script.min.js', array(), filemtime( get_template_directory() . '/library/js/script.min.js' ), true);
    wp_enqueue_script('main');

    /**
     * ICONS
    */
    wp_enqueue_style('remixicon', 'https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.min.css', array(), PSTROOT_THEME_VERSION);

}
add_action('wp_enqueue_scripts', 'pstroot_scripts', 9); /* set priority lower than 10 so that theme.json variables can override the css resets */




/**
 * Add important top inline scripts to the HEAD.
 */
function pstroot_add_top_inline_scripts() {
    echo "<script>";
    include get_stylesheet_directory() . '/library/js/top-script.min.js'; // phpcs:ignore WordPressVIPMinimum.Files.IncludingNonPHPFile.IncludingNonPHPFile
    echo "</script>";
};
add_action('wp_head', 'pstroot_add_top_inline_scripts');



/**
 * Enqueue styles and scripts in the WordPress admin.
 */
function pstroot_enqueue_admin_script() {
    wp_enqueue_script(
        'main-admin',
        get_template_directory_uri() . '/library/js/admin-scripts.js',
        array(),
        filemtime(get_template_directory() . '/library/js/admin-scripts.js'),
        true
    );
    wp_enqueue_style('main-admin', get_template_directory_uri() . '/library/css/admin-styles.css', array(), filemtime( get_template_directory() . '/library/css/admin-styles.css' ));
    wp_enqueue_style('main-admin-override', get_template_directory_uri() . '/library/css/admin-override.css', array(), filemtime( get_template_directory() . '/library/css/admin-override.css' ));
    wp_enqueue_style('remixicon', 'https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.min.css', array(), PSTROOT_THEME_VERSION);
}
add_action('admin_enqueue_scripts', 'pstroot_enqueue_admin_script');
