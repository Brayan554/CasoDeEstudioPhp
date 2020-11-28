<?php  


require 'models/Status.php';
require 'models/Type_statuses.php';


class StatusController
{
	private $model;
	private $type_statuses;

	public  function __construct()
	{
		$this->model = new Status;
		$this->type_statuses = new Type_statuses;
	}
	public function index()
	{

		if (isset($_SESSION['user'])) {
			
		require 'views/layout.php';
		$statuses = $this->model->getAll();
		require 'views/status/list.php';
			
		}else{

			require 'views/login.php';
		}
	}
	public function new(){

		if (isset($_SESSION['user'])) {
			
		require 'views/layout.php';
		$types = $this->type_statuses->getAll();
		require 'views/status/new.php';
			
			
		}else{

			require 'views/login.php';
		}
	}
	
	public function save(){
		$this->model->newStatus($_REQUEST);
		header("Location: ?controller=status");
	}

	public function edit()
	{


		if (isset($_SESSION['user'])) {
			
		if (isset($_REQUEST['id_status'])) {
			$id = $_REQUEST['id_status'];
			$data = $this->model->getstatusById($id);
			$types = $this->type_statuses->getAll();
			require 'views/layout.php';
			require 'views/status/edit.php';
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

		$this->model->editStatus($_POST);
		header("location: ?controller=status");
			
		} else {
			echo "Error";
		}
	}
  	public function delete()
 	{
 		$this->model->deleteStatus($_REQUEST);
 		header("Location: ?controller=status");
  	}



}
