<?php

class Movie{
	private $movname;
	private $dirname;
	private $art;
	private $genre;
	private $score;
	
	function __construct($movname, $dirname, $art, $genre, $score){
		$this->setMovname($movname);
		$this->setDirname($dirname);
		$this->setArt($art);
		$this->setGenre($genre);
		$this->setScore($score);
	}
	
	function __get($attr_name){
		return $this->$attr_name;
	}

	function __set($attr_name, $value){
		$function = "set$attr_name";
		$this->$function($value);
		$this->$attr_name = $value;
	}
	
	function setMovname($movname) {
		$this->movname = trim($movname);
	}
	function setDirname($dirname) {
		$this->dirname = trim($dirname);
	}
	function setArt($art) {
		$this->art = trim($art);
	}
	function setGenre($genre) {
		$this->genre = ($genre);
	}
	function setScore($score) {
		$this->score = ($score);
	}
}

?>