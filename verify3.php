<?php
	require_once 'sessionStart.php'; 
	require_once 'database.php';
    $pdo = Database::connect();

	if($_SERVER["REQUEST_METHOD"] == "POST")

	$myusername = $_POST['usernameInput'];
	$mypassword = $_POST['passwordInput'];
	$_SESSION['user'] = $myusername;

	$customer = new customerDataAccess();
	$data = $customer->readData($myusername, $mypassword);

	/*
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql="SELECT id, username, first_name, password, permission FROM customer WHERE username = ? AND password = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($myusername, $mypassword));
    $data = $q->fetch(PDO::FETCH_ASSOC);*/
    if(isset($data['id']))
    {
    	
    	$_SESSION['username'] = $data['username'];
    	$_SESSION['customerid'] = $data['id'];
    	$_SESSION['permission'] = $data['permission'];

    	header('Location: index.php');
    }else
    {
    	echo "Invalid Login";
    }

 	Database::disconnect();