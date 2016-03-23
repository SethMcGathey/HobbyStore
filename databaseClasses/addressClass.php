<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');
class addressDataAccess extends accessDatabase{

	public function readData(){
		$columns = array();
		$sql = "SELECT * FROM address";
		return parent::doSql($sql, $columns);
	}


	public function readDataById($selectParam){
		$columns = array($selectParam);
		$sql = "SELECT * FROM address WHERE id = ?";
		return parent::doSql($sql, $columns);
	}
	

	public function readDataByCustomerId($selectParam){
		$columns = array($selectParam);
		$sql = "SELECT a.id, street_one, street_two, zipcode, city, state, country FROM customer_address c JOIN address a ON c.address_id = a.id WHERE customer_id = ?";
		return parent::doSql($sql, $columns);
	}


	public function createData($city,$country,$state,$street_one,$street_two,$zipcode,$customer_id){
		$columns = array($city,$country,$state,$street_one,$street_two,$zipcode);
		$sql = "INSERT INTO address (city,country,state,street_one,street_two,zipcode) values(?, ?, ?, ?, ?, ?)";
		$address_id = parent::changeSql($sql, $columns);

		$columns2 = array($customer_id, $address_id);
		$sql2 = "INSERT INTO customer_address (customer_id, address_id) values(?, ?)";
		parent::changeSql($sql2, $columns2);
	}


	public function updateData($city,$country,$state,$street_one,$street_two,$zipcode,$customer_id){
		$columns = array($city,$country,$state,$street_one,$street_two,$zipcode,$customer_id);
		$sql = "UPDATE address  set city = ?, country = ?, state = ?, street_one =?, street_two =?, zipcode =? WHERE id = ?";
		return parent::changeSql($sql, $columns);
	}


	public function deleteData($id){
        $columns = array($id);
        $sql = "DELETE FROM transaction_address  WHERE address_id = ?";
        parent::changeSql($sql, $columns);

            $columns = array($id);
			$sql = "SELECT id FROM shipment_center WHERE address_id = ?";
			$shipment_center_id = parent::doSql($sql, $columns);
        	
	        	$columns = array($shipment_center_id);
				$sql = "SELECT id FROM bin WHERE shipment_center_id = ?";
				$bin_id = parent::doSql($sql, $columns);

	            $columns = array($bin_id);
	        	$sql = "DELETE FROM product_bin  WHERE bin_id = ?";
	        	parent::changeSql($sql, $columns);

            $columns = array($shipment_center_id);
        	$sql = "DELETE FROM bin  WHERE shipment_center_id = ?";
        	parent::changeSql($sql, $columns);

        $columns = array($id);
        $sql = "DELETE FROM shipment_center  WHERE address_id = ?";
        parent::changeSql($sql, $columns);

        $columns = array($id);
        $sql = "DELETE FROM customer_address  WHERE address_id = ?";
        parent::changeSql($sql, $columns);

		$columns = array($id);
		$sql = "DELETE FROM address WHERE id = ?";
		parent::changeSql($sql, $columns);
    }
}