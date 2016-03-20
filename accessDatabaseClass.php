<?php
require_once 'sessionStart.php'; 
$pdo = Database::connect();

abstract class accessDatabase{

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
            header("Location: 500.php");
            die();
        }
	}

	public function changeSql($sqlVar, $inputValues ){
		try{
			$pdo = Database::connect();
	        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	        $q = $pdo->prepare($sqlVar);
	        $q->execute($inputValues);
	        Database::disconnect();

	    }catch(PDOException $error){
            header("Location: 500.php");
            die();
        }
	}
}