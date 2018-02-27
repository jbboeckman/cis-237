<!DOCTYPE html>

<html>
	<?php require("head.php") ?>
	<body>
		<?php require("nav.php") ?>
		<div class="container">
			<div class="row">
				<h1>Add a Movie</h1>
				<form action="movies.php" method="POST" class="form-horizontal">
					<div>
						<label>Movie name</label>
						<input type=" text" name="movname"required>
					</div>
					<div>
						<label>Director’s name</label>
						<input type="text" name="dirname"required>
					</div>
					<div>
						<label>Artists</label>
						<input type="text" name="art">
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