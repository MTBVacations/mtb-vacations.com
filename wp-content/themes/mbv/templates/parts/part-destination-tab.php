<div class="tab-content__inside location loading-opacity">

	<?php if($title == 'tours--guides') {
			$title = 'tours_guides';
			$showTitle = 'Tours & Guides';
		} else {
			$showTitle = $title;
		}
	?>
	<?php $fullCnt = 0; if(have_rows($title)): while(have_rows($title)): the_row();?>
		<?php 
			$fullCnt++; 
		?>
	<?php endwhile; endif; ?>


	<?php if($fullCnt > 0): ?>
	
		<?php
			$featured = get_field($title); 
			$featured = $featured[0];
		?>

		<div class="featured__location">
			<?php if($featured['featured_image'] == 'video'): ?>
				<div class="location__item location__video">
					<?php $img = "https://img.youtube.com/vi/" . $featured['youtube_video_id'] . "/0.jpg"; ?>
					<a href="#lightbox-<?php echo $featured['youtube_video_id']; ?>" class="open-lightbox"><img src="<?php echo $img; ?>"></a>
				</div>
				<div class="lightbox" id="lightbox-<?php echo $featured['youtube_video_id']; ?>">
					<div class="lightbox__content">
	    				<div class="youtube__container">
	    					<iframe src="http://www.youtube.com/embed/<?php echo $featured['youtube_video_id']; ?>?rel=0&hd=1&modestbranding=1&showinfo=0&autoplay=1" frameborder="0" allowfullscreen style="position: absolute; top: 0; left: 0; width: 100%; height: 100%"></iframe>
	    				</div>
					</div>
				</div>
			<?php else: ?>
				<?php $img = $featured['image']; $img = $img['url']; ?>
				<div class="location__item location__image js-background js-image-height" data-image="background-image:url('<?php echo $img; ?>');"></div>
			<?php endif; ?>
			<div class="location__item location__content">
				<h3 class="heading--light"><?php echo $featured['title']; ?></h3>

				<?php 
					$rating = $featured['review'];
					$img = '/images/general-png/stars-'.$rating.'.png';
				?>
				<div class="location__review"><img src="<?php bloginfo('template_url'); ?><?php echo $img; ?>" alt="Review <?php echo $rating; ?> star rating" /></div>
				<?php $type = $featured['type']; if($type): ?>
					<div class="location__type">
						<strong>Type:</strong>
						<span><?php echo $type ?></span>
					</div>
				<?php endif; ?>
				<?php $location = $featured['location']; if($location): ?>
					<div class="location__location">
						<strong>Location:</strong>
						<span><?php echo $location ?></span>
					</div>
				<?php endif; ?>
				<?php $address = $featured['address']; if($address): ?>
					<div class="location__address">
						<strong>Address:</strong>
						<span><?php echo $address ?></span>
					</div>
				<?php endif; ?>
				<?php $contact = $featured['contact']; if($contact): ?>
					<div class="location__contact">
						<strong>Contact:</strong>
						<span><?php echo $contact ?></span>
					</div>
				<?php endif; ?>
				<?php $website = $featured['website']; if($website): ?>
					<div class="location__website">
						<span><a target="_blank" href="<?php echo $website; ?>">Visit Website</a></span>
					</div>
				<?php endif; ?>
				<div class="location__desc"><?php echo $featured['description']; ?></div>
			</div>
		</div>

		<div class="location__list">
			<?php if(have_rows($title)): ?>
				<div class="flexslider-location slider">
		            <ul class="slides">
						<?php $slideCnt = 1; while(have_rows($title)): the_row(); ?>
							<?php if($slideCnt > 1): ?>
		                        <li class="slider__item">
		                            <div class="slider__content background--white">
			                            <?php if($featured['featured_image'] == 'video'): ?>
											<div class="location__video">
												<?php $img = "https://img.youtube.com/vi/" . $featured['youtube_video_id'] . "/0.jpg"; ?>
												<a href="#lightbox-<?php echo $featured['youtube_video_id']; ?>" class="open-lightbox"><img src="<?php echo $img; ?>"></a>
											</div>
                                			<div class="lightbox" id="lightbox-<?php echo $featured['youtube_video_id']; ?>">
                                				<div class="lightbox__content">
	                                				<div class="youtube__container">
	                                					<iframe src="http://www.youtube.com/embed/<?php echo $featured['youtube_video_id']; ?>?rel=0&hd=1&modestbranding=1&showinfo=0&autoplay=1" frameborder="0" allowfullscreen style="position: absolute; top: 0; left: 0; width: 100%; height: 100%"></iframe>
	                                				</div>
                                				</div>
                                			</div>
										<?php else: ?>
			                            	<?php $img = get_sub_field('image'); $image = $img['sizes']['medium']; ?>
			                            	<div class="location__image js-background js-image-height" data-image="background-image:url('<?php echo $image; ?>');"></div>
										<?php endif; ?>
		                            	<div class="location__content">
		                                	<h3 class="heading--light"><?php the_sub_field('title'); ?></h3>

		                                	<?php $type = get_sub_field('type'); if($type): ?>
		                                		<div class="location__type">
		                                			<strong>Type:</strong>
		                                			<span><?php echo $type ?></span>
		                                		</div>
		                                	<?php endif; ?>
		                                	<?php $location = get_sub_field('location'); if($location): ?>
		                                		<div class="location__location">
		                                			<strong>Location:</strong>
		                                			<span><?php echo $location ?></span>
		                                		</div>
		                                	<?php endif; ?>
		                                	<?php $address = get_sub_field('address'); if($address): ?>
		                                		<div class="location__address">
		                                			<strong>Address:</strong>
		                                			<span><?php echo $address ?></span>
		                                		</div>
		                                	<?php endif; ?>
		                                	<?php $contact = get_sub_field('contact'); if($contact): ?>
		                                		<div class="location__contact">
		                                			<strong>Contact:</strong>
		                                			<span><?php echo $contact ?></span>
		                                		</div>
		                                	<?php endif; ?>
		                                	<?php $website = get_sub_field('website'); if($website): ?>
		                                		<div class="location__website">
		                                			<span><a target="_blank" href="<?php echo $website; ?>">Visit Website</a></span>
		                                		</div>
		                                	<?php endif; ?>
		                                	<?php $desc = get_sub_field('description'); if($desc): ?>
		                                		<?php  
	                    				    		$shortDesc       = substr($desc, 0, 200);
	                    				    		$lastSpace  = strrpos($shortDesc, ' ');
	                    				    		$shortDesc       = substr($shortDesc, 0, $lastSpace);
	                    				    		$shortDesc       .= '...';
		                                		?>
		                                		<div class="location__desc">
		                                			<?php echo $shortDesc; ?>
		                                			<?php $id = get_the_ID(); ?>
		                                			<a href="#lightbox-<?php echo $title . '-' . $slideCnt; ?>" class="open-lightbox">Read More  &rsaquo;</a>
		                                			<div class="lightbox" id="lightbox-<?php echo $title . '-' .  $slideCnt; ?>">
		                                				<div class="lightbox__content">
		                                					<h3 class="heading--light"><?php the_sub_field('title'); ?></h3>
		                                					<?php the_sub_field('description'); ?>
		                                				</div>
		                                			</div>
	                                			</div>
		                                	<?php endif; ?>
		                                	<?php 
		                                		$rating = get_sub_field('review');
		                                		$img = '/images/general-png/stars-'.$rating.'.png';
		                                	?>
		                                	<div class="location__review"><img src="<?php bloginfo('template_url'); ?><?php echo $img; ?>" alt="Review <?php echo $rating; ?> star rating" /></div>
		                                </div>
		                            </div>
		                        </li>
							<?php endif; ?>
						<?php $slideCnt++; endwhile; ?>
		            </ul>
		        </div>
			<?php endif; ?>
		</div>

		<?php $tabAd = get_field($title.'_ad'); if($tabAd): ?>
			<div class="location__ad">
				<?php $img = $tabAd['url'];

				if(get_field('is_'.$title.'_affiliate')): ?>
					<a target="_blank" href="<?php echo get_field($title.'_affiliate_link'); ?>">
						<img src="<?php echo $img; ?>" alt="" />
					</a>
				<?php else: ?>
					<img src="<?php echo $img; ?>" alt="" />
				<?php endif; ?>
			</div>
		<?php endif; ?>

	<?php else: ?>
		<div class="location__error">
			<h3 class="heading--no-margin">Please check back for suggestions about <?php echo $showTitle; ?>.</h3>
		</div>
	<?php endif; ?>
</div><!-- //social-bar__inner -->
