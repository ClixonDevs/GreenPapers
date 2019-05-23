// JavaScript Document

$('.hamburger').on('click', function() {
	
	if ($('.menu').hasClass('open')) {
		$('.menu').removeClass('open');
	} else {
		$('.menu').addClass('open');
	}
});