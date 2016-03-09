<?php

class transaction_product{
    public function readData($inputValues){
        try{
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM transaction_product WHERE ?";
            $q = $pdo->prepare($sql);
            $q->execute($inputValues);
            Database::disconnect();
        }catch(PDOException $error){
            header("Location: 500.php");
            //header("Location: 500.php?msg=creating%20an%20address");
            //echo $error->getMessage();
            die();
        }
    }

    public function createData($quantity,$transaction_id,$product_id){
        try{
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO transaction_product (quantity,transaction_id,product_id) values(?, ?, ?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($quantity,$transaction_id,$product_id));
            Database::disconnect();
        }catch(PDOException $error){
            header("Location: 500.php");
            //header("Location: 500.php?msg=creating%20an%20address");
            //echo $error->getMessage();
            die();
        }
    }

    public function updateData($quantity,$transaction_id,$product_id){
        try{
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE transaction_product  set quantity = ?, transaction_id = ?, product_id = ? WHERE id = ?";        
            $q = $pdo->prepare($sql);
            $q->execute(array($quantity,$transaction_id,$product_id));
            Database::disconnect();
        }catch(PDOException $error){
            header("Location: 500.php");
            //header("Location: 500.php?msg=creating%20an%20address");
            //echo $error->getMessage();
            die();
        }
    }

    public function deleteData($id){
        try{
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "DELETE FROM transaction_product  WHERE id = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($id));
            Database::disconnect();
        }catch(PDOException $error){
            header("Location: 500.php");
            //header("Location: 500.php?msg=creating%20an%20address");
            //echo $error->getMessage();
            die();
        }
    }
}