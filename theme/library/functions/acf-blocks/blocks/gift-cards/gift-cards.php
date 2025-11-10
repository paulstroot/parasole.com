<?php
/**
 * Gift-cards Block template.
 *
 * @package Parasole
 * @param array $block The block settings and attributes.
 */

// Load values and assign defaults.
$headline         = get_field( 'headline' );
$description      = get_field( 'description' );
$links            = get_field( 'links' );
$cta              = get_field( 'cta' );
$text_color       = get_field( 'text_color' ); // ACF's color picker.
$background_color = get_field( 'background_color' ); // ACF's color picker.
$image            = get_field( 'image' ); // ACF's imagepicker.

$style = get_field( 'gift_card_style' );

if($style == 'holiday'){
  include_once('style-holiday.php');
} else {
  include_once('style-default.php');
}
