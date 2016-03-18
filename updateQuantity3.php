<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');
require_once 'sessionStart.php'; 
require_once 'accessDatabaseClass.php'; 
require_once 'databaseClasses/transactionClass.php';
require_once 'databaseClasses/transaction_productClass.php';

	$_SESSION['transaction_id'] = 0;

    $transaction = new transactionDataAccess();
	foreach ($transaction->readCartData($_SESSION['customerid'])[1] as $row) {
		$_SESSION['transaction_id'] = $row['id'];
	}

if(!empty($_GET['remove']){


	if(trim($_SESSION['transaction_id']) > 0)
	{
		$transaction_product = new transaction_productDataAccess();
		$transaction_product->updateData(0,$_SESSION['transaction_id'],$_GET['id'],$currentId);

	}
	header('Location: cart.php');

}else{


	if(trim($_SESSION['transaction_id']) > 0)
	{
		$quantity = 0;
		$transaction_product = new transaction_productDataAccess();
		foreach ($transaction_product->readCartData($_GET['id'],$_SESSION['transaction_id'])[1] as $row) {
			$currentId = $row['id'];
			$quantity = $row['quantity'];
		}
		if($_GET['direction'] == 'plus')
		{
			$transaction_product = new transaction_productDataAccess();
			$transaction_product->updateData($quantity+1,$_SESSION['transaction_id'],$_GET['id'],$currentId);
		}else if($_GET['direction'] == 'minus')
		{
			$transaction_product = new transaction_productDataAccess();
			$transaction_product->updateData($quantity-1,$_SESSION['transaction_id'],$_GET['id'],$currentId);
		}

	}
	header('Location: cart.php');
}