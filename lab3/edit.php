<?php
require("base.php");

$id = null;

if (isset($_GET) && isset($_GET['id'])){
	$id = $_GET['id'];
	$movie = $FileMovieManager->readOneById($id);
}
if (isset($_POST) && !empty($_POST)) {
	extract($_POST);
	$movie = new Movie($title, $director, $artists, $genre, $rating);
	if ($FileMovieManager->update($id, $record)) {
		header('Location: /list.php');
	}
}

$body = <<<EOT
<div class="container">
	<div class="row">
		<h1>Edit Movie</h1>
		<form action="" method="POST" class="form-horizontal">
			<div>
				<label>Movie name</label>
				<input type="text" name="title" value="$movie->title;" required>
			</div>
			<div>
				<label>Director’s name</label>
				<input type="text" name="director" value="$movie->director;" required>
			</div>
			<div>
				<label>Artists</label>
				<input type="text" name="artists" value="$movie->artists;">
			</div>
			<div>
				<select name="genre">
					<option value="action">Action</option>
					<option value="mystery">Mystery</option>
					<option value="horor">Horor</option>
					<option value="romance">Romance</option>
				</select>
			</div>
			<div>
				<input type="radio" name="rating" value="1"required> 1
				<input type="radio" name="rating" value="2"required> 2
				<input type="radio" name="rating" value="3"required> 3
				<input type="radio" name="rating" value="4"required> 4
				<input type="radio" name="rating" value="5"required> 5
			</div>
			<button type="submit">Submit</button>
		<form>
	</div>
</div>
EOT;
$htmlPage->setBody($body);
$htmlPage->printPage();

?>
