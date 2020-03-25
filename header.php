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
	<header>
		
	</header>
	
	<main id="page-wrap">