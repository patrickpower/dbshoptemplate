<?php
$currentPage = $_SERVER['REQUEST_URI'];
	function reserve_book_customer_email(){
		$userName = $_POST['reserve_name'];
		$qty = $_POST['reserve_qty'];
		$userEmail = $_POST['order_notes'];
		$orderNotes = $_POST['reserve_email'];
		$bookTitle = $_POST['book_title'];
		$bookAuthor = $_POST['book_author'];
		$bookPrice = $_POST['book_price'];
		if($userName):
		$to = $userEmail;
		$from = get_the_shop_email();
		$headers = array("Content-Type: text/html; charset=UTF-8","From: ".get_the_shop_name()." <".$from.">");

		$subject = "Confirmation of book reservation at ".get_the_shop_name();
		$message = "<h2>Confirmation of book reservation</h2><p>Dear ".$userName.",</p><p>This is an automated email to confirm that your request has been received. A member of our staff will email you on the provided email address to let you know when your order is ready to collect.</p><p><strong>Your order details:</strong><br>".$qty." &times; <em>".$bookTitle."</em> by ".$bookAuthor.", ".$bookPrice.".";
		if($orderNotes){ $message .= "<br><br>Notes:<br>".$orderNotes;
		}
		$message .= "<br><br>We will be in touch as your book is ready for collection.<br><br>Regards,<br><strong>".get_the_shop_name()."</strong>";
		wp_mail( $to, $subject, $message, $headers );
		do_action('send_shop_email');
		endif;

	}


	add_action('send_shop_email','reserve_book_shop_email');
	function reserve_book_shop_email(){
		$shop_userName = $_POST['reserve_name'];
		$shop_qty = $_POST['reserve_qty'];
		$shop_userEmail = $_POST['reserve_email'];
		$shop_bookTitle = $_POST['book_title'];
		$shop_bookAuthor = $_POST['book_author'];
		$shop_bookPrice = $_POST['book_price'];
		$shop_orderNotes = $_POST['order_notes'];
		$from = get_the_shop_email();
		if($shop_userName):
		$shop_headers = array("Content-Type: text/html; charset=UTF-8","From: ".get_the_shop_name()." Website <".$from.">");
		$shop_to = $from; // the shop email
		$shop_subject = "New customer order";
		$shop_message = "<h2>New customer order from website</h2><p>Hello,<br>This is an automated email to let you know that a customer has requested to reserve a book via the ".get_the_shop_name()." website, the details are below.<br><br>Please hold the following book aside for the customer and contact them on the details provided as soon as it is ready for collection. If you do not currently have the book in stock, please notify the customer as to when the order will be ready.<br><br><strong>Customer details:</strong><br>Name: ".$shop_userName."<br>Email address: ".$shop_userEmail."<br>Ordered ".date('l jS F \a\t g:ia')."<br><strong>Book details:</strong><br>".$shop_qty." &times; <em>".$shop_bookTitle."</em> by ".$shop_bookAuthor.", @ ".$shop_bookPrice." each.";
		if($shop_orderNotes){ $shop_message .= "<br><br>Notes:<br>".$shop_orderNotes;
		}
		wp_mail( $shop_to, $shop_subject, $shop_message, $shop_headers );
		endif;
	}

reserve_book_customer_email();
//wp_redirect($currentPage."?book-order=sent");
//exit;
