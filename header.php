<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package NappyDanny
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'nappydanny' ); ?></a>

        <div class="header-site">
            
	<header id="masthead" class="site-header" role="banner">
            
            <div align="center"><div class="site-branding-mobile"><?php the_custom_logo(); ?></div></div>
            
            
		<nav id="site-navigation" class="main-navigation" role="navigation">
                    
                    
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( '&#9776;', 'nappydanny' ); ?></button>
                        <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
                        
                        <div class="site-branding"><?php the_custom_logo(); ?></div>

		</nav><!-- #site-navigation -->
            
                            <div class="social-media-widget"> <?php my_social_media_icons(); ?> </div>
                        
	</header><!-- #masthead -->
        </div>

	<div id="content" class="home-content">
