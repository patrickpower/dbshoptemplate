<?php get_template_part('header');?>

<section class="section-title_container row">
	<div class="col text-center">
		<h1>Welcome to <?php echo get_the_shop_name(true);?></h1>
	</div>
</section>

<?php do_action('after_homepage_title');?>

<section class="homepage_banner-image row">
	<div class="col">
		<?php $path = rwmb_meta( 'homepage_banner', ['object_type' => 'setting'], 'shop_options' );
		
	foreach ($path as $image){
		$id = $image['ID'];
		$imageSrc = wp_get_attachment_image_src($id,'full')[0];
		$mobPath = rwmb_meta( 'homepage_banner_mobile', ['object_type' => 'setting'], 'shop_options' );
		foreach ($mobPath as $mobImage){
			$mobID = $mobImage['ID'];
			$mobImageSrc = wp_get_attachment_image_src($mobID,'full')[0];
		}?>
			
	<picture>
			<?php if($mobPath):?>
			<source srcset="<?php echo $mobImageSrc;?>" media="(max-width:767px)">
			<?php endif;?>
			<img src="<?php echo $imageSrc;?>"
				 alt="<?php echo get_the_shop_name();?>">
		</picture>
		
		<?php } ?>
	</div>
</section>

<?php do_action('homepage_events');
		/* Also hook in to after_homepage_events */
	
?>



<?php do_action('homepage_books');
do_action('homepage_newsletter');
?>

<?php if(is_plugin_active('instagram-feed/instagram-feed.php')){?>
<section class="section-title_container row">
	<div class="col text-center">
		<h1>Instagram</h1>
	</div>
</section>

<section class="homepage-instagram row">
	<div class="col-12">
		<?php echo do_shortcode('[instagram-feed num=6 cols=6 showheader=false showbutton=false showfollow=false ]');?>
	</div>
</section>
<?php }?>


<section class="section-title_container row">
	<div class="col text-center">
		<h1>Find Us</h1>
	</div>
</section>
<section class="homepage_find-us row">
	<div class="col-md-8 google-maps">
		<?php echo rwmb_meta( 'google_maps', ['object_type' => 'setting'], 'shop_options' );?>
	</div>
	<div class="col-md-4">
		<h5><?php echo get_the_shop_name()?></h5>
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
		<h6>Opening times</h6>
		<p>
			Monday – Friday <?php echo rwmb_meta( 'mon_fri_opening', ['object_type' => 'setting'], 'shop_options' );?> - <?php echo rwmb_meta( 'mon_fri_closing', ['object_type' => 'setting'], 'shop_options' );?><br>
			Saturday – <?php echo rwmb_meta( 'sat_opening', ['object_type' => 'setting'], 'shop_options' );?> - <?php echo rwmb_meta( 'sat_closing', ['object_type' => 'setting'], 'shop_options' );?><br>
			<?php if(rwmb_meta( 'sun_closing', ['object_type' => 'setting'], 'shop_options' )){?>
			Sunday <?php echo rwmb_meta( 'sun_opening', ['object_type' => 'setting'], 'shop_options' );?> - <?php echo rwmb_meta( 'sun_closing', ['object_type' => 'setting'], 'shop_options' );?><br>
			<?php } else {?>
			Sunday – Closed
			<?php }?>
			Bank holidays – <?php echo rwmb_meta( 'hols_opening', ['object_type' => 'setting'], 'shop_options' );?> - <?php echo rwmb_meta( 'hols_closing', ['object_type' => 'setting'], 'shop_options' );?>
			</p>
	</div>
</section>



<?php get_template_part('footer');?>