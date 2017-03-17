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


<div class="wrap-all-the-things">
    <?php
        $heroSize = get_field('small_hero');
        $addClass = '';
        if($heroSize){
            $addClass = ' main-head--short';
        }

        if(is_single() && get_field('youtube_video_id') != '') {
            $addClass = ' main-head--tips-gear';
        }
    ?>
    <header class="main-head<?php echo $addClass; ?>">
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
        <?php if(is_page('2')): if(have_rows('hero_slides')): ?>
            <div class="hero home__slider">
                <div class="flexslider">
                    <ul class="slides">
                        <?php while(have_rows('hero_slides')) : the_row(); ?>
                            <?php 
                                $txtColor = get_sub_field('large_text_color');
                                $txtColor = 'txt--'.$txtColor;
                                $img = get_sub_field('image'); 
                                $img = $img['url'];
                            ?>
                            <li class="hero__image" style="background-image:url('<?php echo $img; ?>');">
                                <div class="hero-content__wrapper">
                                    <div class="hero-content">
                                        <div class="content__sub-title"><?php the_sub_field('small_text'); ?></div>
                                        <div class="content__title <?php echo $txtColor; ?>">
                                            <?php the_sub_field('large_text'); ?>
                                        </div>
                                        <?php if(get_sub_field('link_text')): ?>
                                            <?php 
                                                $link = get_sub_field('links_to'); 
                                                $linkId = $link->ID;
                                                $link = get_permalink($linkId); 
                                            ?>
                                            <div class="content__link">
                                                <a class="link--background" href="<?php echo $link; ?>"><?php the_sub_field('link_text'); ?></a>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                </div>
            </div>
        <?php endif; else: ?>
            <?php $id = get_the_ID();

                if(is_home()){
                    $pageId = '534';
                    $img    = get_field('hero_image', $pageId); 
                    $img    = $img['url']; 
                } elseif(is_404() || is_archive()){
                    $pageId = '990';
                    $img    = get_field('hero_image', $pageId); 
                    $img    = $img['url']; 
                } elseif(is_single()){
                    if(get_field('youtube_video_id') != '') {
                        $img = "";
                    } else {
                        $img = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' );
                        $img = $img[0];
                    }
                } else {
                    $pageId = $id;
                    $img    = get_field('hero_image', $pageId); 
                    $img    = $img['url']; 
                }
            ?>
            <?php 
                $txtColor = ' title--'.get_field('large_text_color', $pageId);
            ?>

            <?php if(is_single() && get_field('youtube_video_id') != ''): ?>
                <div class="hero hero--youtube">
                    <iframe src="http://www.youtube.com/embed/<?php echo get_field('youtube_video_id'); ?>?rel=0&hd=1&modestbranding=1&showinfo=0" frameborder="0" allowfullscreen style="position: absolute; top: 0; left: 0; width: 100%; height: 100%"></iframe>
                </div>
            <?php else: ?>
                <div class="hero">
                    <div class="hero__image" style="background-image:url('<?php echo $img; ?>');">
                        <div class="hero-content__wrapper">
                            <div class="hero-content">
                                <div class="content__sub-title"><?php the_field('small_text', $pageId); ?></div>
                                <div class="content__title<?php echo $txtColor; ?>">
                                    <?php the_field('large_text', $pageId); ?>
                                </div>
                                <?php if(get_field('link_text')): ?>
                                    <?php 
                                        $link = get_field('links_to'); 
                                        $linkId = $link->ID;
                                        $link = get_permalink($linkId); 
                                    ?>
                                    <div class="content__link">
                                        <a class="link--background" href="<?php echo $link; ?>"><?php the_field('link_text', $pageId); ?></a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endif; ?>
        <?php // Include All the Things ?>
        <?php //echo do_shortcode('[pagelist id="9" fixed="right-bottom"]'); ?>
    </header> <!-- //main-head -->