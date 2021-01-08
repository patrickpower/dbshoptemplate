<?php
	/* Display books on homepage */
	add_action('homepage_books','show_books_on_homepage');
	
	function show_books_on_homepage(){
	
		$categories = rwmb_meta( 'book_cats_on_homepage', ['object_type' => 'setting'], 'shop_options' );
		foreach ($categories as $cat){
			$id = $cat->term_id;
			$name = $cat->name;
			$chosen_books = get_term_meta($id,'chosen_book',true);
			?>
		<section class="section-title_container row">
			<div class="col text-center">
				<a class="no-dec" href="<?php echo get_term_link($id);?>"><h1><?php echo $name;?></h1></a>
			</div>
		</section>
		<section class="homepage_books-row row">
			<?php $number = count($chosen_books);
			foreach ($chosen_books as $chosen_book) {?>
				<article class="col-6 col-sm-4 col-md-3 col-lg-2 homepage_book on_homepage" role="link" data-href="<?php echo get_permalink($chosen_book);?>">

						<img src="<?php echo get_the_post_thumbnail_url($chosen_book,'full');?>"
							 alt="<?php echo get_the_title($chosen_book);?> by <?php echo get_post_meta($chosen_book,'book_author',true);?> | <?php echo get_post_meta($chosen_book,'book_isbn',true);?>">
						<div>
							<p class="homepage_book-title"><?php echo get_the_title($chosen_book);?></p>
							<p class="homepage_book-author"><?php echo get_post_meta($chosen_book,'book_author',true);?></p>
							<p class="homepage_book-price"><?php display_book_price($chosen_book);?></p>
						</div>
				</article>
			<?php } ?>
			
			
			<?php $args = array(
					'post_type'=>'book',
					'posts_per_page'=>7 - $number,
					'exclude' => $chosen_books,
					'order'=>'DESC',
					'tax_query'=>array(
						array(
							'taxonomy'=>'book_category',
							'field'=>'term_id',
							'terms'=>$id
						)
					)
				);
			$homepageBooks = get_posts($args);
			foreach ($homepageBooks as $book) {?>
				<article class="col-6 col-sm-4 col-md-3 col-lg-2 homepage_book on_homepage" role="link" data-href="<?php echo get_permalink($book->ID);?>">

						<img src="<?php echo get_the_post_thumbnail_url($book->ID,'full');?>"
							 alt="<?php echo get_the_title($book->ID);?> by <?php echo get_post_meta($book->ID,'book_author',true);?> | <?php echo get_post_meta($book->ID,'book_isbn',true);?>">
						<div>
							<p class="homepage_book-title"><?php echo get_the_title($book->ID);?></p>
							<p class="homepage_book-author"><?php echo get_post_meta($book->ID,'book_author',true);?></p>
							<p class="homepage_book-price"><?php display_book_price($book->ID);?></p>
						</div>
				</article>
			<?php } ?>
			<div class="col-12 d-flex justify-content-center pt-4">
				<a href="<?php echo get_term_link($id);?>" class="btn btn-primary">See all...</a>      
			</div>
		</section>

		<?php } }


