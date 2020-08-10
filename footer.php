	</main> <!-- end of Page Wrap -->
	<footer>
		<section class="footer-inner container">
			<div class="row">
				<div class="col-12 footer-logo">
					<a href="/">
				<img src="<?php echo get_shop_footer_logo();?>"
					 alt="<?php echo get_the_shop_name();?>"
					 title="<?php echo get_the_shop_name();?>"
					 width="150"
					 >
				</a>
				</div>
			</div>
			<div class="row">
				<section class="col-sm-6">
					<div class="row">
						<div class="col-12 footer-address">
							<address>
								<?php echo rwmb_meta( 'shop_address_line_1', ['object_type' => 'setting'], 'shop_options' )."<br>";
									  if(rwmb_meta( 'shop_address_line_2', ['object_type' => 'setting'], 'shop_options' )){
										 echo rwmb_meta( 'shop_address_line_2', ['object_type' => 'setting'], 'shop_options' )."<br>";
									  }
									  if(rwmb_meta( 'shop_address_line_3', ['object_type' => 'setting'], 'shop_options' )){
										 echo rwmb_meta( 'shop_address_line_3', ['object_type' => 'setting'], 'shop_options' )."&nbsp;";
									  }
									  if(rwmb_meta( 'shop_postcode', ['object_type' => 'setting'], 'shop_options' )){
										 echo rwmb_meta( 'shop_postcode', ['object_type' => 'setting'], 'shop_options' );
									  }	
								?>
							</address>
							<p aria-label="telephone"><?php echo get_the_shop_phone();?></p>
							<p><small>&copy; <?php echo get_the_shop_name()." ". date('Y');?></small></p>
						</div>
					</div>
					
					
				</section>
				<section class="col-sm-6">
					<div class="row">
						<div class="col-6 col-md-4">
							<ul>
								<?php $args = array('taxonomy'=>'book_category');
								  $bookCats = get_terms($args);
								  if(count($bookCats > 0)){
								 $linkToBooks = rwmb_meta( 'link_to_this_book_cat', ['object_type' => 'setting'], 'shop_options' );
									if(isset($linkToBooks)){ $link = $linkToBooks;} else{  $link = $bookCats[0]->term_id;}
								?>
								<li><a href="/">Home</a></li>
								<li><a href="<?php echo $link;?>">Books</a></li>
								<li><a href="/contact">Contact us</a></li>
								<li><a href="/contact#find-us">Find us</a></li>
								<li><a href="/contact#opening-hours">Opening hours</a></li>
							</ul>
					
						</div>
						<div class="col-md-4">
							<ul>
								<li><a href="/events">Events</a></li>
								<?php if( rwmb_meta('enable_blog_on_website',['object_type' => 'setting'], 'shop_options' ) == "1"):?>
								<li><a href="/category/news">
									<?php echo rwmb_meta( 'display_title_for_blog', ['object_type' => 'setting'], 'shop_options' ) == "display_as_news" ? "News" : "Blog";?></a>
								</li>
								<?php endif;?>
								<li><a href="/privacy-policy">Privacy policy</a></li>
<!--								<li><a href="/cookie-policy">Cookie policy</a></li>-->
							</ul>
					
						</div>
					</div>
				</section>
			</div>
		</section>
		<section class="footer-end container-fluid">
			<div class="footer-end_inner container">
				<div class="row">
					<div class="col">
						<p class="text-center"><small><a href="https://patrickpower.design" target="_blank"><u>Website design</u></a> by patrickpower.design</small></p>
					</div>
				</div>
			</div>
		</section>
	</footer>
	
<?php wp_footer(); ?>
</body>
</html>