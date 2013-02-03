<?php
	// include mobile_detect.php to make twitter button size
	include 'mobile_detect.php';
	$detect = new Mobile_Detect();
	$buttonSize = "";
	if($detect->isMobile() || $detect->isTablet()){
		$buttonSize = " btn-large";
	}

	$_print = false;

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
			$value = str_replace("+", "%20", urlencode($value));

			// adds to $print
			$print .= '<li><a href="https://twitter.com/intent/tweet?text='.$value.'&related=hitecherik" target="_blank" class="twitter-share-button btn'.$buttonSize.'">Tweet</a></li>';
		}
		unset($value); unset($count); // destroys unneeded variables
	}
?>