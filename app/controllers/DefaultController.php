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
			//If a user landed here by mistake, redirect him
			if (isset($_SESSION['user'])) {
				$this->view('home', Article::getNewest());
			}else {			
				//Create an user object
				$user = $this->model('User');
				//Fill the username and password given by the user, if enetered
				if(isset($_POST['unamesin']) && isset($_POST['pwdsin'])) {
					$user->uname = $_POST['unamesin'];
					$user->password = $_POST['pwdsin'];
					//Search in database if the username and create a new view
					if(($returned = $user->search()) === ''){
						//Remember that this user successfully signed in
						$_SESSION['uname'] = $user->uname;		
		                $_SESSION['user'] = $user->fname . ' ' . $user->lname; 
						$this->view('home',  []);
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
			//Display the view for inserting articles
			$this->view('insertArticle', []);
		}

		public function submitArticle(){
			//In order to sublmit an article, the user should enter the title, content and tags
			$article = $this->model('Article');
			$article->title = $_POST['articletitle'];
			$article->content = $_POST['articlecontent']; 
			$article->tags = $_POST['tags'];

			if(($returned = $article->insert()) === "") {
				$this->view('articlePreview',['article'=>$article]);
			} else {
				$err = "Error " . $returned;
				$this->view('home',['message'=>$err]);
			}
		}

		public function searchArticle($parameters = ''){
			
			if($parameters === '') 
				echo "Not found";

			$article = $this->model('Article');

			$parameters = explode('_', $parameters);
			if(($result = $article->search($parameters)) === '') {
				$this->view("articlePreview", ['article' => $article]);
			} else {
				echo $result;
			}
		}

		public function searchArticles() {
			$article = $this->model('Article');
			$this->view("searchArticles", []);
		}

		public function about() {
			$this->view('about');
		}

		public function contact() {
			$this->view('contact');
		}
	}