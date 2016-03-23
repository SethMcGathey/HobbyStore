<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');
class shipment_centerDataAccess extends accessDatabase{
    public function readData(){
        $columns = array();
        $sql = "SELECT * FROM shipment_center";
        return parent::doSql($sql, $columns);
    }
    public function readDataById($selectParam){
        $columns = array($selectParam);
        $sql = "SELECT * FROM shipment_center WHERE id = ?";
        return parent::doSql($sql, $columns);
    }

    public function createData($name,$phone,$address_id){
        $columns = array($name,$phone,$address_id);
        $sql = "INSERT INTO shipment_center (name,phone,address_id) values(?, ?, ?)";
        parent::doSql($sql, $columns);
    }

    public function updateData($name,$phone,$address_id){
        $columns = array($name,$phone,$address_id);
        $sql = "UPDATE shipment_center  set name = ?, phone = ?, address_id = ? WHERE id = ?";  
        parent::changeSql($sql, $columns);
    }

    public function deleteData($id){
            //deleting bin related stuff before deleting bin
            $columns = array($id);
            $sql = "SELECT id FROM bin WHERE shipment_center_id = ?";
            $bin_id = parent::doSql($sql, $columns);

            $columns = array($bin_id);
            $sql = "DELETE FROM product_bin  WHERE bin_id = ?";
            parent::changeSql($sql, $columns);
            //deleting bin related stuff before deleting bin


        $columns = array($id);
        $sql = "DELETE FROM bin  WHERE sipment_center_id = ?";
        parent::changeSql($sql, $columns);

        $columns = array($id);
        $sql = "DELETE FROM shipment_center  WHERE id = ?";
        parent::changeSql($sql, $columns);
    }
}