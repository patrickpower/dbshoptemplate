<?php
	function create_event_meta( $meta_boxes ) {
	$prefix = '';

	$meta_boxes[] = array(
		'id' => 'event_meta',
		'title' => esc_html__( 'Event details', 'metabox-online-generator' ),
		'post_types' => array('event' ),
		'context' => 'normal',
		'priority' => 'default',
		'autosave' => 'false',
		'fields' => array(
			array(
				'id' => $prefix . 'event_subtitle',
				'type' => 'text',
				'name' => esc_html__( 'Event subtitle', 'metabox-online-generator' ),
				'desc' => esc_html__( 'Usually the book title, or the event title if applicable. Will appear in italics underneath main title', 'metabox-online-generator' ),
			),
			array(
				'id' => $prefix . 'event_type',
				'name' => esc_html__( 'Event type', 'metabox-online-generator' ),
				'type' => 'select',
				'placeholder' => esc_html__( 'Please choose', 'metabox-online-generator' ),
				'options' => array(
					'author_talk' => esc_html__( 'Author talk', 'metabox-online-generator' ),
					'book_signing' => esc_html__( 'Book signing', 'metabox-online-generator' ),
					'childrens_storytime' => esc_html__( 'Children’s storytime', 'metabox-online-generator' ),
					'hidden' => esc_html__( 'Hide this', 'metabox-online-generator' ),
				),
				'std' => 'author_talk',
			),
			array(
				'id' => $prefix . 'divider_2',
				'type' => 'divider',
				'name' => esc_html__( 'Divider', 'metabox-online-generator' ),
			),
			array(
				'id' => 'date_time_heading',
				'type' => 'heading',
				'name' => esc_html__( 'Date & Time', 'metabox-online-generator' ),
			),
			array(
				'id' => $prefix . 'event_date',
				'type' => 'date',
				'name' => esc_html__( 'Event date', 'metabox-online-generator' ),
				'admin_columns'=> array(
					'position' => 'before date',
					'sort'=>true
				)
				
			),
			array(
				'id' => $prefix . 'event_start_time',
				'name' => esc_html__( 'Start time', 'metabox-online-generator' ),
				'type' => 'time',
			),
			array(
				'id' => $prefix . 'event_end_time',
				'name' => esc_html__( 'End time (optional)', 'metabox-online-generator' ),
				'type' => 'time',
			),
			array(
				'id' => $prefix . 'divider_7',
				'type' => 'divider',
				'name' => esc_html__( 'Divider', 'metabox-online-generator' ),
			),
			array(
				'id' => 'tickets_section_header',
				'type' => 'heading',
				'name' => esc_html__( 'Tickets', 'metabox-online-generator' ),
			),
			array(
				'id' => $prefix . 'event_price',
				'type' => 'text',
				'name' => esc_html__( 'Ticket price', 'metabox-online-generator' ),
				'placeholder' => esc_html__( 'Include £ sign or write ‘free’ ', 'metabox-online-generator' ),
			),
			array(
				'id' => $prefix . 'event_ticket_text',
				'type' => 'textarea',
				'name' => esc_html__( 'Ticket text', 'metabox-online-generator' ),
				'std' => 'Tickets are %price% and are available to order in store
or over the phone on %phone%',
				'placeholder' => esc_html__( 'If updating, please use %price%,  %phone% or %email%', 'metabox-online-generator' ),
			),
			
			array(
				'id' => $prefix . 'external_ticket_link',
				'type' => 'url',
				'name' => esc_html__( 'External ticket link', 'metabox-online-generator' ),
			),
			array(
				'id' => $prefix . 'divider_14',
				'type' => 'divider',
				'name' => esc_html__( 'Divider', 'metabox-online-generator' ),
			),
			array(
				'id' => $prefix . 'event_sold_out',
				'name' => esc_html__( 'Sold Out', 'metabox-online-generator' ),
				'type' => 'checkbox',
			),
			array(
				'id' => $prefix . 'event_postponed',
				'name' => esc_html__( 'Postponed', 'metabox-online-generator' ),
				'type' => 'checkbox',
			),
			array(
				'id' => $prefix . 'event_cancelled',
				'name' => esc_html__( 'Cancelled', 'metabox-online-generator' ),
				'type' => 'checkbox',
			),
			array(
				'id' => $prefix . 'postpone_text',
				'type' => 'textarea',
				'name' => esc_html__( 'Customer info', 'metabox-online-generator' ),
				'desc' => esc_html__( 'Add some extra text for the customer regarding the postponement/cancellation', 'metabox-online-generator' ),
			),
		),
	);

	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'create_event_meta' );