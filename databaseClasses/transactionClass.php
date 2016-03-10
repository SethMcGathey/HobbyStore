<?php

class transactionDataAccess extends accessDatabase{
    public function readData($selectParam){
        $columns = array($selectParam);
        $sql = "SELECT * FROM transaction WHERE ?";
        doSql($sql, $columns);
    }

    public function createData($cart,$timestamp,$payment_id,$customer_id, $phone,$type,$address_id, $quantity,$product_id){
        $columns = array($cart,$timestamp,$payment_id,$customer_id);
        $sql = "INSERT INTO transaction (cart,timestamp,payment_id,customer_id) values(?, ?, ?, ?)";
        $transaction_id = doSql($sql, $columns);

        $columns2 = array($phone,$type,$address_id,$transaction_id);
        $sql2 = "INSERT INTO transaction_address (phone,type,address_id,transaction_id) values(?, ?, ?, ?)";
        doSql($sql2, $columns2);

        $columns3 = array($quantity,$transaction_id,$product_id);
        $sql3 = "INSERT INTO transaction_product (quantity,transaction_id,product_id) values(?, ?, ?)";
        doSql($sql3, $columns3);
    }

/***/
    public function updateData($cart,$timestamp,$payment_id,$customer_id){
        $columns = array($cart,$timestamp,$payment_id,$customer_id);
        $sql = "UPDATE transaction  set cart = ?, timestamp = ?, payment_id = ?, customer_id =? WHERE id = ?";  
        doSql($sql, $columns);
    }

    public function deleteData($id){
        $columns = array($id);
        $sql = "DELETE FROM transaction  WHERE id = ?";
        doSql($sql, $columns);
    }
}