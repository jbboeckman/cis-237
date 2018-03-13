<?php

require("base.php");

extract($_POST);
if (!empty($title) && !empty($director) && !empty($genre) && !empty($score)){
	$movie = new Movie($title, $director, $artists, $genre, $score);
	
	try {
		@$FileMovieManager->create($movie)
		$alert = new Alert("$title got saved into the phone book!", 'success');
		$message = $alert->show();
	} catch (FileOpenException $e){
		$message = $e;
	} catch (FileWriteException $e){
		$message = $e;
	} catch (FileCloseException $e){
		$message = $e;
	} catch (Exception $e){
		$message = $e->getMessage();
	}
} else {
	$alert = new Alert('you forgot some things.', 'danger');
	$message = $alert->show();
}
$body = <<<EOT
<div class="container">
	<div class="row">
		$message;
	</div>
</div>
EOT;
$htmlPage->setBody($body)
$htmlPage->printPage();
?>