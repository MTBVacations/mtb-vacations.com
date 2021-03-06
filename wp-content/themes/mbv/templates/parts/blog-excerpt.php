<article class="single-torso__post">

	<?php if(get_field('youtube_video_id') != ''): ?>
		<?php $postImg = "https://img.youtube.com/vi/" . get_field('youtube_video_id') . "/0.jpg"; ?>
	<?php else:  ?>
		<?php $postImg = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );
		$postImg = $postImg[0]; ?>
	<?php endif; ?>
	<div class="single-torso__inner">
		<div class="single-torso__image">
			<img src="<?php echo $postImg; ?>">
		</div>

		<div class="single-torso__wrapper">
		    <h3><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h3>

		    <!-- <div class="single-torso__posted">
		        Posted on <?php echo get_the_date();?> by <?php the_author(); ?>. <?php if(has_tag()):?> <?php the_tags('Tagged: ');?> <?php endif;?>
		    </div> <!-- // posted -->

		    <div class="single-torso__content">
		    	<?php the_excerpt(); ?>
		    	
		    </div> <!-- // post -->
	    </div>
		<?php get_template_part('templates/parts/page', 'social'); ?>
	</div>

</article> <!-- //single__post -->