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
        <?php $columnCnt = 1; ?>
        <?php while(have_rows('sponsors', 534)): the_row();?>
            <?php $img = get_sub_field('ad', 534); $img = $img['url']; ?>
            <li>
                <?php if($img != ''): ?>
                    <?php if(get_sub_field('is_affiliate_link')): ?>
                        <a target="_blank" href="<?php the_sub_field('affiliate_link'); ?>">
                            <img src="<?php echo $img; ?>" alt="" />
                        </a>
                    <?php else: ?>
                        <img src="<?php echo $img; ?>" alt="" />
                    <?php endif; ?>
                <?php else: ?>
                    <?php switch ($columnCnt) {
                        case 2:
                            # Second Ad
                            ?>
                            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                            <!-- Tips & Gear - Second Space -->
                            <ins class="adsbygoogle"
                                 style="display:block"
                                 data-ad-client="ca-pub-9928579909487332"
                                 data-ad-slot="2648990604"
                                 data-ad-format="auto"></ins>
                            <script>
                            (adsbygoogle = window.adsbygoogle || []).push({});
                            </script>
                            <?php
                            break;
                        case 3: 
                            # Third Ad
                            ?>
                            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                            <!-- Tips & Gear - Third Space -->
                            <ins class="adsbygoogle"
                                 style="display:block"
                                 data-ad-client="ca-pub-9928579909487332"
                                 data-ad-slot="5602457007"
                                 data-ad-format="auto"></ins>
                            <script>
                            (adsbygoogle = window.adsbygoogle || []).push({});
                            </script>
                            <?php
                            break;
                        default:
                            # First Ad
                            ?>
                            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                            <!-- Tips & Gear - First Space -->
                            <ins class="adsbygoogle"
                                 style="display:block"
                                 data-ad-client="ca-pub-9928579909487332"
                                 data-ad-slot="1172257405"
                                 data-ad-format="auto"></ins>
                            <script>
                            (adsbygoogle = window.adsbygoogle || []).push({});
                            </script>
                            <?php
                            break;
                    } ?>
                <?php endif; ?>
            </li>
            <?php $columnCnt++; ?>
        <?php endwhile; ?>
    <?php endif; ?>
</ul>