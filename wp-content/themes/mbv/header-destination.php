    <?php
/**
 * The header for our theme.
 *
 *
 * @package WordPress
 * @subpackage Zemplate
 * @since Zemplate 2.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <title><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

    <!--[if lte IE 9]>
        <link rel="stylesheet" href="<?php echo bloginfo('template_url'); ?>/ie.css" />
    <![endif]-->

    <?php wp_head(); //mandatory ?>
    
    <?php get_template_part('templates/parts/header', 'analytics'); ?>
    <?php get_template_part('templates/parts/header', 'doubleclick'); ?>
</head>

<body <?php body_class('page-'.$post->post_name); ?>>


<div class="wrap-all-the-things page__destination">
    <header class="main-head">
        <div class="main-head__wrap">
            <div class="main-head__logos">
                <a href="<?php echo site_url('/'); ?>" class="logo">
                    <img src="<?php bloginfo('template_url'); ?>/images/general-png/logo.png" alt="Home page link: MBV logo">
                </a>
                <div class="yeti-logo">
                  <span>Powered by</span>
                  <a href="http://www.yeticycles.com/" target="_blank"><img src="<?php bloginfo('template_url'); ?>/images/general-png/yeti.png" alt="Yeti Bikes link: Yeti Bikes logo"></a>
              </div>
            </div>
            <div class="main-head__nav">
                <span id="nav-toggle" class="nav-toggle"><span><em>Menu</em></span></span>
                <?php
                    $attr = array(
                        'theme_location'  => 'head-menu',
                        'container'       => 'nav',
                        'container_class' => 'head-nav',
                        'menu_class'      => 'menu'
                    );
                    wp_nav_menu($attr);
                ?>
            </div> 
      </div> <!-- //__inner -->
        <?php //echo do_shortcode('[pagelist id="9" fixed="right-bottom"]'); ?>
    </header> <!-- //main-head -->