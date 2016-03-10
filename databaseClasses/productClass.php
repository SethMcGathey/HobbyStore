<?php

class product{

	public function insertData($inputValues){
	    $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO product (name,cost,description,subcategory_id) values(?, ?, ?, ?)";
        $q = $pdo->prepare($sql);
        $q->execute($inputValues);
        Database::disconnect();
	}

	public function updateData($inputValues){
		$pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE product  set name = ?, cost = ?, description = ?, subcategory_id =? WHERE id = ?";       
        $q = $pdo->prepare($sql);
        $q->execute($inputValues);
        Database::disconnect();
	}

	public function deleteData($id){
	    $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM product  WHERE id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        Database::disconnect();
    }
}