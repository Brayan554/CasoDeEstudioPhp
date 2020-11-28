<?php

/**
 * 
 */
require 'models/Rental.php';
require 'models/Status.php';
require 'models/User.php';
require 'models/Movie.php';
require 'models/login.php';

class RentalController
{
	private  $model;
	private  $status;
	private  $user;
	private  $movie;
	private  $login;
	
	public function __construct()
	{
			
		$this->model = new Rental;
		$this->status = new Status;
		$this->user = new User;
		$this->movie = new Movie;
		$this->login = new Login;

	}

	public function index()
	{

		if (isset($_SESSION['user'])) {
			
		require 'views/layout.php';
		$rentals = $this->model->getAll();
		$movies  = $this->movie->getAll();
		require 'views/rentals/list.php';
						
		}else{

			require 'views/login.php';
		}

	}

	public function new()
	{

		if (isset($_SESSION['user'])) {
			
		require 'views/layout.php';
		$users = $this->user->getAll();
		$movies = $this->movie->getAll();
		require 'views/rentals/new.php';
			
		}else{

			require 'views/login.php';
		}

	}
	public function save()
	{
		//organizar array para la tabla rentals

		$dataRental =[

					'start_date_rentals'    => $_POST['start_date_rentals'],
					'end_date_rentals'   	=> $_POST['end_date_rentals'],
					'total_rentals'  		=> $_POST['total_rentals'],
					'id_user'          		=> $_POST['id_user'],
					'id_status'        		=> 1
		];

		//variable con array de Peliculas que llegan desde el front

		$arrayMovies = isset($_POST['movies']) ? $_POST['movies'] : [];

		if (!empty($arrayMovies)) {
			# code...
		$respRental =$this->model->newRental($dataRental);

		//Obtener el ultimo Id Registrado de la tabla rental
		$lastIdRental = $this->model->getLastId();

		//inserccion a la tabla movie-rental

		$respMovieRental = $this->model->saveMovieRental($arrayMovies, $lastIdRental[0]->id );

		}else{

			$respRental = false;
			$respMovieRental = false;
		}
		//insercion Alquiler

		//validar si las inserciones se realizaron correctamente	

		$arrayResp = [];

		if ($respRental == true && $respMovieRental == true) {
			
			$arrayResp = [

							'success' => true,
							'message' => "Alquiler Creado"
						];	
		}else{

			$arrayResp = [

							'error' => true,
							'message' => "Error Creando Alquiler"
						];
		}

		echo json_encode($arrayResp);
		return;

	}

	
	public function edit()
	{

		if (isset($_SESSION['user'])) {
			
		if (isset($_REQUEST['id_rentals'])) {

			$id = $_REQUEST['id_rentals'];
			$data = $this->model->getRentalById($id);
			$statuses = $this->status->getAll();
			$users = $this->user->getAll();
			$movies = $this->movie->getAll();
			$moviesRental = $this->model->getRentalMovies($id);
			
			
			require 'views/layout.php';
			require 'views/rentals/edit.php';
		}else{
			
					echo "Error";
			}
			
			
		}else{

			require 'views/login.php';
		}

	}
	public function update()
	{

		$arrayResp = [];

		if (isset($_POST)) {

				//organizar array para la tabla rentals

				$dataRental =[

				'id_rentals'            => $_POST['id'],
				'start_date_rentals'    => $_POST['start_date_rentals'],
				'end_date_rentals'   	=> $_POST['end_date_rentals'],
				'total_rentals'  		=> $_POST['total_rentals'],
				'id_user'          		=> $_POST['id_user'],
				'id_status'        		=> $_POST['id_status']
				];

				//variable con array de Peliculas que llegan desde el front

				$arrayMovies = isset($_POST['movies']) ? $_POST['movies'] : [];

				if (!empty($arrayMovies)) {
					# code...
				$respRental =$this->model->editRental($dataRental);


				//crear metodo para eliminar las peliculas de movie_rental

				$this->model->deleteMovieRental($_POST['id']);
				

				//inserccion a la tabla movie-rental

				$respMovieRental = $this->model->saveMovieRental($arrayMovies, $_POST['id'] );

				}else{

					$respRental = false;
					$respMovieRental = false;
				}
		}else {

			$arrayResp = [
							'error' => true,
							'message' => "Error Actulizando El Alquiler"
						];
		}

		echo json_encode($arrayResp);
		return;
	}



	public function delete()
	{
		$this->model->deleteRental($_REQUEST);
		header("Location: ?controller=rental");
	}
	public function updateStatus()
	{
		$rental = $this->model->getRentalById($_REQUEST['id_rentals']);
		$data = [];

		if ($rental[0]->id_status == 1) {
			
			$data = [
								'id_rentals' => $rental[0]->id_rentals,
								'id_status' => 2

							];

		}elseif ($rental[0]->id_status ==2) {
			
			$data = [
								'id_rentals' => $rental[0]->id_rentals,
								'id_status' => 1
							];

		}
			$this->model->editStatus($data);
			header("Location: ?controller=rental");
	}


}