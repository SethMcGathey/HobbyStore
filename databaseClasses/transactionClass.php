<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');
class transactionDataAccess extends accessDatabase{
    public function readData($selectParam){
        $columns = array($selectParam);
        $sql = "SELECT * FROM transaction WHERE ?";
        return parent::doSql($sql, $columns);
    }
    public function readDataById($selectParam){
        $columns = array($selectParam);
        $sql = "SELECT * FROM transaction WHERE id = ?";
        return parent::doSql($sql, $columns);
    }
    public function readCartData($customerid){
        $columns = array($customerid);
        $sql = "SELECT id, cart FROM transaction WHERE customer_id = ? AND cart = 1";
        return parent::doSql($sql, $columns);
    }

    public function createData($cart,$timestamp,$payment_id,$customer_id, /*$phone,$type,$address_id, */$quantity,$product_id){
        $columns = array($cart,$timestamp,$payment_id,$customer_id);
        $sql = "INSERT INTO transaction (cart,timestamp,payment_id,customer_id) values(?, ?, ?, ?)";
        $transaction_id = parent::doSql($sql, $columns);
/*
        $columns2 = array($phone,$type,$address_id,$transaction_id);
        $sql2 = "INSERT INTO transaction_address (phone,type,address_id,transaction_id) values(?, ?, ?, ?)";
        parent::doSql($sql2, $columns2);*/

        $columns3 = array($quantity,$transaction_id,$product_id);
        $sql3 = "INSERT INTO transaction_product (quantity,transaction_id,product_id) values(?, ?, ?)";
        parent::doSql($sql3, $columns3);
    }

/***/
    public function updateData($cart,$timestamp,$payment_id,$customer_id){
        $columns = array($cart,$timestamp,$payment_id,$customer_id);
        $sql = "UPDATE transaction  set cart = ?, timestamp = ?, payment_id = ?, customer_id =? WHERE id = ?";  
        parent::changeSql($sql, $columns);
    }

    public function deleteData($id){
        $columns = array($id);
        $sql = "DELETE FROM transaction  WHERE id = ?";
        parent::doSql($sql, $columns);
    }
}