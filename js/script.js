(function(){
	var advancedOpen = false,
	i = $('h5.advanced i');

	$('h5.advanced').on('click', function(){
		$(this).next().slideToggle();

		if(advancedOpen){
			advancedOpen = false;
			i.fadeOut(function(){
				i.addClass('icon-chevron-down').removeClass('icon-chevron-up').fadeIn();
			})
		} else {
			advancedOpen = true;
			i.fadeOut(function(){
				i.addClass('icon-chevron-up').removeClass('icon-chevron-down').fadeIn();
			})
		}
	})

	$('section.advanced').hide();

	if(!tweetDisplayed){
		$('div.tweet-form').addClass('span12').removeClass('span6');
	}

	// tooltips
	$('div.tweet-form').tooltip();

	$('div.error').alert();

	$('div.result a').on('click', function(){
		$(this).parent().append('<span class="text-success tick">&#10004;</span>');
	})
})();