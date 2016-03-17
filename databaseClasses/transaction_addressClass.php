<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');

class transaction_addressDataAccess extends accessDatabase{
    public function readData($selectParam){
        $columns = array($selectParam);
        $sql = "SELECT * FROM transaction_address WHERE ?";
        return parent::doSql($sql, $columns);
    }
    public function readDataById($selectParam){
        $columns = array($selectParam);
        $sql = "SELECT * FROM transaction_address WHERE id = ?";
        return parent::doSql($sql, $columns);
    }
    public function readDataForCart($id){
        $columns = array($id);
        $sql = 'SELECT p.id, name, cost, p.description, tp.transaction_id, SUM(quantity) as fullQuantity, image FROM transaction t JOIN transaction_product tp ON tp.transaction_id = t.id JOIN product p ON p.id = tp.product_id JOIN image i ON i.product_id = p.id WHERE cart = 1 AND customer_ID = ? GROUP BY id';
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