<?php
/**
 * The template for displaying archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Zemplate
 * @since Zemplate 3.0
 */

get_header('destination-list'); ?>


<section class="main-torso">
    <h1 class="hide">Destination List</h1>
    <article class="page__group destination-list featured-destinations">
        <?php $posts = get_field('featured_destinations', 532);
            if($posts): ?>
            <div class="column__inside">
                <?php foreach($posts as $post): ?>
                    <?php setup_postdata($post); 
                        $postId = $post->ID;
                        $backImg = wp_get_attachment_image_src( get_post_thumbnail_id( $postId ), 'large' );
                        $backImg = $backImg[0];
                    ?>
                        <div class="column__group" style="background-image:url('<?php echo $backImg; ?>');">
                            <div class="column__group-content">
                                <div class="column__group-text">
                                    <h4>Featured Location:</h4>
                                    <h2 class="heading--left-space"><a href="<?php the_permalink(); ?>" class="link--title txt--box-shadow"><?php the_title(); ?></a></h2>
                                </div>

                                <div class="column__overlay">
                                    <?php 

                                        $desc       = get_field('description_excerpt', $post->ID); 
                                        $desc       = substr($desc, 0, 240);
                                        $lastSpace  = strrpos($desc, ' ');
                                        $desc       = substr($desc, 0, $lastSpace);
                                        $desc       .= '...';

                                        $perm = get_the_permalink($postId);
                                    ?>

                                    <?php echo $desc; ?>
                                    <a href="<?php echo $perm; ?>" class="btn">Visit Destination &gt;</a>
                                </div>
                            </div>
                        </div>
                <?php endforeach; ?>
                <?php wp_reset_postdata();?>
            </div>
        <?php endif; ?>
    </article>
    <article class="page__group destination-list">
        <div class="column__inside destination__wrapper">
            <?php  $query = new WP_Query('post_type=destination&orderby=title&order=asc&limit=20'); if($query->have_posts()): ?>
                <?php
                    while ($query->have_posts()) : $query->the_post();
                        get_template_part('templates/parts/blog', 'excerpt_destination');
                    endwhile;
                ?>
            <?php endif; ?>
        </div>
    </article>
</section><!-- //dest-torso -->

<?php get_footer(); ?>