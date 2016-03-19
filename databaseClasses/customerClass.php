<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');

class customerDataAccess extends accessDatabase{
    public function readData(){
        $columns = array();
        $sql = "SELECT * FROM customer";
        return parent::doSql($sql, $columns);
    }
    public function readDataById($selectParam){
        $columns = array($selectParam);
        $sql = "SELECT * FROM customer WHERE id = ?";
        return parent::doSql($sql, $columns);
    }

    public function readDataByUsernameAndPassword($username, $password){
        $columns = array($username, $password);
        $sql = "SELECT id, username, first_name, password, permission FROM customer WHERE username = ? AND password = ?";
        return parent::doSql($sql, $columns);
    }

    public function readDataByUserID($userID){
        $columns = array($userID);
        $sql = "SELECT id, first_name, last_name, phone, dob, username, password, gender, email, permission FROM customer WHERE id = ?";
        return parent::doSql($sql, $columns);
    }

    public function createData($first_name,$last_name,$email,$phone,$dob,$gender,$password,$permission,$username){
        $columns = array($first_name,$last_name,$email,$phone,$dob,$gender,$password,$permission,$username);
        $sql = "INSERT INTO customer (first_name,last_name,email,phone,dob,gender,password,permission,username) values(?, ?, ?, ?, ?, ?, ?, ?, ?)";
        parent::changeSql($sql, $columns);
/*
        $columns2 = array($city,$country,$state,$street_one,$street_two,$zipcode);
        $sql2 = "INSERT INTO address (city,country,state,street_one,street_two,zipcode) values(?, ?, ?, ?, ?, ?)";
        $address_id = parent::doSql($sql, $columns2);

        $columns3 = array($customer_id, $address_id);
        $sql3 = "INSERT INTO customer_address (customer_id, address_id) values(?, ?)";
        parent::doSql($sql3, $columns3);*/
    }

/***/
    public function updateData($first_name,$last_name,$email,$phone,$dob,$gender,$password,$permission,$username){
        $columns = array($first_name,$last_name,$email,$phone,$dob,$gender,$password,$permission,$username);
        $sql = "UPDATE customer  set first_name = ?, last_name = ?, email = ?, phone =?, dob =?, gender =?, password =?, permission =?, username =? WHERE id = ?";  
        parent::changeSql($sql, $columns);
    }

    public function deleteData($id){
        $columns = array($id);
        $sql = "DELETE FROM customer  WHERE id = ?";
        parent::doSql($sql, $columns);
    }
}