<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');
class productDataAccess extends accessDatabase{
    public function readData(){
        $columns = array();
        $sql = "SELECT * FROM product";
        return parent::doSql($sql, $columns);
    }
    public function readDataById($selectParam){
        $columns = array($selectParam);
        $sql = "SELECT * FROM product WHERE id = ?";
        return parent::doSql($sql, $columns);
    }

    public function readData($subcategory_id){
        $columns = array($selectParam);
        $sql = 'SELECT a.id,a.name,a.cost,a.description,b.image FROM product a LEFT JOIN image b ON a.id = b.product_id WHERE a.subcategory_id = ' . $subcategory_id . ' ORDER BY id LIMIT 5';
        return parent::doSql($sql, $columns);
    }

    public function readDataForSearch($string){
        $columns = array($string,$string,$string);
        $sql = 'SELECT a.id,a.name,a.cost,a.description,b.image FROM product a LEFT JOIN image b ON a.id = b.product_id WHERE a.name LIKE \'%?%\' OR a.description LIKE \'%?%\' OR a.cost LIKE \'%?%\' ORDER BY a.id LIMIT 5'
        return parent::doSql($sql, $columns);
    }
    public function createData($name,$cost,$description,$subcategory_id, $stock, $bin_id, $description,$featured,$image,){
        $columns = array($name,$cost,$description,$subcategory_id);
        $sql = "INSERT INTO product (name,cost,description,subcategory_id) values(?, ?, ?, ?)";
        $product_id = parent::doSql($sql, $columns);

        $columns2 = array($stock, $product_id, $bin_id);
        $sql2 = "INSERT INTO product_bin (stock, product_id, bin_id) values(?, ?, ?)";
        parent::doSql($sql2, $columns2);

        $columns3 = array($tag_id,$product_id);
        $sql3 = "INSERT INTO product_tag (tag_id,product_id) values(?, ?)";
        parent::doSql($sql3, $columns3);

        $columns4 = array($description,$featured,$image,$product_id);
        $sql4 = "INSERT INTO image (description,featured,image,product_id) values(?, ?, ?, ?)";
        parent::doSql($sql4, $columns4);
    }

    public function updateData($name,$cost,$description,$subcategory_id){
        $columns = array($name,$cost,$description,$subcategory_id);
        $sql = "UPDATE product  set name = ?, cost = ?, description = ?, subcategory_id =? WHERE id = ?"; 
        parent::doSql($sql, $columns);
    }

    public function deleteData($id){
        $columns = array($id);
        $sql = "DELETE FROM product_bin  WHERE product_id = ?";
        parent::doSql($sql, $columns);

        $columns = array($id);
        $sql = "DELETE FROM product  WHERE id = ?";
        parent::doSql($sql, $columns);
    }
}