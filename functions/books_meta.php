<?php
	function create_book_meta( $meta_boxes ) {
	$prefix = '';

	$meta_boxes[] = array(
		'id' => 'book_meta',
		'title' => esc_html__( 'Book details', 'metabox-online-generator' ),
		'post_types' => array('book' ),
		'context' => 'advanced',
		'priority' => 'default',
		'autosave' => 'false',
		'fields' => array(
			array(
				'id'=>'book_available',
				'type'=>'checkbox',
				'name' => 'Book available to reserve',
				'std'=> true
			),array(
				'id' => $prefix . 'book_author',
				'type' => 'text',
				'name' => esc_html__( 'Author', 'metabox-online-generator' ),
				'admin_columns'=>'before date'
			),
			array(
				'id' => $prefix . 'book_price',
				'type' => 'text',
				'name' => esc_html__( 'Price', 'metabox-online-generator' ),
				'desc' => esc_html__('Include £ sign, eg £9.99','metabox-online-generator'),
				'admin_columns'=>'before date'
			),
			array(
				'id' => $prefix . 'book_editor',
				'type' => 'text',
				'name' => esc_html__( 'Editor', 'metabox-online-generator' ),
			),
			array(
				'id' => $prefix . 'book_isbn',
				'type' => 'text',
				'name' => esc_html__( 'ISBN', 'metabox-online-generator' ),
			),
			array(
				'id' => $prefix . 'book_publisher',
				'type' => 'text',
				'name' => esc_html__( 'Publisher', 'metabox-online-generator' ),
			),
			array(
				'id' => $prefix . 'book_pubdate',
				'type' => 'text',
				'name' => esc_html__( 'Published date', 'metabox-online-generator' ),
				'placeholder' => esc_html__( 'YYYY-MM', 'metabox-online-generator' ),
			),
			array(
				'id' => $prefix . 'book_genre',
				'type' => 'text',
				'name' => esc_html__( 'Genre', 'metabox-online-generator' ),
			),
			array(
				'id' => $prefix . 'book_format',
				'type' => 'text',
				'name' => esc_html__( 'Format', 'metabox-online-generator' ),
			),
		),
	);

	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'create_book_meta' );

add_action('save_post','add_author_details_to_excerpt');
function add_author_details_to_excerpt(){
	if("book" !== get_post_type()) return;
	remove_action('save_post','add_author_details_to_excerpt');
	$author = get_post_meta(get_the_ID(),'book_author',true);
	$content = get_post_field('post_content', get_the_ID());
	$args = array(
		'ID'=>get_the_ID(),
		'post_title'=>get_the_title(get_the_ID()),
		'post_content'=>$content."<br><!--".$author."-->"
	);
	wp_update_post($args);
	add_action('save_post','add_author_details_to_excerpt');
	
}


