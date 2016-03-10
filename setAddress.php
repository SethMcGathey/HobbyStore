<?php
	require_once 'sessionStart.php'; 
	require_once 'database.php';
    $pdo = Database::connect();

	$_SESSION['addressIdForPurchase'] = $_POST['addressid'];

	header('Location: choosePurchasePayment.php');
	
 	Database::disconnect();