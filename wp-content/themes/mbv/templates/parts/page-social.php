<?php 
        $excerpt = strip_tags(get_the_excerpt());
        $post_thumbnail_id = get_post_thumbnail_id($post->ID);
        $post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id );

    ?>
<div class="social__buttons">
    <ul>
        <li class="facebook">
            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank">
                <svg><use xlink:href="<?php bloginfo('template_url'); ?>/images/general-sprite/symbol/svg/sprite.symbol.svg#facebook"></use></svg><span class="text">facebook</span>
            </a>
        </li>
        <li class="twitter">
            <a href="http://twitter.com/home?status=<?php the_title(); ?> <?php the_permalink(); ?> via @mtbvacations" target="_blank">
                <svg><use xlink:href="<?php bloginfo('template_url'); ?>/images/general-sprite/symbol/svg/sprite.symbol.svg#twitter"></use></svg><span class="text">twitter</span>
            </a>
        </li>
        <li class="pinterest">
            <a href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&amp;media=<?php echo $post_thumbnail_url; ?>&amp;description=<?php echo $excerpt; ?>" target="_blank">
                <svg><use xlink:href="<?php bloginfo('template_url'); ?>/images/general-sprite/symbol/svg/sprite.symbol.svg#pinterest"></use></svg><span class="text">pinterest</span>
            </a>
        </li>
    </ul>
</div>