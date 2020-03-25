<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html;" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="theme-color" content="#1c452e">
	<meta name="description" content="">
	<link rel="icon" type="image/png" href="<?php images();?>/favicon.png" />
	<title>
    <?php if (is_home()) { echo bloginfo('name');
            } else {  echo get_the_title(). " | ".bloginfo('name');
        }?>
    
    </title>
    <!--[if lt IE 9]>
	   <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <![endif]-->
<?php wp_head();?>
</head>
    
<body>
	<header class="container">
		<section class="header-logo_container row">
			<div class="header-logo col">
				<img src="<?php images();?>/logo.png"
					 alt="Bookshop name goes here"
					 title="Bookshop Name"
					 >
			</div>
		</section>
		<nav class="row">
			<ul role="navigation">
				<li>
					<a href="#">Home</a>
				</li>
				<li>
					<a href="#">Books</a>
				</li>
				<li>
					<a href="#">Events</a>
				</li>
				<li>
					<a href="#">About</a>
				</li>
				<li>
					<a href="#">Contact</a>
				</li>
				<li class="social-media_links">
					<a href="#"><span><i class="fab fa-facebook-f"></i></span></a>
					<a href="#"><span><i class="fab fa-instagram"></i></span></a>
					<a href="#"><span><i class="fab fa-twitter"></i></span></a>
				</li>
			</ul>
		</nav>
	</header>
	
	<main id="page-wrap" class="container">