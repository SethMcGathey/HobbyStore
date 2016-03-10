<?php

class customer_paymentDataAccess extends accessDatabase{
    public function readData($selectParam){
        $columns = array($selectParam);
        $sql = "SELECT * FROM customer_payment WHERE ?";
        return parent::doSql($sql, $columns);
    }

    public function createData($payment_id, $customer_id){
        $columns = array($payment_id, $customer_id);
        $sql = "INSERT INTO customer_payment (payment_id, customer_id) values(?, ?)";
        parent::doSql($sql, $columns);
    }

/***/
    public function updateData($payment_id, $customer_id){
        $columns = array($payment_id, $customer_id);
        $sql = "UPDATE customer_payment set payment_id = ?, customer_id = ? WHERE id = ?";
        parent::doSql($sql, $columns);
    }

    public function deleteData($id){
        $columns = array($id);
        $sql = "DELETE FROM customer_payment WHERE id = ?";
        parent::doSql($sql, $columns);
    }
}