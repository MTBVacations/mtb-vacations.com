<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Zemplate
 * @since Zemplate 3.0
 */

get_header('destination'); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
    <section class="main-torso">
        <!-- <div class="single-torso__inside"> -->
        <div class="destination__details">
        <?php if(have_rows('image_slider')): ?>
            <div class="destination__slider">
                <div class="flexslider">
                    <ul class="slides">
                        <?php while(have_rows('image_slider')) : the_row(); ?>
                            <?php 
                                $img = get_sub_field('image'); 
                                $img = $img['url'];
                            ?>
                            <li class="hero__image"><img src="<?php echo $img; ?>" alt=""></li>
                        <?php endwhile; ?>
                    </ul>
                </div>
            </div>
        <?php endif; ?>
            <div class="details__inner">
                <h2><?php the_title(); ?></h2>
                <div class="destination__desc">
                    <?php the_field('destination_description'); ?>
                </div>
            </div>
        </div>
        <!-- <?php if(have_rows('destination_facts')): ?>
            <div class="destination__facts">
                <?php while(have_rows('destination_facts')): the_row(); ?>
                   
                    <div class="destination__fact">
                        <?php  
                            $iconImage = get_sub_field('icon');
                            // $iconImage = $iconImage['url'];
                            $file_parts = pathinfo($iconImage);
                            $file_ext = $file_parts['extension'];
                        ?>
                        <div class="fact__icon">
                            <?php if($file_ext == 'svg'): ?>
                                <img class="js-ajax-replace" src="<?php echo $iconImage; ?>"/>
                            <?php else: ?>
                                <img src="<?php echo $iconImage; ?>" alt="" />
                            <?php endif; ?>
                        </div>
                        <div class="fact__text"><?php the_sub_field('fact'); ?></div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?> -->
            <article class="single-torso__content">
                <h1 class="hide"><?php the_title(); ?></h1>

                <?php $tabImg = get_field('tab_background'); $tabImg = $tabImg['url']; ?>
                <section class="page__group destination__content">
                    <div class="content__inside">
                        <div class="tabs">
                            <nav role="navigation" class="transformer-tabs--block">
                                <ul>
                                    <?php if(have_rows('legend_entries', 532)): ?>
                                        <?php $tabCnt=1; while(have_rows('legend_entries', 532)): the_row(); ?>
                                            <?php $backImg = get_sub_field('image'); $img = $backImg['sizes']['thumbnail']; ?>
                                            <?php  if($tabCnt == 1){ $active = 'active'; } else { $active = ''; } ?>
                                            <li style="background-image:url('<?php echo $img; ?>');" class="<?php echo $active; ?>">
                                                <?php  
                                                    $iconImage = get_sub_field('icon');
                                                    $iconImage = $iconImage['url'];
                                                    $file_parts = pathinfo($iconImage);
                                                    $file_ext = $file_parts['extension'];
                                                ?>
                                                <?php 
                                                    $title = get_sub_field('title'); 
                                                    $title = strtolower($title); 
                                                    $title = str_replace('&', '', $title);
                                                    $title = str_replace(' ', '-', $title);
                                                ?>
                                                <a href="#<?php echo $title; ?>">
                                                    <?php if($file_ext == 'svg'): ?>
                                                        <img class="js-ajax-replace" src="<?php echo $iconImage; ?>" />
                                                    <?php else: ?>
                                                        <img src="<?php echo $iconImage; ?>" alt="" />
                                                    <?php endif; ?>
                                                    <h6 class="heading--light"><?php the_sub_field('title'); ?></h6>
                                                </a>
                                            </li>
                                        <?php $tabCnt++; endwhile; ?>
                                    <?php endif; ?>
                                </ul>
                            </nav>

                            <?php if(have_rows('legend_entries', 532)): ?>
                                <?php $entryCnt=1; while(have_rows('legend_entries', 532)): the_row(); ?>
                                    <?php 
                                        $title = get_sub_field('title'); 
                                        $title = strtolower($title); 
                                        $title = str_replace('&', '', $title);
                                        $title = str_replace(' ', '-', $title);
                                        $active = ''; 
                                    ?>
                                    <?php  if($entryCnt == 1){ $active = 'active'; } ?>
                                    <!-- <div id="<?php echo $title; ?>" class="tab-content <?php echo $active; ?>" style="visibility:hidden;"> -->
                                    <div id="<?php echo $title; ?>" class="tab-content <?php echo $active; ?>">
                                        <div class="tab-content__inner">
                                            <?php 
                                            include( locate_template( 'templates/parts/part-destination-tab.php' ) );
                                            // include($url); ?>
                                            <?php //echo get_template_part('templates/parts/part', $title); ?>
                                        </div>
                                    </div>
                                <?php $entryCnt++; endwhile; ?>
                            <?php endif; ?>
                        </div>
                    </div>

                </section>

            <?php
                // call/set up the scripts
                wp_enqueue_script('gmap');
                wp_enqueue_script('map');
                $urls = array('image' => get_template_directory_uri().'/images/global/');
                wp_localize_script('scripts', 'urls', $urls);
            ?>
            <?php if(have_rows('destination_map')): ?>
                <article class="page__group destination__map">
                    <?php while(have_rows('destination_map')): the_row(); 
                        $location = get_sub_field('location');
                        $marker = get_sub_field('marker_info');
                        $marker_type = get_sub_field('marker_pin_type');
                    ?>
                        <div class="marker" data-icon="<?php echo $marker_type; ?>" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>" style="display: none;">
                            <?php echo $marker; ?>
                        </div> <!-- // marker -->
                    <?php endwhile; ?>
                </article>

                <?php if(have_rows('legend_entries', 532)): ?>
                    <div class="map__legend">
                        <?php while(have_rows('legend_entries', 532)): the_row(); ?>
                            <div class="legend__entry">
                                <?php
                                    $iconImage = get_sub_field('icon', 532);
                                    $iconImage = $iconImage['url'];
                                    $file_parts = pathinfo($iconImage);
                                    $file_ext = $file_parts['extension'];
                                    
                                    if($file_ext == 'svg'): ?>
                                        <img class="js-ajax-replace" src="<?php echo $iconImage; ?>"/>
                                    <?php else: ?>
                                        <img src="<?php echo $iconImage; ?>" alt="" />
                                    <?php endif; ?>
                                    
                                    <h6><?php the_sub_field('title', 532); ?></h6>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>

            <?php endif; ?>

            </article> <!-- //single-torso__content -->


            <!-- <article class="post__comments"> -->
                <?php //if(!is_attachment()): ?>
                    <?php //comments_template( '', true ); ?>
                <?php //endif; ?>
            <!-- </article> -->

        <!-- </div> //single-torso__inner -->
    </section><!-- // single-torso -->
<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>