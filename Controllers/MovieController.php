<?php

/**
 * 
 */
require 'models/Movie.php';
require 'models/Status.php';
require 'models/User.php';
require 'models/Rol.php';
require 'models/Categorie.php';
require 'models/login.php';

class MovieController 
{
	private $model;
	private $status;
	private $user;
	private $rol;
	private $categorie;
	private $login;
	
	public function __construct()
	{
		$this->model = new Movie;
		$this->status = new Status;
		$this->user = new User;
		$this->rol = new Rol;
		$this->categorie = new Categorie;
		$this->login = new Login;
	}
	//llamar la vista y el metodo 
	public function index()
	{

		if (isset($_SESSION['user'])) {
			
		require 'views/layout.php';
		
		$movies = $this->model->getAll();
		$categories = $this->categorie->getAll();
		require 'views/movie/list.php';
			
			
		}else{

			require 'views/login.php';
		}

	}
	// Mostrar la Vistas 
	public function new()
	{
		

		if (isset($_SESSION['user'])) {
			
		require 'views/layout.php';
		
		$users = $this->user->getAll();
		$categories = $this->categorie->getAll();
		require 'views/movie/new.php';
			
		}else{

			require 'views/login.php';
		}

	} 
	//Llamar el metodo
	public function save()
	{	

		//organizar array para la tabla movie
		$dataMovie = [

						'name_movie'           => $_POST['name'],
						'description_movie'    => $_POST['description'],
						'id_user'              => $_POST['id_user'],
						'id_status'            => 1
		];


		//variable con array de Categorias  que llegan desde el front

$arrayCategories = isset($_POST['categories']) ? $_POST['categories'] : [];
		

		if (!empty($arrayCategories)) {
			
		$respMovie = $this->model->newMovie($dataMovie);

		//Obtener el ultimo Id Registrado de la tabla pelicula

		$lastIdMovie =$this->model->getLatsId();

		//inserccion a la tabla category-movie

		$respCategoryMovie = $this->model->saveCategoryMovie($arrayCategories, $lastIdMovie[0]->id );

		}else{
			$respMovie = false;
			$respCategoryMovie = false;
		}

		//insercion Pelicula 

		//validar si las inserciones se realizaron correctamente

		$arrayResp = [];

		if ($respMovie == true && $respCategoryMovie == true) {
				
			$arrayResp = [
							'success' => true,
							'message' => "Pelicula Creada"
						];
		}else{

			$arrayResp = [
							'error' => true,
							'message' => "Error Creando Pelicula"
						];

		}

		echo json_encode($arrayResp);
		return;	



	}

	//MOSTRAR LA VISTA DE EDITAR
	public function edit()
	{

		if (isset($_SESSION['user'])) {
			
			
		if (isset($_REQUEST['id_movie'])) {
			$id = $_REQUEST['id_movie'];
			$data = $this->model->getMovieById($id);
			$statuses  = $this->status->getAll();
			$users = $this->user->getAll();
			$categories = $this->categorie->getAll();
		$categoriesMovie = $this->model->getCategoriesMovie($id);
			
			require 'views/layout.php';
			require 'views/movie/edit.php';
		} else {
			
			echo "Error";
		}
			
			
		}else{

			require 'views/login.php';
		}

	}

	//Realizar el proceso de actualizar
	public function update()
	{

		$arrayResp = [];

		if (isset($_POST)) {


			//organizar array para la tabla movie
					$dataMovie = [

						'id_movie'			   => $_POST['id'],
						'name_movie'           => $_POST['name'],
						'description_movie'    => $_POST['description'],
						'id_user'              => $_POST['id_user'],
						'id_status'            => $_POST['id_status']
					];


					//variable con array de Categorias  que llegan desde el front

			$arrayCategories = isset($_POST['categories']) ? $_POST['categories'] : [];
					

					if (!empty($arrayCategories)) {
						
					$respMovie = $this->model->editMovie($dataMovie);


					//crear metodo para eliminar las categorias de category_movie

					$this->model->deleteCategoryMovie($_POST['id']);
					
					

					//inserccion a la tabla category-movie

					$respCategoryMovie = $this->model->saveCategoryMovie($arrayCategories, $_POST['id']);

					}else{
						$respMovie = false;
						$respCategoryMovie = false;
					}

		} else {

			$arrayResp = [
							'error' => true,
							'message' => "Error Actulizando la Pelicula"
						];
		}

		echo json_encode($arrayResp);
		return;	
	}


	//Realizar el Proceso De Borrar
	public function delete()
	{
			$this->model->deleteMovie($_REQUEST);
			header("Location: ?controller=movie");
	}
	public function updateStatus()
	{
		$movie = $this->model->getMovieById($_REQUEST['id_movie']);
		$data = [];
		
		if ($movie[0]->id_status == 1) {

		$data = [
				  'id_movie' => $movie[0]->id_movie,
				  'id_status' => 2
				];
			
		}elseif($movie[0]->id_status == 2) {

				$data = [
				  'id_movie' => $movie[0]->id_movie,
				  'id_status' => 1
				];
		}
		$this->model->editStatus($data);
		header("Location: ?controller=movie");

	}
}