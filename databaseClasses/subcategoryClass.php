<?php

class subcategoryDataAccess extends accessDatabase{
    public function readData(){
        $columns = array();
        $sql = "SELECT * FROM subcategory";
        return parent::doSql($sql, $columns);
    }

    public function readDataByCategoryID($selectParam){
        $columns = array($selectParam);
        $sql = "SELECT * FROM subcategory WHERE category_id = " . $selectedParam;
        return parent::doSql($sql, $columns);
    }

    public function createData($category_id, $name){
        $columns = array($category_id, $name);
        $sql = "INSERT INTO subcategory (category_id, name) values(?, ?)";
        parent::doSql($sql, $columns);
    }

/***/
    public function updateData($category_id, $name){
        $columns = array($category_id, $name);
        $sql = "UPDATE subcategory  set category_id = ?, name = ? WHERE id = ?";
        parent::doSql($sql, $columns);
    }

    public function deleteData($id){
        $columns = array($id);
        $sql = "DELETE FROM subcategory  WHERE id = ?";
        parent::doSql($sql, $columns);
    }
}