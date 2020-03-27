<?php
	function event_title($post_id){
		$eventType = get_post_meta(get_the_ID($post_id),'event_type',true);
		switch($eventType){
			case "author_talk": $eventTypeText = "An author talk with";
				break;
			case "book_signing": $eventTypeText = "A book signing with";
				break;
			case "childrens_storytime": $eventTypeText = "Childrens storytime";
				break;
		}
		$eventSubtitle = geT_post_meta(get_the_ID(),'event_subtitle',true);
		
		?>
		<section class="page-heading row">
			<div class="col event-title_container">
				<?php if($eventType != "hidden"){?>
				<p class="event-type">
					<?php echo $eventTypeText;?>
				</p>
				<?php }?>
				<h1><?php echo get_the_title($post_id);?></h1>
				<?php if($eventSubtitle){?>
				<h2 class="event-subtitle"><?php echo $eventSubtitle;?>
				<?php }
				do_action('after_event_subtitle');?>
			</div>
			
		</section>
	<?php }

add_action('add_event_title','event_title',10,2);
