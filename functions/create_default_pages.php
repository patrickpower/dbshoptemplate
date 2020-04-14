<?php
	add_action('after_switch_theme', 'create_pages');

	function create_pages(){
		if ( ! function_exists( 'post_exists' ) ) {
			require_once( ABSPATH . 'wp-admin/includes/post.php' );
		}
		$args = array(
			'post_type'=>'page',
			'post_title'=> 'Events',
			'post_content'=>'This is your events page template. Events are added here automatically, you do not need to edit this page.',
			'post_status'=>'publish',
			'page_template'=>'index.php'
		);
		if(0 === post_exists('Events')){
			wp_insert_post($args);
		}
		
		
		$args = array(
			'post_type'=>'page',
			'post_title'=> 'About',
			'post_content'=>'Create an about page for the shop. You can write about the history of the shop.',
			'post_status'=>'draft',
			'page_template'=>'index.php'
		);
		if(0 === post_exists('About')){
			wp_insert_post($args);
		}
		
		$args = array(
			'post_type'=>'page',
			'post_title'=> 'Contact',
			'post_status'=>'publish',
			'post_content'=>'The contact page of your website is hard-coded, so it’s not directly editable. You can change opening hours, contact details etc from the Shop Settings page.',
			'page_template'=>'templates/contact-page.php'
		);
		if(0 === post_exists('Contact')){
			wp_insert_post($args);
		}
		
		$args = array(
			'post_type'=>'page',
			'post_title'=>'Order a Book',
			'post_status'=>'draft',
			'post_content'=>'If you can’t find the book you’re looking for on our website, fill in the form and we will see if we can order a copy in for you.',
			'page_template'=>'templates/order-a-book.php'
		);
		if(0 === post_exists('Order a Book')){
			wp_insert_post($args);
		}
		
		
	}

	add_action('after_switch_theme', 'create_new_releases_tax');
	function create_new_releases_tax(){
		$args = array(
			'description'=>'A selection of our favourite new releases in hardback and paperback.',
			'slug'=>'new-releases'	
		);
		
		if(term_exists('New Releases')) return;
		wp_insert_term('New Releases','book_category',$args);
		
		
	}
	add_action('after_switch_theme', 'create_local_interest_tax');
	function create_local_interest_tax(){
		$args = array(
			'description'=>'Local authors, local history, locally set novels – the best books about the local area',
			'slug'=>'local-interest'	
		);
		
		if(term_exists('Local Interest')) return;
		wp_insert_term('Local Interest','book_category',$args);
		
	}
	add_action('after_switch_theme', 'create_staff_picks_tax');
	function create_staff_picks_tax(){
		$args = array(
			'description'=>'Favourite fiction and non-fiction picked by the staff at '.get_the_shop_name(true),
			'slug'=>'staff-picks'	
		);
		
		if(term_exists('Staff Picks')) return;
		wp_insert_term('Staff Picks','book_category',$args);
		
	}

	add_action('after_switch_theme', 'create_childrens_tax');
	function create_childrens_tax(){
		$args = array(
			'description'=>'A selection of our favourite childrens books',
			'slug'=>'childrens-books'	
		);
		
		if(term_exists('Childrens Books')) return;
		wp_insert_term('Childrens Books','book_category',$args);
		
	}

function change_default_blog_name(){
	
	$args = array(
		'name'=>'News',
		'slug'=>'news'
	);

	wp_update_term(1,'category',$args);
	
}
add_action('after_switch_theme','change_default_blog_name');


