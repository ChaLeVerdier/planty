<?php

/**
 * Enqueue child styles.
 */
function child_theme_enqueue_styles()
{
    //chargement du thème parent
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css'); 
    //chargement du thème enfant
    wp_enqueue_style('child-theme', get_stylesheet_directory_uri() . '/style.css', array(), 1);
}

add_action('wp_enqueue_scripts', 'child_theme_enqueue_styles');
