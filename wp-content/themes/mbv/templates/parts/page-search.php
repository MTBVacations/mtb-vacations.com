<?php if(get_sub_field('add_search_form')): ?>
	<article class="page__group search">
		<div class="search__inside">
			<h6 class="heading--no-side-margin">Search Vacations:</h6>
			<?php $destinations = new WP_Query('post_type=destination&orderby=title&order=asc');
			if ($destinations->have_posts()): ?>
				<div class="search__select">
					<select id="search-select">
						<option value="">Destinations</option>
						<?php while ($destinations->have_posts()): $destinations->the_post(); ?>
							<option value="<?php the_permalink(); ?>"><?php the_title(); ?></option>
						<?php endwhile; ?>
					</select>
					<a href="" id="search-select__submit">Search</a>
				</div>
			<?php endif; wp_reset_query();?>
		</div>
	</article>
<?php endif; ?>