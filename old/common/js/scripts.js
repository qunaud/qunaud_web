// JavaScript Document

//scrolltop

$(function(){
	$(window).scroll(function(){
    var now = $(window).scrollTop();
    if(now > 100){
		$('#page-top').fadeIn('slow');
	} else {
		$('#page-top').fadeOut('slow');
	}
	});
	$('#move-page-top').click(function(){
  $('html,body').animate({scrollTop:0},'slow');
});

});

