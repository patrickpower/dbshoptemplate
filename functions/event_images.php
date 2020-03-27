<?php
	add_action('add_event_images','event_images',10,2);
	
	function event_images(){
		$mainBookJacket = get_post_meta(get_the_ID(),'main_book_jacket',true);
		
		
	}