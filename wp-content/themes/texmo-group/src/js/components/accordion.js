// FAQ
jQuery(function ($) {
	// $('body').on('click', '.accordion--title', function () {
	// 	$(this)('.accordion-list').scrollView();
	// })
	$('.accordion-list .accordion--title').click(function() {
		$('.accordion-list .accordion--title').removeClass('active');
		$('.accordion-list .accordion--content').slideUp('normal');
		if($(this).next().is(':hidden') == true) {
			$(this).addClass('active');
			$(this).next().slideDown('normal');
			setTimeout(() => {
				$('body, html').animate({
				  scrollTop: $(this).offset().top
				 }, 200)
			  }, 400)
		}
		return false;
	});
	$('.accordion-list .accordion--content').hide();
})