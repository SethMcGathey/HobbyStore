<?php
	require_once 'sessionStart.php'; 
	require_once 'database.php';
    $pdo = Database::connect();

abstract class accessDatabase{
	abstract function insertData($tableColumnsArray);
	abstract function updateData($tableColumnsArray);

	public function selectData($tableName){
		$sql = 'SELECT * FROM $tableName';
	};


	public function doSql($inputValues, $sqlVar){
		try{
			$pdo = Database::connect();
	        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	        $q = $pdo->prepare($sqlVar);
	        $q->execute($inputValues);
	        $returnId = $pdo->lastInsertId();
	        Database::disconnect();
	        return $returnId;

	    }catch(PDOException $error){
            header("Location: 500.php");
            //header("Location: 500.php?msg=creating%20an%20address");
            //echo $error->getMessage();
            die();
        }
	}


}



