<?php
class Article {
	public $articleid  = '';
	public $userid = '';
	public $title = '';
	public $content = '';
	public $tags = '';
	public $rating  = '';
	public $views  = '';
	public $date = '';

	public function insert(){
			//Required data for 
			/*if($userid = '' || $title = '' || $content = '') {
				//return 'Please fill the fields marked by *';
			}else */{
				//$this->title = rawurlencode($this->title);
				$this->title = mysql_real_escape_string($this->title);
				$this->content = ($this->content);
				$this->tags = mysql_real_escape_string($this->tags);
				$this->views = 0;
				$this->rating = 0;

				//Create a connection with the database
				require_once ('mysqli_connect.php');

				if(isset($_SESSION['uname'])) {
					$uname = $_SESSION['uname'];
					$userquery = "SELECT FNAME, LNAME, UID FROM users WHERE UNAME = '$uname'";
					$response = mysqli_query($dbc, $userquery);
					$row = $response->fetch_assoc();

					$this->userid = $row['FNAME'] . " " . $row['LNAME'];
					$this->date = "Now";
					$row = $row['UID'];

					//Insert article in database
					$query = "INSERT INTO articles (USERID,	TITLE, CONTENT,	TAGS, RATING, VIEWS) 
					VALUES ('$row', '$this->title', '$this->content', '$this->tags', '0', '0')";
					if($dbc->query($query) === TRUE) {
						return '';
					}else {
						return 'Could not communicate with the database';
					}
				}
			}
		}

		public function search($parameters = []) {
			if(isset($parameters[1])) {
				$this->articleid = mysql_real_escape_string($parameters[1]);
				require_once ('mysqli_connect.php');
				$query = "SELECT * FROM articles WHERE ARTICLEID =  '$this->articleid'";

				$response = mysqli_query($dbc, $query);

				if ($response->num_rows === 1) {
					($row = $response->fetch_assoc());

					if(isset($parameters[0])){
						$title =  preg_replace("/[^\w]+/", "-", $row['TITLE']);
						if($parameters[0] === $title) {
							$this->title =  $row['TITLE'];
							$this->content = $row['CONTENT'];
							$this->rating = $row['RATING'];
							$this->views = $row['VIEWS'] + 1;
							$this->date = $row['DATE'];
							$this->userid = $row['USERID'];

							if(isset($_SESSION['uname'])) {
								$uname = $_SESSION['uname'];
								$userQuery = "SELECT FNAME, LNAME FROM users WHERE UNAME = '$uname'";
								$response = mysqli_query($dbc, $userQuery);

									//If a result was found
								if ($response->num_rows > 0) 
								{
									($row = $response->fetch_assoc());
								}

								$this->userid = $row['FNAME'] . ' '	. $row['LNAME'];

								$updateQuery = "UPDATE articles SET VIEWS='$this->views' WHERE ARTICLEID='$this->articleid'";

								if($dbc->query($updateQuery) === FALSE) {
									return 'Could not communicate with the database';
								}
							}
						}
					} else {
						return "URL not valid";
					}		    		
					
					return '';
				} else {
					return "Not found in the database";
				}

			}else {
				return "Empty article inserted";
			}
		}

		public static function getNewest() {
			$array = [];

			require_once ('mysqli_connect.php');
			$query = "SELECT ARTICLEID, TITLE FROM articles ORDER BY date DESC";

			$response = mysqli_query($dbc, $query);

			if ($response->num_rows >= 1) {
				for($i = 0; $i < $response->num_rows; $i++) {
					$row = $response->fetch_assoc();	$t=$row['TITLE'];
					$array[$i] = $row['TITLE'] . '_' . $row['ARTICLEID'];
				}
			}
			return $array;
		}

		public static function searchArticles($parameters = []){
			$array = [];

			require_once ('mysqli_connect.php');
			foreach( $parameters as $param ) {
				//$query = "SELECT ARTICLEID, TITLE FROM articles WHERE tags like '%$param%'";
				$query = "SELECT ARTICLEID, TITLE FROM articles WHERE title like '%$param%' OR tags like'%$param%' OR content like'%$param%'";
				$response = mysqli_query($dbc, $query);
				if ($response->num_rows >= 1) {
					for($i = 0; $i < $response->num_rows; $i++) {
						$row = $response->fetch_assoc();	$t=$row['TITLE'];
						$array[$i] = $row['TITLE'] . '_' . $row['ARTICLEID'];
					}
				}

				return $array;			
			}
		}
	}