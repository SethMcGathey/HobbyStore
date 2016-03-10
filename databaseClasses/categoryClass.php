<?php

class categoryDataAccess extends accessDatabase{
    public function readData($selectParam){
        $columns = array($selectParam);
        $sql = "SELECT * FROM category";
        parent::doSql($sql, $columns);
    }

    public function createData($name){
        $columns = array($name);
        $sql = "INSERT INTO category (name) values(?)";
        parent::doSql($sql, $columns);
    }

/***/
    public function updateData($name){
        $columns = array($name);
        $sql = "UPDATE category set name = ? WHERE id = ?";   
        parent::doSql($sql, $columns);
    }

    public function deleteData($id){
        $columns = array($id);
        $sql = "DELETE FROM category  WHERE id = ?";
        parent::doSql($sql, $columns);
    }
}