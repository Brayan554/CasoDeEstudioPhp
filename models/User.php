	<?php

/**
 * Modelo de la tabla Users 
 */
class User  
{
	private $id_user;
	private $name;
	private $email;
	private $password;
	private $id_status;
	private $id_rol;
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
				$strSql =" SELECT u.*, s.status as status, r.name_rol as rol FROM users u INNER JOIN statuses s ON s.id_status = u.id_status  INNER JOIN roles r ON u.id_rol =  r.id_rol ORDER BY id_user" ;
				$query = $this->pdo->select($strSql);
				return $query;
			} 
				catch (PDOException $e) {
				die($e->getMessage());
			}
	}		
		public function getUserById($id){
			try {
					$strSql = "SELECT * FROM users WHERE id_user = :id";
					$arrayData = ['id' => $id];
					$query = $this->pdo->select($strSql, $arrayData);
					return $query;
				} catch (PDOException $e) {
						die($e->getMessage());
				}
		}
		public function newUser($data){
			try {
					$data['id_status'] = 1;
					$data['password']= hash('sha256',$data['password']);
					$this->pdo->insert('users' , $data); 
				} catch (PDOException $e) {
						die($e->getMessage());
				}
		}
		public function editUser($data){
			try {				
					$strWhere = 'id_user = '. $data['id_user'];
					$this->pdo->update('users', $data, $strWhere);
					
				} catch (PDOException $e) {
					die($e->getMessage());
				}
		}
		public function deleteUser($data){
			try {
					$strWhere = 'id_user =' .$data['id_user'];
					$this->pdo->delete('users', $strWhere);
				} catch (PDOException $e) {
					die($e->getMessage());
				}
		}
		public function editStatus($data){
			try {				
					$strWhere = 'id_user = '. $data['id_user'];
					$this->pdo->update('users', $data, $strWhere);
					
				} catch (PDOException $e) {
					die($e->getMessage());
				}
		}

}