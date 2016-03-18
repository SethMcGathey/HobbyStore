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
	foreach ($transaction->readCartData($_SESSION['customerid'])[1] as $row) {
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
		$quantity = 0;
		$transaction_product = new transaction_productDataAccess();
		foreach ($transaction_product->readCartData($_GET['id'],$_SESSION['transaction_id'])[1] as $row) {
			$currentId = $row['id'];
			$quantity = $row['quantity'];
		}

		$transaction_product = new transaction_productDataAccess();
		$transaction_product->updateData($quantity+1,$_SESSION['transaction_id'],$_GET['id'],$currentId);
	}
	header('Location: cart.php');
	//Database::disconnect();