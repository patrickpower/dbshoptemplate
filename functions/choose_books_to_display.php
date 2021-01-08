<?php
add_filter( 'rwmb_meta_boxes', 'user_chooses_homepage_books' );

function user_chooses_homepage_books( $meta_boxes ) {
	
    $meta_boxes[] = [
        'title'   => 'Display these books on homepage',
		'taxonomies'=>'book_category',
        'fields'  => [
            [
                'type'       => 'post',
                'name'       => esc_html__( 'Books', 'your-text-domain' ),
                'id'         => 'chosen_book',
                'desc'       => esc_html__( 'Is this category displayed on the homepage? If so, choose the books to display', 'your-text-domain' ),
                'post_type'  => 'book',
                'field_type' => 'select_advanced',
                'query_args' => [
                    'tax_query'=> array(
						array(
							'taxonomy'=>'book_category',
							'terms'=>$_GET['tag_ID'],
							'field'=>'term_id',
							'operator'=>'IN'
						)
					)
                ],
                'clone'    => true,
				'max_clone'=>6,
				'sort_clone' => true
            ],
        ],
    ];

    return $meta_boxes;
}