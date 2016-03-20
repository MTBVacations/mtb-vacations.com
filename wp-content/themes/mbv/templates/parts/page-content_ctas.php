<article class="page__group ctas">
	<div class="ctas__inside">
		<?php if(have_rows('ctas')): ?>
			<?php while(have_rows('ctas')): the_row(); ?>
				<?php $img = get_sub_field('cta_image'); $img = $img['sizes']['medium'];?>
				<div class="cta" style="background-image:url('<?php echo $img; ?>');">
					<?php  
					    $iconImage = get_sub_field('cta_icon');
					    $iconImage = $iconImage['url'];
					    $file_parts = pathinfo($iconImage);
					    $file_ext = $file_parts['extension'];
					?>
					<div class="cta__content">
						<div class="cta__icon">
							<?php if($file_ext == 'svg'): ?>
								<img class="js-ajax-replace" src="<?php echo $iconImage; ?>" alt="" />
							<?php else: ?>
							    <img src="<?php echo $iconImage; ?>" alt="" />
							<?php endif; ?>
						</div>
						<h3 class="heading--light"><?php the_sub_field('cta_title'); ?></h3>
					</div>
					<div class="cta__overlay">
						<?php the_sub_field('cta_blurb'); ?>
					</div>
				</div>
			<?php endwhile; ?>
		<?php endif; ?>
	</div>
</article>

