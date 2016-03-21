<?php
	require_once 'sessionStart.php'; 
	require_once 'database.php';
    $pdo = Database::connect();

	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql="UPDATE transaction SET cart = 0 WHERE id = (?)";
    $q = $pdo->prepare($sql);
    $q->execute(array($_SESSION['transaction_id']));
    
    header('Location: confirmation.php');

	Database::disconnect();