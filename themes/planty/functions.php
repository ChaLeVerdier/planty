<?php

/**
 * Enqueue child styles.
 */
// function child_theme_support()
// {
//     wp_nav_menu('header', 'Primary Menu');
//     wp_nav_menu('footer', 'Footer Menu');
// }

function child_theme_enqueue_styles()
{
    //chargement du thème parent
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css'); 
    //chargement du thème enfant
    wp_enqueue_style('child-theme', get_stylesheet_directory_uri() . '/css/theme.css', array(), 1);
}

add_action('wp_enqueue_scripts', 'child_theme_enqueue_styles');
