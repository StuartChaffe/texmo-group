// FAQ
jQuery(function ($) {
	$('.accordion .accordion--title').click(function() {
		$('.accordion .accordion--title').removeClass('active');
		$('.accordion .accordion--content').slideUp('normal');
		if($(this).next().is(':hidden') == true) {
			$(this).addClass('active');
			$(this).next().slideDown('normal');
		}
		return false;
	});
	$('.accordion .accordion--content').hide();
})