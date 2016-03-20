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
            <div class="column__group<?php echo $addClass; ?>" style="background-image:url('<?php echo $backImg; ?>');">
                <div class="column__group-content">
                    <?php if($links_to == 'ad'): ?>
                        <?php if(get_sub_field('is_affiliate_link')): ?>
                            <a target="_blank" href="<?php the_sub_field('affiliate_link'); ?>">
                                <?php echo $fullImg; ?>
                            </a>
                        <?php else: ?>
                            <?php echo $fullImg; ?>
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
        <?php endwhile; ?>
    </div>
</article>