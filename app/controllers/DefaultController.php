<?php
	@session_start();
	
	class DefaultController extends Controller{

		public $flag;
		public $user;

		//Default function when the application is ran
		public function index($parameters = []){
			//If the user has not logged in, show the login page
			if (!isset($_SESSION['user'])) {
			    // redirect to login page
			   	$this->view('login', $parameters);
				exit();
			}else {
				//Redirect to home and let it search the name in session
				$article = $this->model('Article');
				$array =  Article::getNewest();
				$this->view('home',$array);
			}
		}

		//Sign in routine
		public function signIn(){
			//If a user landed here by mistake, redirect him to home
			if (isset($_SESSION['user'])) {
				$article = $this->model('Article');
				$this->view('home', Article::getNewest());
			}else {			
				//Create an user object
				$user = $this->model('User');
				
				//Fill the username and password given by the user, if enetered
				if(isset($_POST['unamesin']) && isset($_POST['pwdsin'])) {

					$user->uname = $_POST['unamesin'];
					$user->password = $_POST['pwdsin'];

					//XSS and SQLinjection protection; be safe kids!
					$user->uname = mysql_real_escape_string(strip_tags($user->uname));
					$user->password = mysql_real_escape_string(strip_tags($user->password));

					//Search in database if the username and create a new view
					if(($returned = $user->search()) === ''){
						//Remember that this user successfully signed in
						$_SESSION['uname'] = $user->uname;		
		                $_SESSION['user'] = $user->fname . ' ' . $user->lname; 
		                $article = $this->model('Article');
						@$this->view('home',  Article::getNewest());
					}else{
						$this->view('login', ['error_sin' => $returned]);
					}
				//Send the user back to login page
				}else {
					$this->view('login', []);
				}
			}
		}

		//Sign up routine
		public function signUp(){
			//Fulfill the data in a User object
			$user = $this->model('User');
			$user->fname = $_POST['fnamesup'];
			$user->lname = $_POST['lnamesup'];
			$user->uname = $_POST['unamesup'];
			$user->password = $_POST['pwdsup'];
			$user->email = $_POST['emailsup'];	

			//Check if the passwords match
			if($_POST['rpwdsup'] === $_POST['pwdsup']){
				if(strlen($user->fname) > 10) {
					$this->view('login', ['error_sup' => "First name should be less than 10 characters"]);
				}
				if(strlen($user->lname) > 20) {
					$this->view('login', ['error_sup' => "Last name should be less than 20 characters"]);
				}
				if(strlen($user->uname) > 30) {
					$this->view('login', ['error_sup' => "User name should be less than 30 characters"]);
				}
				if(strlen($user->password) > 30) {
					$this->view('login', ['error_sup' => "Password should be less than 30 characters"]);
				}
				if(strlen($user->email) > 30) {
					$this->view('login', ['error_sup' => "Email should be less than 30 characters"]);
				}
				//Protect against SQLinjection using mysql_real_escape_string; and striptags for XSS
				$user->fname = mysql_real_escape_string(strip_tags($user->fname));
				$user->lname = mysql_real_escape_string(strip_tags($user->lname));
				$user->uname = mysql_real_escape_string(strip_tags($user->uname));
				$user->password = mysql_real_escape_string(strip_tags($user->password));
				$user->email = mysql_real_escape_string(strip_tags($user->email));

				//Try to save the user in the database
				if(($returned = $user->insert()) === '') {
					//Remember that this user successfully signed up	
					$_SESSION['user'] = $user->fname . ' ' . $user->lname; 
					$_SESSION['uname'] = $user->uname;
					$this->view('home',  Article::getNewest());
				}else {
					//Show in the login page the error occured
					$this->view('login', ['error_sup' => $returned]);
				}		
			}else {
				//Let the user reenter the password
				$this->view('login', ['error_sup' => 'Passwords do not match']);
			}
		}

		public function signOut(){
			unset($_SESSION['user']);
			unset($_SESSION['uname']);
			$this->view('login', []);
		}

		public function forgotPassword(){

		}

		public function insertArticle(){
			if (!isset($_SESSION['user']))
			{
				$this->view('login', []);
			}
			else 
			{				
				//Display the view for inserting articles
				$this->view('insertArticle', []);
			}
		}

		public function submitArticle(){
			if (!isset($_SESSION['user'])) {
				$this->view('login', []);
			}
			else {
				//In order to sublmit an article, the user should enter the title, content and tags
				$article = $this->model('Article');
				$article->title = $_POST['articletitle'];
				$article->content = $_POST['articlecontent']; 
				$article->tags = $_POST['tags'];


				//Protect against SQL injection and XSS
				if(strlen($article->title) > 50) {
					$this->view('home', ['message' => "The title should be less than 50 characters"]);
				}
				$article->title = mysql_real_escape_string(strip_tags($article->title));
							
				if(strlen($article->tags) > 100) {
					$this->view('home', ['message' => "The tags should be less than 100 characters"]);
				}				
				$article->tags = mysql_real_escape_string(strip_tags($article->tags));

				if(($returned = $article->insert()) === "") {
					$this->view('articlePreview',['article'=>$article]);
				} else {
					$err = "Error " . $returned;
					$this->view('home',['message'=>$err]);
				}
			}
		}

		public function searchArticle($parameters = ''){
			if (!isset($_SESSION['user'])) {
				$this->view('login', []);
			}
			else {
				if($parameters === '') 
					echo "Not found";

				$article = $this->model('Article');

				$parameters = explode('_', $parameters);
				$parameters = mysql_real_escape_string($parameters);
				if(($result = $article->search($parameters)) === '') {
					$this->view("articlePreview", ['article' => $article]);
				} else {
					echo $result;
				}
			}
		}

		public function searchArticles() {
			if (!isset($_SESSION['user'])) {
				$this->view('login', []);
			}
			else {
				$article = $this->model('Article');
				$this->view("searchArticles", []);
			}
		}

		public function about() {
			if (!isset($_SESSION['user'])) {
				$this->view('login', []);
			}
			else {
				$this->view('about');
			}
		}

		public function contact($error = '') {
			if (!isset($_SESSION['user'])) {
				$this->view('login', []);
			}
			else {
				$data = [];
				if($error != ''){
					$data['error_sin'] = $error;
				}
				$this->view('contact', $data);
			}
		}

		public function topArticles() {
			if (!isset($_SESSION['user'])) {
				$this->view('login', []);
			}
			else {
				$article = $this->model('Article');
				$this->view('topArticles');
			}
		}

		public function submitContact()	{
			if (!isset($_SESSION['user'])) {
				$this->view('login', []);
			}
			else {
				$contact = $this->model('Contact');
				$contact->name =  $_POST['name'];
				$contact->email =  $_POST['email'];
				$contact->phone =  $_POST['phone'];
				$contact->content =  $_POST['message'];

				if(strlen($contact->name) > 60) {
					$this->contact('The name should not be greater than 60 characters.');
				}
				$contact->name = mysql_real_escape_string(strip_tags($contact->name));

				if(strlen($contact->email) > 30) {
					$this->contact('The email should not be greater than 30 characters.');
				}
				$contact->email = mysql_real_escape_string(strip_tags($contact->email));

				if(strlen($contact->phone) > 20) {
					$this->contact('The phone should not be greater than 20 characters.');
				}
				$contact->phone = mysql_real_escape_string(strip_tags($contact->phone));

				if(strlen($contact->content) > 1200) {
					$this->contact('The content should not be greater than 1200 characters.');
				}
				$contact->content = mysql_real_escape_string(strip_tags($contact->content));


				if($contact->name === '') {
					$this->contact('Please complete your name!');
				}
				else if($contact->email === '') {
					$this->contact('Please complete your email!');
				}
				else if($contact->phone === '') {
					$this->contact('Please complete your phone!');
				}
				else if($contact->content === '') {
					$this->contact('Please complete your content!');
				}
				else {
					if($contact->submitContact() === '') {
						$this->contact("Message sent!");
					} 
					else {
						$this->contact("Error at submitting contact.");
					}
				}
			}
		}
	}