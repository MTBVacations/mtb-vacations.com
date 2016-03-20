<?php
/**
 * The template for displaying the sidebar.
 *
 * @package WordPress
 * @subpackage Zemplate
 * @since Zemplate 2.0
 */
?>

<ul>
    <li>
        <h3><?php echo 'Archives'; ?></h3>
        <ul>
            <?php wp_get_archives('type=monthly'); ?>
        </ul>
    </li>
    
    <?php if(have_rows('sponsors', 534)): ?>
        <?php while(have_rows('sponsors', 534)): the_row();?>
            <?php $img = get_sub_field('ad', 534); $img = $img['url']; ?>
            <li>
                <?php if(get_sub_field('is_affiliate_link')): ?>
                    <a target="_blank" href="<?php the_sub_field('affiliate_link'); ?>">
                        <img src="<?php echo $img; ?>" alt="" />
                    </a>
                <?php else: ?>
                    <img src="<?php echo $img; ?>" alt="" />
                <?php endif; ?>
            </li>
        <?php endwhile; ?>
    <?php endif; ?>
</ul>