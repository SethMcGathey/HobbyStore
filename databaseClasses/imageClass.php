<?php

class imageDataAccess extends accessDatabase{
    public function readData($selectParam){
        $columns = array($selectParam);
        $sql = "SELECT * FROM image WHERE ?";
        doSql($sql, $columns);
    }

    public function createData($description,$featured,$image,$product_id){
        $columns = array($description,$featured,$image,$product_id);
        $sql = "INSERT INTO image (description,featured,image,product_id) values(?, ?, ?, ?)";
        doSql($sql, $columns);
    }

/***/
    public function updateData($description,$featured,$image,$product_id){
        $columns = array($description,$featured,$image,$product_id);
        $sql = "UPDATE image  set description = ?, featured = ?, image = ?, product_id =? WHERE id = ?";
        doSql($sql, $columns);
    }

    public function deleteData($id){
        $columns = array($id);
        $sql = "DELETE FROM image  WHERE id = ?";
        doSql($sql, $columns);
    }
}