<?php
	// include process.php
	include 'process.php';
?>
<!-- Created: 3/2/13. -->
<!doctype html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Long Tweet</title>
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
			<div class="row-fluid">
				<div class="span6 tweet-form">
					<form action="index.php" method="post">
						<h3>Create a LongTweet!</h3>
						<label for="tweet">Tweet:</label>
						<textarea name="tweet" rows="7"></textarea><br>
						<h5 class="advanced">Advanced Options: <i class="icon-chevron-down"></i></h5>
						<section class="advanced">
							<label for="tweet-length" class="inline-label">Tweet Length: </label>
							<input type="number" name="tweet-length" class="input-small" value="140"><br> 
							<input type="radio" name="toggle-dots" value="on" checked="true"> Show "..."<br>
							<input type="radio" name="toggle-dots" value="off"> Hide "..."
						</section>
						<input class="btn btn-primary" type="submit" value="Make Long Tweet!">
					</form>
					<hr>
				</div>

				<?php 
					if($_print){
				?>
				<div class="span6">
					<h3>Tweet these: </h3>
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
			<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.js"></script>
			<script type="text/javascript">
				$('section.advanced').hide();
				$('h5.advanced').on('click', function(){
					$(this).next().slideToggle();
				})

				if(!tweetDisplayed){
					$('div.tweet-form').addClass('span12').removeClass('span6');
				}
			</script>
		</div>
	</body>
</html>