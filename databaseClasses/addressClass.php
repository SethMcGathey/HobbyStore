<?php

class address{

	public function readData($inputValues){
		try{
			$pdo = Database::connect();
	        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	        $sql = "SELECT * FROM address WHERE ?";
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

	public function createData($city,$country,$state,$street_one,$street_two,$zipcode,$customer_id){
		try{
		    $pdo = Database::connect();
	        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	        $sql = "INSERT INTO address (city,country,state,street_one,street_two,zipcode) values(?, ?, ?, ?, ?, ?)";
	        $q = $pdo->prepare($sql);
	        $q->execute(array($city,$country,$state,$street_one,$street_two,$zipcode));

	        $address_id = $pdo->lastInsertId();
	        $sql2 = "INSERT INTO customer_address (customer_id, address_id) values(?, ?)";
	        $q2 = $pdo->prepare($sql2);
	        $q2->execute(array($customer_id, $address_id);
	        Database::disconnect();
    	}catch(PDOException $error){
    		header("Location: 500.php");
    		//header("Location: 500.php?msg=creating%20an%20address");
    		//echo $error->getMessage();
    		die();
    	}
	}

/***/
	public function updateData($city,$country,$state,$street_one,$street_two,$zipcode,$customer_id){
		try{
			$pdo = Database::connect();
	        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	        $sql = "UPDATE address  set city = ?, country = ?, state = ?, street_one =?, street_two =?, zipcode =? WHERE id = ?";
	        $q = $pdo->prepare($sql);
	        $q->execute($city,$country,$state,$street_one,$street_two,$zipcode);
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
	        $sql = "DELETE FROM address  WHERE id = ?";
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