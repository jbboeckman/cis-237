<?php

interface MovieManagerInterface {
	function create(Movie $movie) : bool;
	function read():string;
	
	function readOneById(int $id):Movie;
	
	function update(int $id, Movie $movie):bool;
}

?>