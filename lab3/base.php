<?php
require("Alert.php");
require("HTMLPage.php");
require("Movie.php");
require("FileOpenException.php");
require("FileWriteException.php");
require("FileCloseException.php");
require("FileMovieManager.php");
require("MovieManagerInterface.php");
require("DatabaseMovieManager.php");
require("DataSource.php");


//$alert = '<div class="alert alert-%s" role="alert">%s</div>';

/**
* pretty print arrays.
*  @param array $array
*/
function printArray(array $array) {
	echo '<pre>' . print_r($array, true) . '</pre>';
}

?>