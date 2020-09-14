<?php
	// Reserve a book
	add_action('add_reserve_book','reserve_button',10,2);
	function reserve_button(){
		$isBookAvailable = get_post_meta(get_the_ID(),'book_available',true);
		if(!$isBookAvailable) return; ?>
		<div class="reserve_button_holder">
			<p class="reserve_button highlight d-inline-block" role="button" id="reserve_a_book">Reserve a copy <img src="<?php images();?>/right_arrow.png" width="13"></p>
			
			<div role="modal" class="reserve_button_modal_outer">
				<p id="close-reserve_modal">&times;</p>
				<p class="reserve_button highlight d-inline-block" role="button">Reserve a copy <img src="<?php images();?>/right_arrow.png" width="13"></p>
				<p class="reserve_button_modal_content">Reserve a copy of <em><?php echo get_the_title();?></em> for collection at <?php echo get_the_shop_name(true);?>. If you provide your email address below, we will contact you when this title is ready for collection.</p>
				<form id="reserve_a_book" action="">
					<input type="hidden" value="book_reservation_submitted" name="reservation_request">
					<input type="hidden" value="<?php echo get_the_title();?>" name="book_title">
					<input type="hidden" value="<?php echo get_the_ID();?>" name="book_id">
					<input type="hidden" value="<?php echo get_post_meta(get_the_ID(),'book_author',true);?>" name="book_author">
					<input type="hidden" value="<?php echo get_post_meta(get_the_ID(),'book_price',true);?>" name="book_price">
					<p>
						<label for="reserve_name">Your name</label>
						<input type="text" name="reserve_name" required>
					</p>
					<p>
						<label for="reserve_email">Your email</label>
						<input type="email" name="reserve_email" required>
					</p>
					<p>
						<label for="order_notes">Order notes (optional)</label>
						<textarea style="width:100%" name="order_notes" rows="2" class="pt-3"></textarea>
					</p>
					<p class="quantity">
						<label for="reserve_qty">Quantity</label>
						<input type="number" name="reserve_qty" value="1">
					</p>
					<p class="terms">
						<input type="checkbox" name="terms_agree" required>
						<label for="terms_agree">I agree for <?php echo get_the_shop_name(true);?> to use my email address and name for the purposes of this order. You can read our full privacy policy <a href="#">here</a>.
					</p>
					<p class="submit">
						<input class="highlight" type="submit" name="submit" value="Submit">
					</p>
					
				</form>
			</div>
			
		</div>
	
		
	<?php do_action('after_reserve_button'); 
	}

add_action('add_reserve_book','send_conf_to_customer');
function send_conf_to_customer(){
	
	if(!isset($_GET['submit'])) return;
	$customer_name = $_GET['reserve_name'];
	$customer_email = $_GET['reserve_email'];
	$customer_reservation_reference = "#".date('dmygi').$_GET['book_id'];
	$book_title = $_GET['book_title'];
	$book_author = $_GET['book_author'];
	$book_price = $_GET['book_price'];
	$order_notes = $_POST['order_notes'];
	$book_qty = $_GET['reserve_qty'];
	$headers = array('Content-Type: text/html; charset=UTF-8','From: '.get_the_shop_name().' <'.get_the_shop_email().'>');
	$to = $customer_email;
	$subject = "Thank you for your order at ".get_the_shop_name(true);
	$message = "Hello,<br><br>This is an automated email to confirm we have received your book reservation request.<br>Please do not come to the shop until we have emailed you to let you know it is ready for collection.<br><br><strong>Order details:</strong><br>";
	$message .= $customer_name." - ".$customer_email."<br>";
	$message .= "Order reference: ".$customer_reservation_reference."<br>";
	$message .= $book_qty." &times; <em>".$book_title."</em> by ".$book_author.", ".$book_price;
	$book_qty > 1 ? $message .= " each" : "";
	if($order_notes){ $message .= "<br><br>Notes:<br>".$order_notes;
		}
	$message .= ".<br><br>Many thanks,<br><br><strong>".get_the_shop_name()."</strong><br>".get_the_shop_phone();
	wp_mail($to,$subject,$message,$headers);
	do_action('send_shop_email');
}

add_action('send_shop_email','send_order_to_shop');
function send_order_to_shop(){
	$shop_email_customer_name = $_GET['reserve_name'];
	$shop_email_customer_email = $_GET['reserve_email'];
	$shop_email_book_title = $_GET['book_title'];
	$shop_email_book_author = $_GET['book_author'];
	$shop_email_order_notes = $_GET['order_notes'];
	$shop_email_book_price = $_GET['book_price'];
	$shop_email_customer_reservation_reference = "#".date('dmygi').$_GET['book_id'];
	$shop_email_book_qty = $_GET['reserve_qty'];
	$shop_email_to = get_the_shop_email();
	$shop_email_headers = array('Content-Type: text/html; charset=UTF-8','From: '.get_the_shop_name().' <'.get_the_shop_email().'>');
	$shop_email_subject = "New customer order from website - ref ".$shop_email_customer_reservation_reference;
	$shop_email_message = "Hello,<br><br>This is an automated email to let you know that a customer has made an order via the ".get_the_shop_name()." website.<br>Please email them on the address below when the order is ready for collection. The customer will pay on collection.<br>If the book is not currently in stock, please email the customer to let them know.<br><br>";
	$shop_email_message .= "<strong>Order details:</strong><br>Order reference: ".$shop_email_customer_reservation_reference."<br>Customer name: ".$shop_email_customer_name."<br>Customer email: ".$shop_email_customer_email."<br>Ordered ".date('jS F Y \a\t g:ia')."<br><br>";
	$shop_email_message .= $shop_email_book_qty." &times; <em>".$shop_email_book_title."</em> by ".$shop_email_book_author.", ".$shop_email_book_price;
	$shop_email_book_qty > 1 ? $shop_email_message .= " each" : "";
	if($shop_email_order_notes){ $shop_email_message .= "<br><br>Notes:<br>".$shop_email_order_notes;
		}
	wp_mail($shop_email_to,$shop_email_subject,$shop_email_message,$shop_email_headers);
	
}


add_action('after_reserve_button','thanks_for_order');
function thanks_for_order(){
	
	if(isset($_GET['reserve_name'])){ ?>
		<h5 class="thank-you-message">Thank you for your order. A member of staff will be in touch to let you know when your order is ready to collect.</h5>
	<?php }
	
}
