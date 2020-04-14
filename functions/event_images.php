<?php
	add_action('add_event_images','event_images',10,2);
	
	function event_images(){
		$mainBookJacket = get_post_meta(get_the_ID(),'main_book_jacket',true);
		$extraBookJackets = get_post_meta(get_the_ID(),'extra_book_jackets',false);
		$mainAuthorImage = get_post_meta(get_the_ID(),'main_author_image',true);
		$extraImages = get_post_meta(get_the_ID(),'extra_images',false);
		
		/* Image Order
		1. The author image
		2. The book jacket
		*/
		
		if($mainAuthorImage){?>
			<picture>
				<img class="single-event_image author"
					 src="<?php echo wp_get_attachment_image_src($mainAuthorImage,'full')[0];?>"
					 alt="<?php echo get_the_title();?> | Talks and Events at <?php echo get_the_shop_name(true);?>">
			</picture>
			<?php if($extraBookJackets || $mainBookJacket || $extraImages){?>
			<div class="thumbnails">
				<?php if($mainBookJacket){?>
				<div class="img">
					<a href="<?php echo wp_get_attachment_image_src($mainBookJacket,'full')[0];?>">
						<img src="<?php echo wp_get_attachment_image_src($mainBookJacket,'thumbnail')[0];?>">
					</a>
				</div>
				<?php } if($extraImages){foreach($extraImages as $image){?>
				<div class="img">
					<a href="<?php echo wp_get_attachment_image_src($image,'full')[0];?>">
						<img src="<?php echo wp_get_attachment_image_src($image,'thumbnail')[0];?>">
					</a>
				</div>
				<?php } } if($extraBookJackets){ foreach($extraBookJackets as $jacket){?>
				<div class="img">
					<a href="<?php echo wp_get_attachment_image_src($jacket,'full')[0];?>">
						<img src="<?php echo wp_get_attachment_image_src($jacket,'thumbnail')[0];?>">
					</a>
				</div>
				<?php } } ?>
			</div>
		<?php }
			} else { ?>
			<picture>
				<img class="single-event_image book"
					 src="<?php echo wp_get_attachment_image_src($mainBookJacket,'full')[0];?>"
					 alt="<?php echo get_the_title();?> | Talks and Events at <?php echo get_the_shop_name(true);?>">
			</picture>
		<?php }
		
		
	}