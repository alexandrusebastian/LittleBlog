<?php

class Contact{
	public $name = '';
	public $email = '';
	public $phone = '';
	public $content = '';

	public function submitContact() {
		
		$this->name = mysql_real_escape_string($this->name);
		$this->email = mysql_real_escape_string($this->email);
		$this->phone = mysql_real_escape_string($this->phone);
		$this->content = mysql_real_escape_string($this->content);
		
		require_once ('mysqli_connect.php');

		//Insert contact in database
					$query = "INSERT INTO contacts (NAME, EMAIL, PHONE, CONTENT) 
					VALUES ('$this->name', '$this->email', '$this->phone', '$this->content')";
					if($dbc->query($query) === TRUE) {
						return '';
					}else {
						return 'Could not communicate with the database';
					}
	}
}
?>