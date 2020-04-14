<?php
	add_action('homepage_events','show_events_on_homepage');

	function show_events_on_homepage(){
		$show = rwmb_meta( 'show_events_on_homepage', ['object_type' => 'setting'], 'shop_options' );
		if($show !== 1) return;
?>

<section class="section-title_container row">
	<div class="col text-center">
		<h1>Events</h1>
	</div>
</section>
<section class="homepage_events row">	
	
	<?php
		$todaysDate = date('Y-m-d');
		$args = array(
			'post_type' => 'event',
			'posts_per_page'=>4,
			'meta_query'=>array(
				array(
					'key'=>'event_date',
					'value'=>$todaysDate,
					'compare'=> '>='
				)
			)
		);
		$homepageEvents = get_posts($args);
	
		if(empty($homepageEvents)){
			echo '<p class="no-events_notice">We currently have no events lined up. Please sign up to our mailing list to be notified when we announce events.</p>';
		}
		foreach ($homepageEvents as $event){
		$postponed = get_post_meta($event->ID,'event_postponed',true);
		$soldOut = get_post_meta($event->ID,'event_sold_out',true);
		$cancelled = get_post_meta($event->ID,'event_cancelled',true);
		?>
		<article class="homepage_single-event col-6 col-md-3" role="link" data-href="<?php echo get_permalink($event->ID);?>">
			<h2><?php echo get_the_title($event->ID);?></h2>
			<h3><?php echo get_post_meta($event->ID,'event_subtitle',true);?></h3>
			<p><?php echo date('l jS F Y',strtotime(get_post_meta($event->ID,'event_date',true)));?>
			<?php if($postponed){ echo "<br><strong style='color:var(--danger)'>Event postponed</strong>";}
			      if($soldOut){ echo "<br><strong style='color:var(--danger)'>Event sold out</strong>";}
			      if($cancelled){ echo "<br><strong style='color:var(--danger)'>Event cancelled</strong>";}?>
			</p>
		</article>
		<?php } ?>

</section>
		
		
<?php	do_action('after_homepage_events');}