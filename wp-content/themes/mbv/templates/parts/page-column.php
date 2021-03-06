<?php
    //all columns
    $column_content = get_sub_field('column_content');
    $group_count = count($column_content);

    //special column classes
    $classes = '';
    if($group_count <= 3){
        $classes .= ' column--' . $group_count;
        if($group_count == 2){
            $classes .= ' column__two-col--' . get_sub_field('column_two_column_handling');
        }
    } else {
        $classes .= ' column--grid';
    }

?>
<article class="page__group column<?php echo $classes; ?> destination-list featured-destinations">
    <div class="column__inside">
        <?php $columnCnt = 1; ?>
        <?php while(has_sub_field('column_content')) : ?>
            <?php
                $addClass   = '';
                $fullImg    = '';
                $backImg    = '';
                $columnId   = '';
                
                $code_format = get_sub_field('column_code_format');
                $column_contents = '';
                if(!$code_format) {
                    $column_contents = get_sub_field('column_text');
                } else {
                    $column_contents = get_sub_field('column_code');
                }
            ?>
            <?php $links_to = get_sub_field('links_to');
                if($links_to == 'dest'){
                    $column         = get_sub_field('destination');
                    $columnType     = 'Featured Location:';
                    $cta            = 'Visit Destination >';
                    $columnId       = $column->ID;
                    $desc           = get_field('destination_description', $columnId);

                } elseif($links_to == 'post'){
                    $column         = get_sub_field('tips_tricks');
                    $columnType     = 'Tips And Gear:';
                    $cta            = 'Read More >';
                    $columnId       = $column->ID;
                    $desc           = $column->post_content;

                } elseif($links_to == 'ad') {
                    $fullImg = get_sub_field("advertisement");
                    $fullImg = $fullImg['url'];
                    $fullImg ='<img src="'.$fullImg.'">';
                    $addClass = ' advertisement';
                }

                $columnTitle    = $column->post_title;

                $desc       = substr($desc, 0, 240);
                $lastSpace  = strrpos($desc, ' ');
                $desc       = substr($desc, 0, $lastSpace);
                $desc       .= '...';


                $perm = get_permalink($columnId);

                $backImg = wp_get_attachment_image_src( get_post_thumbnail_id( $columnId ), 'large' );
                $backImg = $backImg[0];
            ?>
            <div class="column__group<?php echo $addClass; ?>" <?php if($links_to != 'ad'): ?>style="background-image:url('<?php echo $backImg; ?>');"<?php endif; ?>>
                <div class="column__group-content">
                    <?php if($links_to == 'ad'): ?>
                        <?php if(get_sub_field("advertisement") != ''): ?>
                            <?php if(get_sub_field('is_affiliate_link')): ?>
                                <a target="_blank" href="<?php the_sub_field('affiliate_link'); ?>">
                                    <?php echo $fullImg; ?>
                                </a>
                            <?php else: ?>
                                <?php echo $fullImg; ?>
                            <?php endif; ?>
                        <?php else: ?>
                            <?php switch (get_the_ID()) {
                                case 536:
                                    # is about page
                                    switch ($columnCnt) {
                                        case 2:
                                            ?>
                                            <script type='text/javascript'>
                                                googletag.cmd.push(function() {
                                                    googletag.defineSlot('/49735501/about-second-column', [[480, 320], [250, 250]], 'div-gpt-ad-1467774162651-1').addService(googletag.pubads());
                                                    googletag.pubads().enableSingleRequest();
                                                    googletag.enableServices();
                                                });
                                            </script>
                                            <!-- /49735501/about-second-column -->
                                            <div id='div-gpt-ad-1467774162651-1'>
                                            <script type='text/javascript'>
                                            googletag.cmd.push(function() { googletag.display('div-gpt-ad-1467774162651-1'); });
                                            </script>
                                            </div>
                                            <?php
                                            break;
                                        case 3:
                                            ?>
                                            <script type='text/javascript'>
                                                googletag.cmd.push(function() {
                                                  googletag.defineSlot('/49735501/about-third-column', [[480, 320], [250, 250]], 'div-gpt-ad-1467774162651-2').addService(googletag.pubads());
                                                  googletag.pubads().enableSingleRequest();
                                                  googletag.enableServices();
                                                });
                                            </script>
                                            <!-- /49735501/about-third-column -->
                                            <div id='div-gpt-ad-1467774162651-2'>
                                            <script type='text/javascript'>
                                            googletag.cmd.push(function() { googletag.display('div-gpt-ad-1467774162651-2'); });
                                            </script>
                                            </div>
                                            <?php
                                            break;
                                        default:
                                            ?>
                                            <script type='text/javascript'>
                                                googletag.cmd.push(function() {
                                                  googletag.defineSlot('/49735501/about-first-column', [[480, 320], [250, 250]], 'div-gpt-ad-1467774162651-0').addService(googletag.pubads());
                                                  googletag.pubads().enableSingleRequest();
                                                  googletag.enableServices();
                                                });
                                            </script>
                                            <!-- /49735501/about-first-column -->
                                            <div id='div-gpt-ad-1467774162651-0'>
                                            <script type='text/javascript'>
                                            googletag.cmd.push(function() { googletag.display('div-gpt-ad-1467774162651-0'); });
                                            </script>
                                            </div>
                                            <?php
                                            break;
                                    }
                                    break;
                                default:
                                    # is home page
                                    switch ($columnCnt) {
                                        case 2:
                                            ?>
                                            <script type='text/javascript'>
                                                googletag.cmd.push(function() {
                                                  googletag.defineSlot('/49735501/homepage-second-column', [[250, 250], [480, 320]], 'div-gpt-ad-1467774053399-2').addService(googletag.pubads());
                                                  googletag.pubads().enableSingleRequest();
                                                  googletag.enableServices();
                                                });
                                            </script>
                                            <!-- /49735501/homepage-second-column -->
                                            <div id='div-gpt-ad-1467774053399-2'>
                                            <script type='text/javascript'>
                                            googletag.cmd.push(function() { googletag.display('div-gpt-ad-1467774053399-2'); });
                                            </script>
                                            </div>
                                            <?php
                                            break;
                                        case 3:
                                            ?>
                                            <script type='text/javascript'>
                                                googletag.cmd.push(function() {
                                                  googletag.defineSlot('/49735501/homepage-third-column', [[250, 250], [480, 320]], 'div-gpt-ad-1467774053399-3').addService(googletag.pubads());
                                                  googletag.pubads().enableSingleRequest();
                                                  googletag.enableServices();
                                                });
                                            </script>
                                            <!-- /49735501/homepage-third-column -->
                                            <div id='div-gpt-ad-1467774053399-3'>
                                            <script type='text/javascript'>
                                            googletag.cmd.push(function() { googletag.display('div-gpt-ad-1467774053399-3'); });
                                            </script>
                                            </div>
                                            <?php
                                            break;
                                        default:
                                            ?>
                                            <script type='text/javascript'>
                                                googletag.cmd.push(function() {
                                                  googletag.defineSlot('/49735501/homepage-first-column', [[250, 250], [480, 320]], 'div-gpt-ad-1467774053399-1').addService(googletag.pubads());
                                                  googletag.pubads().enableSingleRequest();
                                                  googletag.enableServices();
                                                });
                                            </script>
                                            <!-- /49735501/homepage-first-column -->
                                            <div id='div-gpt-ad-1467774053399-1'>
                                            <script type='text/javascript'>
                                            googletag.cmd.push(function() { googletag.display('div-gpt-ad-1467774053399-1'); });
                                            </script>
                                            </div>
                                            <?php
                                            break;
                                    }
                                    break;
                            } ?>
                        <?php endif; ?>
                    <?php else: ?>
                        <div class="column__group-text">
                            <h4><?php echo $columnType ?></h4>
                            <?php if($links_to == 'dest'): ?>
                                <h2 class="heading--left-space"><a href="<?php echo $perm; ?>" class="link--title txt--box-shadow"><?php echo $columnTitle ?></a></h2>
                            <?php else: ?>
                                <h3 class="heading--left-space"><a href="<?php echo $perm; ?>" class="link--title txt--box-shadow"><?php echo $columnTitle ?></a></h3>
                            <?php endif; ?>
                        </div>

                        <div class="column__overlay">
                            <?php echo $desc; ?>
                            <a href="<?php echo $perm; ?>" class="btn"><?php echo $cta; ?></a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <?php $columnCnt++; ?>
        <?php endwhile; ?>
    </div>
</article>