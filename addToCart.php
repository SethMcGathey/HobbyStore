<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');
require_once 'sessionStart.php'; 
require_once 'accessDatabaseClass.php'; 
require_once 'databaseClasses/transactionClass.php';
require_once 'databaseClasses/transaction_productClass.php';

    //$pdo = Database::connect();

	//echo $_SESSION['user'];
	//if($_SERVER["REQUEST_METHOD"] == "POST")

    $_SESSION['transaction_id'] = 0;

    $transaction = new transactionDataAccess();
	foreach ($transaction->readCartData($_SESSION['customerid']) as $row) {
		$_SESSION['transaction_id'] = $row['id'];
		//$transactionid = $row['id'];
	}
/*
   	$sql = "SELECT id, cart FROM transaction WHERE customer_id = " . $_SESSION['customerid'] . ' AND cart = 1';

	foreach ($pdo->query($sql) as $row) {
		$_SESSION['transaction_id'] = $row['id'];
		//$transactionid = $row['id'];
	}
	Database::disconnect();*/

	//$pdo = Database::connect();
	if(trim($_SESSION['transaction_id']) > 0)
	{

		$transaction_product = new transaction_productDataAccess();
		foreach ($transaction_product->readCartData($_SESSION['customerid']) as $row) {
			$currentId = $row['id'];
			$quantity = $row['quantity'];
		}

		// $sql = "SELECT id, quantity FROM transaction_product WHERE product_id = " . $_POST['id'] . ' AND transaction_id = ' . $_SESSION['transaction_id'];

		// foreach ($pdo->query($sql) as $row) {
		// 	$row['id'];
		// 	$quantity = $row['quantity'];
		// }
		if($quantity > 0)
		{
			$transaction_product = new transaction_productDataAccess();
			$transaction_product->updateData($quantity+1,$_SESSION['transaction_id'],$_POST['id'],$currentId);

			/*$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql="UPDATE transaction_product SET quantity = (?) WHERE transaction_id = " . $_SESSION['transaction_id'] . " AND product_id = " . $_POST['id'];
		    $q = $pdo->prepare($sql);
		    $q->execute(array($quantity+1));*/
		}else
		{
			$transaction_product = new transaction_productDataAccess();
			$transaction_product->createData(1,$_SESSION['transaction_id'], $_POST["id"]);
			
			/*
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql="INSERT INTO transaction_product (quantity, transaction_id, product_id) VALUES (?, ?, ?)";
		    $q = $pdo->prepare($sql);
		    $q->execute(array(1, $_SESSION['transaction_id'], $_POST["id"]));*/
		}
	}else
	{
		$transaction = new transactionDataAccess();
		$transaction->createData(1,time(), NULL, $_SESSION['customerid']);
		

		/*$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql="INSERT INTO transaction (cart, timestamp, payment_id, customer_id) VALUES (?, ?, ?, ?)";
	    $q = $pdo->prepare($sql);
	    $q->execute(array(1, time(), NULL, $_SESSION['customerid']));*/
	}


	header('Location: products.php');
	//Database::disconnect();