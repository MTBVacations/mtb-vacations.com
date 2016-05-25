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
    
    <?php //get_template_part('templates/parts/header', 'analytics'); ?>
</head>

<body <?php body_class('page-'.$post->post_name); ?>>


<div class="wrap-all-the-things adf">
    <header class="main-head">
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
        <div class="hero">
            <?php 
                $pageId = '532';
                $txtColor = ' title--'.get_field('large_text_color', $pageId);
                $img = get_field('hero_image', $pageId); 
                $img = $img['url']; 
            ?>
            <div class="hero__image" style="background-image:url('<?php echo $img; ?>');">
                <div class="hero-content__wrapper">
                    <div class="hero-content">
                        <div class="content__sub-title"><?php the_field('small_text', $pageId); ?></div>
                        <div class="content__title<?php echo $txtColor; ?>">
                            <?php the_field('large_text', $pageId); ?>
                        </div>
                        <?php if(get_field('link_text')): ?>
                            <div class="content__link">
                                <a class="link--background" href="<?php  ?>"><?php the_field('link_text', $pageId); ?></a>
                            </div>
                        <?php endif; ?>
                        <div class="hero__search">
                            <?php $destinations = new WP_Query('post_type=destination&orderby=title&order=asc');
                            if ($destinations->have_posts()): ?>
                                <div class="search__select">
                                    <select id="search-select">
                                        <option value="">Destinations</option>
                                        <?php while ($destinations->have_posts()): $destinations->the_post(); ?>
                                            <option value="<?php the_permalink(); ?>"><?php the_title(); ?></option>
                                        <?php endwhile; ?>
                                    </select>
                                    <a href="" id="search-select__submit">Search</a>
                                </div>
                            <?php endif; wp_reset_query();?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php //echo do_shortcode('[pagelist id="9" fixed="right-bottom"]'); ?>
    </header> <!-- //main-head -->