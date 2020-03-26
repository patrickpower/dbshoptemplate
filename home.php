<?php get_template_part('header');?>

<section class="section-title_container row">
	<div class="col text-center">
		<h1>Welcome to the Bookshop</h1>
	</div>
</section>

<section class="homepage_banner-image row">
	<div class="col">
		<picture>
			<img src="<?php images();?>/homepage_banner.jpg"
				 alt="the Bookshop">
		</picture>
		
	</div>
</section>

<section class="section-title_container row">
	<div class="col text-center">
		<h1>Events</h1>
	</div>
</section>
<section class="homepage_events row">	
	
	<article class="homepage_single-event col-6 col-md-3" role="link">
		<h2>Nikita Lalwani</h2>
		<h3>You People</h3>
		<p>Tuesday 3rd July at 6.30pm</p>
	</article>
	<article class="homepage_single-event col-6 col-md-3" role="link">
		<h2>Nikita Lalwani</h2>
		<h3>You People</h3>
		<p>Tuesday 3rd July at 6.30pm</p>
	</article>
	<article class="homepage_single-event col-6 col-md-3" role="link">
		<h2>Nikita Lalwani</h2>
		<h3>You People</h3>
		<p>Tuesday 3rd July at 6.30pm</p>
	</article>
	<article class="homepage_single-event col-6 col-md-3" role="link">
		<h2>Nikita Lalwani</h2>
		<h3>You People</h3>
		<p>Tuesday 3rd July at 6.30pm</p>
	</article>
	
<!--	<p class="no-events_notice">We currently have no events lined up. Please sign up to our mailing list to be notified when we announce events.</p>-->
	
	
</section>


<section class="section-title_container row">
	<div class="col text-center">
		<h1>New Books</h1>
	</div>
</section>
<section class="homepage_books-row row">
	<article class="col-6 col-sm-4 col-md-3 col-lg-2 homepage_book" role="link" data-href="#">
			
			<img src="<?php images();?>/dev-images/jacket_1.jpg"
				 alt="Book Title by Book Author | 97811223123">
			<div>
				<p class="homepage_book-title">Crusaders</p>
				<p class="homepage_book-author">Dan Jones</p>
				<p class="homepage_book-price">£9.99</p>
			</div>
	</article>
	<article class="col-6 col-sm-4 col-md-3 col-lg-2 homepage_book">
			<img src="<?php images();?>/dev-images/jacket_2.jpg"
				 alt="Book Title by Book Author | 97811223123">
			<div>
				<p class="homepage_book-title">Crusaders</p>
				<p class="homepage_book-author">Dan Jones</p>
				<p class="homepage_book-price">£9.99</p>
			</div>
	</article>
	<article class="col-6 col-sm-4 col-md-3 col-lg-2 homepage_book">
			<img src="<?php images();?>/dev-images/jacket_3.jpg"
				 alt="Book Title by Book Author | 97811223123">
			<div>
				<p class="homepage_book-title">Crusaders</p>
				<p class="homepage_book-author">Dan Jones</p>
				<p class="homepage_book-price">£9.99</p>
			</div>
	</article>
	<article class="col-6 col-sm-4 col-md-3 col-lg-2 homepage_book">
			<img src="<?php images();?>/dev-images/jacket_4.jpg"
				 alt="Book Title by Book Author | 97811223123">
			<div>
				<p class="homepage_book-title">Crusaders</p>
				<p class="homepage_book-author">Dan Jones</p>
				<p class="homepage_book-price">£9.99</p>
			</div>
	</article>
	<article class="col-6 col-sm-4 col-md-3 col-lg-2 homepage_book">
			<img src="<?php images();?>/dev-images/jacket_5.jpg"
				 alt="Book Title by Book Author | 97811223123">
			<div>
				<p class="homepage_book-title">Crusaders</p>
				<p class="homepage_book-author">Dan Jones</p>
				<p class="homepage_book-price">£9.99</p>
			</div>
	</article>
	<article class="col-6 col-sm-4 col-md-3 col-lg-2 homepage_book">
			<img src="<?php images();?>/dev-images/jacket_6.jpg"
				 alt="Book Title by Book Author | 97811223123">
			<div>
				<p class="homepage_book-title">Crusaders</p>
				<p class="homepage_book-author">Dan Jones</p>
				<p class="homepage_book-price">£9.99</p>
			</div>
	</article>
	
</section>


<section class="section-title_container row">
	<div class="col text-center">
		<h1>Instagram</h1>
	</div>
</section>

<section class="homepage-instagram row">
	<div class="col-12">
		<?php echo do_shortcode('[instagram-feed]');?>
	</div>
</section>



<section class="section-title_container row">
	<div class="col text-center">
		<h1>Find Us</h1>
	</div>
</section>
<section class="homepage_find-us row">
	<div class="col-sm-8">
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4454.599274619627!2d-0.7778964151434561!3d51.56963372458295!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x487689c17bc6d5c5%3A0xba5d25b8732d9e32!2sThe%20Marlow%20Bookshop!5e0!3m2!1sen!2suk!4v1585245240851!5m2!1sen!2suk" width="100%" height="350" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
	</div>
	<div class="col-sm-4">
		<h5>Bookshop name</h5>
		<address>
			123 Main Street,<br>
			Smalltown<br>
			East Shire A34 10R
		</address>
		<h6>Opening times</h6>
		<p>
			Monday – Friday 9:00 - 18:00<br>
			Saturday 9:00 - 18:00<br>
			Sunday 9:00 - 18:00<br>
			Bank holidays 09:00 - 18:00
			</p>
	</div>
</section>



<?php get_template_part('footer');?>