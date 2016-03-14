<?php

class transaction_addressDataAccess extends accessDatabase{
    public function readData($selectParam){
        $columns = array($selectParam);
        $sql = "SELECT * FROM transaction_address WHERE ?";
        return parent::doSql($sql, $columns);
    }

    public function createData($phone,$type,$address_id,$transaction_id){
        $columns = array($phone,$type,$address_id,$transaction_id);
        $sql = "INSERT INTO transaction_address (phone,type,address_id,transaction_id) values(?, ?, ?, ?)";
        parent::doSql($sql, $columns);
    }

/***/
    public function updateData($phone,$type,$address_id,$transaction_id){
        $columns = array($phone,$type,$address_id,$transaction_id);
        $sql = "UPDATE transaction_address  set phone = ?, type = ?, address_id = ?, transaction_id =? WHERE id = ?";        
        parent::doSql($sql, $columns);
    }

    public function deleteData($id){
        $columns = array($id);
        $sql = "DELETE FROM transaction_address  WHERE id = ?";
        parent::doSql($sql, $columns);
    }
}