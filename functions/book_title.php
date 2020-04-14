<?php
	add_action('add_book_title','book_title');
	function book_title(){
		$title = get_the_title();
		$author = get_post_meta(get_the_ID(),'book_author',true);
		$editor = get_post_meta(get_the_ID(),'book_editor',true);
		
		?>
		<section class="page-heading row">
			
			<div class="col-12 book-title_container">
				<h1><?php echo $title;?></h1>
				<?php if($author){ ?>
				<h2 class="book-author-name"><span>by</span> <?php echo $author;?>
				<?php } if($editor){?>
				<h2 class="book-editor-name"><span>edited by</span> <?php echo $editor;?>
				<?php }?>
			</div>
			
			
		</section>
		
<?php }