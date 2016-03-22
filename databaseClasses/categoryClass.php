<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');
class categoryDataAccess extends accessDatabase{
    public function readData(){
        $columns = array();
        $sql = "SELECT * FROM category";
        return parent::doSql($sql, $columns);
    }
    public function readDataById($selectParam){
        $columns = array($selectParam);
        $sql = "SELECT * FROM category WHERE id = ?";
        return parent::doSql($sql, $columns);
    }

    public function createData($name){
        $columns = array($name);
        $sql = "INSERT INTO category (name) values(?)";
        parent::changeSql($sql, $columns);
    }

    public function updateData($name){
        $columns = array($name);
        $sql = "UPDATE category set name = ? WHERE id = ?";   
        parent::changeSql($sql, $columns);
    }

    public function deleteData($id){
        $columns = array($id);
        $sql = "DELETE FROM category  WHERE id = ?";
        parent::doSql($sql, $columns);
    }
}