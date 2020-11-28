<?php  

/**
 * 
 */
class Status
{

	private $id_status;
	private $status;
	private $id_type_statuses;
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
			$strSql = "SELECT s.*, t.name_type_statuses as name_type_statuses from statuses s INNER join type_statuses t on t.id_type_statuses = s.id_type_statuses ORDER BY id_status";
			$query = $this->pdo->select($strSql);
			return $query;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	public function getstatusById($id){
		try {
			$strSql = "SELECT * FROM statuses WHERE id_status = :id_status";
			$arrayData = ['id_status' => $id];
			$query = $this->pdo->select($strSql, $arrayData);
			return $query;

		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	public function newStatus($data){
		try {
				
				$this->pdo->insert('statuses', $data);
				} catch (PDOException $e) {
				die($e->getMessage());
				}
	       }

	public function editStatus($data){
		try {
			$strWhere = 'id_status =' .$data['id_status'];
			$this->pdo->update('statuses', $data , $strWhere);

			
		} catch (PDOException $e) {
			die($e->getMessage());
		}

	}
	public function deleteStatus($data){
		try {

			$strWhere = 'id_status =' .$data['id_status'];
			$this->pdo->delete('statuses', $data , $strWhere);

			
		} catch (PDOException $e) {
			die($e->getMessage());
			
		}
	}
	
}