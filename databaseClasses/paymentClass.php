<?php

class paymentDataAccess extends accessDatabase{
    public function readData(){
        $columns = array();
        $sql = "SELECT * FROM payment";
        return parent::doSql($sql, $columns);
    }
    public function readDataById($selectParam){
        $columns = array($selectParam);
        $sql = "SELECT * FROM payment WHERE id = ?";
        return parent::doSql($sql, $columns);
    }
    public function readDataByCustomerId($selectParam){
        $columns = array($selectParam);
        $sql = "SELECT a.id,card_full_name,card_number,card_security,expires_month,expires_year,payment_type,payment_id,customer_id FROM customer_payment c JOIN payment a ON c.payment_id = a.id WHERE customer_id = ?";
        return parent::doSql($sql, $columns);
    }

    public function createData($card_full_name,$card_number,$card_security,$expires_month,$expires_year,$payment_type){
        $columns = array($card_full_name,$card_number,$card_security,$expires_month,$expires_year,$payment_type);
        $sql = "INSERT INTO payment (card_full_name,card_number,card_security,expires_month,expires_year,payment_type) values(?, ?, ?, ?, ?, ?)";
        $payment_id = parent::doSql($sql, $columns);

        $columns2 = array($payment_id, $customer_id);
        $sql2 = "INSERT INTO customer_payment (payment_id, customer_id) values(?, ?)";
        parent::doSql($sql2, $columns2);
    }

/***/
    public function updateData($card_full_name,$card_number,$card_security,$expires_month,$expires_year,$payment_type_id, $id){
        $columns = array($card_full_name,$card_number,$card_security,$expires_month,$expires_year,$payment_type_id, $id);
        $sql = "UPDATE payment  set card_full_name = ?, card_number = ?, card_security = ?, expires_month =?, expires_year =?, payment_type_id =? WHERE id = ?";       
        parent::changeSql($sql, $columns);
    }

    public function deleteData($id){
        $columns = array($id);
        $sql = "DELETE FROM payment  WHERE id = ?";
        parent::doSql($sql, $columns);
    }
}