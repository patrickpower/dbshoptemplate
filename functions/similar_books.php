<?php
	function add_similar_books(){
		$cats = get_the_terms(get_the_ID(),'book_category');
		$catName = $cats[0]->name;
		$catID = $cats[0]->term_id;
		$thisBook = get_the_ID();
?>

		<section class="section-title_container row">
			<div class="col text-center">
				<a class="no-dec" href="<?php echo get_term_link($cats[0]->term_id);?>">
					<h1>More <?php echo $catName;?></h1>
				</a>
			</div>
		</section>
		<section class="similar-books_container row">
			<?php 
			$args = array(
				'post_type'=>'book',
				'posts_per_page'=>6,
				'exclude'=>$thisBook,
				'tax_query'=>array(
					array(
						'taxonomy'=>'book_category',
						'field'=>'term_id',
						'terms'=>$catID
					)
				)
			);
			$books = get_posts($args);
			foreach ($books as $book){?>
				<article class="col-6 col-sm-4 col-md-3 col-lg-2 homepage_book" role="link" data-href="<?php echo get_permalink($book->ID);?>">

						<img src="<?php echo get_the_post_thumbnail_url($book->ID,'full');?>"
							 alt="<?php echo get_the_title($book->ID);?> by <?php echo get_post_meta($book->ID,'book_author',true);?> | <?php echo get_post_meta($book->ID,'book_isbn',true);?>">
						<div>
							<p class="homepage_book-title"><?php echo get_the_title($book->ID);?></p>
							<p class="homepage_book-author"><?php echo get_post_meta($book->ID,'book_author',true);?></p>
							<p class="homepage_book-price"><?php display_book_price($book->ID);?></p>
						</div>
				</article>
				
			<?php } ?>
			
		</section>
		
		
<?php	}
	add_action('similar_books','add_similar_books');