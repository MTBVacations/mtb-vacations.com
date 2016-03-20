<article class="page__group review">
	<div class="review__inside">
		<?php $reviewImg = get_sub_field('review_image'); $reviewImg = $reviewImg['sizes']['large']; ?>
		<div class="review__group review__group--1">
			<div class="review__image" style="background-image:url('<?php echo $reviewImg; ?>');"></div>
			<div class="review__content">
				<h3><?php the_sub_field('review_title'); ?></h3>
				<div><?php the_sub_field('review'); ?></div>
				<?php 
					$rating = get_sub_field('star_rating');
					$img = '/images/general-png/stars-'.$rating.'.png';
				?>
				<div class="review__stars"><img src="<?php bloginfo('template_url'); ?><?php echo $img; ?>" alt="Review <?php echo $rating; ?> star rating" /></div>
			</div>
		</div>
		<div class="review__group review__group--2">
			<?php 
				$adImg = get_sub_field('sponsor');
				$adImg = $adImg['url'];
			?>

			<?php if(get_sub_field('is_affiliate')): ?>
				<a target="_blank" href="<?php the_sub_field('affiliate_link'); ?>">
					<img src="<?php echo $adImg; ?>" alt="" />
				</a>
			<?php else: ?>
				<img src="<?php echo $adImg; ?>" alt="" />
			<?php endif; ?>
		</div>
	</div>
</article>