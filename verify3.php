<?php	
error_reporting(E_ALL);
ini_set('display_errors', 'on');

require_once 'sessionStart.php'; 
require_once 'accessDatabaseClass.php'; 
require_once 'database.php';

require_once 'databaseClasses/customerClass.php';
    $pdo = Database::connect();

	if($_SERVER["REQUEST_METHOD"] == "POST")

	$myusername = $_POST['usernameInput'];
	$mypassword = $_POST['passwordInput'];
	$_SESSION['user'] = $myusername;

	$customer = new customerDataAccess();
	$data = $customer->readDataByUsernameAndPassword($myusername, $mypassword);

	/*
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql="SELECT id, username, first_name, password, permission FROM customer WHERE username = ? AND password = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($myusername, $mypassword));
    $data = $q->fetch(PDO::FETCH_ASSOC);*/
    //echo $data['id'][2];
    //echo " \n";
    echo $data[2][1]['id'];
    if(isset($data['id'][2]))
    {
    	
    	$_SESSION['username'] = $data['username'];
    	$_SESSION['customerid'] = $data['id'];
    	$_SESSION['permission'] = $data['permission'];
    	print($data);
    	//header('Location: index3.php');
    }else
    {
    	print_r($data);
    	echo "Invalid Login";
    }

 	Database::disconnect();