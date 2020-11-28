<?php

require 'models/Categorie.php';
require 'models/Status.php';



class CategorieController
{
	private $model;
	
	 public function __construct()
	{
		$this->model = new Categorie;
		$this->status = new Status;
	}
	
	public function index(){

		if (isset($_SESSION['user'])) {
			
		require 'views/layout.php';
		$categories = $this->model->getAll();
		require 'views/categories/list.php';
			
			
		}else{

			require 'views/login.php';
		}
		

	}
	public function new(){
		if (isset($_SESSION['user'])) {
			
		require 'views/layout.php';
		$statuses = $this->status->getAll();
		require 'views/categories/new.php';
			
			
		}else{

			require 'views/login.php';
		}
	}
	public function save(){

		$this->model->newCategorie($_REQUEST);
		header("Location: ?controller=categorie");

	}
	public function edit(){

		if (isset($_SESSION['user'])) {
			
		if (isset($_REQUEST['id_categories'])) {
			$id = $_REQUEST['id_categories'];
			$data = $this->model->getCategorieById($id);
			$statuses = $this->status->getAll();
			require 'views/layout.php';
			require 'views/categories/edit.php';
		} else {
			echo "Error";
		}
						
		}else{

			require 'views/login.php';
		}
	}
	public function update(){
		if (isset($_POST)) {
		$this->model->editCategorie($_POST);
		header("Location: ?controller=categorie");
		} else {
			echo "Error";
		}
	}
	public function delete(){
		$this->model->deleteCategorie($_REQUEST);
		header("Location: ?controller=categorie");

	}
	public function updateStatus()
	{
		$categorie = $this->model->getCategorieById($_REQUEST['id_categories']);
		$data = [];
		if ($categorie[0]->id_status == 1) {

		$data = [
					'id_categories' => $categorie[0]->id_categories,
					'id_status' => 2
				];

		}elseif($categorie[0]->id_status == 2){

			$data = [
					'id_categories' => $categorie[0]->id_categories,
					'id_status' => 1
				];
		}

		$this->model->editStatus($data);
		header("Location: ?controller=categorie");
	}
}