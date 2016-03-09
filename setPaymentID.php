<?php
	require_once 'sessionStart.php'; 
	require_once 'database.php';
    $pdo = Database::connect();

	$_SESSION['paymentIdForPurchase'] = $_POST['paymentid'];

	header('Location: confirmPurchase.php');

	Database::disconnect();