<?php
	// Register a theme options page
add_filter( 'mb_settings_pages', function ( $settings_pages ) {
    $settings_pages[] = array(
        'id'          => 'shop_options',
        'option_name' => 'shop_options',
        'menu_title'  => 'Shop Settings',
        'icon_url'    => 'dashicons-edit',
        'style'       => 'no-boxes',
        'columns'     => 1,
        'tabs'        => array(
            'general' => 'General Settings',
			'hours' => 'Opening Hours',
			'social_media' => 'Social Media',
			'homepage_options'=>'Homepage Options',
			'news_options'=>'News / Blog',
			'styles'=>'Styles',
			'warnings-notices'=>'Warnings/Notices'
        ),
    );
    return $settings_pages;
} );

// Register meta boxes and fields for settings page
add_filter( 'rwmb_meta_boxes', function ( $meta_boxes ) {
    $meta_boxes[] = array(
        'id'             => 'general',
        'title'          => 'General',
        'settings_pages' => 'shop_options',
        'tab'            => 'general',
        'fields' => array(
            array(
                'name' => 'Shop name',
                'id'   => 'shop_name',
                'type' => 'text',
            ),
			array(
				'name' => 'Use “the” in title',
				'id'	=> 'use_the',
				'type' => 'checkbox',
				'desc' =>'You may want to prepend the shop name with ‘the’ in certain circumstances, for example, “Shop at the City Bookshop” vs. “Shop at City Books”'
			),
			array(
				'id' => 'main_logo',
				'type' => 'image_advanced',
				'name' => 'Shop logo',
				'desc' => 'Used in header. Suits landscape logos better than portrait or square.',
				'max_file_uploads' => '1',
			),
			array(
				'id' => 'footer_logo',
				'type' => 'image_advanced',
				'name' => 'Shop logo for footer',
				'desc' => 'Used in footer. Suits landscape logos better than portrait or square. Make sure it doesn’t clash with the footer colour.',
				'max_file_uploads' => '1',
			),
			array(
				'id' => 'favicon',
				'type' => 'image_advanced',
				'name' => 'Browser icon',
				'desc' => 'Upload an icon - 64&times;64 pixels, must be .png format',
				'max_file_uploads' => '1',
			),
			array(
				'id' => 'heading_1',
				'type' => 'heading',
				'name' => 'Contact Details',
			),
			array(
                'name' => 'Shop email address',
                'id'   => 'shop_email',
                'type' => 'text',
            ),
			array(
                'name' => 'Shop phone number',
                'id'   => 'shop_phone',
                'type' => 'text',
            ),
			array(
				'id' => 'div_1',
				'type' => 'divider',
			),
			array(
                'name' => 'Address Line 1',
                'id'   => 'shop_address_line_1',
                'type' => 'text',
            ),
			array(
                'name' => 'City',
                'id'   => 'shop_address_line_2',
                'type' => 'text',
            ),
			array(
                'name' => 'County',
                'id'   => 'shop_address_line_3',
                'type' => 'text',
            ),
			array(
                'name' => 'Postcode',
                'id'   => 'shop_postcode',
                'type' => 'text',
            ),
			array(
                'name' => 'Google maps embed code',
                'id'   => 'google_maps',
                'type' => 'html',
            )
        ),
    );
	$meta_boxes[] = array(
        'id'             => 'opening_hours',
        'title'          => 'Opening Hours',
        'settings_pages' => 'shop_options',
        'tab'            => 'hours',
        'fields' => array(
			array(
                'name' => 'Monday - Friday Opening',
                'id'   => 'mon_fri_opening',
                'type' => 'time',
            ),
			array(
                'name' => 'Monday - Friday Closing',
                'id'   => 'mon_fri_closing',
                'type' => 'time',
            ),array(
                'name' => 'Saturday Opening',
                'id'   => 'sat_opening',
                'type' => 'time',
            ),
			array(
                'name' => 'Saturday Closing',
                'id'   => 'sat_closing',
                'type' => 'time',
            ),
			array(
                'name' => 'Sunday Opening',
                'id'   => 'sun_opening',
                'type' => 'time',
            ),
			array(
                'name' => 'Sunday Closing',
                'id'   => 'sun_closing',
                'type' => 'time',
            ),
			array(
                'name' => 'Bank Holidays Opening',
                'id'   => 'hols_opening',
                'type' => 'time',
            ),
			array(
                'name' => 'Bank Holidays Closing',
                'id'   => 'hols_closing',
                'type' => 'time',
            ),
		)
	);
	$meta_boxes[] = array(
        'id'             => 'social_media',
        'title'          => 'Social Media',
        'settings_pages' => 'shop_options',
        'tab'            => 'social_media',
        'fields' => array(
			array(
                'name' => 'Facebook',
                'id'   => 'shop_facebook',
                'type' => 'text',
            ),
			array(
                'name' => 'Twitter',
                'id'   => 'shop_twitter',
                'type' => 'text',
            ),
			array(
                'name' => 'Instagram',
                'id'   => 'shop_instagram',
                'type' => 'text',
            ),
		)
	);
	$meta_boxes[] = array(
        'id'             => 'homepage_options',
        'title'          => 'Homepage Options',
        'settings_pages' => 'shop_options',
        'tab'            => 'homepage_options',
        'fields' => array(
			array(
				'id'=>'homepage_banner',
				'type'=>'image_advanced',
				'name'=>'Homepage banner image'
			),array(
				'id'=>'homepage_banner_mobile',
				'type'=>'image_advanced',
				'name'=>'Homepage banner image for mobile (optional)'
			),
			array(
				'id'=>'books_heading',
				'type'=>'heading',
				'name'=>'Books on homepage'
			),
			array(
				'id' => 'book_cats_on_homepage',
				'type' => 'taxonomy_advanced',
				'name' => esc_html__( 'Books on homepage', 'metabox-online-generator' ),
				'desc' => esc_html__( 'Display these book categories on the homepage. To choose the books to display, visit Books > Book Categories', 'metabox-online-generator' ),
				'taxonomy' => 'book_category',
				'field_type' => 'select_advanced',
				'clone'=>true,
				'sort_clone'=>true
			),
			array(
				'id' =>'link_to_this_book_cat',
				'type' => 'taxonomy_advanced',
				'name' => esc_html__( 'Books link in header', 'metabox-online-generator' ),
				'desc' => esc_html__( 'When user clicks “Books” in header, they will be taken to this category', 'metabox-online-generator' ),
				'taxonomy' => 'book_category',
				'field_type' => 'select',
				'std'=>'new-releases'
			),
			array(
				'id'=>'events_heading',
				'type'=>'heading',
				'name'=>'Events on homepage'
			),
			array(
				'id'=>'show_events_on_homepage',
				'type'=>'checkbox',
				'std'=>1,
				'name'=>'Show events on the homepage',
				'desc'=>'Display a list of upcoming events on the homepage'
			),
			array(
				'id'=>'events_heading',
				'type'=>'heading',
				'name'=>'Blog on homepage'
			),
			array(
				'id' => 'display_blog_on_homepage',
				'name' => esc_html__( 'Show blog on homepage', 'metabox-online-generator' ),
				'type' => 'checkbox',
			),
			array(
				'id'=>'newsletter_heading',
				'type'=>'heading',
				'name'=>'Newsletter on homepage'
			),
			array(
				'id' => 'display_newsletter_on_homepage',
				'name' => esc_html__( 'Show newsletter sign-up on homepage', 'metabox-online-generator' ),
				'type' => 'checkbox',
			),
			array(
				'id' => 'newsletter_code',
				'name' => esc_html__( 'Copy and paste the shortcode for the form in here', 'metabox-online-generator' ),
				'type' => 'textarea',
			),
		)
	);
	$meta_boxes[] = array(
        'id'             => 'site_styles',
        'title'          => 'Site Styles',
        'settings_pages' => 'shop_options',
        'tab'            => 'styles',
        'fields' => array(
			
			array(
				'id' => 'trim_colour',
				'name' => esc_html__( 'Trim colour', 'metabox-online-generator' ),
				'type' => 'color',
				'std' => '#000000',
				'desc' => esc_html__( 'Colour for the line at the top of the site.', 'metabox-online-generator' ),
			),
			array(
				'id' => 'highlight_colour',
				'name' => esc_html__( 'Highlight colour', 'metabox-online-generator' ),
				'type' => 'color',
				'std' => '#ffff00',
				'desc' => esc_html__( 'Colour for the highlighted pieces of text.', 'metabox-online-generator' ),
			),
			array(
				'id' => 'footer_background_colour',
				'name' => esc_html__( 'Footer background colour', 'metabox-online-generator' ),
				'type' => 'color',
				'std' => '#f3f3f3',
				'desc' => esc_html__( 'Background colour for the site footer. Make sure the text remains visibile', 'metabox-online-generator' ),
			),
			array(
				'id' => 'footer_text_colour',
				'name' => esc_html__( 'Footer text colour', 'metabox-online-generator' ),
				'type' => 'color',
				'std' => '#212529',
				'desc' => esc_html__( 'Text colour for the site footer. Make sure the text remains visibile', 'metabox-online-generator' ),
			)
		)
	);
	$meta_boxes[] = array(
        'id'             => 'warnings-notices',
        'title'          => 'Notices',
        'settings_pages' => 'shop_options',
        'tab'            => 'warnings-notices',
        'fields' => array(
				array(
					'id' => 'customer_notice_heading',
					'name' => esc_html__( 'Heading', 'metabox-online-generator' ),
					'type' => 'text',
					'std'=>'Customer notice:',
				),
				array(
					'id' => 'customer_notice',
					'name' => esc_html__( 'Notice to customers', 'metabox-online-generator' ),
					'type' => 'textarea',
				),
				array(
					'id' => 'enable_customer_notice',
					'name' => esc_html__( 'Enable notice', 'metabox-online-generator' ),
					'type' => 'checkbox',
				),
				array(
					'id' => 'div_4',
					'type' => 'divider',
				),
				array(
					'id' => 'enable_book_reservations',
					'name' => esc_html__( 'Enable book reservations', 'metabox-online-generator' ),
					'type' => 'checkbox',
					'std'=> true
				),
				array(
					'id' => 'enable_book_reservation_message',
					'name' => esc_html__( 'If book reservations are NOT allowed, add an optional message here', 'metabox-online-generator' ),
					'type' => 'wysiwyg'
				),
		)
	);
	$meta_boxes[] = array(
        'id'             => 'news_options',
        'title'          => 'News / Blog',
        'settings_pages' => 'shop_options',
        'tab'            => 'news_options',
        'fields' => array(
			array(
				'id' => 'enable_blog_on_website',
				'name' => esc_html__( 'Enable Blog', 'metabox-online-generator' ),
				'type' => 'checkbox',
				'desc' => esc_html__( 'You can show/hide your blog section', 'metabox-online-generator' ),
			),
			array(
				'id' => 'display_title_for_blog',
				'name' => esc_html__( 'Display title as', 'metabox-online-generator' ),
				'type' => 'radio',
				'placeholder' => '',
				'options' => array(
					'display_as_news' => esc_html__( '“News”', 'metabox-online-generator' ),
					'display_as_blog' => esc_html__( '“Blog”', 'metabox-online-generator' ),
				),
				'std'=>'display_as_news',
				'inline' => 'true',
			),
			array(
				'id' => 'use_author_names',
				'name' => esc_html__( 'Show author name', 'metabox-online-generator' ),
				'type' => 'checkbox',
				'desc' => esc_html__( 'Show the post author‘s name?', 'metabox-online-generator' ),
				'std' => 'true',
			),
		)
	);
    return $meta_boxes;
} );
