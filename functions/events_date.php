<?php
	add_action('add_event_date','event_date',10,2);
	
	function event_date($post_id){
		$eventDate = get_post_meta(get_the_ID(),'event_date',true);
		$eventStart = get_post_meta(get_the_ID(),'event_start_time',true);
		$eventEnd = get_post_meta(get_the_ID(),'event_end_time',true);
		$isPostponed = get_post_meta(get_the_ID(),'event_postponed',true);
		$isCancelled = get_post_meta(get_the_ID(),'event_cancelled',true);
		?>
		<section class="event-date row">
			<div class="col">
				<p class="event-date">
					<?php if($isPostponed || $isCancelled){ echo "<del>";}?>
					<!-- The date -->
					<?php echo date('l jS F Y',strtotime($eventDate));?>
					<!-- the start time -->
					<?php if($eventStart){
						if($eventEnd){
							echo " from ";
						} else {
							echo " at ";
						}	
						echo date('g:ia',strtotime($eventStart));
					}?>
					<!-- the end time -->
					<?php if($eventEnd){
							echo " – ". date('g:ia',strtotime($eventEnd));
					}
				if($isPostponed || $isCancelled){ echo "</del>";}?>
					
				</p>
				<?php do_action('after_event_date');?>
			</div>
		</section>
	<?php }