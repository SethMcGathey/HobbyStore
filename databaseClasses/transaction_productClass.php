<?php

class transaction_productDataAccess extends accessDatabase{
    public function readData($selectParam){
        $columns = array($selectParam);
        $sql = "SELECT * FROM transaction_product WHERE ?";
        return parent::doSql($sql, $columns);
    }
    public function readDataById($selectParam){
        $columns = array($selectParam);
        $sql = "SELECT * FROM transaction_product WHERE id = ?";
        return parent::doSql($sql, $columns);
    }

    public function createData($quantity,$transaction_id,$product_id){
        $columns = array($quantity,$transaction_id,$product_id);
        $sql = "INSERT INTO transaction_product (quantity,transaction_id,product_id) values(?, ?, ?)";
        parent::doSql($sql, $columns);
    }

/***/
    public function updateData($quantity,$transaction_id,$product_id){
        $columns = array($quantity,$transaction_id,$product_id);
        $sql = "UPDATE transaction_product  set quantity = ?, transaction_id = ?, product_id = ? WHERE id = ?";      
        parent::doSql($sql, $columns);
    }

    public function deleteData($id){
        $columns = array($id);
        $sql = "DELETE FROM transaction_product  WHERE id = ?";
        parent::doSql($sql, $columns);
    }
}