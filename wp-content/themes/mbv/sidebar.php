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
                            <script type='text/javascript'>
                              googletag.cmd.push(function() {
                                googletag.defineSlot('/49735501/tips-gear-second-ad', [[300, 250], [320, 480], [250, 250], [336, 280], [240, 400]], 'div-gpt-ad-1467775224674-1').addService(googletag.pubads());
                                googletag.pubads().enableSingleRequest();
                                googletag.enableServices();
                              });
                            </script>
                            <!-- /49735501/tips-gear-second-ad -->
                            <div id='div-gpt-ad-1467775224674-1'>
                            <script type='text/javascript'>
                            googletag.cmd.push(function() { googletag.display('div-gpt-ad-1467775224674-1'); });
                            </script>
                            </div>
                            <?php
                            break;
                        case 3: 
                            # Third Ad
                            ?>
                            <script type='text/javascript'>
                              googletag.cmd.push(function() {
                                googletag.defineSlot('/49735501/tips-gear-third-ad', [[300, 250], [320, 480], [250, 250], [336, 280], [240, 400]], 'div-gpt-ad-1467775224674-2').addService(googletag.pubads());
                                googletag.pubads().enableSingleRequest();
                                googletag.enableServices();
                              });
                            </script>
                            <!-- /49735501/tips-gear-third-ad -->
                            <div id='div-gpt-ad-1467775224674-2'>
                            <script type='text/javascript'>
                            googletag.cmd.push(function() { googletag.display('div-gpt-ad-1467775224674-2'); });
                            </script>
                            </div>
                            <?php
                            break;
                        default:
                            # First Ad
                            ?>
                            <script type='text/javascript'>
                                googletag.cmd.push(function() {
                                    googletag.defineSlot('/49735501/tips-gear-first-ad', [[300, 250], [320, 480], [250, 250], [336, 280], [240, 400]], 'div-gpt-ad-1467775224674-0').addService(googletag.pubads());
                                    googletag.pubads().enableSingleRequest();
                                    googletag.enableServices();
                                });
                            </script>
                            <!-- /49735501/tips-gear-first-ad -->
                            <div id='div-gpt-ad-1467775224674-0'>
                            <script type='text/javascript'>
                            googletag.cmd.push(function() { googletag.display('div-gpt-ad-1467775224674-0'); });
                            </script>
                            </div>
                            <?php
                            break;
                    } ?>
                <?php endif; ?>
            </li>
            <?php $columnCnt++; ?>
        <?php endwhile; ?>
    <?php endif; ?>
</ul>