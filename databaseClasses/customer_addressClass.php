<?php

class customer_addressDataAccess extends accessDatabase{
    public function readData($selectParam){
        $columns = array($selectParam);
        $sql = "SELECT * FROM customer_address WHERE ?";
        doSql($sql, $columns);
    }

    public function createData($customer_id, $address_id){
        $columns = array($customer_id, $address_id);
        $sql = "INSERT INTO customer_address (customer_id, address_id) values(?, ?)";
        doSql($sql, $columns);
    }

/***/
    public function updateData($customer_id, $address_id){
        $columns = array($customer_id, $address_id);
        $sql = "UPDATE customer_address  set customer_id = ?, address_id = ? WHERE id = ?";
        doSql($sql, $columns);
    }

    public function deleteData($id){
        $columns = array($id);
        $sql = "DELETE FROM customer_address  WHERE id = ?";
        doSql($sql, $columns);
    }
}