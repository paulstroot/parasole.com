<?php
if(isset($wp_customize)) {


    /**
     * Social site icons for Quick Menu bar
     *
     * @link: https://www.competethemes.com/social-icons-wordpress-menu-theme-customizer/
     */
    $wp_customize->add_section(
        'social_settings', array(
        'title' => __('Social Media', 'pstroot'),
        'priority' => 100,
        )
    );

    $social_sites = pstroot_get_social_sites();
    $priority = 5;

    foreach( $social_sites as $social_site ) {

        $wp_customize->add_setting(
            $social_site->id, array(
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'esc_url_raw',
            )
        );

        $wp_customize->add_control(
            $social_site->id, array(
            'label' => $social_site->name,
            'section' => 'social_settings',
            'type' => 'text',
            'priority' => $priority,
            )
        );

        $priority += 5;
    }
}
 /**
  * Social Media icon helper functions
  *
  * @return array
  *
  * @link: https://www.competethemes.com/social-icons-wordpress-menu-theme-customizer/
  */
function pstroot_get_social_sites()
{

     // Store social site names in array
     $social_sites = array(
      (object) [
        'name' => 'Facebook',
        'id' => 'facebook',
        'class' => 'fa-brands fa-facebook-f',
      ],
      (object) [
        'name' => 'Twitter',
        'id' => 'twitter',
        'class' => 'fa-brands fa-twitter',
      ],
      (object) [
        'name' => 'YouTube',
        'id' => 'youtube',
        'class' => 'fa-brands fa-youtube',
      ],
      (object) [
        'name' => 'LinkedIn',
        'id' => 'linkedin',
        'class' => 'fa-brands fa-linkedin-in',
      ],
      (object) [
        'name' => 'Google+',
        'id' => 'googleplus',
        'class' => 'fa-brands fa-google-plus-g',
      ],
      (object) [
        'name' => 'Pinterest',
        'id' => 'pinterest',
        'class' => 'fa-brands fa-pinterest',
      ],
      (object) [
        'name' => 'Instagram',
        'id' => 'instagram',
        'class' => 'fa-brands fa-instagram',
      ]
        //'flickr',
        //'vimeo',
        //'tumblr',
        //'dribbble',
        //'rss',
     );
     return $social_sites;
}
// Get user input from the Customizer and output the linked social media icons
function pstroot_show_social_icons()
{

    $social_sites = pstroot_get_social_sites();
    $active_sites = [];
    //Any inputs that aren't empty are stored in $active_sites array
    foreach( $social_sites as $social_site ) {
        if (strlen(get_theme_mod($social_site->id)) > 0 ) {
            $active_sites[] = $social_site;
        }
    }

    // For each active social site, add it as a list item
    if (!empty($active_sites) ) {
        echo "<ul class='social-media-icons'>";
        foreach ( $active_sites as $active_site ) {
            ?><li>
          <a href="<?php echo esc_url(get_theme_mod($active_site->id)); ?>" title="<?php echo esc_attr($active_site->name); ?>" target="_blank" class="text-white">
            <i class="<?php echo esc_attr($active_site->class); ?>"></i>
          </a>
        </li><?php
        }
        echo "</ul>";
    }

}