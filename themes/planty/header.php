<?php
/**
 * The header for Astra Theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?>

<!-- *** HEAD *** -->
<!DOCTYPE html>
<html class="<?php echo esc_attr( astra_html_before() ); ?>" <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	
	
	<?php wp_head(); ?>
<!-- wp_head def à aller voir -->
</head>



<!-- *** BODY *** -->


	<body <?php astra_schema_body(); ?> <?php body_class(); ?>>
	<?php astra_body_top(); ?>
	<?php wp_body_open(); ?>


<a
	class="skip-link screen-reader-text"
	href="#content"
	role="link"
	title="<?php echo esc_attr( astra_default_strings( 'string-header-skip-link', false ) ); ?>">
		<?php echo esc_html( astra_default_strings( 'string-header-skip-link', false ) ); ?>
</a>

<div
<?php
	echo astra_attr(
		'site',
		array(
			'id'    => 'page',
			'class' => 'hfeed site',
		)
	);
	?>
>
	<?php // ici est le HEADER 
	astra_header_before();
	
	
	get_template_part('header-custom'); // Création d'un fichier header-custom.php à la racine qui recevra le code de notre header personnalisé
	
	astra_header_after();
	
	astra_content_before();
	?>

	<div id="content" class="site-content">
		<div class="ast-container">
		<?php astra_content_top(); ?>

	