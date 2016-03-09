<?php

class category{
    public function readData($inputValues){
        try{
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM category WHERE ?";
            $q = $pdo->prepare($sql);
            $q->execute($inputValues);
            Database::disconnect();
        }catch(PDOException $error){
            header("Location: 500.php");
            //header("Location: 500.php?msg=creating%20an%20address");
            //echo $error->getMessage();
            die();
        }
    }

	public function createData($name){
        try{
    	    $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO category (name) values(?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($name);
            Database::disconnect();
        }catch(PDOException $error){
            header("Location: 500.php");
            //header("Location: 500.php?msg=creating%20an%20address");
            //echo $error->getMessage();
            die();
        }
	}

	public function updateData($name){
        try{
    		$pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE category  set name = ? WHERE id = ?";        
            $q = $pdo->prepare($sql);
            $q->execute(array($name);
            Database::disconnect();
        }catch(PDOException $error){
            header("Location: 500.php");
            //header("Location: 500.php?msg=creating%20an%20address");
            //echo $error->getMessage();
            die();
        }
	}

	public function deleteData($id){
        try{
    	    $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "DELETE FROM category  WHERE id = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($id));
            Database::disconnect();
        }catch(PDOException $error){
            header("Location: 500.php");
            //header("Location: 500.php?msg=creating%20an%20address");
            //echo $error->getMessage();
            die();
        }
    }
}