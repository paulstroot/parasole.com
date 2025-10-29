<!doctype html>

<html lang="en-US">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

    <title><?php the_title(); ?></title>

    <?php // mobile meta (hooray!) ?>
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    <link rel="Shortcut Icon" href="<?php bloginfo('template_directory'); ?>/favicon.ico" />
    <script type="text/javascript" src="//use.typekit.com/ctb1jvz.js"></script>

    <?php wp_head(); ?>

</head>