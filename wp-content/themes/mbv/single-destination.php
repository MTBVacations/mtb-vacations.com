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
        <div class="destination__details">
            <div class="details__inner">
                <h2><?php the_title(); ?></h2>
                <div class="destination__desc">
                    <?php the_field('destination_description'); ?>
                </div>
            </div>
        </div>
        <?php if(have_rows('destination_facts')): ?>
            <div class="destination__facts">
                <?php while(have_rows('destination_facts')): the_row(); ?>
                   
                    <div class="destination__fact">
                        <?php  
                            $iconImage = get_sub_field('icon');
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
        <?php endif; ?>

        <article class="single-torso__content">
            <h1 class="hide"><?php the_title(); ?></h1>

            <?php $tabImg = get_field('tab_background'); $tabImg = $tabImg['url']; ?>
            <section class="page__group destination__content">
                <div class="content__inside">
                    <div class="tabs">
                        <nav role="navigation" class="transformer-tabs--block">
                            <ul class="tabs__nav">
                                <?php if(have_rows('legend_entries', 532)): ?>
                                    <?php $tabCnt=1; while(have_rows('legend_entries', 532)): the_row(); ?>
                                        <?php $backImg = get_sub_field('image'); $img = $backImg['sizes']['thumbnail']; ?>
                                        <?php  if($tabCnt == 1){ $active = 'active'; } else { $active = ''; } ?>
                                        <li data-index="tab-<?php echo $tabCnt; ?>" style="background-image:url('<?php echo $img; ?>');" class="<?php echo $active; ?>">
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

                                            <?php if($file_ext == 'svg'): ?>
                                                <img class="js-ajax-replace" src="<?php echo $iconImage; ?>" />
                                            <?php else: ?>
                                                <img src="<?php echo $iconImage; ?>" alt="" />
                                            <?php endif; ?>
                                            <h6 class="heading--light"><?php the_sub_field('title'); ?></h6>
                                        </li>
                                    <?php $tabCnt++; endwhile; ?>
                                <?php endif; ?>
                            </ul>
                        </nav>

                        <?php if(have_rows('legend_entries', 532)): ?>
                            <?php $entryCnt=1; while(have_rows('legend_entries', 532)): the_row(); ?>
                                <?php 
                                    // Set title for use within individual tabs to pull appropriate information
                                    $title = get_sub_field('title'); 
                                    $title = strtolower($title); 
                                    $title = str_replace('&', '', $title);
                                    $title = str_replace(' ', '-', $title);
                                    $active = ''; 
                                ?>
                                <?php  if($entryCnt == 1){ $active = 'active'; } ?>
                                <h3 class="tab-heading <?php echo $active; ?>" data-index="tab-<?php echo $entryCnt; ?>"><?php echo get_sub_field('title'); ?></h3>
                                <div id="tab-<?php echo $entryCnt; ?>" class="tab-content <?php echo $active; ?>">
                                    <div class="tab-content__inner">
                                        <?php include( locate_template( 'templates/parts/part-destination-tab.php' ) ); ?>
                                    </div>
                                </div>
                            <?php $entryCnt++; endwhile; ?>
                        <?php endif; ?>
                    </div>
                </div>

            </section>

        </article> <!-- //single-torso__content -->

    </section><!-- // single-torso -->
<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>