<?php
	add_action('add_event_ticket_info','event_tickets');
	function event_tickets(){
		// Ticket Info
		$ticketPrice = get_post_meta(get_the_ID(),'event_price',true);
		$isSoldOut = get_post_meta(get_the_ID(),'event_sold_out',true);
		$isPostponed = get_post_meta(get_the_ID(),'event_postponed',true);
		$isCancelled = get_post_meta(get_the_ID(),'event_cancelled',true);
		$cancellationText = get_post_meta(get_the_ID(),'postpone_text',true);
		// Ticket info text
		$ticketText = get_post_meta(get_the_ID(),'event_ticket_text',true);
		$ticketText = str_replace('%price%',$ticketPrice,$ticketText);
		
		if($isSoldOut){
			$ticketText = "<span style='color:var(--danger)'>Tickets for this event are now sold out.</span>";
		} if($isPostponed){
			if($cancellationText){
				$ticketText = "<span style='color:var(--danger)'>".$cancellationText."</span>";
			} else {
				$ticketText = "<span style='color:var(--danger)'>Unfortunately this event has been postponed. Please call the shop for more information</span>";
			}
		}if($isCancelled){
			if($cancellationText){
				$ticketText = "<span style='color:var(--danger)'>".$cancellationText."</span>";
			} else {
				$ticketText = "<span style='color:var(--danger)'>Unfortunately this event has been cancelled. Please call the shop for more information</span>";
			}
		}
		//External Tickets
		$ticketLink = get_post_meta(get_the_ID(),'external_ticket_link',true);
		
		if($ticketLink){?>
		<section class="external-link row">
			<div class="col-12">
				<p>Tickets <?php echo $ticketPrice;?></p>
			</div>
			<div class="col-12">
				<a href="<?php echo $ticketLink;?>" target="_blank" class="no-underline" role="button">
					<p class="event-ticket_external-link">
						<img src="<?php images();?>/ticket.jpg" width="24">
						<span class="highlight"> Reserve tickets</span>
					</p>
				</a>
			</div>
		</section>
		<?php } else {
		 if($ticketText):?>
			<section class="event-ticket-text row">
				<div class="col">
					<p><?php echo $ticketText; ?>
				</div>
			</section>
		<?php endif;
		}
		do_action('after_event_ticket_info');
	}