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
			<div class="row-fluid">
				<div class="span6 tweet-form">
					<form action="index.php" method="post">
						<h3>Create a LongTweet: </h3>
						<label for="tweet" title="Enter the text for the LongTweet that you want to make.">Tweet:</label>
						<textarea name="tweet" rows="7" title="Enter the text for the LongTweet that you want to make."></textarea><br>
						<h5 class="advanced">Advanced Options: <i class="icon-chevron-down"></i></h5>
						<section class="advanced">
							<p class="text-info">Here there are more advanced options so you can have more control over your LongTweet: </p>
							
							<div class="tool-one">
								<label for="tweet-length" class="inline-label" title="How long you want the individual tweets to be.">Tweet Length: </label>
								<input type="number" name="tweet-length" class="input-small" value="140" title="How long you want the individual tweets to be.">
							</div>

							<div class="tool-two">
								<input type="radio" name="toggle-dots" value="on" checked="true" title='Do you want a "..." before/after each individual tweet?'> <span title='Do you want a "..." before/after each individual tweet?'>Show "..."</span><br>
								<input type="radio" name="toggle-dots" value="off" title='Do you want a "..." before/after each individual tweet?'> <span title='Do you want a "..." before/after each individual tweet?'>Hide "..."</span>
							</div>
						</section>
						<input class="btn btn-primary" type="submit" value="Make Long Tweet!">
					</form>
					<hr>
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

			<!-- end html start scripts -->
			<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.js"></scriptt
			<script type="text/javascript" src="js/bootstrap.min.js"></script>
			<script type="text/javascript" src="js/jquery-ui.min.js"></script>
			<script type="text/javascript">
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
			</script>
		</div>
	</body>
</html>