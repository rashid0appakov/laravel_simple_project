$(document).ready(function() {
    $('.menu-burger__header').click(function() {
        $('.menu-burger__header').toggleClass('open-menu');
        $('.header-nav').toggleClass('open-menu');
        $('body').toggleClass('fixed-page');
    });
});

$(function(){
	$nav = $('.mobile-menu');
	$nav.css('width', $nav.outerWidth());
	$window = $(window);
	$h = $nav.offset().top;
	$window.scroll(function(){
		if ($window.scrollTop() > $h) {
			$nav.addClass('fixed');
		} else {
			$nav.removeClass('fixed');
		}
	});
});

