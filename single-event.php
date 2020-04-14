<?php get_template_part('header');?>

<?php if(have_posts()){ while(have_posts()){ the_post();
?>
<article class="single-page_container row">
	
	<aside class="col-sm-4 single-event_image-container">
		<?php
			#############################
			/* Event Images hook */ 
			do_action('add_event_images');
			/* Can also hook in to after_event_subtitle */?>							
		
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
									
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "<?php echo "Event";?>",
  "name": "<?php echo get_the_title();?>",
  "description": "<?php echo sanitize_text_field(excerpt(30,get_the_ID()));?>",
  <?php $mainAuthorImage = get_post_meta(get_the_ID(),'main_author_image',true);$mainBookJacket = get_post_meta(get_the_ID(),'main_book_jacket',true);
		if($mainAuthorImage){?>
	"image": "<?php echo wp_get_attachment_image_src($mainAuthorImage,'full')[0];?>",	
  <?php } else {									
?>
"image": "<?php echo wp_get_attachment_image_src($mainBookJacket,'full')[0];?>",	
<?php }?>
  "startDate": "<?php echo date('Y-m-d\T',strtotime(get_post_meta(get_the_ID(),'event_date',true))).date('H:i',strtotime(get_post_meta(get_the_ID(),'event_start_time',true)));?>",
  <?php if(get_post_meta(get_the_ID(),'event_end_time',true)){?> 
  "endDate": "<?php echo date('H:i',get_post_meta(get_the_ID(),'event_end_time',true));?>",
  <?php }
	if(!(get_post_meta(get_the_ID(),'event_postponed',true) || get_post_meta(get_the_ID(),'event_cancelled',true))){?>										
  "eventStatus": "https://schema.org/EventScheduled",
  <?php } elseif(get_post_meta(get_the_ID(),'event_postponed',true)){?>
  "eventStatus": "https://schema.org/EventPostponed",
  <?php } elseif(get_post_meta(get_the_ID(),'event_cancelled',true)){?>
  "eventStatus": "https://schema.org/EventCancelled",
  <?php }?>
  "eventAttendanceMode": "https://schema.org/OfflineEventAttendanceMode",
  "location": {		
    "@type": "Place",
    "name": "<?php echo get_the_shop_name();?>",
    "address": {
      "@type": "PostalAddress",
      "streetAddress": "<?php echo rwmb_meta( 'shop_address_line_1', ['object_type' => 'setting'], 'shop_options' );?>",
      "addressLocality": "<?php echo rwmb_meta( 'shop_address_line_2', ['object_type' => 'setting'], 'shop_options' );?>",
      "postalCode": "<?php echo rwmb_meta( 'shop_postcode', ['object_type' => 'setting'], 'shop_options' );?>",
      "addressCountry": "GB"
    }
  },
  "performer": {
    "@type": "Person",
    "name": "<?php echo get_the_title();?>"
  },
  "offers": {
    "@type": "Offer",
    "name": "General Admission",
    "price": "<?php echo str_replace('£','',get_post_meta(get_the_ID(),'event_price',true));?>",
    "priceCurrency": "GBP",
    "validFrom": "<?php echo get_the_date('Y-m-d');?>",
    "url": "<?php echo get_permalink(get_the_ID());?>",
	<?php if(get_post_meta(get_the_ID(),'event_sold_out',true)){?>
	"availability": "https://schema.org/SoldOut"
	<?php } else { ?>
    "availability": "https://schema.org/InStock"
	<?php }?>
  }
}
</script>

<?php		}
} else { echo "<h1>Oops, nothing found here.</h1>"; } ?>

<?php get_template_part('footer');?>