<?php
	require_once 'sessionStart.php'; 
	require_once 'database.php';
    $pdo = Database::connect();

abstract class accessDatabase{
	abstract function insertData($tableColumnsArray);
	abstract function updateData($tableColumnsArray);

	public function selectData($tableName){
		$sql = 'SELECT * FROM $tableName'
	};

}



