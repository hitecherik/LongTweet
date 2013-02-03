<?php
	// include mobile_detect.php to make twitter button size
	include 'mobile_detect.php';

	// detects for mobile
	$detect = new Mobile_Detect();
	$buttonSize = "";
	$hr = false;
	if($detect->isMobile() || $detect->isTablet()){
		$buttonSize = " btn-large";
		$hr = true;
	}

	// sets boolean for easy if statements
	$_print = false;

	// sets $original for no undefined
	$original = "";

	// sets $error and $len if no error message
	$error = "";
	$len = "140";

	if (isset($_POST['tweet'])&&$_POST['tweet']!==""&&$_POST['tweet-length']<141&&$_POST['tweet-length']>6) {
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
			$print .= '<li><a href="https://twitter.com/intent/tweet?text='.$value.'&related=hitecherik" target="_blank" class="twitter-share-button btn'.$buttonSize.'"><img src="img/twitter-bird.png"> Tweet</a></li>';
		}
		unset($value); unset($count); // destroys unneeded variables
	} elseif($_POST['tweet']===""||$_POST['tweet-length']>140||$_POST['tweet-length']<7){
		if($_POST['tweet']===""&&!($_POST['tweet-length']>140)&&!($_POST['tweet-length']<7)){
			$error = '<div class="alert alert-error error"><button type="button" class="close" data-dismiss="alert">&times;</button><b>Whoops!</b> You have not entered a LongTweet into the box.</div>';
		} elseif(!($_POST['tweet']==="")&&($_POST['tweet-length']>140||$_POST['tweet-length']<7)){
			$error = '<div class="alert alert-error error"><button type="button" class="close" data-dismiss="alert">&times;</button><b>Whoops!</b> You have entered a value bigger than 140 or smaller than 7 for the Individual Tweet Length box.</div>';
		} else {
			$error = '<div class="alert alert-error error"><button type="button" class="close" data-dismiss="alert">&times;</button><b>Whoops!</b> You have not entered a LongTweet into the box.</div><div class="alert alert-error error"><button type="button" class="close" data-dismiss="alert">&times;</button><b>Whoops!</b> You have entered a value bigger than 140 or smaller than 7 for the Individual Tweet Length box.</div>';
		}

		$original = $_POST['tweet'];
		$len = $_POST['tweet-length'];
	}
?>