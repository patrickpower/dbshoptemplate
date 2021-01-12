<?php /*Template Name: Contact Page */ 
	get_template_part('header');?>

<?php if(have_posts()){
		while(have_posts()){
			the_post();?>
<section class="section-title_container row">
	<div class="col text-center">
		<h1>Contact</h1>
	</div>
</section>
<section class="single-page_container contact-page row">	
	<section class="col-sm-6 contact-page_address">
		<p><?php echo get_the_shop_name();?></p>
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
		
	</section>
	<section class="col-sm-6 contact-page_details">
		<p><?php echo get_the_shop_email();?></p>
		<p>tel: <?php echo get_the_shop_phone();?></p>
		
	</section>
	
	<section class="col-12 contact-page_map">
		<a class="anchor" id="find-us"></a>
		<?php echo rwmb_meta( 'google_maps', ['object_type' => 'setting'], 'shop_options' );?>
	</section>
	

</section>
<section class="section-title_container row">
	<a class="anchor" id="opening-hours"></a>
	<div class="col text-center">
		<h1>Opening Hours</h1>
	</div>
</section>

<section class="contact-page_opening-hours row">
	<?php if(get_the_content() !== ""){?>
	<section class="col-12 mb-4">
		<?php the_content();?>
	</section>
	<?php } ?>
	<section class="col-sm-6">
		<?php is_shop_open_now();?>
	</section>
	<section class="col-sm-6 hours">
		<p>
			Monday – Friday <?php echo rwmb_meta( 'mon_fri_opening', ['object_type' => 'setting'], 'shop_options' );?> - <?php echo rwmb_meta( 'mon_fri_closing', ['object_type' => 'setting'], 'shop_options' );?><br>
			Saturday <?php echo rwmb_meta( 'sat_opening', ['object_type' => 'setting'], 'shop_options' );?> - <?php echo rwmb_meta( 'sat_closing', ['object_type' => 'setting'], 'shop_options' );?><br>
			Sunday <?php echo rwmb_meta( 'sun_opening', ['object_type' => 'setting'], 'shop_options' );?> - <?php echo rwmb_meta( 'sun_closing', ['object_type' => 'setting'], 'shop_options' );?><br>
			Bank holidays <?php echo rwmb_meta( 'hols_opening', ['object_type' => 'setting'], 'shop_options' );?> - <?php echo rwmb_meta( 'hols_closing', ['object_type' => 'setting'], 'shop_options' );?>
			</p>
	</section>
</section>
<?php
	$fb = rwmb_meta( 'shop_facebook', ['object_type' => 'setting'], 'shop_options' );
	$tw = rwmb_meta( 'shop_twitter', ['object_type' => 'setting'], 'shop_options' );
	$ig = rwmb_meta( 'shop_instagram', ['object_type' => 'setting'], 'shop_options' );
	if($fb || $tw || $ig):?>

<section class="section-title_container row">
	<a class="anchor" id="opening-hours"></a>
	<div class="col text-center">
		<h1>Follow us on social media</h1>
	</div>
</section>
<section class="contact-page_social-media_links row">
	<div class="col-sm-4">
		<p class="social-media_links">
		<?php 
		echo $fb ? '<a href="'.$fb.'" target="_blank"><span><i class="fab fa-facebook-f"></i>&nbsp;Facebook</span></a><br>' : '';
		echo $tw ? '<a href="'.$tw.'" target="_blank"><span><i class="fab fa-twitter"></i>&nbsp;Twitter</span></a><br>' : '';
		echo $ig ? '<a href="'.$ig.'" target="_blank"><span><i class="fab fa-instagram"></i>&nbsp;Instagram</span></a><br>' : '';
	?></p>
	</div>
	<div class="col-sm-8">
		<?php if(is_plugin_active('instagram-feed/instagram-feed.php')){;?>
			<a class="no-dec" href="<?php echo $ig;?>"><h4>Instagram</h4></a>
			<?php echo do_shortcode('[instagram-feed num=6 cols=3 showfollow=false showheader=false showbutton=false]')?>
		<?php }?>
		
	</div>
</section>
	
<?php endif;?>
<?php		}
} else { echo "<h1>Oops, nothing found here.</h1>"; } ?>

<?php get_template_part('footer');?>