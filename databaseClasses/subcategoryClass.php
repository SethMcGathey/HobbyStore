<?php

class subcategory{
    public function readData($inputValues){
        try{
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM subcategory WHERE ?";
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

    public function createData($category_id, $name){
        try{
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO subcategory (category_id, name) values(?, ?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($category_id, $name));
            Database::disconnect();
        }catch(PDOException $error){
            header("Location: 500.php");
            //header("Location: 500.php?msg=creating%20an%20address");
            //echo $error->getMessage();
            die();
        }
    }

    public function updateData($category_id, $name){
        try{
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE subcategory  set category_id = ?, name = ? WHERE id = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($category_id, $name));
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
            $sql = "DELETE FROM subcategory  WHERE id = ?";
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