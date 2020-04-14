<?php	
	add_action('init','disable_sales');

	function disable_sales(){
		if(rwmb_meta( 'enable_book_reservations', ['object_type' => 'setting'], 'shop_options' ) === 1){
			add_action('add_reserve_book','reserve_button',10,2);
		} else {
			remove_action('add_reserve_book','reserve_button',10,2);
		}
		
			
		
		
	}