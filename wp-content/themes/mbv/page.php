<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the wordpress construct of pages
 * and that other 'pages' on your wordpress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Zemplate
 * @since Zemplate 3.0
 */

get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

    <section class="main-torso page-torso">
    	<?php if(is_page('2')): ?>
    		<div class="banner-ad">
    			<a href="https://nm220.isrefer.com/go/sacredrides/mtbvacations" target="_blank" class="show-desktop"><img src="http://www.sacredrides.com/sites/default/files/u188401/tripofalifetime.970x90.jpg" border="0"></a>
    			<a href="https://nm220.isrefer.com/go/sacredrides/mtbvacations" target="_blank" class="show-tablet"><img src="http://www.sacredrides.com/sites/default/files/u188401/TripofaLifetime.728x90.jpg" border="0"></a>
    			<a href="https://nm220.isrefer.com/go/sacredrides/mtbvacations" target="_blank" class="show-mobile"><img src="http://www.sacredrides.com/sites/default/files/u188401/tripofalifetime.300x250.jpg" border="0"></a>
    		</div>
    	<?php endif; ?>
        <h1 class="hide"><?php the_title(); ?></h1>
        <?php if(get_field('content')) : ?>
            <?php while(has_sub_field('content')): ?>
                <?php echo get_template_part('templates/parts/page', get_row_layout()); ?>
            <?php endwhile; ?>
        <?php endif; ?>
    </section>

<?php endwhile; ?>

<?php get_footer(); ?>