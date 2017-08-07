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
    
    <?php get_template_part('templates/parts/header', 'tag-manager'); ?>
    <?php get_template_part('templates/parts/header', 'doubleclick'); ?>

    <meta name="google-site-verification" content="l2JMjT5BFWDwFFYD7uQn7UmeyDBKxz4ro7OJVjv6gyw" />
</head>

<body <?php body_class('page-'.$post->post_name); ?>>

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-T6JWM69"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<div class="wrap-all-the-things page__destination">
    <header class="main-head">
        <div class="main-head__wrap">
            <a href="<?php echo site_url('/'); ?>" class="logo">
                <img src="<?php bloginfo('template_url'); ?>/images/general-png/logo.png" alt="Home page link: MBV logo">
            </a>
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
        </div> <!-- //__inner -->
      </div>
        <?php //echo do_shortcode('[pagelist id="9" fixed="right-bottom"]'); ?>
    </header> <!-- //main-head -->