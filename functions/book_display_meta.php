<?php
	add_action('book_page_meta','add_book_meta',10,2);
	
	function add_book_meta(){
		$isbn = get_post_meta(get_the_ID(),'book_isbn',true);
		$publisher = get_post_meta(get_the_ID(),'book_publisher',true);
		$pubdate = get_post_meta(get_the_ID(),'book_pubdate',true);
		if($pubdate){
			$pubdate = date('F Y',strtotime(get_post_meta(get_the_ID(),'book_pubdate',true)));
		}
		$genre = get_post_meta(get_the_ID(),'book_genre',true);
		$format = get_post_meta(get_the_ID(),'book_format',true);?>
		<section class="book-meta_container row">
			<div class="col">
				<?php echo $genre ? '<p class="book_meta genre">'.$genre.'</p>' : '';?>
				<?php echo $format ? '<p class="book_meta genre">'.$format.'</p>' : '';?>
				<?php echo $isbn ? '<p class="book_meta isbn">'.$isbn.'</p>' : '';?>
				<?php echo $publisher ? '<p class="book_meta genre">Published by '.$publisher.'</p>' : '';?>
				<?php echo $pubdate ? '<p class="book_meta genre">Published '.$pubdate.'</p>' : '';?>
				
			</div>
		</section>
		<section class="book-cat-container row">
			<div class="col">
				<p>Books &gt;
				<?php $cats = get_the_terms(get_the_ID(),'book_category');
					 $amount = count($cats);
					 $count=0;
					 foreach ($cats as $cat){
						 $count++;
						 $catID = $cat->term_id;
						 $catName = $cat->name;
						 echo "<a class='single-book_cats' href='" .get_term_link($catID). "'>" .$catName. "</a>";
						 if($count !== $amount){
							 echo " &gt; ";
						 }
					 }?>
				</p>
			</div>
		</section>
	<?php }