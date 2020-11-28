	<?php

/**
 * Clase UserController
 */
require 'models/User.php';
require 'models/Status.php';
require 'models/Rol.php';
require 'models/login.php';


class UserController 
{
	
	private $model;
	private $status;
	private $rol;
	private $login;


	public function __construct()
	{
		$this->model = new User;
		$this->status = new Status;
		$this->rol = new Rol;
		$this->login = new Login;
		
	}
	public function index()
	{

		if (isset($_SESSION['user'])) {
			
		//Llamado el metodo que tiene todos los usuarios 
		require 'views/layout.php';
		//Llamado al metodo generar que a hace el llamado a la base de datos
		$users = $this->model->getall(); 
		require 'views/user/list.php';
			
			
		}else{

			require 'views/login.php';
		}
	}
	public function new()
	{

		if (isset($_SESSION['user'])) {
			
		require 'views/layout.php';
		$roles = $this->rol->getActiveRoles();
		require 'views/user/new.php';
			
			
		}else{

			require 'views/login.php';
		}

	}
	public function save()
	{
		$this->model->newUser($_REQUEST);
		header("Location: ?controller=user");
	}
	public function edit()
	{

		if (isset($_SESSION['user'])) {
			
		if (isset($_REQUEST['id_user'])) {
			$id = $_REQUEST['id_user'];
			$data = $this->model->getUserById($id);
			$statuses = $this->status->getAll();
			$roles = $this->rol->getActiveRoles();

			require 'views/layout.php';
			require 'views/user/edit.php';
		} else {
			echo "Error";
		}
			
			
		}else{

			require 'views/login.php';
		}
	}
	public function update(){

		if (isset($_POST)) {
			$this->model->editUser($_POST);
			header("Location: ?controller=user");
		} else {
			echo "Error";
		}	
	}
	public function delete()
	{
		
		$this->model->deleteUser($_REQUEST);
		header("Location: ?controller=user");
	}

	public function updateStatus()
	{
		$user = $this->model->getUserById($_REQUEST['id_user']);
		$data = [];
		if ($user[0]->id_status == 1) {

			$data = [
						'id_user' => $user[0]->id_user,
						'id_status' => 2				
					];
		}elseif ($user[0]->id_status == 2) {
			$data = [
						'id_user' => $user[0]->id_user,
						'id_status' => 1				
					];
		}
		$this->model->editStatus($data);
		header("Location:?controller=user");
	}
}
