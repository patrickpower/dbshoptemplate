jQuery(document).ready(function($){
	
	$('[data-href]').each(function(){
		var destination = $(this).attr('data-href');
		$(this).click(function(){
			window.location.href = destination;
		})
	})
	
	$('#menu-button').click(function(){
		
		$('nav, body').toggleClass('menuOpen');
		$('.nav_search').removeClass('vis');
	})
	
	$('.header-search-trigger').click(function(){
		$('.nav_search').toggleClass('vis');
		$('nav, body').removeClass('menuOpen');
	})
	
	$('#reserve_a_book').click(function(){
		$('.reserve_button_holder, .reserve_button_modal_outer').addClass('modal_visible');
	})
	$('#close-reserve_modal').click(function(){
		$('.reserve_button_holder, .reserve_button_modal_outer').removeClass('modal_visible');
	})
	
	
})