<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');

class categoryDataAccess extends accessDatabase{
    public function readData(){
        $columns = array();
        $sql = "SELECT * FROM category";
        return parent::doSql($sql, $columns);
    }
    public function readDataById($selectParam){
        $columns = array($selectParam);
        $sql = "SELECT * FROM category WHERE id = ?";
        return parent::doSql($sql, $columns);
    }

    public function createData($name){
        $columns = array($name);
        $sql = "INSERT INTO category (name) values(?)";
        parent::changeSql($sql, $columns);
    }

    public function updateData($name){
        $columns = array($name);
        $sql = "UPDATE category set name = ? WHERE id = ?";   
        parent::changeSql($sql, $columns);
    }

    public function deleteData($id){

            //deleting product related rows before we can delete a subcategory
            $columns = array($id);
            $sql = "SELECT id FROM subcategory WHERE category_id = ?";
            $subcategory_id = parent::doSql($sql, $columns);

            $columns = array($subcategory_id);
            $sql = "SELECT * FROM product WHERE subcategory_id = ?";
            $product_id parent::doSql($sql, $columns);

                $columns = array($product_id);
                $sql = "DELETE FROM product_bin  WHERE product_id = ?";
                parent::doSql($sql, $columns);
                
                $columns = array($product_id);
                $sql = "DELETE FROM transaction_product  WHERE product_id = ?";
                parent::doSql($sql, $columns);

                $columns = array($product_id);
                $sql = "DELETE FROM product_tag  WHERE product_id = ?";
                parent::doSql($sql, $columns);

                $columns = array($product_id);
                $sql = "DELETE FROM image  WHERE product_id = ?";
                parent::doSql($sql, $columns);

                $columns = array($product_id);
                $sql = "DELETE FROM product  WHERE id = ?";
                parent::doSql($sql, $columns);
            //deleting product related rows before we can delete a subcategory



        $columns = array($id);
        $sql = "DELETE FROM subcategory  WHERE category_id = ?";
        parent::doSql($sql, $columns);

        $columns = array($id);
        $sql = "DELETE FROM category  WHERE id = ?";
        parent::doSql($sql, $columns);
    }
}