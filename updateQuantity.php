<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');
	require_once 'sessionStart.php'; 
	require_once 'database.php';
    $pdo = Database::connect();

	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql="UPDATE transaction_product SET quantity = " . $_POST['quantity'] . " WHERE transaction_id = " . $_POST['transaction_id'] . " AND product_id = " . $_POST['productid'];
    $q = $pdo->prepare($sql);
    $q->execute();

    echo "made it";
    //header('Location: cart.php');

	Database::disconnect();