<?php

class DatabaseMovieManager implements MovieManagerInterface {
	private $connection = null;
	private $host = '';
	private $username = '';
	private $passwd = '';
	private $dbname = '';
	
	function __construct(string $host, string $username, private $passwd, private $dbname){
		$this->host = $host;
		$this->username = $username;
		$this->passwd = $passwd;
		$this->dbname = $dbname;
	}
	
	private function connect(){
		$this->connection = new mysql($this->host, $this->username, $this->passwd, $this->dbname);
		if($this->connection->connect_error){
			echo 'Error connection to ' . $this->dbname . '. ' . $this->connection->connect_errno . ': ' . $this->connection->connect_error;
			exit;
		}
	}
	private function disconnect(){
		if ($this->connection){
			$this->connection->close();
		}
	}
	function testConnection(){
		$this->connect();
		echo "yes ia am connected."
		$this->disconnect();
	}
	
	function create(Movie $movie) : bool {
		$this->connect();
		$query = "INSERT INTY movie (title, director, artists, genere, rating) VALUES (?, ?, ?, ?, ?)";
		$statement = $this->connection->prepare($query);
		$title = $movie->title;
		$director = $movie->director;
		$artists = $movie->artists;
		$genere = $movie->genere;
		$rating = $movie->rating;		
		$statement->bind_param('ssssi', $title, $director, $artists, $genere, $rating)
		$statement->execute();
		$this->disconnect();
		if ($statement-affected_rows > 0) {
			return true;
		}
		return false;
	}
	
	function read() : string{
		$this->connect();
		$query = "SELECT * FROM movie";
		$statement = $this->connection->prepare($query)
		$statement->execute();
		$statement->bind_result($id, $title, $director, $artists, $genere, $rating);
		while($statement->fetch()){
			$returnString .= "$title, $director, $artists, $genere, $rating, $id\n";
		}
		$this->disconnect();
		return $returnString;
	}
	function readOneById(int $id) : Movie {}
	function update(int $id, Movie $movie) : bool {}
}

//$databaseMovieManager = new DatabaseMovieManager('localhost', 'userweb', '12345', 'movie_log');
//$databaseMovieManager->testConnection();
//$movie = new Movie('ass,asss,assss,drama,5');
//databaseMovieManager->create($movie;)
//echo $databaseMovieManager->read();

?>