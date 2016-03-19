<?php

class product_binDataAccess extends accessDatabase{
    public function readData(){
        $columns = array();
        $sql = "SELECT * FROM product_bin";
        return parent::doSql($sql, $columns);
    }
    public function readDataById($selectParam){
        $columns = array($selectParam);
        $sql = "SELECT * FROM product_bin WHERE id = ?";
        return parent::doSql($sql, $columns);
    }

    public function createData($stock,$bin_id,$product_id){
        $columns = array($stock,$bin_id,$product_id);
        $sql = "INSERT INTO product_bin (stock,bin_id,product_id) values(?, ?, ?)";
        parent::doSql($sql, $columns);
    }

/***/
    public function updateData($stock,$bin_id,$product_id){
        $columns = array($stock,$bin_id,$product_id);
        $sql = "UPDATE product_bin  set stock = ?, bin_id = ?, product_id = ? WHERE id = ?";  
        parent::changeSql($sql, $columns);
    }

    public function deleteData($id){
        $columns = array($id);
        $sql = "DELETE FROM product_bin  WHERE id = ?";
        parent::doSql($sql, $columns);
    }
}