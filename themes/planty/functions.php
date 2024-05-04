<?php

// Action qui permet de charger des scripts dans notre thème
add_action('wp_enqueue_scripts', 'theme_enqueue_styles');
function child_theme_enqueue_styles() {        wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css', false, '1.0', 'all');        wp_enqueue_style('main-css', get_stylesheet_directory_uri() . '/style.css', array('parent-style'), '1.0', 'all');}
add_action('wp_enqueue_scripts','child_theme_enqueue_styles');



