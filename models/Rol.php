<?php

/**
 * 
 */

class Rol
{
	private $id_rol;
	private $name_rol;
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
			$strSql = "SELECT r.*, s.status as status from  roles r INNER join statuses s on s.id_status = r.id_status Order by id_rol";
			
			$query = $this->pdo->select($strSql);
			return $query;
		} catch (PDOException $e) {
			die($e->getMessage());	
		}
	}
		public function getActiveRoles(){
		try {
			$strSql = "SELECT r.*, s.status as status from  roles r INNER join statuses s on s.id_status = r.id_status WHERE r.id_status = 1 Order by id_rol";
			
			$query = $this->pdo->select($strSql);
			return $query;
		} catch (PDOException $e) {
			die($e->getMessage());	
		}
	}

	public function getRolById($id){

		try {
			$strSql = "SELECT * FROM roles WHERE id_rol = :id_rol";
			$arrayData = ['id_rol' => $id];
			$query = $this->pdo->select($strSql, $arrayData);
			return $query; 
			
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}
	public function editStatus($data){
		try {
			
				$strWhere = 'id_rol = '. $data['id_rol'];
				$this->pdo->update('roles', $data, $strWhere);
			} catch (PDOException $e) {
				die($e->getMessage());	
			}
	}
	


}