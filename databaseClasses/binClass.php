<?php

class binDataAccess extends accessDatabase{
    public function readData($selectParam){
        $columns = array($selectParam);
        $sql = "SELECT * FROM bin";
        return parent::doSql($sql, $columns);
    }

    public function createData($name,$shipment_center_id){
        $columns = array($name,$shipment_center_id);
        $sql = "INSERT INTO bin (name,shipment_center_id) values(?, ?)";
        parent::doSql($sql, $columns);
    }

/***/
    public function updateData($name,$shipment_center_id){
        $columns = array($name,$shipment_center_id);
        $sql = "UPDATE bin  set name = ?, shipment_center_id = ? WHERE id = ?";
        parent::doSql($sql, $columns);
    }

    public function deleteData($id){
        $columns = array($d);
        $sql = "DELETE FROM bin  WHERE id = ?";
        parent::doSql($sql, $columns);
    }
}