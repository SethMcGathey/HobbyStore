<?php

class paymentDataAccess extends accessDatabase{
    public function readData($selectParam){
        $columns = array($selectParam);
        $sql = "SELECT * FROM payment WHERE ?";
        doSql($sql, $columns);
    }

    public function createData($card_full_name,$card_number,$card_security,$expires_month,$expires_year,$payment_type_id){
        $columns = array($card_full_name,$card_number,$card_security,$expires_month,$expires_year,$payment_type_id);
        $sql = "INSERT INTO payment (card_full_name,card_number,card_security,expires_month,expires_year,payment_type_id) values(?, ?, ?, ?, ?, ?)";
        $payment_id = doSql($sql, $columns);

        $columns2 = array($payment_id, $customer_id);
        $sql2 = "INSERT INTO customer_payment (payment_id, customer_id) values(?, ?)";
        doSql($sql2, $columns2);
    }

/***/
    public function updateData($card_full_name,$card_number,$card_security,$expires_month,$expires_year,$payment_type_id){
        $columns = array($card_full_name,$card_number,$card_security,$expires_month,$expires_year,$payment_type_id);
        $sql = "UPDATE payment  set card_full_name = ?, card_number = ?, card_security = ?, expires_month =?, expires_year =?, payment_type_id =? WHERE id = ?";       
        doSql($sql, $columns);
    }

    public function deleteData($id){
        $columns = array($id);
        $sql = "DELETE FROM payment  WHERE id = ?";
        doSql($sql, $columns);
    }
}