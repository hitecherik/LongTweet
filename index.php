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
		<link rel="stylesheet" href="css/normalize.min.css">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/bootstrap-responsive.min.css">
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
		<form action="index.php" method="post">
			<label for="tweet">Tweet:</label><br>
			<textarea name="tweet" cols="30" rows="10"></textarea><br>
			<input class="button" type="submit" value="Make Long Tweet!">
		</form>

		<hr>

		<?php 
			if($_print){
		?>
		<ol>
			<?php
				echo $print;
			?>
		</ol>
		<?
			}
		?>
	</body>
</html>