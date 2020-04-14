<?php
	function generate_images_for_events( $meta_boxes ) {
	$prefix = '';

	$meta_boxes[] = array(
		'id' => 'event_image_meta',
		'title' => esc_html__( 'Images', 'metabox-online-generator' ),
		'post_types' => array('event'),
		'context' => 'advanced',
		'priority' => 'default',
		'autosave' => 'false',
		'fields' => array(
			array(
				'id' => $prefix . 'main_book_jacket',
				'type' => 'image_advanced',
				'name' => esc_html__( 'Book jacket', 'metabox-online-generator' ),
				'desc' => esc_html__( 'The book jacket will be the main image on the event page. If there is none selected, it will default to the author image.', 'metabox-online-generator' ),
				'max_file_uploads' => '1',
			),
			array(
				'id' => $prefix . 'extra_book_jackets',
				'type' => 'image_advanced',
				'name' => esc_html__( 'Extra book jackets', 'metabox-online-generator' ),
			),
			array(
				'id' => $prefix . 'main_author_image',
				'type' => 'image_advanced',
				'name' => esc_html__( 'Author image', 'metabox-online-generator' ),
				'desc' => esc_html__( 'Image of the main speaker. If there is more than one speaker, you may need to create a composite image', 'metabox-online-generator' ),
				'max_file_uploads' => '1',
			),
			array(
				'id' => $prefix . 'extra_images',
				'type' => 'image_advanced',
				'name' => esc_html__( 'Extra images', 'metabox-online-generator' ),
				'desc' => esc_html__( 'Any extra images. These will display as thumbnails under main image.', 'metabox-online-generator' ),
			),
			array(
				'id' => $prefix . 'image_display_option',
				'name' => esc_html__( 'All Events page image display options', 'metabox-online-generator' ),
				'type' => 'select',
				'desc' => esc_html__( 'How you want to show your images on the “Events” page', 'metabox-online-generator' ),
				'placeholder' => esc_html__( 'Please choose', 'metabox-online-generator' ),
				'options' => array(
					'author_and_jacket' => esc_html__( 'Author + jacket', 'metabox-online-generator' ),
					'only_author' => esc_html__( 'Author only', 'metabox-online-generator' ),
				),
				'std' => 'author_and_jacket',
			),
		),
	);

	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'generate_images_for_events' );