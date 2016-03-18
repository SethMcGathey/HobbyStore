<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');

require_once 'sessionStart.php'; 

require_once 'accessDatabaseClass.php';   
require_once 'databaseClasses/customerClass.php';
require_once 'databaseClasses/transactionClass.php';
require_once 'databaseClasses/transaction_addressClass.php';

	$_SESSION['addressIdForPurchase'] = $_GET['addressid'];
	
	$customer = new customerDataAccess();
    $data = $customer->readDataById($_SESSION['customerid'])[1];

    $transaction = new transactionDataAccess();
	$transactionData = $transaction->readCartData($_SESSION['customerid'])[1]

	$transaction_address = new transaction_addressDataAccess();
    $transaction_address->createData($data['phone'], 'payment', $_SESSION['addressIdForPurchase'], 	$transactionData['id']);


	header('Location: choosePurchasePayment.php');