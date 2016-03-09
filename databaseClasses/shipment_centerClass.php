<?php

class shipment_center{

	public function insertData($inputValues){
	    $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO shipment_center (name,phone,address_id) values(?, ?, ?)";
        $q = $pdo->prepare($sql);
        $q->execute($inputValues);
        Database::disconnect();
	}

	public function updateData($inputValues){
		$pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE shipment_center  set name = ?, phone = ?, address_id = ? WHERE id = ?";       
        $q = $pdo->prepare($sql);
        $q->execute($inputValues);
        Database::disconnect();
	}

	public function deleteData($id){
	    $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM shipment_center  WHERE id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        Database::disconnect();
    }
}