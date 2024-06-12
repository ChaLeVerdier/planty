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
    wp_enqueue_style('child-style', get_stylesheet_directory_uri() . '/style.css', array('parent-style'), '1.0', 'all');
    wp_enqueue_style('child-theme', get_stylesheet_directory_uri() . '/css/theme.css', array('parent-style'), '1.0','all'); 
}

add_action('wp_enqueue_scripts', 'child_theme_enqueue_styles');

function add_admin_link_to_menu( $items, $args ) {
       // Vérifier si l'utilisateur est connecté et a le rôle d'administrateur
       if ( is_user_logged_in() && current_user_can( 'administrator' )  && $args->theme_location == 'main_menu' ){
           $items .= '<li><a href="' . admin_url() . '">Admin</a></li>';
       }
       return $items;
}
add_filter( 'wp_nav_menu_items', 'add_admin_link_to_menu', 10, 2 );
function list_all_hooks_function() {
   ob_start();
   global $wp_filter;
   $hooks = $wp_filter;

   foreach ($hooks as $tag => $hook) {
       echo "<pre>";
       echo "Hook: $tag <br />";
       var_dump($hook);
       echo "</pre>";
   }

   return ob_get_clean();
}

// Shortcode pour afficher la liste des hooks
function list_all_hooks_shortcode() {
   return list_all_hooks_function();
}
add_shortcode('list_all_hooks', 'list_all_hooks_shortcode');


// Fonction pour lister les hooks du thème actif
function list_theme_hooks_function() {
   ob_start();
   global $wp_filter;

   // Récupérer le nom du thème actif
   $active_theme = wp_get_theme()->get('TextDomain');

   // Vérifier les hooks du thème actif
   foreach ($wp_filter as $tag => $hook) {
       // Vérifier si le hook appartient au thème actif
       if (strpos($tag, $active_theme) !== false) {
           echo "<pre>";
           echo "Hook: $tag <br />";
           var_dump($hook);
           echo "</pre>";
       }
   }

   return ob_get_clean();
}

// Shortcode pour afficher les hooks du thème actif

function list_theme_hooks_shortcode() {
   return list_theme_hooks_function();
}
add_shortcode('list_theme_hooks', 'list_theme_hooks_shortcode');



