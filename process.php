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

	// sets $error, $len and $shareMessage if no error message
	$error = "";
	$len = "140";
	$shareMessage = "";

	if ($_POST['submitted']==="true"){
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
	}

	if(isset($_POST['your-name'])&&isset($_POST['your-email'])&&isset($_POST['friend-name'])&&isset($_POST['friend-email'])&&isset($_POST['message-to-friend'])&&$_POST['submitted']==="yes"){
		$yourName = $_POST['your-name'];
		$yourEmail = $_POST['your-email'];
		$friendName = $_POST['friend-name'];
		$friendEmail = $_POST['friend-email'];
		$subject = "About LongTweet (From " . $yourName . ")";
		$message = "Dear " . $friendName . ",\n\n" . $yourName . " has sent you the following message regarding LongTweet (http://bit.ly/long-tweet/):\n\n\n" . $_POST['message-to-friend'] . "\n\n\nYou can find LongTweet at http://bit.ly/long-tweet/ and send tweets longer than 140 characters for yourself.\n\nRegards,\n\nThe LongTweet Bot\nlong-tweet@hitecherik.tk";
		$headers = 'From: ' . $yourEmail . "\r\n" . 'Reply-To: ' . $yourEmail . "\r\n" . 'X-Mailer: PHP/' . phpversion();

		$message = wordwrap($message, 70, "\r\n");

		mail($friendEmail, $subject, $message, $headers);

		$shareMessage = '<div class="alert alert-success success"><button type="button" class="close" data-dismiss="alert">&times;</button><b>Yay!</b> Your email has been sent to your friend.</div>';
	} elseif($_POST['submitted']==="yes") {
		$shareMessage = '<div class="alert alert-error error"><button type="button" class="close" data-dismiss="alert">&times;</button><b>Whoops!</b> You have not entered a value into one of the boxes. All are compulsory.</div>';
	}
?>