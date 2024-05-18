<?php
/**
 * Je crée un header-custom.php pour plus de clartés et fonctionnalités.
*/
?>

<header id="header-custom" class="site-header">

    <div class="logo">     
    <?php if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) : ?>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php the_custom_logo(); ?></a>
       <?php else : ?>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
        <img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/images/logo.png' ); ?>" alt="logo du site">
        </a>
        <!-- Récup du logo dynamiquement dans le backoffice (bonne pratique), et si non le récuérer dans les assets (statique) mais mauvaise methode -->
    <?php endif; ?>
</div>


    <?php
    //mon menu principal - Condition si ... tu m'affiches le menu grâce à  wp_nav_menu - 
    // voir support pour sécurisation du menu. ressource
     if ( has_nav_menu( 'primary' ) ) {
            wp_nav_menu( array(
                'theme_location' => 'primary', 
                'menu_id'        => 'site-navigation',
                'menu_class'     => 'main-nav',
                'container'       => 'nav',
                'container_class' => 'main-nav desktop-menu',
                'container_role' => 'navigation', // Ajouter l'attribut role="navigation"
                'items_wrap'     => '<ul class="nav-list">%3$s</ul>'
            ) );
        }
    ?>
      
 <?php
    //mon menu mobile
     if ( has_nav_menu( 'mobile_menu' ) ) {
            wp_nav_menu( array(
                'theme_location' => 'mobile_menu',
                'menu_id'        => 'site-navigation',
                'menu_class'     => 'main-nav',
                'container'       => 'nav',
                'container_class' => 'main-nav mobile-menu',
                'container_role' => 'navigation', // Ajouter l'attribut role="navigation"
                'items_wrap'     => '<ul class="nav-list">%3$s</ul>',
                'menu_class'     => 'menu',
                'fallback_cb'      => false,
            ) );
        }

    ?>

    
</header>
