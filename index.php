<?php get_template_part('header');?>

<?php if(have_posts()){
		while(have_posts()){
			the_post();
			
		}
} else { echo "Oops, nothing found here."; } ?>

<?php get_template_part('footer');?>