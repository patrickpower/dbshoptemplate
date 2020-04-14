<?php
	// Register Custom Taxonomy
function create_book_taxonomies() {

	$labels = array(
		'name'                       => _x( 'Book Categories', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Book Category', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Book Categories', 'text_domain' ),
		'all_items'                  => __( 'All categories', 'text_domain' ),
		'parent_item'                => __( 'Parent category', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent category:', 'text_domain' ),
		'new_item_name'              => __( 'New category name', 'text_domain' ),
		'add_new_item'               => __( 'Add new category', 'text_domain' ),
		'edit_item'                  => __( 'Edit category', 'text_domain' ),
		'update_item'                => __( 'Update category', 'text_domain' ),
		'view_item'                  => __( 'View category', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Items', 'text_domain' ),
		'search_items'               => __( 'Search Items', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No items', 'text_domain' ),
		'items_list'                 => __( 'Items list', 'text_domain' ),
		'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
	);
	$rewrite = array(
		'slug'                       => 'categories',
		'with_front'                 => true,
		'hierarchical'               => false,
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'rewrite'=>$rewrite
	);
	register_taxonomy( 'book_category', array( 'book' ), $args );

}
add_action( 'init', 'create_book_taxonomies', 0 );