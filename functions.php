<?php
add_theme_support('post-thumbnails');

//add_image_size('mobile','1020','520',array('center','center'));


//Images shortcut
function images() {  
    echo get_template_directory_uri()."/images";
}

//Custom Excerpt Length
function excerpt($limit, $id) {
    return wp_trim_words(get_the_excerpt($id), $limit);
}


/* Enqueues */

function enqueues() //Enqueue the CSS & jQuery files...
	{
		wp_enqueue_style( 'bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css' ); // BOOTSTRAP CSS
		//wp_enqueue_style( 'slick', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css');		// Slick CSS
		wp_enqueue_style( 'style', get_stylesheet_uri(),'','0.47','' );		// STYLE.CSS
    
		wp_register_script('fontawesome','https://use.fontawesome.com/releases/v5.1.0/js/all.js','','');// FontAwesome
		wp_register_script('scripts', get_template_directory_uri(). '/js/scripts.js',array('jquery'),'',true); // THE TEMPLATE SCRIPTS
		//wp_register_script('slick', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js',array('jquery'),'',true); // Slick JS (Carousel)
		wp_enqueue_script( 'bootstrap','https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js',array('jquery'),'',true ); // BOOTSTRAP JS
	
		wp_deregister_script('jquery'); // THIS LINE DEREGISTERS WP'S STANDARD JQUERY...
		wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js', false, '1.3.2');// ...THIS LINE REPLACES THE ABOVE WITH GOOGLE'S JQUERY...
		wp_enqueue_script( 'jquery' );// ... AND THIS ONE ENQUEUES IT
		wp_enqueue_script( 'fontawesome');
		wp_enqueue_script( 'scripts'); // THIS ONE ENQUEUES THE TEMPLATE SCRIPTS
		//wp_enqueue_script( 'slick');
}
add_action( 'wp_enqueue_scripts', 'enqueues' ); // PRESS PLAY ON THE ABOVE

get_template_part('functions/create_default_pages');
get_template_part('functions/create_books');
get_template_part('functions/create_events');
get_template_part('functions/events_meta');
get_template_part('functions/events_title');
get_template_part('functions/events_date');
get_template_part('functions/event_images');
get_template_part('functions/events_tickets');
get_template_part('functions/event_image_options');
get_template_part('functions/books_on_homepage');
get_template_part('functions/books_meta');
get_template_part('functions/book_price');
get_template_part('functions/book_title');
get_template_part('functions/book_display_meta');
get_template_part('functions/shop_settings');
get_template_part('functions/book_reserve');
get_template_part('functions/book_category_register');
get_template_part('functions/homepage_events');
get_template_part('functions/similar_books');
get_template_part('functions/is_shop_open');
get_template_part('functions/dashbord-widget');
get_template_part('functions/homepage_notice');
get_template_part('functions/disable_books');
get_template_part('functions/order-book');
get_template_part('functions/newsletter_homepage');



function get_the_shop_name($the = false){
	$bookshopName = rwmb_meta( 'shop_name', ['object_type' => 'setting'], 'shop_options' );
	$useThe = rwmb_meta( 'use_the', ['object_type' => 'setting'], 'shop_options' );
	if($bookshopName){
		if($the == true && $useThe == 1){
			return "the ".$bookshopName;
		} else {
			return $bookshopName;
		}
	} else {
		return "the bookshop";
	}
}

function get_the_shop_email(){
	return rwmb_meta( 'shop_email', ['object_type' => 'setting'], 'shop_options' );
}
function get_the_shop_phone(){
	return rwmb_meta( 'shop_phone', ['object_type' => 'setting'], 'shop_options' );
}

function get_shop_logo(){
	$path = rwmb_meta( 'main_logo', ['object_type' => 'setting'], 'shop_options' );
	if(empty($path)){ return false; }
	
	foreach ($path as $image){
		$id = $image['ID'];
		$imageSrc = wp_get_attachment_image_src($id,'full')[0];
		return $imageSrc;
	}
}
function get_shop_footer_logo(){
	$fpath = rwmb_meta( 'footer_logo', ['object_type' => 'setting'], 'shop_options' );
	if(!empty($fpath)){
	foreach ($fpath as $fimage){
		$fid = $fimage['ID'];
		$fimageSrc = wp_get_attachment_image_src($fid,'full')[0];
		return $fimageSrc;
	}
	} else {
		$path = rwmb_meta( 'main_logo', ['object_type' => 'setting'], 'shop_options' );
		foreach ($path as $image){
			$id = $image['ID'];
			$imageSrc = wp_get_attachment_image_src($id,'full')[0];
			return $imageSrc;
		}
	}
}

add_action('pre_get_posts', 'filter_press_tax');

    function filter_press_tax( $query ){
		if(is_tax('book_category')){
			$query->set('posts_per_page',-1);
		}
    }


