<?php

class customerDataAccess extends accessDatabase{
    public function readData($selectParam){
        $columns = array($selectParam);
        $sql = "SELECT * FROM customer WHERE ?";
        doSql($sql, $columns);
    }

    public function createData($first_name,$last_name,$email,$phone,$dob,$gender,$password,$permission,$username,$city,$country,$state,$street_one,$street_two,$zipcode){
        $columns = array($first_name,$last_name,$email,$phone,$dob,$gender,$password,$permission,$username);
        $sql = "INSERT INTO customer (first_name,last_name,email,phone,dob,gender,password,permission,username) values(?, ?, ?, ?, ?, ?, ?, ?, ?)";
        doSql($sql, $columns);

        $columns2 = array($city,$country,$state,$street_one,$street_two,$zipcode);
        $sql2 = "INSERT INTO address (city,country,state,street_one,street_two,zipcode) values(?, ?, ?, ?, ?, ?)";
        $address_id = doSql($sql, $columns2);

        $columns3 = array($customer_id, $address_id);
        $sql3 = "INSERT INTO customer_address (customer_id, address_id) values(?, ?)";
        doSql($sql3, $columns3);
    }

/***/
    public function updateData($first_name,$last_name,$email,$phone,$dob,$gender,$password,$permission,$username){
        $columns = array($first_name,$last_name,$email,$phone,$dob,$gender,$password,$permission,$username);
        $sql = "UPDATE customer  set first_name = ?, last_name = ?, email = ?, phone =?, dob =?, gender =?, password =?, permission =?, username =? WHERE id = ?";  
        doSql($sql, $columns);
    }

    public function deleteData($id){
        $columns = array($id);
        $sql = "DELETE FROM customer  WHERE id = ?";
        doSql($sql, $columns);
    }
}