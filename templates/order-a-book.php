<?php /*Template Name: Order a Book Page */ 
	get_template_part('header');
	if($_GET['submit'] === "Submit"){
		if($_GET['name'] !== ""){
			do_action('send_order_request');
		}
	}
?>

<?php if(have_posts()){
		while(have_posts()){
			the_post();?>
<section class="section-title_container row">
	<div class="col text-center">
		<h1>Order a Book</h1>
	</div>
</section>
<section class="single-page_container order-page row">	
	<?php ?>
	<section class="col-12 order-page_content">
		<?php the_content();?>
	</section>
	<section class="col-12 order-page_form">
		<form id="order-a-book" action="">
			<input type="hidden" name="time_sent" value="<?php echo current_time('d-m-y H:i');?>">
			<input type="text" name="name">
			<p>
				<label for="your-name">Your name*</label>
				<input type="text" name="your-name" required>
			</p>
			<p>
				<label for="your-email">Your email*</label>
				<input type="email" name="your-email" required>
			</p>
			<p>
				<label for="book-title">Book title</label>
				<input type="text" name="book-title">
			</p>
			<p>
				<label for="book-author">Book author</label>
				<input type="text" name="book-author">
			</p>
			<p>
				<label for="more-info">More info</label>
				<textarea name="more-info" cols="30"></textarea>
			</p>
			<p><input type="submit" name="submit"></p>

		</form>
	</section>
</section>
	
<?php		}
} else { echo "<h1>Oops, nothing found here.</h1>"; } ?>

<?php get_template_part('footer');?>