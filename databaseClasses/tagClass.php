<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');
class tagDataAccess extends accessDatabase{
    public function readData(){
        $columns = array();
        $sql = "SELECT * FROM tag";
        return parent::doSql($sql, $columns);
    }
    public function readDataById($selectParam){
        $columns = array($selectParam);
        $sql = "SELECT * FROM tag WHERE id = ?";
        return parent::doSql($sql, $columns);
    }

    public function createData($name){
        $columns = array($name);
        $sql = "INSERT INTO tag (name) values(?)";
        parent::doSql($sql, $columns);
    }

    public function updateData($name){
        $columns = array($name);
        $sql = "UPDATE tag  set name = ? WHERE id = ?"; 
        parent::changeSql($sql, $columns);
    }

    public function deleteData($id){
        $columns = array($id);
        $sql = "DELETE FROM product_tag  WHERE tag_id = ?";
        parent::doSql($sql, $columns);

        $columns = array($id);
        $sql = "DELETE FROM tag  WHERE id = ?";
        parent::doSql($sql, $columns);
    }
}