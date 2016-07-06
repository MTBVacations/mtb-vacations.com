<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the wrap div and all content
 *
 * @package WordPress
 * @subpackage Zemplate
 * @since Zemplate 1.0
 */
?>

    <footer class="main-foot">
        <div class="main-foot__inner">
            <div class="main-foot__destinations">
                <a href="<?php echo site_url(); ?>" class="main-foot__logo"></a>
                <?php $destinations = new WP_Query('post_type=destination&orderby=title&order=asc');
                if ($destinations->have_posts()): ?>
                    <ul id="destinations">
                        <?php $cnt = 0; while ($destinations->have_posts()): $destinations->the_post(); if($cnt <= 23):?>
                            <li>
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </li>
                        <?php $cnt++; endif; endwhile; ?>
                    </ul>
                <?php endif; ?>
            </div>
            <div class="main-foot__center">
                <div class="main-foot__social">
                    <h5>Follow Us</h5>
                    <a class="instagram" target="_blank" href="https://instagram.com/mtbvacations/">
                        <image xlink:href="<?php bloginfo('template_url'); ?>/images/general-src/instagram.svg" src="<?php bloginfo('template_url'); ?>/images/general-png/instagram.png"  width="18" height="18">
                        <!-- <img src="<?php bloginfo('template_url'); ?>/images/general-png/instagram.png" alt="" /> -->
                    </a>
                    <a class="pinterest" target="_blank" href="https://www.pinterest.com/mtbvacations/">
                        <image xlink:href="<?php bloginfo('template_url'); ?>/images/general-src/pinterest.svg" src="<?php bloginfo('template_url'); ?>/images/general-png/pinterest.png"  width="18" height="18">
                        <!-- <img src="<?php bloginfo('template_url'); ?>/images/general-png/pinterest.png" alt="" /> -->
                    </a>
                    <a class="twitter" target="_blank" href="https://twitter.com/mtbvacations">
                        <svg width="50" height="50">
                            <image xlink:href="<?php bloginfo('template_url'); ?>/images/general-src/twitter.svg" src="<?php bloginfo('template_url'); ?>/images/general-png/twitter.png"  width="18" height="18">
                        </svg>
                        <!-- <img src="<?php bloginfo('template_url'); ?>/images/general-png/twitter.png" alt="" /> -->
                    </a>
                    <a class="facebook" target="_blank" href="https://www.facebook.com/pages/mtb-vacationscom/819431601464330?ref=hl">
                        <image xlink:href="<?php bloginfo('template_url'); ?>/images/general-src/facebook.svg" src="<?php bloginfo('template_url'); ?>/images/general-png/facebook.png"  width="18" height="18">
                        <!-- <img src="<?php bloginfo('template_url'); ?>/images/general-png/facebook.png" alt="" /> -->
                    </a>
                </div>
                <div class="main-foot__subscribe">
                    <h5>Subscribing</h5>
                    <div class="subscribe-note">Join the pack.</div>
                    <div class="subscribe-note">We will never send you spam.</div>
                    <?php echo do_shortcode('[mc4wp_form]'); ?>
                </div>
                <div class="main-foot__nav">
                    <h5>Menu</h5>
                    <div class="nav__inner">
                        <?php
                            $attr = array(
                                'theme_location'  => 'foot-menu',
                                'container'       => 'nav',
                                'container_class' => 'foot-nav',
                                'menu_class'      => 'menu'
                            );
                            wp_nav_menu($attr);
                        ?>
                    </div>
                </div>
            </div>
            <div class="main-foot__sponsors">
                <?php $cnt = 1; ?>
                <?php if(have_rows('sponsors', 2)): ?>
                    <?php while(have_rows('sponsors', 2)) : the_row(); ?>
                        <?php $adUrl = get_sub_field('sponsor'); ?>
                        <?php if($adUrl != ''): ?>
                            <?php if(get_sub_field('is_affiliate')): ?>
                                <a target="_blank" href="<?php the_sub_field('affiliate_link'); ?>">
                                    <img src="<?php echo $adUrl; ?>" alt="" />
                                </a>
                            <?php else: ?>
                                <img src="<?php echo $adUrl; ?>" alt="" />
                            <?php endif; ?>
                        <?php else: ?>
                            <?php if($cnt == 1): ?>
                                <div>
                                    <script type='text/javascript'>
                                      googletag.cmd.push(function() {
                                        googletag.defineSlot('/49735501/footer-first-ad', [[336, 280], [250, 250]], 'div-gpt-ad-1467774291900-0').addService(googletag.pubads());
                                        googletag.pubads().enableSingleRequest();
                                        googletag.enableServices();
                                      });
                                    </script>
                                    <!-- /49735501/footer-first-ad -->
                                    <div id='div-gpt-ad-1467774291900-0'>
                                    <script type='text/javascript'>
                                    googletag.cmd.push(function() { googletag.display('div-gpt-ad-1467774291900-0'); });
                                    </script>
                                    </div>
                                </div>
                            <?php else: ?>
                                <div>
                                    <script type='text/javascript'>
                                        googletag.cmd.push(function() {
                                            googletag.defineSlot('/49735501/footer-second-ad', [[336, 280], [250, 250]], 'div-gpt-ad-1467774291900-1').addService(googletag.pubads());
                                            googletag.pubads().enableSingleRequest();
                                            googletag.enableServices();
                                        });
                                    </script>
                                    <!-- /49735501/footer-second-ad -->
                                    <div id='div-gpt-ad-1467774291900-1'>
                                    <script type='text/javascript'>
                                    googletag.cmd.push(function() { googletag.display('div-gpt-ad-1467774291900-1'); });
                                    </script>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                        <?php $cnt++; ?>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
            <div class="main-foot__copyright">
                <div class="copyright">&copy; Mountain Bike Vacations <?php echo date('Y'); ?> - All Rights Reserved. <a href="<?php echo site_url(); ?>/privacy-policy/">Privacy Policy</a></div>
                <div class="site-design">Site by <a href="http://www.zenman.com" target="_blank" rel="nofollow">Zenman Web Design</a></div>
            </div>
        </div>
    </footer><!-- // main-foot -->
<!-- sticky footer will fail if anything goes between the closing footer and .wrap -->
</div><!-- // wrap-all-the-things -->

<?php wp_footer(); //mandatory ?>

</body>
</html>