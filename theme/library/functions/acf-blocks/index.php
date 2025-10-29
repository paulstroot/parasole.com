<?php
/**
 * We use WordPress's init hook to make sure
 * our blocks are registered early in the loading
 * process.
 *
 * @link https://developer.wordpress.org/reference/hooks/init/
 */
function pstroot_register_acf_blocks()
{
    /**
     * We register our block's with WordPress's handy
     * register_block_type();
     *
     * @link https://developer.wordpress.org/reference/functions/register_block_type/
     */
    register_block_type(__DIR__ . '/blocks/testimonial');
    register_block_type(__DIR__ . '/blocks/social-media');
}
// Here we call our tt3child_register_acf_block() function on init.
add_action('init', 'pstroot_register_acf_blocks');