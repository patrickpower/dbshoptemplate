<?php get_template_part('header');?>

<article class="single-page_container">	
	<section class="section-title_container row">
		<div class="col text-center">
			<h1>Events</h1>
		</div>
	</section>
	<section class="page-body events-page row">
		<?php
			$todaysDate = date('Y-m-d');
			$args = array(
				'post_type'=>'event',
				'meta_query'=>array(
					array(
						'key'=>'event_date',
						'value'=>$todaysDate,
						'compare'=> '>='
					)
				)
			);
			$events = get_posts($args);
			if(!$events) {
				echo "We currently have no events lined up";
			} else {
				foreach($events as $event){
				$id = $event->ID;
				$mainBookJacket = get_post_meta($id,'main_book_jacket',true);
				$mainAuthorImage = get_post_meta($id,'main_author_image',true);
				$postponed = get_post_meta($id,'event_postponed',true);
				$cancelled = get_post_meta($id,'event_cancelled',true);
				$soldOut = get_post_meta($id,'event_sold_out',true);
				$eventType = get_post_meta($id,'event_type',true);
				switch($eventType){
					case "childrens_storytime": $eventType = false;
						break;
					case "author_talk": $eventType = false;
						break;
					case "book_signing":$eventType = "Book signing";
						break;
				}
			?>
					
			<div class="col-md-6 events-page_event">
				<a class="no-dec" href="<?php echo get_permalink($id);?>">
				<div class="events-page_images">
					<?php if($mainAuthorImage){?>
						<img class="event-page_image author"
							 src="<?php echo wp_get_attachment_image_src($mainAuthorImage,'full')[0];?>"
							 alt="<?php echo get_the_title($id);?> | Talks and Events at <?php echo get_the_shop_name(true);?>">
				
					<?php }?>
					<?php if($mainBookJacket) {?>
						<img class="event-page_image jacket"
							 src="<?php echo wp_get_attachment_image_src($mainBookJacket,'full')[0];?>"
							 alt="<?php echo get_the_title($id);?> | Talks and Events at <?php echo get_the_shop_name(true);?>">
					
					<?php }?>
				</div>
					<p class="event-page_title"><?php echo get_the_title($id);?></p>
					<p class="event-page_subtitle"><?php echo get_post_meta($id,'event_subtitle',true);?></p>
					<p class="event-page_date"><?php echo date('l jS F',strtotime(get_post_meta($id,'event_date',true))).' at '.date('g:ia',strtotime(get_post_meta($id,'event_start_time',true)));?></p>
					<?php if($eventType){?>
					<p class="event-page_type highlight d-inline-block"><?php echo $eventType;?></p>
					<?php }?>
					<p class="event-page_excerpt"><?php echo excerpt(30,$id);?></p>
					<p class="event-page_reserve">
						<?php if(!($soldOut || $cancelled || $postponed)){?>
							<img src="<?php images();?>/ticket.jpg" width="20">
							<span class="highlight">Reserve tickets</span>
						<?php } elseif($soldOut){?>
						<img src="<?php images();?>/ticket.jpg" width="20">
						<span class="highlight" style="color:var(--danger);">Sold out</span>
						<?php } elseif($postponed){?>
						<span class="highlight" style="color:var(--danger);">Event postponed</span>
						<?php } elseif($cancelled){?>
						<span class="highlight" style="color:var(--danger);">Event cancelled</span>
						<?php }?>
					</p>
				</a>
			</div>	
				<?php }
			}
		
		?>
	</section>

</article>


<?php get_template_part('footer');?>