<?php

/**
 * Modelo Movie
 */


class Movie 
{

	private $id_movie;
	private $name_movie;
	private $description_movie;
	private $id_status;
	private $id_user;
	private $id_rol;
	private $pdo;

	public function __construct()
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
			
			$strSql = "SELECT m.*, s.status as status , u.name as users  FROM movies m INNER JOIN statuses s ON s.id_status = m.id_status INNER JOIN users u ON  u.id_user = m.id_user ORDER BY id_movie";
			
			$query = $this->pdo->select($strSql);
			
			
			return $query;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}
	public function getMovieById($id){

		try {
			$strSql = "SELECT * FROM movies WHERE id_movie = :id_movie";
			$arrayData = ['id_movie' => $id];
			$query = $this->pdo->select($strSql, $arrayData);
			return $query; 
			
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}
	public function newMovie($data)
	{
		try {
				
			$this->pdo->insert('movies', $data);
			return true;	
			} catch (PDOException $e) {
				return $e->getMessage();
			}
	}
	public function editMovie($data){
		try {
			
				$strWhere = 'id_movie = '. $data['id_movie'];
				$this->pdo->update('movies', $data, $strWhere);
			} catch (PDOException $e) {
				die($e->getMessage());	
			}
	}
	public function deleteMovie($data){
		try {

			$strWhere = 'id_movie ='. $data['id_movie'];
			$this->pdo->delete('movies', $strWhere);
			} catch (PDOException $e) {
				die($e->getMessage());	
			}
	}
	public function editStatus($data){
		try {
			
				$strWhere = 'id_movie = '. $data['id_movie'];
				$this->pdo->update('movies', $data, $strWhere);
			} catch (PDOException $e) {
				die($e->getMessage());	
			}
	}

	public function getLatsId(){

		try {
			$strSql = "SELECT max(id_movie) as id FROM movies";		
			$query = $this->pdo->select($strSql);
			return $query; 
			
		} catch (PDOException $e) {
			return $e->getMessage();
		}
	}

	public function saveCategoryMovie($arrayCategories, $lastIdMovie )
	{

		try {
				
			foreach ($arrayCategories as $category ) {
				$data = [
								'id_movie'      => $lastIdMovie,
								'id_categories' => $category['id'],
								'id_status'     => 1
						];

			$this->pdo->insert('category_movie', $data);

			}
			return true;	
			} catch (PDOException $e) {
				return $e->getMessage();
			}

	}

	public function getCategoriesMovie($id_movie)
	{
			try {
			$strSql = "SELECT cm.*, c.name_categories as name  FROM category_movie cm INNER JOIN categories c on c.id_categories = cm.id_categories WHERE cm.id_movie = '{$id_movie}' ";		
			$query = $this->pdo->select($strSql);
			return $query; 
			
		} catch (PDOException $e) {
			return $e->getMessage();
		}

	}

	public function deleteCategoryMovie($id)
	{

		try {

			$strWhere = 'id_movie ='. $id;
			$this->pdo->delete('category_movie', $strWhere);
			} catch (PDOException $e) {
				die($e->getMessage());	
			}
	}	
}