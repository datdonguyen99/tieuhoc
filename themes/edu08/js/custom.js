$(document).ready(function(){
	//Mở menu
	$('.mobile-menu-toggle-btn').on('click',function(){
		$('body').addClass('open-menu');
	});
	
	//Đóng menu mobile
	$('.mobile-menu-bg').on('click',function(){
		$('body').removeClass('open-menu');
	});
	
	$('.mobile-menu-wrap').addClass('animate'); 
});