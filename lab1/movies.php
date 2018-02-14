<?php

function printArray(array $array) {
	echo '<pre>' . print_r($array, true) . '</pre>';
}
// I chose POST beacuse the browser does not need to remember what is entered.
function writeToFile(string $file, string $content): bool{
	$fp = fopen($file,'ab');
	if (!$fp){
		return false;
	}
	if (!fwrite($fp, $content)){
		return false;
	}
	if (!fclose($fp)){
		return false;
	}
	return true;
}

//printArray($_SERVER);
$document_root = $_SERVER['DOCUMENT_ROOT'];
$path = "$document_root/cis-237/lab1/storage/movielist.txt";
extract($_POST);
$content = "$movname,$dirname,$art,$genre,$score\n";

if (!writeToFile($path, $content)){
	$message = <<<EOT
	<div class="alert alert-danger" role="alert">failed to write to the file</div>
EOT;
} else {
	$message = <<<EOT
	<div class="alert alert-success" role="alert">success</div>
EOT;
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