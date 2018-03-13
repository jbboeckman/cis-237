<?php

class FileWriteException extends Exception{
	public function __toString(){
		$alert = new Alert('File could not be writen.', 'danger');
		return $alert->show();
	}
}
?>