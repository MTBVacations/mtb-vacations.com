<article class="page__group full-cta">
	<?php $img = get_sub_field('background_image'); $img = $img['url']; ?>
	<div class="full-cta__wrap" style="background-image:url('<?php echo $img; ?>');">
		<div class="full-cta__text"><?php the_sub_field('cta_text'); ?></div>
		<?php if(get_sub_field('cta_link') == 'text'): ?>
			<a href="<?php the_sub_field('cta_text_link'); ?>" class="link--btn"><?php the_sub_field('cta_link_text'); ?></a>
		<?php else: ?>
			<?php 
				$link = get_sub_field('cta_page_link');
				$perm = get_permalink($link->ID);
			?>
			<a href="<?php echo $perm; ?>" class="link--btn"><?php the_sub_field('cta_link_text'); ?></a>
		<?php endif; ?>
	</div>
</article>