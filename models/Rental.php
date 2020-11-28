<?php 


class Rental
{
	private $id_rentals;
	private $start_date_rentals;
	private $end_date_rentals;
	private $total_rentals;
	private $id_status;
	private $id_user;
	private $pdo;

	public  function __construct()
	{
		try {
		$this->pdo = new Database;
			
		} catch (PDOException $e) {
			die($e->getMessage());
		}
		
	}
	public function getAll()
	{
		try {
		$strSql = "SELECT r.*, s.status as status , u.name as user from rentals r Inner JOIN statuses s on s.id_status = r.id_status INNER JOIN users u on u.id_user = r.id_user Order by id_rentals ";
		$query  = $this->pdo->select($strSql);
		
		return $query;
			
		} catch (PDOException $e) {
			die($e->getMessage());
			
		}

	}
	public function getRentalById($id){

		try {
		$strSql = "SELECT * FROM rentals Where id_rentals = :id_rentals";
		$arrayData = ['id_rentals' => $id];
		$query = $this->pdo->select($strSql, $arrayData);
		return $query;
			
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}
	public function newRental($data)
	{
		try {

		
		$this->pdo->insert('rentals', $data);
			return true;
		} catch (PDOException $e) {
			return $e->getMessage();
		}
	}
	public function editRental($data)
	{
		try {
			$strWhere = 'id_rentals ='  .$data['id_rentals'];
			$this->pdo->update('rentals',$data,$strWhere);
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}
	public function deleteRental()
	{
		try {
			$strWhere = 'id_rentals =' .$data['id_rentals'];
			$this->pdo->delete('rentals',$strWhere);			
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}
	public function editStatus($data)
	{
		try {
			$strWhere ='id_rentals =' .$data['id_rentals'];
			$this->pdo->update('rentals',$data,$strWhere);
		} catch (PDOException $e) {
			die($e->getMessage());
		}

	}

	public function getLastId(){

		try {
		$strSql = "SELECT max(id_rentals) as id FROM rentals";
		
		$query = $this->pdo->select($strSql);
		return $query;
			
		} catch (PDOException $e) {
			return $e->getMessage();
		}
	}


	public function saveMovieRental($arrayMovies, $lastIdRental )
	{

		try {

		foreach ($arrayMovies as $movie ) {
			$data = [
							'id_rentals' => $lastIdRental,
							'id_movie'   => $movie['id'],
							'unit_price' => 1

					];

		$this->pdo->insert('movie_rental',$data);

		}
			return true;
		} catch (PDOException $e) {
			return $e->getMessage();
		}


	}

	public function getRentalMovies($id_rentals){

		try {
		$strSql = "SELECT mr.*, m.name_movie as name FROM movie_rental mr INNER JOIN movies m on m.id_movie = mr.id_movie WHERE mr.id_rentals = '{id_rentals}' ";
		
		$query = $this->pdo->select($strSql);
		return $query;
			
		} catch (PDOException $e) {
			return $e->getMessage();
		}

	}


	public function deleteMovieRental($id)
	{
		try {
			$strWhere = 'id_rentals =' .$id;
			$this->pdo->delete('movie_rental',$strWhere);			
		} catch (PDOException $e) {
			die($e->getMessage());
		}

	}

}