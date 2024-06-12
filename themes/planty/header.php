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

<!DOCTYPE html>
<html class="<?php echo esc_attr( astra_html_before() ); ?>" 
<?php language_attributes(); ?>>

		<!-- *** HEAD *** -->
<head>
	<?php astra_head_top(); ?>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php 
if ( apply_filters( 'astra_header_profile_gmpg_link', true ) ) {
	?>
	 <link rel="profile" href="https://gmpg.org/xfn/11"> 
	 <?php
	} 
	?>
	<?php wp_head(); ?>
	<?php astra_head_bottom(); ?>
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
		<!-- *** HEADER *** --> 
	<?php  
	astra_header_before();
	//astra_header();
	//Charger le template personnalisé
	//include( get_stylesheet_directory() . '/header-custom.php' );
	get_template_part('header-custom'); // Création d'un fichier header-custom.php à la racine qui recevra le code de notre header personnalisé
	astra_header_after();
	astra_content_before();
	?>

	<div id="content" class="site-content">
		<div class="ast-container">
		<?php astra_content_top(); ?>

	