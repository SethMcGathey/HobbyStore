<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');
class subcategoryDataAccess extends accessDatabase{
    public function readData(){
        $columns = array();
        $sql = "SELECT * FROM subcategory";
        return parent::doSql($sql, $columns);
    }
    public function readDataById($selectParam){
        $columns = array($selectParam);
        $sql = "SELECT * FROM subcategory WHERE id = ?";
        return parent::doSql($sql, $columns);
    }

    public function readDataByCategoryID($selectParam){
        $columns = array($selectParam);
        $sql = "SELECT * FROM subcategory WHERE category_id = " . $selectParam;
        return parent::doSql($sql, $columns);
    }

    public function createData($category_id, $name){
        $columns = array($category_id, $name);
        $sql = "INSERT INTO subcategory (category_id, name) values(?, ?)";
        parent::doSql($sql, $columns);
    }

    public function updateData($category_id, $name){
        $columns = array($category_id, $name);
        $sql = "UPDATE subcategory  set category_id = ?, name = ? WHERE id = ?";
        parent::changeSql($sql, $columns);
    }

    public function deleteData($id){
            //deleting product related rows before we can delete a subcategory
            $columns = array($subcategory_id);
            $sql = "SELECT id FROM product WHERE subcategory_id = ?";
            $product_id = parent::doSql($sql, $columns);

                $columns = array($product_id);
                $sql = "DELETE FROM product_bin  WHERE product_id = ?";
                parent::changeSql($sql, $columns);
                
                $columns = array($product_id);
                $sql = "DELETE FROM transaction_product  WHERE product_id = ?";
                parent::changeSql($sql, $columns);

                $columns = array($product_id);
                $sql = "DELETE FROM product_tag  WHERE product_id = ?";
                parent::changeSql($sql, $columns);

                $columns = array($product_id);
                $sql = "DELETE FROM image  WHERE product_id = ?";
                parent::changeSql($sql, $columns);
            //deleting product related rows before we can delete a subcategory


        $columns = array($id);
        $sql = "DELETE FROM product  WHERE subcategory_id = ?";
        parent::changeSql($sql, $columns);

        $columns = array($id);
        $sql = "DELETE FROM subcategory  WHERE id = ?";
        parent::changeSql($sql, $columns);
    }
}