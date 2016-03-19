<?php

class product_tagDataAccess extends accessDatabase{
    public function readData(){
        $columns = array();
        $sql = "SELECT * FROM product_tag WHERE ?";
        return parent::doSql($sql, $columns);
    }
    public function readDataById($selectParam){
        $columns = array($selectParam);
        $sql = "SELECT * FROM product_tag WHERE id = ?";
        return parent::doSql($sql, $columns);
    }

    public function createData($tag_id,$product_id){
        $columns = array($tag_id,$product_id);
        $sql = "INSERT INTO product_tag (tag_id,product_id) values(?, ?)";
        parent::doSql($sql, $columns);
    }

/***/
    public function updateData($tag_id,$product_id){
        $columns = array($tag_id,$product_id);
        $sql = "UPDATE product_tag  set tag_id = ?, product_id = ? WHERE id = ?";  
        parent::changeSql($sql, $columns);
    }

    public function deleteData($id){
        $columns = array($id);
        $sql = "DELETE FROM product_tag  WHERE id = ?";
        parent::doSql($sql, $columns);
    }
}