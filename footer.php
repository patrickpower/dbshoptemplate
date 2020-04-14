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
										 echo rwmb_meta( 'shop_address_line_3', ['object_type' => 'setting'], 'shop_options' );
									  }
									  if(rwmb_meta( 'shop_postcode', ['object_type' => 'setting'], 'shop_options' )){
										 echo "&nbsp;". rwmb_meta( 'shop_postcode', ['object_type' => 'setting'], 'shop_options' );
									  }	
								?>
							</address>
							<p aria-label="telephone"><?php echo get_the_shop_phone();?></p>
						</div>
					</div>
					
					
				</section>
				<section class="col-sm-6">
					<div class="row">
						<div class="col-6 col-md-4">
							<ul>
								<li><a href="/">Home</a></li>
								<li><a href="/contact">Contact us</a></li>
								<li><a href="/contact#find-us">Find us</a></li>
								<li><a href="/contact#opening-hours">Opening hours</a></li>
							</ul>
					
						</div>
						<div class="col-6 col-md-4">
							<ul>
								<?php
									$args = array(
										'taxonomy'=>'book_category',
										'number' => 4,
										'hide_empty'=>true
									);
									$bookCats = get_terms($args);
									foreach ($bookCats as $cat){?>
								<li><a href="<?php echo get_term_link($cat->term_id);?>"><?php echo ucwords($cat->name);?></a></li>		
								<?php }?>
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
								<li><a href="#">Privacy policy</a></li>
								<li><a href="#">Cookie policy</a></li>
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
						<p class="text-center">&copy; <?php echo get_the_shop_name()." ". date('Y');?></p>
					</div>
				</div>
			</div>
		</section>
	</footer>
	
<?php wp_footer(); ?>
</body>
</html>