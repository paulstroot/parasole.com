<?php
/* FONT SIZES  */
function mytheme_setup_theme_supported_features()
{
    add_theme_support(
        'editor-font-sizes', array(
        array(
        'name' => esc_attr__('Small', 'pstroot'),
        'shortName' => esc_attr__('S', 'pstroot'),
        'size' => 'clamp(0.625rem, calc(0.625rem + 0.0028 * (100vw - 32rem)), 0.75rem)',
        'slug' => 'small'
         ),
         array(
         'name' => esc_attr__('Normal', 'pstroot'),
         'shortName' => esc_attr__('4', 'pstroot'),
         'size' => 'var(--base-font-size)',
         'slug' => 'base'
         ),
         array(
         'name' => esc_attr__('h3', 'pstroot'),
         'shortName' => esc_attr__('3', 'pstroot'),
         'size' => 24,
         'slug' => 'h3'
         ),
         array(
         'name' => esc_attr__('h2', 'pstroot'),
         'shortName' => esc_attr__('2', 'pstroot'),
         'size' => 36,
         'slug' => 'h2'
         ),
         array(
         'name' => esc_attr__('h2-lg', 'pstroot'),
         'shortName' => esc_attr__('B', 'pstroot'),
         'size' => 48,
         'slug' => 'h2-lg'
         ),
         array(
         'name' => esc_attr__('h1', 'pstroot'),
         'shortName' => esc_attr__('1', 'pstroot'),
         'size' => 62,
         'slug' => 'h1'
         )
        )
    );
}
add_action('after_setup_theme', 'mytheme_setup_theme_supported_features');




function mytheme_setup_theme_features()
{
    add_theme_support(
        'editor-color-palette', array(
        array(
            'name'  => esc_attr__('Black', 'mytheme'),
            'slug'  => 'black',
            'color' => '#0090000',
         ),
        array(
            'name'  => esc_attr__('Dark', 'mytheme'),
            'slug'  => 'dark',
            'color' => '#333333',
         ),
        array(
            'name'  => esc_attr__('Light', 'mytheme'),
            'slug'  => 'light',
            'color' => '#f6f5f4',
         ),
        array(
            'name'  => esc_attr__('White', 'mytheme'),
            'slug'  => 'white',
            'color' => '#FFFFFF',
         ),
        array(
            'name'  => esc_attr__('Primary Color', 'mytheme'),
            'slug'  => 'primary',
            'color' => '#6e57c1',
         ),
         array(
            'name'  => esc_attr__('Secondary Color', 'mytheme'),
            'slug'  => 'secondary',
            'color' => '#b9529f',
         ),
         array(
            'name'  => esc_attr__('Accent Color', 'mytheme'),
            'slug'  => 'accent',
            'color' => '#de9c57',
         ),
         array(
            'name'  => esc_attr__('Neutral Color', 'mytheme'),
            'slug'  => 'neutral',
            'color' => '#A3A3A3',
         ),
         // Add more colors as needed
        )
    );
}
add_action('after_setup_theme', 'mytheme_setup_theme_features');