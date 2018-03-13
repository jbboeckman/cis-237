<?php

class FileCloseException extends Exception{
	public function __toString(){
		$alert = new Alert('File could not be close.', 'danger');
		return $alert->show();
	}
}
?>