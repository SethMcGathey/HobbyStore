<?php

class product{
    public function readData($inputValues){
        try{
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM product WHERE ?";
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

	public function createData($name,$cost,$description,$subcategory_id){
        try{
    	    $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO product (name,cost,description,subcategory_id) values(?, ?, ?, ?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($name,$cost,$description,$subcategory_id));
            Database::disconnect();
        }catch(PDOException $error){
            header("Location: 500.php");
            //header("Location: 500.php?msg=creating%20an%20address");
            //echo $error->getMessage();
            die();
        }
	}

	public function updateData($name,$cost,$description,$subcategory_id){
        try{
    		$pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE product  set name = ?, cost = ?, description = ?, subcategory_id =? WHERE id = ?";       
            $q = $pdo->prepare($sql);
            $q->execute(array($name,$cost,$description,$subcategory_id));
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
            $sql = "DELETE FROM product  WHERE id = ?";
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