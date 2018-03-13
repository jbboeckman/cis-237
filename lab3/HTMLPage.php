<?
class HTMLPage {
	private $head = <<<EOT
	<head>
		<meta charset="utf-8">
		<title>Movies</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		//<link rel="stylesheet" href="css/styles.css">
	</head>
EOT;
	private $body = <<<EOT
	
EOT;
	private $nav = <<<EOT
	<nav class="navbar navbar-defualt">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="index.php">
					Movies
				</a>
			</div>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="index.php">Add a Movie</a></li>
				<li><a href="list.php">List Movies</a></li>
			</ul>
		</div>
	</nav>
EOT;

	function setHead($head) {
		$this->head = $head;
	}
	function setNav($nav) {
		$this->nav = $nav;
	}
	function setBody($body) {
		$this->body = <<<EOT
		<body class="layered-image">
			$this->nav
			$body
		</body>
EOT;
	}
	function printPage() : string {
		echo <<<EOT
		<!DOCTYPE html>
		<html>
		$this->head
		$this->body
		</html>
EOT;
	}
}

$htmlPage = new HTMLPage();

?>