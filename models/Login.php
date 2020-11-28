<?php



  class Login 
{
		
		private $pdo;
	
	 public function __construct()
	{
		try {

			$this->pdo = new Database;
			
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	public function validateUser($data)
	{
		try {
			$data['password'] = hash('sha256', $data['password']);
			$strSql = "SELECT u.*, s.status as status, r.name_rol as role FROM users u  INNER JOIN statuses s on s.id_status = u.id_status INNER JOIN roles r on r.id_rol = u.id_rol WHERE u.email = '{$data['email']}' AND u.password = '{$data['password']}' AND u.id_status = 1 ";

			$query = $this->pdo->select($strSql);

			if (isset($query[0]->id_user)) {
				if ($query[0]->id_status == 1) {

				$_SESSION['user'] = $query[0];
				return true;
				}else{
				return 'Error al iniciar Sesion. Sus Usuario Se Encuntra Desactivado';
				}

			}else{
				return 'Error al iniciar Sesion. Verifique sus Credenciales ';
			}


		} catch (PDOException $e) {
			return $e->getMessage();
		}

	}


}