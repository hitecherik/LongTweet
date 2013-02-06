(function(){
	// variable declaration
	var advancedOpen = false,
		i = $('h5.advanced i.chevron'),
		textarea = $('textarea#countHere'),
	    taVal = document.getElementById('countHere'),
	    count = $('span.count'),
	    total = $('span.total'),
	    totalContainer = $('div.countTotal').hide();

	// open and close advanced box
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

	// hides advanced box from beginning
	$('section.advanced').hide();

	// changes layout if first visit
	if(!tweetDisplayed){
		$('div.tweet-form').addClass('span12').removeClass('span6');
	}

	// tooltips
	$('div.tweet-form').tooltip();

	// alerts (not if tablet or phone)
	if($(window).outerWidth>800){
		$('div.error').alert();
		$('div.success').alert();
	}

	// ticks for tweets tweeted
	$('div.result a').on('click', function(){
		$(this).parent().append('<span class="text-success tick">&#10004;</span>');
	})

	// tweet to friend form
	$('form.tweetfriend').submit(function(e){
		e.preventDefault();

		var username = document.getElementById('username').value,
			urlUsername = "%40" + username,
			url = "http://twitter.com/intent/tweet?url=http%3A%2F%2Fbit.ly%2Flong-tweet%2F&text=" + urlUsername + "%20LongTweet&via=hitecherik&related=hitecherik";

		window.open(url);
	})

	// count scripts
	var textarea = $('textarea#countHere'),
	    taVal = document.getElementById('countHere'),
	    count = $('span.count'),
	    total = $('span.total'),
	    totalContainer = $('div.countTotal').hide();

	textarea.keyup(function(){
	    var val = taVal.value,
	        len = val.length + 49, // +49 to allow for footnote
	        tweetNum = Math.ceil(len / 140);
	    
	    count.html(len);
	    
	    if(tweetNum < 2){
	        totalContainer.hide();
	    } else {
	        totalContainer.show();
	        total.html(tweetNum);
	    }
	});
})();