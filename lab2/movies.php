<?php

require("base.php");

extract($_POST);
if (!empty($movname) && !empty($dirname) && !empty($genre) && !empty($score)){
	$movie = new Movie($movname, $dirname, $art, $genre, $score);
	
	if (!$FileMovieManager->create($movie)){
		$message = sprintf("$alert", 'danger', 'File could not be writen to.');
	} else {
		$message = sprintf("$alert", 'success', 'your entry got saved to the list.');
	}
} else {
	$message = sprintf("$alert", 'danger', 'You forgot some things.');
}
?>

<!DOCTYPE html>
<html>
	<?php require("head.php") ?>
	<body>
		<?php require("nav.php") ?>
		<div class="container">
			<div class="row">
				<?php echo $message; ?>
			</div>
		</div>
	</body>
</html>