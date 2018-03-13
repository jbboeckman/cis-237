<?php

class Movie{
	private $title;
	private $director;
	private $artists;
	private $genre;
	private $rating;
	
	function __construct($title, $director, $art, $genre, $rating){
		$this->setTitle($title);
		$this->setDirector($director);
		$this->setArtists($artists);
		$this->setGenre($genre);
		$this->setRating($rating);
	}
	
	function __get($attr_name){
		return $this->$attr_name;
	}

	function __set($attr_name, $value){
		$attr_name = str_replace('_', ' ', $attr_name);
		$attr_name = ucwords($attr_name);
		$attr_name = str_replace('_', '', $attr_name);
		$attr_name = "set$attr_name";
		$this->$function($value);
	}
	function getTitle() {
		return $this->title;
	}
	function setTitle($title) {
		$this->title = ucwords(trim($title));
	}
	function setDirector($director) {
		$this->director = ucwords(trim($director));
	}
	function setArtists($artists) {
		$this->artists = ucwords(trim($artists));
	}
	function setGenre($genre) {
		$this->genre = ($genre);
	}
	function setRating($rating) {
		$this->rating = ($rating);
	}
}

?>