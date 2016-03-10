<?php
	require_once 'sessionStart.php'; 
	require_once 'database.php';
    $pdo = Database::connect();

	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql="DELETE FROM transaction_product WHERE transaction_id = " . $_SESSION['transaction_id'] . " AND product_id = " . $_POST['productid'];
    $q = $pdo->prepare($sql);
    $q->execute();

    header('Location: cart.php');

	Database::disconnect();