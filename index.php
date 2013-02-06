<?php
	// include process.php for background work
	include 'process.php';
?>
<!-- Created: 3/2/13. -->
<!doctype html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width">
		<meta name="author" content="Alexander Nielsen">
		<meta name="description" content="Ever wanted to send a tweet with more than 140 characters! You can do it here using LongTweet">
		<title>Long Tweet</title>
		<link rel="stylesheet" href="css/jquery-ui.min.css">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/bootstrap-responsive.min.css">
		<link rel="stylesheet" href="css/style.css">

		<!-- php variables sent to javascript -->
		<script type="text/javascript">
			var tweetDisplayed = false;
		</script>
		<?php
			if($_print){
				echo "<script type=\"text/javascript\">tweetDisplayed = true;</script>"; 
			}
		?>
	</head>
	<body>
		<div class="main">
			<h1>LongTweet</h1>
			<?php
				if($hr){
					echo "<hr>";
				}
			?>
			<div class="row-fluid">
				<div class="span6 tweet-form">
					<form action="index.php" method="post">
						<h3>Create a LongTweet: </h3>
						<?php
							echo $error;
						?>
						<label for="tweet" title="Enter the text for the LongTweet that you want to make.">Tweet:</label>
						<textarea name="tweet" rows="7" title="Enter the text for the LongTweet that you want to make." id="countHere"><?php echo trim($original); ?></textarea><br>
						<div class="count">
							<div class="countSection">
								Count: <span class="count">0</span> <small><i>(Adds "(tweet sent via LongTweet, an app by @hitecherik)" to count value.)</i></small>
							</div>
							<div class="countSection countTotal">
								Number of Tweets: <span class="total">0</span>
							</div>
						</div>
						<h5 class="advanced"><i class="icon-cog"></i> Advanced Options: <i class="icon-chevron-down chevron"></i></h5>
						<section class="advanced">
							<p class="text-info">Here there are more advanced options so you can have more control over your LongTweet: </p>
							
							<div class="tool-one">
								<label for="tweet-length" class="inline-label" title="How long you want the individual tweets to be.">Individual Tweet Length: </label>
								<input type="number" name="tweet-length" class="input-small" value="<?php echo $len; ?>" title="How long you want the individual tweets to be.">
							</div>

							<div class="tool-two">
								<input type="radio" name="toggle-dots" value="on" checked="true" title='Do you want a "..." before/after each individual tweet?'> <span title='Do you want a "..." before/after each individual tweet?'>Show "..."</span><br>
								<input type="radio" name="toggle-dots" value="off" title='Do you want a "..." before/after each individual tweet?'> <span title='Do you want a "..." before/after each individual tweet?'>Hide "..."</span>
							</div>
						</section>
						<input type="hidden" value="true" name="submitted"><!-- to test is first visit to page -->
						<input class="btn btn-primary" type="submit" value="Make Long Tweet!">
					</form>
					<?php
						if($hr&&$_print){	
							echo "<hr>";
						}
					?>
				</div>

				<?php 
					if($_print){
				?>
				<div class="span6 result">
					<h3>Tweet these: </h3>
					<p>Press all of these buttons in their order. <span class="muted">You may have wanted to customize something - just click on the <b>customize</b> menu.</span></p>
					<ol>
						<?php
							echo $print;
						?>
					</ol>
				</div>
				<?
					}
				?>
			</div>
			<hr>

			<!-- start about and social media -->
			<div class="row-fluid">
				<div class="span6">
					<h2>About LongTweet</h2>
					<p class="lead">LongTweet was created because sometimes people need to send a tweet of more than 140 characters.</p>
					<p>This webapp works by taking a tweet you type in, and then splitting it up into different tweets, and you send them off manually by pressing buttons, if you want to have a delay inbetween tweeting.</p>
					<p>If there is anything that you want to contact me about, please tweet to me (@hitecherik) or email the app at: <a href="mailto:long-tweet@hitecherik.tk">long-tweet@hitecherik.tk</a>.</p>
					<h3>And Thanks Goes To...</h3>
					<p><small>This website wouldn't have been possible (or wouldn't look that nice) without <a href="http://getbootstrap.com" target="_blank">Twitter Bootstrap</a>, <a href="http://glyphicons.com" target="_blank">Glyphicons</a>, <a href="https://dev.twitter.com/docs/image-resources" target="_blank">Twitter Image Resources</a>, <a href="http://jqueryui.com" target="blank">jQuery UI</a> and <a href="jquery.com" target="blank">jQuery</a>.</small></p>

					<?php
						if($hr){
							echo "<hr>";
						}
					?>
				</div>
				<div class="span6">
					<h2>Share with friends</h2>
					<p>Think LongTweet is great? Then tell your friends! You can tweet it to your friends or email it to them.</p>

					<?php
						if(!$hr){
							echo "<hr>";
						}
					?>

					<form class="tweetfriend">
						<h4>Tweet to friend</h4>
						<label for="username" class="inline-label">Your Friend's Username: </label>
						<div class="input-prepend">
							<span class="add-on">@</span>
							<input type="text" placeholder="username" name="username" id="username">
						</div>
						<button type="submit" class="btn btn-primary"><img src="img/twitter-bird-gray.png" alt="" style="margin-top:-1px;"> Share!</button>
					</form>

					<?php
						if(!$hr){
							echo "<hr>";
						}
					?>

					<form action="index.php" method="post" class="emailfriend">
						<?php
							echo $shareMessage;
						?>

						<h4>Email to friend</h4>
						<label for="your-name" class="inline-label">Your Name: </label>
						<input type="text" name="your-name" placeholder="Joe Bloggs"><br>
						<label for="your-email" class="inline-label">Your Email: </label>
						<input type="email" name="your-email" placeholder="joe@bloggs.com"><br>
						<label for="friend-name" class="inline-label">Your Friend's Name: </label>
						<input type="text" name="friend-name" placeholder="John Smith"><br>
						<label for="friend-email" class="inline-label">Your Friend's Email: </label>
						<input type="email" name="friend-email" placeholder="john@smith.com"><br>
						<label for="message-to-friend">Personal Message</label>
						<textarea name="message-to-friend" rows="5">I've found a website that can send tweets longer than 140 characters! Visit it here: http://bit.ly/long-tweet/</textarea><br>
						<input type="hidden" name="submitted" value="yes">
						<button type="submit" class="btn btn-primary"><i class="icon-envelope icon-white"></i> Send Email</button>
					</form>
				</div>
			</div>

			<!-- end html start scripts -->
			<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.js"></script>
			<script type="text/javascript" src="js/bootstrap.min.js"></script>
			<script type="text/javascript" src="js/jquery-ui.min.js"></script>
			<script type="text/javascript" src="js/script.js"></script>
		</div>
	</body>
</html>