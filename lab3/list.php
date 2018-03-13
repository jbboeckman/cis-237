<?php

require("base.php");

$dataSourceStatus = $dataSource->getStatus();

try {
	$list = $FileMovieManager->read();

	
} catch (FileOpenException $e){
	$table_body = $e;
} catch (Exception $e) {
	$table_body = $e->getMessage();
}


$body = <<<EOT
<div class="container">
	$dataSourceStatus
	<div class="row">
	<p class="bg-info">...</p>
		<table class="table">
			<thead>
				<tr>
					<th>movie name</th>
					<th>director name</th>
					<th>artists</th>
					<th>genre</th>
					<th>rating</th>
					<th>edit</th>
				</tr>
			</thead>
			<tbody>
				$table_body;
			</tbody>
		</table>
	</div>
</div>

EOT;
$htmlPage->setBody($body);
$htmlPage->printPage();

?>