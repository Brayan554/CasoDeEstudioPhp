<?php


  class Categorie 
{
		private $id_categories;
		private $name_categories;
		private $id_status;
		private $pdo;
	
	 public function __construct()
	{
		try {

			$this->pdo = new Database;
			
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}
	public function getAll(){
		try {
			$strSql = "SELECT c.*, s.status as status from 
			categories c INNER JOIN statuses s ON s.id_status = c.id_status ORDER BY id_categories";
			$query = $this->pdo->select($strSql);
			return $query;
		
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}
	public function newCategorie($data){

		try {
			   $data['id_status'] = 1; 
			   $this->pdo->insert('categories', $data);	
			} catch (PDOException $e) {
			die($e->getMessage());
			}
	}
	public function getCategorieById($id){
		try {
			 
		$strSql = "SELECT * FROM categories WHERE id_categories = :id_categories";
			 $arrayData = ['id_categories' => $id];
			 $query = $this->pdo->select($strSql, $arrayData);
			 return $query;
			} catch (PDOException $e) {
			die($e->getMessage());
			}
	}
	public function editCategorie($data){

		try {
			  $strWhere ='id_categories = ' .$data['id_categories'];
				$this->pdo->update('categories', $data, $strWhere);
			} catch (PDOException $e) {
			die($e->getMessage());
			}
	}
	public function deleteCategorie($data){

		try {
			$strWhere = 'id_categories = ' .$data['id_categories'];
			$this->pdo->delete('categories', $strWhere);
			} catch (PDOException $e) {
			die($e->getMessage());
			}
	}

	public function editStatus($data){

		try {
			  $strWhere ='id_categories = ' .$data['id_categories'];
				$this->pdo->update('categories', $data, $strWhere);
			} catch (PDOException $e) {
			die($e->getMessage());
			}
	}
}