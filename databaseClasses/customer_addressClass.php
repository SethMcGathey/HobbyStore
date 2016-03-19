<?php

class customer_addressDataAccess extends accessDatabase{
    public function readData(){
        $columns = array();
        $sql = "SELECT * FROM customer_address";
        return parent::doSql($sql, $columns);
    }
    public function readDataById($selectParam){
        $columns = array($selectParam);
        $sql = "SELECT * FROM customer_address WHERE id = ?";
        return parent::doSql($sql, $columns);
    }

    public function readDataJoinedAddress($customer_id){
        $columns = array($customer_id);
        $sql = "SELECT street_one, street_two, zipcode, city, state, country FROM customer_address c JOIN address a ON c.address_id = a.id WHERE customer_id = ?";
        return parent::doSql($sql, $columns);
    }

    public function createData($customer_id, $address_id){
        $columns = array($customer_id, $address_id);
        $sql = "INSERT INTO customer_address (customer_id, address_id) values(?, ?)";
        parent::doSql($sql, $columns);
    }

/***/
    public function updateData($customer_id, $address_id){
        $columns = array($customer_id, $address_id);
        $sql = "UPDATE customer_address  set customer_id = ?, address_id = ? WHERE id = ?";
        parent::changeSql($sql, $columns);
    }

    public function deleteData($id){
        $columns = array($id);
        $sql = "DELETE FROM customer_address  WHERE id = ?";
        parent::doSql($sql, $columns);
    }
}