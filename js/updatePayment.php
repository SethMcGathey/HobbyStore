<?php	
error_reporting(E_ALL);
ini_set('display_errors', 'on');

require_once 'sessionStart.php'; 
require_once 'accessDatabaseClass.php'; 

require_once 'databaseClasses/customerClass.php';

	if($_SERVER["REQUEST_METHOD"] == "POST")

	$myusername = $_POST['usernameInput'];
	$mypassword = $_POST['passwordInput'];
	$_SESSION['user'] = $myusername;

	$payment = new paymentDataAccess();
	$payment->updateData($_POST['name'], $_POST['type'], $_POST['number'], $_POST['code'], $_POST['exp'], $POST['payment_id']);
    //echo 'completed';