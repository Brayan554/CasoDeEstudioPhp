<?php  


class Type_statuses
{
	private  $id_type_statuses;
	private  $name_type_statuses;
	private  $pdo;

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
			
		$strSql="SELECT * FROM type_statuses";
		$query = $this->pdo->select($strSql);
		return $query;
			
		} catch (PDOException $e) {
			die($e->detMessage());
		}

	}
	public function getTypeById($id)
	{
		try {
			$strSql="SELECT * FROM type_statuses where id_type_statuses = :id_type_statuses";
			$arrayData = ['id_type_statuses' => $id];
			$query = $this->pdo->select($strSql, $arrayData);
			return $query;	
		} catch (PDOException $e) {
			die($e->getMessage());
		}

	}
	public function newType($data)
	{
		try {

			$data[0]->id_type_statuses;
			$this->pdo->insert('type_statuses', $data);	
			} catch (PDOException $e) {
				die($e->getMessage());
			}
	}
	public function editType($data){
		try {
			
				$strWhere = 'id_type_statuses = '. $data['id_type_statuses'];
				$this->pdo->update('type_statuses', $data, $strWhere);
			} catch (PDOException $e) {
				die($e->getMessage());	
			}
	}
	public function deleteType($data){
		try {

			$strWhere = 'id_type_statuses ='. $data['id_type_statuses'];
			$this->pdo->delete('type_statuses', $strWhere);
			} catch (PDOException $e) {
				die($e->getMessage());	
			}
	}

}