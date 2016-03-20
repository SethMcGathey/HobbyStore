<?php
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
		$address_id = parent::doSql($sql, $columns);

		$columns2 = array($customer_id, $address_id);
		$sql2 = "INSERT INTO customer_address (customer_id, address_id) values(?, ?)";
		parent::doSql($sql2, $columns2);
	}


	public function updateData($city,$country,$state,$street_one,$street_two,$zipcode,$customer_id){
		$columns = array($city,$country,$state,$street_one,$street_two,$zipcode,$customer_id);
		$sql = "UPDATE address  set city = ?, country = ?, state = ?, street_one =?, street_two =?, zipcode =? WHERE id = ?";
		return parent::changeSql($sql, $columns);
	}


	public function deleteData($id){
		$columns = array($id);
		$sql = "DELETE FROM address WHERE id = ?";
		parent::changeSql($sql, $columns);
    }
}