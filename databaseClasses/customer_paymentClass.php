<?php

class customer_payment{
    public function readData($inputValues){
        try{
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM custoemr_payment WHERE ?";
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

    public function createData($payment_id, $customer_id){
        try{
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO customer_payment (payment_id, customer_id) values(?, ?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($payment_id, $customer_id);
            Database::disconnect();
        }catch(PDOException $error){
            header("Location: 500.php");
            //header("Location: 500.php?msg=creating%20an%20address");
            //echo $error->getMessage();
            die();
        }
    }

    public function updateData($inputValues){
        try{
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE customer_payment  set payment_id = ?, customer_id = ? WHERE id = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array());
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
            $sql = "DELETE FROM customer_payment  WHERE id = ?";
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