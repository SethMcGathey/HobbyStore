<?php

class product_tag{

	public function insertData($inputValues){
	    $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO product_tag (tag_id,product_id) values(?, ?)";
        $q = $pdo->prepare($sql);
        $q->execute($inputValues);
        Database::disconnect();
	}

	public function updateData($inputValues){
		$pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE product_tag  set tag_id = ?, product_id = ? WHERE id = ?";      
        $q = $pdo->prepare($sql);
        $q->execute($inputValues);
        Database::disconnect();
	}

	public function deleteData($id){
	    $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM product_tag  WHERE id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        Database::disconnect();
    }
}