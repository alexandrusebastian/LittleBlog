<?php
//General controoler, bound to be extended
class Controller{
	//Return the model given as a parameter
	public function model($model){
		require_once '../app/models/' . $model . '.php';
		return new $model;
	}
	//Return the view given as a parameter
	public function view($view, $data = []){
		require_once '../app/views/' . $view . '.php';
	}
}
?>