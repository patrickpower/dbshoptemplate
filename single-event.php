<?php get_template_part('header');?>

<?php if(have_posts()){ while(have_posts()){ the_post();
?>
<article class="single-page_container row">
	
	<aside class="col-sm-4 single-event_image-container">
		<?php
			#############################
			/* Event Images hook */ 
			do_action('add_event_images');
			/* Can also hook in to after_event_subtitle */		?>							
		
	</aside>
	<section class="col-sm-8 single-event_content">
	
		<?php 	#############################
				/* Event title hook */ 
				do_action('add_event_title');
				/* Can also hook in to after_event_subtitle */
				
			
				############################
				/* Event date hook */
				do_action('add_event_date');
				/* Can also hook into after_event_date */
			
				############################
				/* Event tickets hook */
				do_action('add_event_ticket_info');
				/* Can also hook into after_event_ticket_info */
		?>

		<section class="page-body row">
			<div class="col">
				<?php the_content();?>
			</div>
		</section>
		
	</section>

</article>
<?php		}
} else { echo "<h1>Oops, nothing found here.</h1>"; } ?>

<?php get_template_part('footer');?>