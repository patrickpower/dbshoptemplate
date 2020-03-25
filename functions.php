<?php
add_theme_support('post-thumbnails');

//add_image_size('mobile','1020','520',array('center','center'));



//Images shortcut
function images() {  
    echo get_template_directory_uri()."/images";
}

//Custom Excerpt Length
function excerpt($limit) {
    return wp_trim_words(get_the_excerpt(), $limit);
}



/* Enqueues */

function enqueues() //Enqueue the CSS & jQuery files...
	{
		wp_enqueue_style( 'bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css' ); // BOOTSTRAP CSS
		//wp_enqueue_style( 'slick', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css');		// Slick CSS
		wp_enqueue_style( 'style', get_stylesheet_uri(),'','','' );		// STYLE.CSS
    
		wp_register_script('fontawesome','https://use.fontawesome.com/releases/v5.1.0/js/all.js','','');// FontAwesome
		wp_register_script('scripts', get_template_directory_uri(). '/js/scripts.js',array('jquery'),'',true); // THE TEMPLATE SCRIPTS
		//wp_register_script('slick', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js',array('jquery'),'',true); // Slick JS (Carousel)
		wp_enqueue_script( 'bootstrap','https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js',array('jquery'),'',true ); // BOOTSTRAP JS
	
		wp_deregister_script('jquery'); // THIS LINE DEREGISTERS WP'S STANDARD JQUERY...
		wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js', false, '1.3.2');// ...THIS LINE REPLACES THE ABOVE WITH GOOGLE'S JQUERY...
		wp_enqueue_script( 'jquery' );// ... AND THIS ONE ENQUEUES IT
		wp_enqueue_script( 'fontawesome');
		wp_enqueue_script( 'scripts'); // THIS ONE ENQUEUES THE TEMPLATE SCRIPTS
		//wp_enqueue_script( 'slick');
}
add_action( 'wp_enqueue_scripts', 'enqueues' ); // PRESS PLAY ON THE ABOVE