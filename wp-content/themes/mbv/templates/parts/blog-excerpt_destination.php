<?php $postImg = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );
$postImg = $postImg[0]; ?>
<div class="column__group" style="background-image:url('<?php echo $postImg; ?>');">

	<div class="column__group-content">
		<div class="column__group-text">
		    <h3><a class="txt--box-shadow" href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
	    </div>

	    <div class="column__overlay">
	    	<?php 
	    		$desc       = get_field('description_excerpt', $post->ID);
	    		$desc       = substr($desc, 0, 240);
	    		$lastSpace  = strrpos($desc, ' ');
	    		$desc       = substr($desc, 0, $lastSpace);
	    		$desc       .= '...';

	    		echo $desc;

	    		$perm = get_permalink($post->ID);
	    	?>
	    	<a href="<?php echo $perm; ?>" class="btn">Visit Destination &gt;</a>
	    </div>

    </div>

</div>