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
	</head>
	<body>
		<div class="main">
			<div class="row-fluid">
				<div class="span6">
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

				<div class="span6">
					<?php 
						if($_print){
					?>
					<h3>Tweet these: </h3>
					<ol>
						<?php
							echo $print;
						?>
					</ol>
					<?
						}
					?>
				</div>
			</div>

			<!-- end html start scripts -->
			<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.js"></script>
			<script type="text/javascript">
				$('section.advanced').hide();
				$('h5.advanced').on('click', function(){
					$(this).next().slideToggle();
				})
			</script>
		</div>
	</body>
</html>