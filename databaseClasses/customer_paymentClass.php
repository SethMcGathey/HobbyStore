<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');
class customer_paymentDataAccess extends accessDatabase{
    public function readData($selectParam){
        $columns = array($selectParam);
        $sql = "SELECT * FROM customer_payment";
        return parent::doSql($sql, $columns);
    }

    public function readDataJoinedPayments($customer_id){
        $columns = array($customer_id);
        $sql = "SELECT payment_id card_full_name, card_number, card_security, expires_month, expires_year FROM customer_payment c JOIN payment a ON c.payment_id = a.id WHERE customer_id = ?";
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