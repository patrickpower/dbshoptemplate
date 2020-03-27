<?php get_template_part('header');?>

<?php if(have_posts()){
		while(have_posts()){
			the_post();?>
<article class="single-page_container">	
	<section class="page-heading row">
		<div class="col">
			<h1><?php echo get_the_title();?></h1>
		</div>
	</section>
	<section class="post-details row">
		<div class="col">
			<p class="highlight d-inline-block">Posted <?php echo get_the_date('jS F Y');?></p>
		</div>
	</section>
	<section class="page-body row">
		<div class="col">
			<?php the_content();?>
		</div>
	</section>

</article>
<?php		}
} else { echo "<h1>Oops, nothing found here.</h1>"; } ?>

<?php get_template_part('footer');?>