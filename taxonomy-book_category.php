<?php 
	get_template_part('header');
	$archiveID = get_queried_object_id();
?>
	<section class="section-title_container row">
		<div class="col text-center">
			<h1>BOOKS</h1>
		</div>
	</section>
	<section class="archive-categories row">
		<div class="col archive-categories_inner">
			<?php $args = array(
						'taxonomy'=>'book_category',
						'hide_empty'=>true
					);
				$terms = get_terms($args);
				foreach($terms as $term){
					$highlight = false;
					$selected = false;
					$id = $term->term_id;
					if($id == $archiveID){
						$highlight = " highlight";
						$selected = " selected";
					};?>
				<a href="<?php echo get_term_link($id);?>" class="no-dec<?php echo $selected;?>">
					<span class="archive-terms<?php echo $highlight;?>">
						<?php echo ucwords($term->name);?>
					</span>
				</a>
			<?php }?>
		</div>
	</section>
<?php $orderPage = get_page_by_path('order-a-book');

if("publish" === get_post_status($orderPage->ID)){?>
	<section class="order-form_banner row">
		<div class="col">
			<p class="text-center m-0">Can't find what you're looking for? Use our Order Form to request a book or get a recommendation from our booksellers. <a href="/order-a-book"><u>Click here</u></a></p>
		</div>
	</section>
<?php }?>



<?php if(have_posts()){ ?>
<section class="archive_books-container row">
		<?php while(have_posts()){
			the_post();?>
	<article class="col-6 col-sm-4 col-md-3 col-lg-2 homepage_book archive" role="link" data-href="<?php echo get_permalink();?>">
			<img src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'full');?>"
				 alt="<?php echo get_the_title(get_the_ID());?> by <?php echo get_post_meta(get_the_ID(),'book_author',true);?> | <?php echo get_post_meta(get_the_ID(),'book_isbn',true);?>">
			<div>
				<p class="homepage_book-title"><?php echo get_the_title(get_the_ID());?></p>
				<p class="homepage_book-author"><?php echo get_post_meta(get_the_ID(),'book_author',true);?></p>
				<p class="homepage_book-price"><?php display_book_price(get_the_ID());?></p>
			</div>
	</article>
<?php		}?> </section><?php
} else { echo "<h4>There are currently no books available in this category.</h4>"; } ?>

<?php get_template_part('footer');?>