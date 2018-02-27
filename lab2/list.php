<?php

require("base.php");

$list = $FileMovieManager->read();

$movielist = explode("\n", trim($list));
$table_body = '';
foreach($movielist as $key => $entry){
	$movie = explode(',', trim($entry));
	$table_body .= '<tr>';
	$table_body .= '<td>' . $movie[0] . '</td>';
	$table_body .= '<td>' . $movie[1] . '</td>';
	$table_body .= '<td>' . $movie[2] . '</td>';
	$table_body .= '<td>' . $movie[3] . '</td>';
	$table_body .= '<td>' . $movie[4] . '</td>';
	$table_body .= '<td><a href="edit.php?id=' . $key .'" class="btn btn-info btn-sm">Edit</a></td>';
	$table_body .= '</tr>';
	//printArray($movie);
}
?>

<!DOCTYPE html>
<html>
	<?php require("head.php"); ?>
	<body>
		<?php require("nav.php") ?>
		<div class="container">
			<div class="row">
				<table class="table">
					<thead>
						<tr>
							<th>movie name</th>
							<th>director name</th>
							<th>artists</th>
							<th>genre</th>
							<th>score</th>
							<th>edit</th>
						</tr>
					</thead>
					<tbody>
						<?php echo $table_body; ?>
					</tbody>
				</table>
			</div>
		</div>
	</body>
</html>