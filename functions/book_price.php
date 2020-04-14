<?php
	add_action('add_book_price','book_price',10,2);
	function book_price(){
		$price = get_post_meta(get_the_ID(),'book_price',true);
		if(strpos($price, '£') !== false){} else{
			$price = "£".$price;
		}
		echo $price ? '<p class="book-price">'.$price.'</p>' : '';
		do_action('after_book_price');
	}

function display_book_price($id){
	$price = get_post_meta($id,'book_price',true);
	if(strpos($price, '£') !== false){} else{
		$price = "£".$price;
	}
	echo $price;
}