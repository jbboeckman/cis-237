<?php

require ("MovieManagerInterface.php");

class FileMovieManager implements MovieManagerInterface {
	private $path = "";
	
	function __construct(string $path){
		$this->path = $path;
	}
	
	function create(Movie $movie):bool{
		$fp = fopen($this->path,'ab');
		if (!$fp){
			return false;
		}
		$content = "$movie->movname,$movie->dirname,$movie->art,$movie->genre,$movie->score\n";
		if (!fwrite($fp, $content)){
			return false;
		}
		if (!fclose($fp)){
			return false;
		}
		return true;
	}
	function read():string {
		return file_get_contents($this->path);
	}
	function readOneById(int $id):Movie{
		$movie = new Movie($movname, $dirname, $art, $genre, $score);
		return $movie;
	}
	function update(int $id, Movie $movie):bool{
		$fp = fopen($this->path,'ab');
		if (!$fp){
			return false;
		}
		$content = "$movie->movname,$movie->dirname,$movie->art,$movie->genre,$movie->score\n";
		if (!fwrite($fp, $content)){
			return false;
		}
		if (!fclose($fp)){
			return false;
		}
		return true;
	}
}

$document_root = $_SERVER['DOCUMENT_ROOT'];
$path = "$document_root/cis-237/lab2/storage/movielist.txt";
$FileMovieManager = new FileMovieManager($path);

?>