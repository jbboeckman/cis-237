<?php

require("FileMovieManager.php");
require("Movie.php");

$alert = '<div class="alert alert-%s" role="alert">%s</div>';

/**
* pretty print arrays.
*  @param array $array
*/
function printArray(array $array) {
	echo '<pre>' . print_r($array, true) . '</pre>';
}

/* I chose POST beacuse the browser does not need to remember what is entered.
* @param string $file - path to the file
* @param string $content - string to write to file
* @return bool
* 
* function writeToFile(string $file, string $content): bool{
*	$fp = fopen($file,'ab');
*	if (!$fp){
*		return false;
*	}
*	if (!fwrite($fp, $content)){
*		return false;
*	}
*	if (!fclose($fp)){
*		return false;
*	}
*	return true;
* }
*/

?>