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
			throw new FileOpenException();
		}
		$content = "$movie->title,$movie->dirname,$movie->art,$movie->genre,$movie->score\n";
		if (!fwrite($fp, $content)){
			throw new FileWriteException();
		}
		if (!fclose($fp)){
			throw new FileCloseException();
		}
		return true;
	}
	function read() : string {
		if (($list = file_get_contents($this->path)) == false){
			throw new FileOpenException();
		}
		return $list;
	}
	function readOneById(int $id):Movie{
		$movie = new Movie($title, $dirname, $art, $genre, $score);
		return $movie;
	}
	function update(int $id, Movie $movie):bool{
		$fp = fopen($this->path,'ab');
		if (!$fp){
			return false;
		}
		$content = "$movie->title,$movie->dirname,$movie->art,$movie->genre,$movie->score\n";
		if (!fwrite($fp, $content)){
			return false;
		}
		if (!fclose($fp)){
			return false;
		}
		return true;
	}
}

//$document_root = $_SERVER['DOCUMENT_ROOT'];
//$path = "$document_root/cis-237/lab3/storage/movielist.txt";
//$FileMovieManager = new FileMovieManager($path);

?>