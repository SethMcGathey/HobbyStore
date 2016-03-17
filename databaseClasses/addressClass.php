<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 'on');
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

	public function createData($city,$country,$state,$street_one,$street_two,$zipcode,$customer_id){
		$columns = array($city,$country,$state,$street_one,$street_two,$zipcode);
		$sql = "INSERT INTO address (city,country,state,street_one,street_two,zipcode) values(?, ?, ?, ?, ?, ?)";
		$address_id = parent::doSql($sql, $columns);

		$columns2 = array($customer_id, $address_id);
		$sql2 = "INSERT INTO customer_address (customer_id, address_id) values(?, ?)";
		parent::doSql($sql2, $columns2);
	}

	public function changeData($city,$country,$state,$street_one,$street_two,$zipcode,$customer_id){
		$columns = array($city,$country,$state,$street_one,$street_two,$zipcode,$customer_id);
		$sql = "UPDATE address  set city = ?, country = ?, state = ?, street_one =?, street_two =?, zipcode =? WHERE id = ?";
		return parent::doSql($sql, $columns);
	}

	public function changeData($id){
		$columns = array($id);
		$sql = "DELETE FROM address  WHERE id = ?";
		parent::doSql($sql, $columns);
    }
}