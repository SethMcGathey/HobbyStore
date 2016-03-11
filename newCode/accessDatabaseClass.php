<?php
	require_once 'sessionStart.php'; 
	require_once 'database.php';
    $pdo = Database::connect();

abstract class accessDatabase{
/*	abstract function insertData($tableColumnsArray);
	abstract function updateData($tableColumnsArray);

	public function selectData($tableName){
		$sql = 'SELECT * FROM $tableName';
	};
*/
	public function doSql($sqlVar, $inputValues ){
		try{
			$pdo = Database::connect();
	        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	        $q = $pdo->prepare($sqlVar);
	        $q->execute($inputValues);
	        $returnId = $pdo->lastInsertId();
	        $row = $q->fetchAll();
	        $returnArray = array($returnId, $row);
	        Database::disconnect();
	        return $returnArray;

	    }catch(PDOException $error){
            /*header("Location: 500.php");*/
            //header("Location: 500.php?msg=creating%20an%20address");
            //echo $error->getMessage();
            die();
        }
	}
}


