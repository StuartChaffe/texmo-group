jQuery(document).ready(function($) {
	$('.featherlight').featherlight({
		closeIcon: 'close',
	});

	$('.#banner-videoo').on('click', function(ev) {
		setTimeout(function() {
			$("#video1")[0].src += "autoplay";
			},150);
	
		ev.preventDefault();
	});
});