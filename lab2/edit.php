<?php
require("base.php");

$id = null;

if (isset($_GET) && isset($_GET['id'])){
	$id = $_GET['id'];
	$movie = $FileMovieManager->readOneById($id);
}
if (isset($_POST) && !empty($_POST)) {
	extract($_POST);
	$movie = new Movie($movname, $dirname, $art, $genre, $score);
	if ($FileMovieManager->update($id, $record)) {
		header('Location: /list.php');
	}
}
?>

<!DOCTYPE html>

<html>
	<?php require("head.php") ?>
	<body>
		<?php require("nav.php") ?>
		<div class="container">
			<div class="row">
				<h1>Edit Movie</h1>
				<form action="" method="POST" class="form-horizontal">
					<div>
						<label>Movie name</label>
						<input type="text" name="movname" value="<?php echo $movie->movname; ?>" required>
					</div>
					<div>
						<label>Director’s name</label>
						<input type="text" name="dirname" value="<?php echo $movie->dirname; ?>" required>
					</div>
					<div>
						<label>Artists</label>
						<input type="text" name="art" value="<?php echo $movie->art; ?>">
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
						<input type="radio" name="score" value="1"required> 1
						<input type="radio" name="score" value="2"required> 2
						<input type="radio" name="score" value="3"required> 3
						<input type="radio" name="score" value="4"required> 4
						<input type="radio" name="score" value="5"required> 5
					</div>
					<button type="submit">Submit</button>
				<form>
			</div>
		</div>
	</body>
</html>