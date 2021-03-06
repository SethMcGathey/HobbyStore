<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');
class transactionDataAccess extends accessDatabase{
    public function readData(){
        $columns = array();
        $sql = "SELECT * FROM transaction";
        return parent::doSql($sql, $columns);
    }
    public function readDataById($selectParam){
        $columns = array($selectParam);
        $sql = "SELECT * FROM transaction WHERE id = ?";
        return parent::doSql($sql, $columns);
    }
    public function readCartData($customerid){
        $columns = array($customerid);
        $sql = "SELECT id,cart,timestamp,payment_id,customer_id FROM transaction WHERE customer_id = ? AND cart = 1";
        return parent::doSql($sql, $columns);
    }
    public function readDataForCart($id){
        $columns = array($id);
        $sql = "SELECT p.id, name, cost, p.description, tp.transaction_id, SUM(quantity) as fullQuantity, image FROM transaction t JOIN transaction_product tp ON tp.transaction_id = t.id JOIN product p ON p.id = tp.product_id JOIN image i ON i.product_id = p.id WHERE cart = 1 AND customer_ID = ? GROUP BY id";
        return parent::doSql($sql, $columns);
    }

    public function createData($cart,$timestamp,$payment_id,$customer_id, /*$phone,$type,$address_id, */$quantity,$product_id){
        $columns = array($cart,$timestamp,$payment_id,$customer_id);
        $sql = "INSERT INTO transaction (cart,timestamp,payment_id,customer_id) values(?, ?, ?, ?)";
        $transaction_id = parent::insertWithIdReturn($sql, $columns);
/*
        $columns2 = array($phone,$type,$address_id,$transaction_id);
        $sql2 = "INSERT INTO transaction_address (phone,type,address_id,transaction_id) values(?, ?, ?, ?)";
        parent::doSql($sql2, $columns2);*/

        $columns3 = array($quantity,$transaction_id,$product_id);
        $sql3 = "INSERT INTO transaction_product (quantity,transaction_id,product_id) values(?, ?, ?)";
        parent::changeSql($sql3, $columns3);
    }

    public function updateData($cart,$timestamp,$payment_id,$customer_id,$id){
        $columns = array($cart,$timestamp,$payment_id,$customer_id,$id);
        $sql = "UPDATE transaction  set cart = ?, timestamp = ?, payment_id = ?, customer_id =? WHERE id = ?";  
        parent::changeSql($sql, $columns);
    }

    public function deleteData($id){
        $columns = array($id);
        $sql = "DELETE FROM transaction_product  WHERE transaction_id = ?";
        parent::changeSql($sql, $columns);

        $columns = array($id);
        $sql = "DELETE FROM transaction_address  WHERE transaction_id = ?";
        parent::changeSql($sql, $columns);

        $columns = array($id);
        $sql = "DELETE FROM transaction  WHERE id = ?";
        parent::changeSql($sql, $columns);
    }
}