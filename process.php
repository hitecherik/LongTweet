<?php
	if (isset($_POST['tweet'])) {
		// declare variables
		$_print = true;
		$original = str_replace("\r\n", " ", $_POST['tweet'] . " (tweet sent via LongTweet, an app by @hitecherik)");
		$origLen = strlen($original);
		$indivLen = $_POST['tweet-length'] - 6;
		$splitTweet = str_split($original, $indivLen);
		$numTweets = count($splitTweet);
		$dots = ($_POST['toggle-dots']==="on" && $numTweets>1);
		$print = "";
		$count = 0;

		// split into tweets
		foreach ($splitTweet as $value) {
			// increments count
			$count += 1;

			// adds dots
			if($dots){
				if ($count===1) {
					$value .= "...";
				} elseif ($count===$numTweets){
					$value = "..." . $value;
				} else {
					$value = "..." . $value . "...";
				}
			}

			// adds to $print
			$print .= '<li><a href="https://twitter.com/share" class="twitter-share-button" data-lang="en" data-url="blah" data-count="none" data-text="'.$value.'">Tweet</a><script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script></li>';
		}
		unset($value); unset($count); // destroys unneeded variables
	}
?>