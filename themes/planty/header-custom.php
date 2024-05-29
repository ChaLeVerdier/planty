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
    <?php endif; ?>
</div>

    <?php 
    // wp_nav_menu : j'intégre mon menu principal "primery" ici grâce à wp_nav_menu
    // avec une condition pour la sécurisation.
    
     if ( has_nav_menu( 'primary' ) ) {
            wp_nav_menu( array( // tableau d'options
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

<!-- <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" aria-disabled="true">Disabled</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav> -->