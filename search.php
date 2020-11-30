<?php 
	get_template_part('header');
?>
	<section class="section-title_container row">
		<div class="col text-center">
			<h1>Search results for “<?php echo $_GET['s'];?>”</h1>
		</div>
	</section>
<?php if(have_posts()){ ?>
	<section class="archive_books-container row">
<?php 	while(have_posts()){
			the_post();
	$id = get_the_ID();?>

<article class="col-6 col-sm-4 col-md-3 col-lg-2 homepage_book archive" role="link" data-href="<?php echo get_permalink();?>">
		<img src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'full');?>"
			 alt="<?php echo get_the_title(get_the_ID());?> by <?php echo get_post_meta(get_the_ID(),'book_author',true);?> | <?php echo get_post_meta(get_the_ID(),'book_isbn',true);?>">
		<div>
			<p class="homepage_book-title"><?php echo get_the_title(get_the_ID());?></p>
			<p class="homepage_book-author"><?php echo get_post_meta(get_the_ID(),'book_author',true);?></p>
			<p class="homepage_book-price"><?php display_book_price(get_the_ID());?></p>
		</div>
</article>


<?php } ?></section>
<?php
} else { echo "<h1>Oops, nothing found here.</h1>"; } ?>
</article>
<?php get_template_part('footer');?>