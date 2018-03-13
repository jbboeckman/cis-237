<?php

class DataSource {
	public function getSource() : string{
		if (isset($_GET['source'])){
			return $_GET['source'];
		} else {
			return 'file';
		}
	}
	public function getStatus() : string {
		$source = $this->getSource();
		return "Currently connected to the $source!";
	}
	public function getMovieManager() : MovieManagerInterface{
		$manager = null;
		if ($this->getSource() === 'file'){
			$document_root = $_SERVER['DOCUMENT_ROOT'];
			$path = "$document_root/cis-237/lab3/storage/movielist.txt";
			$manager = new FileMovieManager($path);
		} else if ($this->getSource() === 'database'){
			$manager = new DatabaseMovieManager('localhost', 'root', '', 'movie_log');
		}
		return $manager;
	}
	public function buttons() : string {
		$button = <<<EOT
		<a class="btn btn-default btn-xs" href="?source=file" role="button">File</a>
		<a class="btn btn-default btn-xs" href="?source=database" role="button">Database</a>
EOT;
	return $buttons;
	}
	
	public function list(string $data) : string {
		$source = ucwords($this->getSource());
		$function = "listFrom$source";
		return $this->$function($data);
	}
	private function listFromFile(string $data) : string {
		$movies = explode("\n", trim($data));
		$table_body = '';
		foreach($movies as $key => $entry){
			$movie = explode(',', trim($entry));
			$table_body .= '<tr>';
			$table_body .= '<td>' . $movie[0] . '</td>';
			$table_body .= '<td>' . $movie[1] . '</td>';
			$table_body .= '<td>' . $movie[2] . '</td>';
			$table_body .= '<td>' . $movie[3] . '</td>';
			$table_body .= '<td>' . $movie[4] . '</td>';
			$table_body .= '<td><a href="edit.php?id=' . $key .'" class="btn btn-info btn-sm">Edit</a></td>';
			$table_body .= '</tr>';
		}
		return $table_body;	
	}
	private function listFromDatabase(string $data) : string {
		$movies = explode("\n", trim($data));
		$table_body = '';
		foreach($movies as $key => $entry){
			$movie = explode(',', trim($entry));
			$table_body .= '<tr>';
			$table_body .= '<td>' . $movie[0] . '</td>';
			$table_body .= '<td>' . $movie[1] . '</td>';
			$table_body .= '<td>' . $movie[2] . '</td>';
			$table_body .= '<td>' . $movie[3] . '</td>';
			$table_body .= '<td>' . $movie[4] . '</td>';
			$table_body .= '<td><a href="edit.php?id=' . trim($movie[5]) .'$source=' . $this->getSource() .'" class="brn-info btn-sn">Edit</a></td>';
			$table_body .= '</tr>';
		}
		return $table_body;		
	}
}

$dataSource = new DataSource();

?>