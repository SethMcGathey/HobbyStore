<?php

class product_bin{

	public function insertData($inputValues){
	    $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO product_bin (stock,bin_id,product_id) values(?, ?, ?)";
        $q = $pdo->prepare($sql);
        $q->execute($inputValues);
        Database::disconnect();
	}

	public function updateData($inputValues){
		$pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE product_bin  set stock = ?, bin_id = ?, product_id = ? WHERE id = ?";       
        $q = $pdo->prepare($sql);
        $q->execute($inputValues);
        Database::disconnect();
	}

	public function deleteData($id){
	    $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM product_bin  WHERE id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        Database::disconnect();
    }
}