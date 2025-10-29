<?php

/* Adds contact information to the admin customizer (Appearance > Customize) */

if(isset($wp_customize)) {

    /**
     * Social site icons for Quick Menu bar
     *
     * @link: https://www.competethemes.com/social-icons-wordpress-menu-theme-customizer/
     */
    $wp_customize->add_section(
        'contact_info', array(
         'title' => __('Contact Info', 'pstroot'),
         'priority' => 40,
        )
    );

    $contact_info = pstroot_get_contact_info();
    $priority = 5;

    foreach( $contact_info as $c ) {

        $wp_customize->add_setting(
            $c, array(
             'type' => 'theme_mod',
             'capability' => 'edit_theme_options',
             'sanitize_callback' => 'sanitize_text_field',
            )
        );

        $wp_customize->add_control(
            $c, array(
             'label' => ucwords(__("$c:", 'social_icon')),
             'section' => 'contact_info',
             'type' => 'text',
             'priority' => $priority,
            )
        );

        $priority += 5;
    }

}





 /**
  * Helper functions
  *
  * @return array
  *
  * @link: https://www.competethemes.com/social-icons-wordpress-menu-theme-customizer/
  */
function pstroot_get_contact_info()
{

     // Store social site names in array
     $contact_info = array(
         'address',
         'address2',
         'city',
         'state',
         'zip',
         'phone',
         'fax',
         'email',
         'hours'
     );
     return $contact_info;
}


// Get user input from the Customizer and output the linked social media icons
function pstroot_show_contact_info()
{

     $contact_info = pstroot_get_contact_info();

     // Any inputs that aren't empty are stored in $data array
    foreach( $contact_info as $c ) {
        if (strlen(get_theme_mod($c)) > 0 ) {
            $data[] = $c;
        }
    }

     // For each active social site, add it as a list item
    if (!empty($data) ) {
        echo "<div class='contact-info'>";

        echo esc_textarea(get_theme_mod('address')) . "<BR>";
        echo esc_textarea(get_theme_mod('address2')) . "<BR>";
        echo esc_textarea(get_theme_mod('city')) . " ";
        echo esc_textarea(get_theme_mod('state')) . ", ";
        echo esc_textarea(get_theme_mod('zip')) . "<BR>";
        echo esc_textarea(get_theme_mod('phone')) . "<BR>";
        echo esc_textarea(get_theme_mod('email')) . "<BR>";
        echo esc_textarea(get_theme_mod('hours')) . "<BR>";

        echo "</div>";
    }
}