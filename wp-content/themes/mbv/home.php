<?php
/**
 * The template for displaying category archive pages.
 *
 * @package WordPress
 * @subpackage Zemplate
 * @since Zemplate 3.0
 */

get_header(); ?>

<section class="main-torso cat-torso--sidebar">
    <div class="cat-torso__inner">
        <article class="cat-torso__content">
            <h1><?php echo single_cat_title('', false); ?></h1>
            <?php
                while (have_posts()) : the_post();
                    get_template_part('templates/parts/blog', 'excerpt');
                endwhile;
            ?>

            <?php if(get_next_posts_link() || get_previous_posts_link()): ?>
                <div class="navigation">
                    <div class="nav-previous alignleft"><?php next_posts_link( '&#10094; Older posts' ); ?></div>
                    <div class="nav-next alignright"><?php previous_posts_link( 'Newer posts &#10095;' ); ?></div>
                </div>
            <?php endif; ?>
            
        </article><!-- //cat-torso__content -->
        <aside class="cat-torso__sidebar">
            <?php get_sidebar(); ?>
        </aside><!-- //cat-torso__sidebar -->
    </div><!-- //cat-torso__inner -->
</section><!-- //cat-torso -->

<?php get_footer(); ?>