<div class="uneven-grid">
    <div class="uneven-grid__inside">
        <?php 
            $large_section = get_sub_field('large_grid_section'); 
            if($large_section->post_type == 'destination'):
                $grid_title = 'Featured Location';

                $large_section_desc     = get_field('description_excerpt', $large_section->ID);
                $large_section_desc     = substr($large_section_desc, 0, 350);
                $lastSpace              = strrpos($large_section_desc, ' ');
                $large_section_desc     = substr($large_section_desc, 0, $lastSpace);
                $large_section_desc     .= '...';

                $cta = 'Visit Destination >';
            elseif($large_section->post_type == 'tips_tricks'):
                $grid_title = 'Tips & Tricks';
                $large_section_desc = $large_section->post_excerpt;
                $cta = 'Read More >';
            endif;

            $perm = get_permalink($large_section->ID);

            $large_img = wp_get_attachment_image_src( get_post_thumbnail_id( $large_section->ID ), 'large' );
        ?>
        <div class="uneven-grid__group--half uneven-grid__left uneven-grid__top" style="background-image:url('<?php echo $large_img[0]; ?>');">
            <div class="uneven-grid__text">
                <h4><?php echo $grid_title; ?>:</h4>
                
                <h2 class="heading--left-space"><a class="link--title txt--box-shadow" href="<?php echo $perm; ?>"><?php echo $large_section->post_title; ?></a></h2>

            </div>
            <div class="uneven-grid__overlay">
                <?php echo $large_section_desc; ?>
                <a href="<?php echo $perm; ?>" class="btn"><?php echo $cta; ?></a>
            </div>
        </div>

        <div class="uneven-grid__group--half">
            <?php 
                $small_section = get_sub_field('small_grid_section'); 
                if($small_section->post_type == 'destination'):
                    $small_grid_title   = 'Featured Location';
                    $small_grid_desc    = get_field('description_excerpt', $small_section->ID);
                    $small_cta          = 'Visit Destination >';
                elseif($small_section->post_type == 'post'):
                    $small_grid_title   = 'Tips And Gear';
                    $small_grid_desc    = $small_section->post_content;
                    $small_cta          = 'Read More >';
                endif;
                
                $small_grid_desc    = substr($small_grid_desc, 0, 240);
                $lastSpace          = strrpos($small_grid_desc, ' ');
                $small_grid_desc    = substr($small_grid_desc, 0, $lastSpace);
                $small_grid_desc    .= '...';

                $small_img = wp_get_attachment_image_src( get_post_thumbnail_id( $small_section->ID ), 'large' );
            ?>
            <div class="uneven-grid__group--small uneven-grid__right-top uneven-grid__top"  style="background-image:url('<?php echo $small_img[0]; ?>');">
                <div class="uneven-grid__text">
                    <?php $perm = get_permalink($small_section->ID); ?>
                    <h4><?php echo $small_grid_title; ?>:</h4>
                    <h3><a class="link--title" href="<?php echo $perm; ?>"><?php echo $small_section->post_title; ?></a></h3>
                    <?php 
                        $author_id = $small_section->post_author; 
                        $date = $small_section->post_date;
                        $date = date('M d, Y', strtotime($date));
                    ?>
                    <em>By: <?php echo the_author_meta( 'display_name' , $author_id ); ?> / <?php echo $date; ?></em>
                    <p><?php echo $small_grid_desc; ?></p>
                </div>
                <div class="uneven-grid__overlay">
                    <a href="<?php echo $perm; ?>" class="btn"><?php echo $small_cta; ?></a>
                </div>
            </div>

            <?php
                $ad = get_sub_field('advertisement');
                $adUrl = $ad['url'];
            ?>
            <div class="uneven-grid__group--small uneven-grid__ad">
                <?php  if(get_the_ID() == 2): ?>
                    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                    <!-- Homepage - first after scroll -->
                    <ins class="adsbygoogle"
                         style="display:block"
                         data-ad-client="ca-pub-9928579909487332"
                         data-ad-slot="9619454601"
                         data-ad-format="auto"></ins>
                    <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
                <?php else: ?>
                    <?php if(get_sub_field('is_affiliate_link')): ?>
                        <a target="_blank" href="<?php the_sub_field('affiliate_link'); ?>">
                            <img src="<?php echo $adUrl; ?>" alt="" />
                        </a>
                    <?php else: ?>
                        <img src="<?php echo $adUrl; ?>" alt="" />
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
