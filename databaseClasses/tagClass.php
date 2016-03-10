<?php

class tagDataAccess extends accessDatabase{
    public function readData($selectParam){
        $columns = array($selectParam);
        $sql = "SELECT * FROM tag WHERE ?";
        doSql($sql, $columns);
    }

    public function createData($name){
        $columns = array($name);
        $sql = "INSERT INTO tag (name) values(?)";
        doSql($sql, $columns);
    }

/***/
    public function updateData($name){
        $columns = array($name);
        $sql = "UPDATE tag  set name = ? WHERE id = ?"; 
        doSql($sql, $columns);
    }

    public function deleteData($id){
        $columns = array($id);
        $sql = "DELETE FROM tag  WHERE id = ?";
        doSql($sql, $columns);
    }
}