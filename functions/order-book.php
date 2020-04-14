<?php
	add_action('send_order_request','order_books');
	function order_books(){
		$time = $_GET['time_sent'];
		$customerName = $_GET['your-name'];
		$customerEmail = $_GET['your-email'];
		isset($_GET['more-info']) ? $cusMessage = $_GET['more-info'] : "";
		isset($_GET['book-title']) ? $bookTitle = $_GET['book-title'] : "" ;
		isset($_GET['book-author']) ? $bookAuthor = $_GET['book-author'] : "" ;
		
		$shopEmail = get_the_shop_email();
		$shopName = get_the_shop_name();
		
		$to = $shopEmail;
		$subject = "Book request from the ".$shopName." website";
		$message = "<p>Hello,<br>This is an automated email to let you know that a customer has submitted a request for a book on the ". $shopName ." website. Please respond to the message below.</p><hr><p style='font-family:monospace'>Customer name: ".$customerName."<br>Customer email address: ".$customerEmail."<br><br>Book title:";
		if($bookTitle){
			$message .= $bookTitle;
		} else {
			$message .= "not supplied";
		};
		$message .= "Book author: ";
		if($bookAuthor){
			$message .= $bookAuthor;
		} else {
			$message .= "not supplied";
		};
		$message .= "Message:<br>".$cusMessage."<br><br>Order sent: ".$time;
		$headers = array("Content-Type: text/html; charset=UTF-8","From: ".get_the_shop_name()." Website <".$shopEmail.">");
		wp_mail($to, $subject, $message, $headers);
	}