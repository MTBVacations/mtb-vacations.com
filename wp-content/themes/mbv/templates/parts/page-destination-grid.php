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

    //special modification classes
    $special_class = get_sub_field('column_class');
    if($special_class){
        foreach ($special_class as $class) {
            $title = get_the_title($class->ID);
            $classes .= ' main-torso__group--' . $title;
        }
    }

?>
<article class="page__group column<?php echo $classes; ?>"<?php echo $img_style; ?>>
    <div class="column__inside">
        <?php if($group_count <= 3) : $i = 0; //if normal 1-3 groups of content ?>
            <?php while(has_sub_field('column_content')) : $i++; ?>
                <?php
                    $addClass   = '';
                    $fullImg    = '';
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
                        $columnTitle    = $column->post_title;
                        $columnId       = $column->ID;

                        $columnDesc     = get_field('destination_description', $columnId);
                        $columnDesc     = substr($columnDesc, 0, 240);
                        $lastSpace      = strrpos($columnDesc, ' ');
                        $desc           = substr($columnDesc, 0, $lastSpace);
                        $desc           .= '...';

                        $cta = 'Visit Destination >';

                        $perm = get_permalink($columnId);

                        $backImg = wp_get_attachment_image_src( get_post_thumbnail_id( $columnId ), 'single-post-thumbnail' );
                        $backImg = $backImg[0];

                    } elseif($links_to == 'post'){
                        $column         = get_sub_field('tips_tricks');
                        $columnType     = 'Tips And Gear:';
                        $columnTitle    = $column->post_title;
                        $columnId       = $column->ID;

                        $desc       = $column->post_content;
                        $desc       = substr($desc, 0, 240);
                        $lastSpace  = strrpos($desc, ' ');
                        $desc       = substr($desc, 0, $lastSpace);
                        $desc       .= '...';

                        $cta        = 'Read More >';

                        $perm = get_permalink($postId);

                        $backImg = wp_get_attachment_image_src( get_post_thumbnail_id( $columnId ), 'single-post-thumbnail' );
                        $backImg = $backImg[0];

                    } elseif($links_to == 'ad') {
                        $backImg = '';
                        $fullImg = get_sub_field("advertisement");
                        $fullImg = $fullImg['url'];
                        $fullImg ='<img src="'.$fullImg.'">';
                        $addClass = ' advertisement';
                    }
                ?>
                <div class="column__group column__group--<?php echo $i . $empty_class . $addClass; ?>" style="background-image:url('<?php echo $backImg; ?>');">
                    <div class="column__group-content">
                        <?php if($links_to == 'ad'): ?>
                            <?php echo $fullImg; ?>
                        <?php else: ?>
                            <div class="column__group-text">
                                <h4><?php echo $columnType ?></h4>
                                <?php if($links_to == 'dest'): ?>
                                    <h2 class="heading--left-space"><a href="<?php echo $perm; ?>" class="link--title"><?php echo $columnTitle ?></a></h2>
                                <?php else: ?>
                                    <h3 class="heading--left-space"><a href="<?php echo $perm; ?>" class="link--title"><?php echo $columnTitle ?></a></h3>
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
        <?php else : //if 4+ groups of content (slider) ?>
            <div class="flexslider column__slider-group">
                <ul class="slides">
                    <?php while(has_sub_field('column_content')) : ?>
                        <?php
                            $code_format = get_sub_field('column_code_format');
                            $column_contents = '';
                            if(!$code_format) {
                                $column_contents = get_sub_field('column_text');
                            } else {
                                $column_contents = get_sub_field('column_code');
                            }
                        ?>
                        <li class="column__slider-item">
                            <div class="column__slider-content">
                                <?php echo $column_contents; ?>
                            </div>
                        </li>
                        <?php //if($i%3===0 && $i!=$group_count){ echo '</div><div class="column__grid-group">'; } ?>
                    <?php endwhile; ?>
                </ul>
            </div>
        <?php endif; ?>
    </div>
    <?php if(count($bg_img) > 1) : ?>
        <ul class="cover-slider">
            <?php while(has_sub_field('column_background')) : ?>
                <?php $bg_img_obj = get_sub_field('column_background_image'); ?>
                <li class="cover-slider__slide" style="background-image:url(<?php echo $bg_img_obj['sizes']['hero-big']; ?>)">
                    <span class="hide"><?php echo $bg_img_obj['alt']; ?></span>
                </li>
            <?php endwhile; ?>
        </ul>
    <?php endif; ?>
</article>