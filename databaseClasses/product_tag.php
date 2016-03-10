<?php

class product_tagDataAccess extends accessDatabase{
    public function readData($selectParam){
        $columns = array($selectParam);
        $sql = "SELECT * FROM product_tag WHERE ?";
        doSql($sql, $columns);
    }

    public function createData($tag_id,$product_id){
        $columns = array($tag_id,$product_id);
        $sql = "INSERT INTO product_tag (tag_id,product_id) values(?, ?)";
        doSql($sql, $columns);
    }

/***/
    public function updateData($tag_id,$product_id){
        $columns = array($tag_id,$product_id);
        $sql = "UPDATE product_tag  set tag_id = ?, product_id = ? WHERE id = ?";  
        doSql($sql, $columns);
    }

    public function deleteData($id){
        $columns = array($id);
        $sql = "DELETE FROM product_tag  WHERE id = ?";
        doSql($sql, $columns);
    }
}