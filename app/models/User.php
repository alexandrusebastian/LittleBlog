<?php
	class User{
		//User data
		public $fname = '';
		public $lname = '';
		public $password = '';
		public $email = '';
		public $uname = '';

		//Function for inserting a new user in the database
		public function insert(){
			//Check to see if the controller sent all the data
			if($this->fname === '' || $this->lname === '' || $this->uname === '' || $this->password === '' || $this->email === ''){
				return 'Please complete all the fields';
			}else { 
				//Create a connection with the database
				require_once ('mysqli_connect.php');
				
				//Check to see if a user with the same username already exists
				$query = "SELECT UNAME FROM users where UNAME = '$this->uname'";
				$response = mysqli_query($dbc, $query);
				if($response->num_rows > 0) {
					return 'User already exists';
				}else {
					//Insert user in database
					$query = "INSERT INTO users (UNAME, PASSWORD, FNAME, LNAME, EMAIL) VALUES ('$this->uname', '$this->password', '$this->fname', '$this->lname', '$this->email')";
					if($dbc->query($query) === TRUE) {
						return '';
					}else {
						return 'Could not communicate with the database';
					}
				}	
			}
		}

		//Return a user from the database
		public function search() {
			//Create a connection with the database
			require_once ('mysqli_connect.php');
			//Search in database
			$query = "SELECT * FROM users where UNAME = '$this->uname'";
			$response = mysqli_query($dbc, $query);

			//If a result was found
			if ($response->num_rows > 0) 
			{
				//Split the rows and fill the user class attributes
			    while($row = $response->fetch_assoc()) 
			    {
			    	if($this->password === $row['PASSWORD']) 
			    	{
			    		$this->fname = $row['FNAME'];
						$this->lname = $row['LNAME'];
						$this->email = $row['EMAIL'];
						$this->uname = $row['UNAME'];
					}else {
						return "Wrong password";
					}	        
				}
				return '';
			} else 
			{
		   		return "User could not be found";
			}
		}
	}