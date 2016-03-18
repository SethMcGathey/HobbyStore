<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');

require_once 'sessionStart.php'; 

require_once 'accessDatabaseClass.php';   
require_once 'databaseClasses/customerClass.php';
require_once 'databaseClasses/transactionClass.php';
require_once 'databaseClasses/transaction_addressClass.php';

    $pdo = Database::connect();

	$_SESSION['paymentIdForPurchase'] = $_GET['paymentid'];

    $transaction = new transactionDataAccess();
	$transactionData = $transaction->readCartData($_SESSION['customerid'])[1][0];


	$transaction = new transactionDataAccess();
    $transaction->updateData($transactionData['cart'],$transactionData['timestamp'],$_SESSION['paymentIdForPurchase'],$transactionData['customer_id']);

	
	header('Location: confirmPurchase.php');

	Database::disconnect();