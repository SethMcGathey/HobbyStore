<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');
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
            //header("Location: 500.php");
            //header("Location: ../../500.php?msg=creating%20an%20address");
            echo $error->getMessage();
            die();
        }
	}

	public function changeSql($sqlVar, $inputValues ){
		try{
			$pdo = Database::connect();
	        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	        $q = $pdo->prepare($sqlVar);
	        $q->execute($inputValues);
	        $returnId = $pdo->lastInsertId();
	        Database::disconnect();
	        return $returnId;

	    }catch(PDOException $error){
            //header("Location: 500.php");
            //header("Location: ../../500.php?msg=creating%20an%20address");
            echo $error->getMessage();
            die();
        }
	}
}