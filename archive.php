<?php 
	get_template_part('header');
	$archiveID = get_queried_object_id();
?>
	<section class="section-title_container row">
		<div class="col text-center">
			<h1><?php echo rwmb_meta( 'display_title_for_blog', ['object_type' => 'setting'], 'shop_options' ) == "display_as_news" ? "News" : "Blog";?></h1>
		</div>
	</section>
<article class="single-page_container archive row">
<?php if(have_posts()){
		while(have_posts()){
			the_post();
	$id = get_the_ID();?>

<div class="col-md-6 events-page_event">
	<a class="no-dec" href="<?php echo get_permalink($id);?>">
		<p class="event-page_title"><?php echo get_the_title($id);?></p>
		<p class="event-page_date">Posted <?php echo get_the_date('jS F Y');?>
		<?php if(rwmb_meta( 'use_author_names', ['object_type' => 'setting'], 'shop_options' )){?>
			by <?php echo get_the_author();?>
		<?php }?>
		</p>
		<p class="event-page_excerpt"><?php echo excerpt(30,$id);?></p>
		<p class="event-page_reserve">
			Read more&hellip;
		</p>
	</a>
</div>	


<?php		}
} else { echo "<h1>Oops, nothing found here.</h1>"; } ?>
</article>
<?php get_template_part('footer');?>