<?php
	add_action('homepage_newsletter','add_newsletter');
	function add_newsletter(){
		$show = rwmb_meta( 'display_newsletter_on_homepage', ['object_type' => 'setting'], 'shop_options' );
		if ($show !== 1) return;
		$shortcode = rwmb_meta( 'newsletter_code', ['object_type' => 'setting'], 'shop_options' )
	?>

<section class="homepage-newsletter row">
		<div class="col-12 text-center"><h4>Join our mailing list</h4></div>
		<?php if($shortcode){?>
		<div class="col-12"><?php echo do_shortcode($shortcode);?></div>
		<?php }?>
	</section>

	<?php		
	}