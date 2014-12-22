<?php

class App{

	//This the default controller which has the methods to be called later
	protected $controller = 'DefaultController';

	//Default method to be called
	protected $method = 'index';

	//A list of parameters to be sent to the default method
	protected $parameters = [];

	public function __construct() {		
		$this->run();
	}

	//Default application behaviour
	public function run(){
		//Return an array with the parameters user had enetered in the URL
		$url = $this->parseUrl();

		//Check if the controller eneterd by the user exists
		if(file_exists('../app/controllers/' . $url[0] . '.php')){
			$this->controller = $url[0];
			unset($url[0]);
			$url = array_values($url);	
		}

		//Create a new controller(Either the default one, or user-created)
		require_once '../app/controllers/' . $this->controller . '.php';
		$this->controller = new $this->controller;

		//Check if the method entered as the second argumet exists in the controller
		if(isset($url[0])){
			if(method_exists($this->controller, $url[0])){
				$this->method = $url[0];
				unset($url[0]);
				$url = array_values($url);	
			}
		}
		
		if(isset($url[0])) {
			$this->parameters = $url;
		}

		//Execute the method in the controller with the list of parameters
		call_user_func_array([$this->controller, $this->method], $this->parameters);
		
	}

	//Returns an array with the parameters user had enetered in the URL
	public function parseUrl() {
		if(isset($_GET['url']))	{
			return $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
		}
	}
}
