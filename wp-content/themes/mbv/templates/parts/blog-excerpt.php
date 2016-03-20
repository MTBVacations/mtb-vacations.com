<article class="single-torso__post">

	<?php $postImg = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );
	$postImg = $postImg[0]; ?>
	<div class="single-torso__image" style="background-image:url('<?php echo $postImg; ?>');"></div>

	<div class="single-torso__wrapper">
	    <h3><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h3>

	    <!-- <div class="single-torso__posted">
	        Posted on <?php echo get_the_date();?> by <?php the_author(); ?>. <?php if(has_tag()):?> <?php the_tags('Tagged: ');?> <?php endif;?>
	    </div> <!-- // posted -->

	    <div class="single-torso__content">
	    	<?php the_excerpt(); ?>
	    	
	    	<?php get_template_part('templates/parts/page', 'social'); ?>
	    </div> <!-- // post -->
    </div>

</article> <!-- //single__post -->