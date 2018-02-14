<?php

$document_root = $_SERVER['DOCUMENT_ROOT'];
$path = "$document_root/cis-237/lab1/storage/movielist.txt";

$list = file_get_contents($path);

?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Movies</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	</head>
	<body>
		<?php require("nav.php") ?>
		<div class="container">
			<div class="row">
				<?php echo nl2br($list); ?>
			</div>
		</div>
	</body>
</html>