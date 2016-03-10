<?php

class shipment_centerDataAccess extends accessDatabase{
    public function readData($selectParam){
        $columns = array($selectParam);
        $sql = "SELECT * FROM shipment_center WHERE ?";
        doSql($sql, $columns);
    }

    public function createData($city,$country,$state,$street_one,$street_two,$zipcode, $name,$phone){
        $columns2 = array($city,$country,$state,$street_one,$street_two,$zipcode);
        $sql2 = "INSERT INTO address (city,country,state,street_one,street_two,zipcode) values(?, ?, ?, ?, ?, ?)";
        $address_id = doSql($sql2, $columns2);

        $columns = array($name,$phone,$address_id);
        $sql = "INSERT INTO shipment_center (name,phone,address_id) values(?, ?, ?)";
        doSql($sql, $columns);
    }

/***/
    public function updateData($name,$phone,$address_id){
        $columns = array($name,$phone,$address_id);
        $sql = "UPDATE shipment_center  set name = ?, phone = ?, address_id = ? WHERE id = ?";
        doSql($sql, $columns);
    }

    public function deleteData($id){
        $columns = array($id);
        $sql = "DELETE FROM shipment_center  WHERE id = ?";
        doSql($sql, $columns);
    }
}