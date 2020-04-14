<?php
	function homepage_notice(){
		if(rwmb_meta( 'enable_customer_notice', ['object_type' => 'setting'], 'shop_options' ) !== 1) return;
		?>
		<section class="row homepage_notice">
			<div class="col">
				<p><strong><?php echo rwmb_meta( 'customer_notice_heading', ['object_type' => 'setting'], 'shop_options' );?></strong></p>
				<p class="text-center">
					<?php echo rwmb_meta( 'customer_notice', ['object_type' => 'setting'], 'shop_options' );?>
				</p>
			</div>
		</section>
<?php
		
	}

add_action('after_homepage_title','homepage_notice');