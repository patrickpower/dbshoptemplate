<?php 
	get_template_part('header');
?>
	<section class="order-form_banner row mt-0">
		<div class="col">
			<p class="text-center m-0">Can't find what you're looking for? Use our Order Form to request a book or get a recommendation from our booksellers. <a href="/order-a-book"><u>Click here</u></a></p>
		</div>
	</section>
	<section class="section-title_container row mt-5">
		<div class="col text-center">
			<h1>Search results for “<?php echo $_GET['s'];?>”</h1>
		</div>
	</section>
	
	<section class="archive_books-container row mt-n3">
<?php if(have_posts()){ ?>
	
		
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


<?php } ?>

<?php
} else { echo "<p class='text-center w-100 text-muted'>Unfortunately nothing matched your search terms."; } ?>
</section>
<section class="order-form_banner row mt-0">
		<div class="col">
			<p class="text-center m-0">Can't find what you're looking for? Use our Order Form to request a book or get a recommendation from our booksellers. <a href="/order-a-book"><u>Click here</u></a></p>
		</div>
	</section>
<?php get_template_part('footer');?>