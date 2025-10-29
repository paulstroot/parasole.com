<?php
function my_theme_google_fonts() {
    // Enqueue the Google Font stylesheet
    wp_enqueue_style( 'google-fonts-montserrat', 'https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap', array(), null );

    // Optionally, enqueue preconnect for better performance
    wp_enqueue_style( 'google-fonts-preconnect-1', 'https://fonts.googleapis.com', array(), null, 'all', array( 'rel' => 'preconnect' ) );
    wp_enqueue_style( 'google-fonts-preconnect-2', 'https://fonts.gstatic.com', array(), null, 'all', array( 'rel' => 'preconnect', 'crossorigin' => 'anonymous' ) );
}
add_action( 'wp_enqueue_scripts', 'my_theme_google_fonts' );


