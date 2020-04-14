<!doctype html>
<html lang="en">

<head>
	<?php global $post;
        setup_postdata( $post );?>
    <meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html;" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="theme-color" content="<?php echo rwmb_meta( 'highlight_colour', ['object_type' => 'setting'], 'shop_options' );?>">
	<meta name="description" content="">
	<link rel="icon" type="image/png" href="<?php images();?>/favicon.png" />
	<title>
    <?php 
        
        if (is_home()) { 
                echo get_the_shop_name();
                echo get_bloginfo('description') ? " | ".get_bloginfo('description') : "";
                
            } else if(is_singular('book')){  
                echo get_the_title();
                echo " by ". get_post_meta($post->ID,'book_author',true);
                echo " | ".get_the_shop_name()." | ". get_post_meta($post->ID,'book_isbn',true);
            
            } else if(is_singular('event')){  
                echo get_the_title(). " | Events at ".get_the_shop_name(true);
            
            } else if(is_tax()){
                $term = get_queried_object();
                echo $term->name. " | ".get_the_shop_name();
            
            } else if(is_page()){
                echo get_the_title()." | ".get_the_shop_name();
            
            } else if(is_single()){
                echo get_the_title()." | ".get_the_shop_name();
            
            }
			else if(is_404()){
                echo "Page Not Found - 404 Error | ".get_the_shop_name();
        
            } else {
                echo get_the_title(). " | ".get_the_shop_name();
            }
        
            
        
        wp_reset_postdata();
        ?>
    
    </title>
    <!--[if lt IE 9]>
	   <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <![endif]-->
<?php wp_head();?>
	
	<style>
		:root {
		<?php if(rwmb_meta( 'trim_colour', ['object_type' => 'setting'], 'shop_options' )){?>
			--trimColour:<?php echo rwmb_meta( 'trim_colour', ['object_type' => 'setting'], 'shop_options' );?>;
		<?php }
			if(rwmb_meta( 'highlight_colour', ['object_type' => 'setting'], 'shop_options' )){?>
			--highlightColor:<?php echo rwmb_meta( 'highlight_colour', ['object_type' => 'setting'], 'shop_options' );?>;
		<?php }
			if(rwmb_meta( 'footer_background_colour', ['object_type' => 'setting'], 'shop_options' )){?>
			--footerBackgroundColour:<?php echo rwmb_meta( 'footer_background_colour', ['object_type' => 'setting'], 'shop_options' );?>;
		<?php }
			if(rwmb_meta( 'footer_text_colour', ['object_type' => 'setting'], 'shop_options' )){?>
			--footerTextColour:<?php echo rwmb_meta( 'footer_text_colour', ['object_type' => 'setting'], 'shop_options' );?>;
		<?php }?>
		}
	</style>
</head>
    
<body>
	<header class="container">
		<div id="menu-button"><i class="fa fa-bars"></i></div>
		<section class="header-logo_container row">
			<div class="header-logo col">
				<a href="/">
				<?php if(get_shop_logo() !== false){?>
				<img src="<?php echo get_shop_logo();?>"
					 alt="<?php echo get_the_shop_name();?>"
					 title="<?php echo get_the_shop_name();?>"
					 >
				<?php } else {?>
					<h2><?php echo get_the_shop_name();?></h2>
				<?php }?>
				</a>
			</div>
		</section>
		<nav class="row">
			<ul role="navigation">
				<li>
					<a href="/">Home</a>
				</li>
				<?php $args = array('taxonomy'=>'book_category');
					  $bookCats = get_terms($args);
					  if(count($bookCats > 0)){
					 $linkToBooks = rwmb_meta( 'link_to_this_book_cat', ['object_type' => 'setting'], 'shop_options' );
						if(isset($linkToBooks)){ $link = $linkToBooks;} else{  $link = $bookCats[0]->term_id;}
				?>
				<li>
					<a href="<?php echo get_term_link($link);?>">Books</a>
				</li>
				<?php }?>
				<li>
					<a href="/events">Events</a>
				</li>
				<?php if( rwmb_meta('enable_blog_on_website',['object_type' => 'setting'], 'shop_options' ) == "1"):?>
					<li><a href="/category/news">
						<?php echo rwmb_meta( 'display_title_for_blog', ['object_type' => 'setting'], 'shop_options' ) == "display_as_news" ? "News" : "Blog";?></a>
					</li>
				<?php endif;
				$isPublished = get_post_status(get_page_by_title('About')); if($isPublished == "publish"){?>
				<li>
					<a href="/about">About</a>
				</li>
				<?php }?>
				<li>
					<a href="/contact">Contact</a>
				</li>
				<?php
					$fb = rwmb_meta( 'shop_facebook', ['object_type' => 'setting'], 'shop_options' );
					$tw = rwmb_meta( 'shop_twitter', ['object_type' => 'setting'], 'shop_options' );
					$ig = rwmb_meta( 'shop_instagram', ['object_type' => 'setting'], 'shop_options' );
					if($fb || $tw || $ig):?>
				<li class="social-media_links">
					<?php 
						echo $fb ? '<a href="'.$fb.'" target="_blank"><span><i class="fab fa-facebook-f"></i></span></a>' : '';
						echo $tw ? '<a href="'.$tw.'" target="_blank"><span><i class="fab fa-twitter"></i></span></a>' : '';
						echo $ig ? '<a href="'.$ig.'" target="_blank"><span><i class="fab fa-instagram"></i></span></a>' : '';
					?>
				</li>
				<?php endif;?>
			</ul>
		</nav>
	</header>
	
	<main id="page-wrap" class="container">