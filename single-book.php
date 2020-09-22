<?php get_template_part('header');?>

<?php if(have_posts()){ while(have_posts()){ the_post();
?>
<article class="single-page_container row">
	
	<aside class="col-sm-4 single-event_image-container">
		
		<img src="<?php echo get_the_post_thumbnail_url(get_the_ID());?>"
			 alt="<?php echo get_the_title().' by '.get_post_meta(get_the_ID(),'book_author',true);?>"
			 class="single_book-cover">
		
	</aside>
	<section class="col-sm-8 single-event_content">
	
		<?php 	#############################
				/* Book title hook */ 
				do_action('add_book_title');
				
			
				############################
				/* Book price hook */
				do_action('add_book_price');
				/* Also can hook in to after_book_price */							
											
				############################
				/* Reserve button hook */
				echo"<!-- BB -->";
				do_action('add_reserve_book');
				/* Also can hook in to after_reserve_button */
				echo "<!-- AA -->";										
											
				############################
				/* Book meta hook */
				do_action('book_page_meta');
			
		?>

		<section class="page-body row">
			<div class="col">
				
				<?php if(rwmb_meta( 'enable_book_reservations', ['object_type' => 'setting'], 'shop_options' ) !== 1 && rwmb_meta( 'enable_book_reservation_message', ['object_type' => 'setting'], 'shop_options' ) !== ""){ ?>
				<div class="reservations_notice"><?php echo rwmb_meta( 'enable_book_reservation_message', ['object_type' => 'setting'], 'shop_options' );?></div>
				<?php }?>
				
				<?php the_content();?>
			</div>
		</section>
											
		
	</section>

</article>
<?php
		############################
		/* Similar Books */
		do_action('similar_books');
		?>
<?php		}
} else { echo "<h1>Oops, nothing found here.</h1>"; } ?>

<?php get_template_part('footer');?>