<?php

 require 'models/Type_statuses.php';

 class Type_statusController
 {
 	private $model;
 	
 	public  function __construct()
 	{
 		$this->model = new type_statuses; 
 	}

 	public function index()
 	{

 		if (isset($_SESSION['user'])) {
			
 		require 'views/layout.php';
 		$tyoes = $this->model->getAll();
 		require 'views/type_statuses/list.php';
			
		}else{

			require 'views/login.php';
		}

 	}
 	public function new()
	{

		if (isset($_SESSION['user'])) {
			
			
		require 'views/layout.php';
		$tyoes = $this->model->getAll();
		require 'views/type_statuses/new.php';
			
		}else{

			require 'views/login.php';
		}

	}
	public function save()
	{
		$this->model->newType($_REQUEST);
		header("Location: ?controller=type_status");
	} 
	public function edit()
	{

		if (isset($_SESSION['user'])) {
			
		if (isset($_REQUEST['id_type_statuses'])) {
			$id = $_REQUEST['id_type_statuses'];
			$data = $this->model->getTypeById($id);
			require 'views/layout.php';
			require 'views/type_statuses/edit.php';
		} else {
			
			echo "Error";
		}
		
		}else{

			require 'views/login.php';
		}
	}
	public function update()
	{
		if (isset($_POST)) {
			$this->model->editType($_POST);
			header("Location: ?controller=type_status");
		} else {
			echo "Error";
		}
	}
	public function delete()
	{
			$this->model->deleteType($_REQUEST);
			header("Location: ?controller=type_status");
	}
 }