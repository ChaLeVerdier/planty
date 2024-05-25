    Documentation pour mon theme :
    https://wpastra.com/docs/

    A expliquer :

    PAGE ACCUEIL :
    Pour l'image Hero de la page d'accueil : pour tester le comportement des différents éléments : j'ai appliqué une bordure de couleur différente à chacun.


    En travaillant dans header.php, le comportement de mes pages a changé. après quelques tests de style et de revision de mon code. J'ai finalement été rechercher un de mes commit et mon site est revenu à la normal.

    Pour le logo : plusieurs testes effectués : d'abord en passant par le theme en statique : <img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/images/logo.png' ); ?>" alt="logo du site"> </a>.         Mais difficile à changer pour un non initié.
    Donc choix de l'intégrer directement depuis le back office via personnaliser.

\*\*\* REVOIR les elementS de la fin DU FICHIER header.php REF chatGPT : https://chatgpt.com/c/
949cb3d8-0a40-4e19-8409-6aac5e2252b3

\*\*\*\*\*\***\* LOGO \*\***\*\*\*\*\*\*\*
----------- Logo - TEST 1 : --------------

Création d'un fichier logo-custom.php avec chemin du logo + le style

<div class="logo">
    <?php if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) : ?>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php the_custom_logo(); ?></a>
    <?php else : ?>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
            <img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/images/logo.png' ); ?>" alt="logo du site">
        </a>
    <?php endif; ?>
</div>

<style>
/* Styles pour le logo */
.logo a img {
    }
/* Styles pour le lien du logo */
.logo a {
   }
</style>

et intégration de ce code dans le fichier header-custom :

<?php get_template_part( 'logo-custom' ); ?>

                                    ----------- Logo - TEST 2 : --------------

Dans header-custom.php intégration du code pour le logo et changement du style dans theme.css

<header id="header-personnalise" class="site-header" role="banner">
    <div class="logo">     
    <?php if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) : ?>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php the_custom_logo(); ?></a>
       <?php else : ?>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
            <!-- J'intègre l'image du logo ici -->
        <img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/images/logo.png' ); ?>" alt="logo du site">
        </a>
    <?php endif; ?>
</div>

et intégration du chemin vers le logo dans header.php

<!-- Inclure le fichier CSS pour le style du thème -->

    <link rel="stylesheet" href="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/css/theme.css">

Intégration du logo dans le back office : Code dans le theme ci-dessous (mauvaise pratique)

<div class="logo">  
 <?php if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) : ?>
<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php the_custom_logo(); ?></a>
<?php else : ?>
<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
<!-- J'intègre l'image du logo ici -->
<img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/images/logo.png' ); ?>" alt="logo du site">
</a>
<!-- Récup du logo dynamiquement dans le backoffice (bonne pratique), et si non le récuérer dans les assets (statique) mais mauvaise methode -->
<?php endif; ?>

</div>

FICHIER FUNCTION.php

function add_admin_link_to_menu( $items, $args ) {
// Vérifier si l'utilisateur est connecté et a le rôle d'administrateur
if ( is_user_logged_in() && current_user_can( 'administrator' ) && $args->theme_location == 'main_menu' ){
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
