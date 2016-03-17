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

	$customer = new customerDataAccess();
	$data = $customer->readDataByUsernameAndPassword($myusername, $mypassword);

    if(isset($data[1][0]['id']))
    {
    	
    	$_SESSION['username'] = $data[1][0]['username'];
    	$_SESSION['customerid'] = $data[1][0]['id'];
    	$_SESSION['permission'] = $data[1][0]['permission'];
    	header('Location: index3.php');
    }else
    {
    	echo "Invalid Login";
    }