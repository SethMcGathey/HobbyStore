<?php

class categoryDataAccess extends accessDatabase{
    public function readData($selectParam){
        $columns = array($selectParam);
        $sql = "SELECT * FROM category WHERE ?";
        doSql($sql, $columns);
    }

    public function createData($name){
        $columns = array($name);
        $sql = "INSERT INTO category (name) values(?)";
        doSql($sql, $columns);
    }

/***/
    public function updateData($name){
        $columns = array($name);
        $sql = "UPDATE category  set name = ? WHERE id = ?";   
        doSql($sql, $columns);
    }

    public function deleteData($id){
        $columns = array($id);
        $sql = "DELETE FROM category  WHERE id = ?";
        doSql($sql, $columns);
    }
}