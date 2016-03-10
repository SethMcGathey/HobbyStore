<?php

class subcategoryDataAccess extends accessDatabase{
    public function readData($selectParam){
        $columns = array($selectParam);
        $sql = "SELECT * FROM subcategory WHERE ?";
        doSql($sql, $columns);
    }

    public function createData($category_id, $name){
        $columns = array($category_id, $name);
        $sql = "INSERT INTO subcategory (category_id, name) values(?, ?)";
        doSql($sql, $columns);
    }

/***/
    public function updateData($category_id, $name){
        $columns = array($category_id, $name);
        $sql = "UPDATE subcategory  set category_id = ?, name = ? WHERE id = ?";
        doSql($sql, $columns);
    }

    public function deleteData($id){
        $columns = array($id);
        $sql = "DELETE FROM subcategory  WHERE id = ?";
        doSql($sql, $columns);
    }
}