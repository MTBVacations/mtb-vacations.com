<?php if(have_rows('trustbar_icons')): ?>
	<article class="page__group trustbar">
		<div class="trustbar__inside">
			<?php while ( have_rows('trustbar_icons') ) : the_row(); ?>
				<?php 
					$icon = get_sub_field('trustbar_icon');
					$icon = $icon['url'];
				?>
				<div class="trustbar__icon">
					<?php if(get_sub_field('icon_link')): ?>
						<a target="_blank" href="<?php the_sub_field('icon_link'); ?>">
							<img src="<?php echo $icon; ?>" alt="" /></div>
						</a>
					<?php else: ?>
						<img src="<?php echo $icon; ?>" alt="" /></div>
					<?php endif; ?>
			<?php endwhile; ?>
		</div>
	</article>
<?php endif; ?>