(function(){
	var advancedOpen = false,
	i = $('h5.advanced i.chevron');

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
	$('div.success').alert();

	$('div.result a').on('click', function(){
		$(this).parent().append('<span class="text-success tick">&#10004;</span>');
	})
	
	/* $('label').on('click', function(){
		var $this = $(this);

		$this.next('input').addClass('next-input');
		document.getElementsByClassName('next-input').focus();
		$this.next('input').removeClass('next-input');
	}) */

	$('form.tweetfriend').submit(function(e){
		e.preventDefault();

		var username = document.getElementById('username').value,
			urlUsername = "%40" + username,
			url = "http://twitter.com/intent/tweet?url=http%3A%2F%2Fbit.ly%2Flong-tweet%2F&text=" + urlUsername + "%20LongTweet&via=hitecherik&related=hitecherik";

		window.open(url);
	})
})();