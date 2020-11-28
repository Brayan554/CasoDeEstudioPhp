<?php

require 'models/Rol.php';


class RolController
{

	private $model;
	
	 public function __construct()
	{
		$this->model = new Rol;
	
	}
	public function index()
	{

		if (isset($_SESSION['user'])) {
			
		require 'views/layout.php';
		$roles = $this->model-> getAll();
		require 'views/roles/list.php';
			
			
		}else{

			require 'views/login.php';
		}
	}

	public function updateStatus()
	{
		$rol = $this->model->getRolById($_REQUEST['id_rol']);
		$data = [];
		
		if ($rol[0]->id_status == 1) {

		$data = [
				  'id_rol' => $rol[0]->id_rol,
				  'id_status' => 2
				];
			
		}elseif($rol[0]->id_status == 2) {

				$data = [
				  'id_rol' => $rol[0]->id_rol,
				  'id_status' => 1
				];
		}
		$this->model->editStatus($data);
		header("Location: ?controller=rol");

	}
}
