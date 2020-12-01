<!doctype html>
<html lang="en">
<!-- Patrick Power Design, patrickpower.design -->
	
<head>
	<?php global $post;
        setup_postdata( $post );?>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="theme-color" content="<?php echo rwmb_meta( 'trim_colour', ['object_type' => 'setting'], 'shop_options' );?>">
	<meta name="description" content="<?php echo get_the_shop_name().' - New releases, fiction, non-fiction, history, biography and children’s books. Reserve books online and collect in store.'.get_bloginfo('description');?>">
	<?php $favicon = rwmb_meta( 'favicon', ['object_type' => 'setting'], 'shop_options' );
		if($favicon){
		foreach ($favicon as $image){
			$id = $image['ID'];
			$imageSrc = wp_get_attachment_image_src($id,'full')[0];
		?>
			<link rel="icon" type="image/png" href="<?php echo $imageSrc;?>" />
		<?php } }
	?>
	
	<title><?php 
        
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
        ?></title>
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
			<div class="d-none d-lg-flex header-newsletter">
				<?php $show = rwmb_meta( 'display_newsletter_on_homepage', ['object_type' => 'setting'], 'shop_options' ); if($show){?>
				<a href="/#newsletter"><span class="d-inline-block mr-3"><i class="fas fa-paper-plane"></i></span>Join our newsletter</a>
				<?php } ?>
			</div>
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
			<div class="desktop__socials d-none d-lg-flex justify-content-lg-end">
				<?php	$fb = rwmb_meta( 'shop_facebook', ['object_type' => 'setting'], 'shop_options' );
						$tw = rwmb_meta( 'shop_twitter', ['object_type' => 'setting'], 'shop_options' );
						$ig = rwmb_meta( 'shop_instagram', ['object_type' => 'setting'], 'shop_options' );
					  echo $fb ? '<a href="'.$fb.'" target="_blank"><span><i class="fab fa-facebook-f"></i></span></a>' : '';
					  echo $tw ? '<a href="'.$tw.'" target="_blank" class="pl-3"><span><i class="fab fa-twitter"></i></span></a>' : '';
					  echo $ig ? '<a href="'.$ig.'" target="_blank" class="pl-3"><span><i class="fab fa-instagram"></i></span></a>' : '';
					?>
			</div>
		</section>
		<nav class="row border-top border-bottom py-lg-2">
			<ul role="navigation" class="d-lg-flex align-items-lg-center flex-lg-grow-1">
				<li>
					<a href="/">Home</a>
				</li>
				<?php $args = array('taxonomy'=>'book_category');
					  $bookCats = get_terms($args);
					  if(count($bookCats) > 0){
					 $linkToBooks = rwmb_meta( 'link_to_this_book_cat', ['object_type' => 'setting'], 'shop_options' );
						if(isset($linkToBooks)){ $link = $linkToBooks;} else{  $link = $bookCats[0]->term_id;}
				?>
				<li>
					<a href="<?php echo get_term_link($link);?>">Books</a>
				</li>
				<?php }
				$iseventsPagePublished = get_post_status(get_page_by_title('Events')); if($isEventsPagePublished == "publish"){?>
				<li>
					<a href="/about">Events</a>
				</li>
				<?php }
				if( rwmb_meta('enable_blog_on_website',['object_type' => 'setting'], 'shop_options' ) == "1"):?>
					<li><a href="/category/news">
						<?php echo rwmb_meta( 'display_title_for_blog', ['object_type' => 'setting'], 'shop_options' ) == "display_as_news" ? "News" : "Blog";?></a>
					</li>
				<?php endif;
				$isPublished = get_post_status(get_page_by_path('/about')->ID); if($isPublished === "publish"){/*?>
				<li>
					<a href="/about">About</a>
				</li>
				<?php */}?>
				<li>
					<a href="/contact">Contact</a>
				</li>
				<?php
					if($fb || $tw || $ig):?>
				<li class="social-media_links d-lg-none">
					<?php 
						echo $fb ? '<a href="'.$fb.'" target="_blank"><span><i class="fab fa-facebook-f"></i></span></a>' : '';
						echo $tw ? '<a href="'.$tw.'" target="_blank"><span><i class="fab fa-twitter"></i></span></a>' : '';
						echo $ig ? '<a href="'.$ig.'" target="_blank"><span><i class="fab fa-instagram"></i></span></a>' : '';
					?>
				</li>
				<?php endif;?>
			</ul>
			<div class="nav_search">
				<form action="/">
					<div class="input-group">
						<input name="s" class="form-control nav__search__bar" placeholder="Search by author, title, ISBN...">
					</div>
				</form>
			</div>
		</nav>
	</header>
	
	<main id="page-wrap" class="container<?php if(is_home()){echo " homepage";}?>">